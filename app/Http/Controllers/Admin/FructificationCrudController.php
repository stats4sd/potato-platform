<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\FructificationRequest;
use App\Models\Variety;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class FructificationCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class FructificationCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Fructification::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/fructification');
        CRUD::setEntityNameStrings('fructification', 'fructifications');
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
            $this->crud->addClause('where', 'photo_berry', null); 
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
        CRUD::setValidation(FructificationRequest::class);
        
        // CRUD::setFromDb(); // fields
        CRUD::addField(
            [   // Upload
                'name'      => 'photo_berry',
                'label'     => 'Upload the berry picture',
                'type'      => 'upload',
                'upload'    => true,
                'disk'      => 'uploads', // if you store files in the /public folder, please omit this; if you store them in /storage or S3, please specify it;
                // optional:
                // 'temporary' => 10 // if using a service, such as S3, that requires you to make temporary URLs this will make a URL that is valid for the number of minutes specified
            ]
        );

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
         */
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
