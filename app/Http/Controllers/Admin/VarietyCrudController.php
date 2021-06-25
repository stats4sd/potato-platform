<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\VarietyRequest;
use App\Models\Farmer;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;

/**
 * Class VarietyCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class VarietyCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation {index as traitIndex;}
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
        CRUD::setModel(\App\Models\Variety::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/variety');
        CRUD::setEntityNameStrings('variedad', 'variedades');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        
        $this->crud->addColumns([
            [
                'name'  => 'id',
                'type'  => 'text',
                'label' => 'Código Variedad',
            ],
            [
                'name'  => 'common_name',
                'type'  => 'text',
                'label' => 'Nombre Común',
            ],
            [
                'name'  => 'other_name',
                'type'  => 'text',
                'label' => 'Otro Nombre',
            ],
            [
                'name'  => 'is_mixture',
                'type'  => 'check',
                'label' => 'Mezcla',
            ],
            [
                'name'  => 'farmer',
                'type'  => 'relationship',
                'label' => 'Agricultor',

            ],
            [
                'name'  => 'files',
                'type'  => 'upload_multiple',
                'label' => 'Archivos',
                'disk'  => 'public',
            ],
            [
                'name'  => 'additional_info',
                'type'  => 'textarea',
                'label' => 'Información Adicional',
            ],
        ]);

        $this->crud->addFilter([ 
            'type'  => 'simple',
            'name'  => 'mezcla',
            'label' => 'Mezclas'
        ],
        false, 
        function() { 
            $this->crud->addClause('where', 'id', 'LIKE', "%.%");
        });
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(VarietyRequest::class);

        $this->crud->addFields([
            [
                'name'  => 'id',
                'type'  => 'text',
                'label' => 'Código Variedad',
            ],
            [
                'name'  => 'common_name',
                'type'  => 'text',
                'label' => 'Nombre Común',
            ],
            [
                'name'  => 'other_name',
                'type'  => 'text',
                'label' => 'Otro Nombre',
            ],
            [
                'name'  => 'is_mixture',
                'type'  => 'checkbox',
                'label' => 'Es Mezcla',
            ],
            [
                'name'  => 'farmer',
                'type'  => 'relationship',
                'label' => 'Agricultor',
            ],
            [
                'name'  => 'files',
                'type'  => 'upload_multiple',
                'label' => 'Archivos',
                'upload'    => true,
                'disk'      => 'uploads',
            ],
            [
                'name'  => 'additional_info',
                'type'  => 'textarea',
                'label' => 'Información Adicional',
            ],
        ]);
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

    /**
     * Show Operation
     */
    protected function setupShowOperation()
    {
        $this->setupListOperation();
    }


    protected function setupUploadAdditionalInfoRoutes($segment, $routeName, $controller)
    {
        Route::get($segment.'/upload-additional-info', [
            'as'        => $routeName.'.getUploadAdditionalInfo',
            'uses'      => $controller.'@getUploadAdditionalInfoForm',
            'operation' => 'UploadAdditionalInfo',
        ]);

        Route::post($segment.'/search-mezcla', [
            'as'        => $routeName.'.search',
            'uses'      => $controller.'@search',
            'operation' => 'UploadAdditionalInfo',
        ]);

    }

    public function getUploadAdditionalInfoForm() 
    {
      
        $this->crud->setPageLengthMenu([[10, 25, 50, 100, -1], [10, 25, 50, 100, 'backpack::crud.all']],);
        $this->data['crud'] = $this->crud;
    
        // load the view from /resources/views/vendor/backpack/crud/ if it exists, otherwise load the one in the package
        return view('vendor.backpack.crud.upload_additional_info', $this->data);
    
    }

    public function setupUploadAdditionalInfoOperation()
   {     
        CRUD::addColumns([
            [  
                'name'      => 'id',
                'label'     => 'Código Variedad',
                'type'     => 'closure',
                'function' => function($entry) {
                    return "<h6><b>". $entry->id . "</b></h6>";
                }
            ],
            [
                'name'  => 'files',
                'type'  => 'upload_multiple',
                'label' => 'Archivos',
                'disk'  => 'public',
            ],
            [
                'name'  => 'additional_info',
                'type'  => 'textarea',
                'label' => 'Información adicional',
            ],
        ]); 


    }

    protected function setupUploadAdditionalInfoDefaults()
    {
        $this->crud->allowAccess('UploadAdditionalInfo');

        $this->crud->operation('UploadAdditionalInfo', function () {
            $this->crud->setCurrentOperation('list');
            $this->crud->loadDefaultOperationSettingsFromConfig();
            $this->crud->setCurrentOperation('UploadAdditionalInfo');

            $this->crud->addButton('line', 'update', 'view', 'crud::buttons.update', 'end');
            $this->crud->addButton('line', 'delete', 'view', 'crud::buttons.delete', 'end');
        });
       
    }

}
