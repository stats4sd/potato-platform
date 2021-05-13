<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\VariableRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class VariableCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class VariableCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Variable::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/variable');
        CRUD::setEntityNameStrings('variable', 'variables');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::addColumn(['name' => 'choices', 'type' => 'relationship']); 
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
        CRUD::setValidation(VariableRequest::class);

        CRUD::addFields([
            [
                'type' => 'relationship',
                'name'  => 'data_map_id',
                
            ],           
            [
                'type' => 'select2_multiple',
                'name'  => 'choices',
                'entity'    => 'choices', // the method that defines the relationship in your Model
                'model'     => "App\Models\Choice", // foreign key model
                'attribute' => 'list_name', // foreign key attribute that is shown to user
                'pivot'     => true, // on create&update, do you need to add/delete pivot table entries?

                // also optional
                'options'   => (function ($query) {
                    return $query->orderBy('list_name')->get();
                }), // force the related options to be a cu
            ],
            [
                'type' => 'text',
                'name'  => 'xlsform_varname',
            ],  
            [
                'type' => 'text',
                'name'  => 'db_varname',
            ],  
            [
                'type' => 'checkbox',
                'name'  => 'in_db',
            ],  
            [
                'name' => 'type',
                'label' => 'Select the variable type',
                'type' => 'select2_from_array',
              
                'options' => [
                    'boolean' => 'Boolean (select_one with yes/no or 1/0 options)',
                    'text' => 'text / select_one',
                    'integer' => 'integer',
                    'decimal' => 'decimal',
                    'select_multiple' => 'select_multiple',
                    'date' => 'date',
                    'timestamp' => 'datetime',
                    'gps' => 'geopoint',
                    'photo' => 'photo',
                ],
            ],           
            [
                'type' => 'text',
                'name'  => 'model',
            ],  
        ]); 
        


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
