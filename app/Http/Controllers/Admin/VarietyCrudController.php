<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\VarietyRequest;
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
                'label' => 'Variety Code',
            ],
            [
                'name'  => 'name',
                'type'  => 'text',
                'label' => 'Variety Name',
            ],
            [
                'name'  => 'common_name',
                'type'  => 'text',
                'label' => 'Common name',
            ],
            [
                'name'  => 'other_name',
                'type'  => 'text',
                'label' => 'Other name',
            ],
            [
                'name'  => 'is_mixture',
                'type'  => 'check',
                'label' => 'is Mixture',
            ],
            [
                'name'  => 'farmer',
                'type'  => 'relationship',
                'label' => 'Farmer',

            ],
            [
                'name'  => 'files',
                'type'  => 'upload_multiple',
                'label' => 'Files',
                'disk'  => 'public',
            ],
            [
                'name'  => 'additional_info',
                'type'  => 'textarea',
                'label' => 'Additional info',
            ],
        ]);
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
                'label' => 'Variety Code',
            ],
            [
                'name'  => 'name',
                'type'  => 'text',
                'label' => 'Variety Name',
            ],
            [
                'name'  => 'common_name',
                'type'  => 'text',
                'label' => 'Common name',
            ],
            [
                'name'  => 'other_name',
                'type'  => 'text',
                'label' => 'Other name',
            ],
            [
                'name'  => 'is_mixture',
                'type'  => 'checkbox',
                'label' => 'is Mixture',
            ],
            [
                'name'  => 'farmer_id',
                'type'  => 'relationship',
                'label' => 'Farmer',
                'attribute' => "name",
                'entity' => 'farmer'
            ],
            [
                'name'  => 'files',
                'type'  => 'upload_multiple',
                'label' => 'Files',
                'upload'    => true,
                'disk'      => 'uploads',
            ],
            [
                'name'  => 'additional_info',
                'type'  => 'textarea',
                'label' => 'Additional info',
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

    protected function setupMezclaRoutes($segment, $routeName, $controller)
    {
        Route::get($segment.'/mezcla', [
            'as'        => $routeName.'.getMezcla',
            'uses'      => $controller.'@getMezclaForm',
            'operation' => 'mezcla',
        ]);

        Route::post($segment.'/search-mezcla', [
            'as'        => $routeName.'.search',
            'uses'      => $controller.'@search',
            'operation' => 'mezcla',
        ]);

    }

    public function getMezclaForm() 
    {
      
        $this->crud->setPageLengthMenu([[10, 25, 50, 100, -1], [10, 25, 50, 100, 'backpack::crud.all']],);
        $this->data['crud'] = $this->crud;
    
        // load the view from /resources/views/vendor/backpack/crud/ if it exists, otherwise load the one in the package
        return view('vendor.backpack.crud.mezcla', $this->data);
    
    }

    public function setupMezclaOperation()
    {
        $this->crud->addFilter([ 
            'type'  => 'simple',
            'name'  => 'mezcla',
            'label' => 'Mezclas'
        ],
        false, 
        function() { 
            $this->crud->addClause('where', 'id', 'LIKE', "%.%");
        });
        CRUD::setFromDb(); 


    }

    protected function setupMezclaDefaults()
    {
        $this->crud->allowAccess('mezcla');

        $this->crud->operation('mezcla', function () {
            $this->crud->setCurrentOperation('list');
            $this->crud->loadDefaultOperationSettingsFromConfig();
            $this->crud->setCurrentOperation('mezcla');

            $this->crud->addButton('line', 'update', 'view', 'crud::buttons.update', 'end');
            $this->crud->addButton('line', 'delete', 'view', 'crud::buttons.delete', 'end');
        });
       
    }

}
