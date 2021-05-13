<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\FarmerRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class FarmerCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class FarmerCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Farmer::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/farmer');
        CRUD::setEntityNameStrings('agricultor', 'agricultores');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::setFromDb(); // columns

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(FarmerRequest::class);
        if(backpack_user()->permission==1){
        CRUD::addField(
            [   // Upload
                'name'      => 'photo',
                'label'     => 'Suba la foto del agricultor',
                'type'      => 'upload',
                'upload'    => true,
                'disk'      => 'public',
                ]
            );
        }
        if(backpack_user()->permission==2){
            CRUD::addFields([
                [   
                    'name'      => 'id',
                    'label'     => 'Codigo',
                    'type'      => 'text',
             
                ]
            ]);
           
        }
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
        $this->crud->query =  $this->crud->query->orderByRaw('(photo is NULL) desc');
        $this->crud->denyAccess('create');
        $this->crud->denyAccess('delete');

        $this->crud->addFilter([
            'type'  => 'simple',
            'name'  => 'photo_empty',
            'label' => 'Fotos faltantes'
        ], 
        false, 
        function() { // if the filter is active
            $this->crud->addClause('where', 'photo', null); 
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
                'name'      => 'id',
                'label'     => 'Código Agricultor',
                'type'     => 'closure',
                'function' => function($entry) {
                    return "<h6><b>". $entry->id . "</b></h6>";
                }
            ],
            [  
                'name'      => 'photos_missing',
                'label'     => 'Subir Fotos',
                'type'     => 'closure',
                'function' => function($entry) {
                   if(!empty($entry->photo))
                   {
                       return '<h6 style="color:green;">Completo</h6>';
                   } else {
                    return '<h6 style="color:red;">Incompleto</h6>';
                   } 
                },
                'orderable'  => true,
                'orderLogic' => function ($query, $column, $columnDirection) {
                  
                        return $query->orderByRaw('(photo is NULL) ' . $columnDirection);
                    }
            ],
            [
                'name'      => 'photo',
                'label'     => 'Foto del agricultor',
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
        $this->crud->allowAccess('CreatePhoto');

        $this->crud->operation('UploadPhoto', function () {
            $this->crud->setCurrentOperation('list');
            $this->crud->loadDefaultOperationSettingsFromConfig();
            $this->crud->setCurrentOperation('UploadPhoto');

            $this->crud->addButton('line', 'update', 'view', 'crud::buttons.update', 'end');
            $this->crud->addButton('line', 'delete', 'view', 'crud::buttons.delete', 'end');
        });
    }
}
