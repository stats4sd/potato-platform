<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SproutRequest;
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
        CRUD::setEntityNameStrings('sprout', 'sprouts');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        $this->crud->query =  $this->crud->query->orderByRaw('(photo_tuber_shoot is NULL) desc');
        $this->crud->denyAccess('create');
        $this->crud->denyAccess('delete');

        $this->crud->addFilter([
            'type'  => 'simple',
            'name'  => 'photo_empty',
            'label' => 'Missing photos'
        ], 
        false,  
        function() { // if the filter is active
            $this->crud->query = $this->crud->query->where('photo_tuber_shoot', null);
        } );
        
        // select2 filter
        $this->crud->addFilter([
            'name'  => 'variety_code',
            'type'  => 'text',
            'label' => 'Variety Code'
        ],
        false,
        function ($value) { // if the filter is active
            $this->crud->addClause('where', 'variety_id', $value);
        });

        CRUD::addColumns([
            [  
                'name'      => 'variety_id',
                'label'     => 'Variety Code',
                'type'     => 'closure',
                'function' => function($entry) {
                    return "<h6><b>". $entry->variety_id . "</b></h6>";
                }
            ],
            [  
                'name'      => 'photos_missing',
                'label'     => 'Upload Photos',
                'type'     => 'closure',
                'function' => function($entry) {
                   if(!empty($entry->photo_tuber_shoot))
                   {
                       return '<h6 style="color:green;">Complete</h6>';
                   } else {
                    return '<h6 style="color:red;">Incomplete</h6>';
                   } 
                },
                'orderable'  => true,
                'orderLogic' => function ($query, $column, $columnDirection) {
                  
                        return $query->orderByRaw('(photo_tuber_shoot is NULL) ' . $columnDirection);
                    }
            ],
            [
                'name'      => 'photo_tuber_shoot',
                'label'     => 'Photo of the Tuber Shoot',
                'type'     => 'image',
                'prefix' => 'storage/',
                'height' => '128px',
                'width'  => '128px',
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
        CRUD::setValidation(SproutRequest::class);

        // CRUD::setFromDb(); // fields

        CRUD::addField(
            [   // Upload
                'name'      => 'photo_tuber_shoot',
                'label'     => 'Upload the tuber shoot pictures',
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
}
