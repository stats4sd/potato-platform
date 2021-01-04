<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\FloweringRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class FloweringCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class FloweringCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Flowering::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/flowering');
        CRUD::setEntityNameStrings('flowering', 'flowerings');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        $this->crud->denyAccess('create');
        $this->crud->denyAccess('delete');

        $this->crud->addFilter([
            'type'  => 'simple',
            'name'  => 'photo_empty',
            'label' => 'Photo to uploader'
        ], 
        false,  
        function() { // if the filter is active
            $this->crud->query = $this->crud->query->where('photos', null)->orWhere('photo_flower', null)->orWhere('photo_plant', null);
        } );
        
        $this->crud->removeFilter('photo_empty');
        // select2 filter
        $this->crud->addFilter([
            'name'  => 'variedad_code',
            'type'  => 'text',
            'label' => 'Variedad Code'
        ],
        false,
        function ($value) { // if the filter is active
            $this->crud->addClause('where', 'variety_id', $value);
        });

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
        CRUD::setValidation(FloweringRequest::class);

        CRUD::addFields([
            [
                'name'      => 'photos',
                'label'     => 'Upload the pictures',
                'type'      => 'upload_multiple',
                'upload'    => true,
                'disk'      => 'uploads',
            ],
            [  
                'name'      => 'photo_flower',
                'label'     => 'Upload the flower pictures',
                'type'      => 'upload',
                'upload'    => true,
                'disk'      => 'uploads',
            ],
            [  
                'name'      => 'photo_plant',
                'label'     => 'Upload the plant pictures',
                'type'      => 'upload',
                'upload'    => true,
                'disk'      => 'uploads',
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
}
