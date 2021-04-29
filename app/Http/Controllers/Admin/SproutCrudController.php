<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SproutRequest;
use App\Models\Variety;
use Illuminate\Support\Facades\Route;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class SproutCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class SproutCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Sprout::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/sprout');
        CRUD::setEntityNameStrings('brotamiento', 'brotamiento');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::setFromDb(); 
       
    }

      /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(SproutRequest::class);
        
        // CRUD::setFromDb(); // fields
        CRUD::addField(
            [   // Upload
                'name'      => 'photo_tuber_shoot',
                'label'     => 'Suba la foto del brote',
                'type'      => 'upload',
                'upload'    => true,
                'disk'      => 'public',
            ]
        );
    }
   /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function setupUploadPhotoRoutes($segment, $routeName, $controller)
    {
        Route::get($segment.'/upload-photo', [
            'as'        => $routeName.'.getUploadPhoto',
            'uses'      => $controller.'@getUploadPhotoForm',
            'operation' => 'UploadPhoto',
        ]);

        Route::post($segment.'/search-mezcla', [
            'as'        => $routeName.'.search',
            'uses'      => $controller.'@search',
            'operation' => 'UploadPhoto',
        ]);

    }

    public function getUploadPhotoForm() 
    {
      
        $this->crud->setPageLengthMenu([[10, 25, 50, 100, -1], [10, 25, 50, 100, 'backpack::crud.all']],);
        $this->data['crud'] = $this->crud;
    
        // load the view from /resources/views/vendor/backpack/crud/ if it exists, otherwise load the one in the package
        return view('vendor.backpack.crud.upload_photo', $this->data);
    
    }

    public function setupUploadPhotoOperation()
    {
        $this->crud->query =  $this->crud->query->orderByRaw('(photo_tuber_shoot is NULL) desc');
        $this->crud->denyAccess('create');
        $this->crud->denyAccess('delete');

        $this->crud->addFilter([
            'type'  => 'simple',
            'name'  => 'photo_empty',
            'label' => 'Fotos faltantes'
        ], 
        false, 
        function() { // if the filter is active
            $this->crud->addClause('where', 'photo_tuber_shoot', null); 
        } );
 
        // select2 filter
        $this->crud->addFilter([
            'name'  => 'variety_code',
            'type'  => 'text',
            'label' => 'Código Variedad'
        ],
        false,
        function ($value) { // if the filter is active
            $this->crud->addClause('where', 'variety_id', $value);
        });

        CRUD::addColumns([
            [  
                'name'      => 'variety_id',
                'label'     => 'Código Variedad',
                'type'     => 'closure',
                'function' => function($entry) {
                    return "<h6><b>". $entry->variety_id . "</b></h6>";
                }
            ],
            [  
                'name'      => 'photos_missing',
                'label'     => 'Subir Fotos',
                'type'     => 'closure',
                'function' => function($entry) {
                   if(!empty($entry->photo_tuber_shoot))
                   {
                       return '<h6 style="color:green;">Completo</h6>';
                   } else {
                    return '<h6 style="color:red;">Incompleto</h6>';
                   } 
                },
                'orderable'  => true,
                'orderLogic' => function ($query, $column, $columnDirection) {
                  
                        return $query->orderByRaw('(photo_tuber_shoot is NULL) ' . $columnDirection);
                    }
            ],
            [
                'name'      => 'photo_tuber_shoot',
                'label'     => 'Foto del brote',
                'type'     => 'image',
                'prefix' => 'storage/',
                'height' => '128px',
                'width'  => '128px',
            ],
        ]);
    }

    protected function setupUploadPhotoDefaults()
    {
        $this->crud->allowAccess('UploadPhoto');

        $this->crud->operation('UploadPhoto', function () {
            $this->crud->setCurrentOperation('list');
            $this->crud->loadDefaultOperationSettingsFromConfig();
            $this->crud->setCurrentOperation('UploadPhoto');

            $this->crud->addButton('line', 'update', 'view', 'crud::buttons.update', 'end');
            $this->crud->addButton('line', 'delete', 'view', 'crud::buttons.delete', 'end');
        });
    }
       
}