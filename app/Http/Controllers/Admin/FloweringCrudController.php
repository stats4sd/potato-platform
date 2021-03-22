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
        $this->crud->query =  $this->crud->query->orderByRaw('((photos is NULL) + (photo_flower is NULL) + (photo_plant is NULL)) desc');
        $this->crud->denyAccess('create');
        $this->crud->denyAccess('delete');

        $this->crud->addFilter([
            'type'  => 'simple',
            'name'  => 'photo_empty',
            'label' => 'Missing photos'
        ], 
        false,  
        function() { // if the filter is active
            $this->crud->query = $this->crud->query->where('photos', null)->orWhere('photo_flower', null)->orWhere('photo_plant', null);
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
                   if(!empty($entry->photos) && !empty($entry->photo_flower) && !empty($entry->photo_plant))
                   {
                       return '<h6 style="color:green;">Complete</h6>';
                   } else {
                        return '<h6 style="color:red;">Incomplete</h6>';
                   } 
                },
                'orderable'  => true,
                'orderLogic' => function ($query, $column, $columnDirection) {
                  
                        return $query->orderByRaw('((photos is NULL) + (photo_flower is NULL) + (photo_plant is NULL)) ' . $columnDirection);
                    }
            ],
            [
                'name'      => 'photos',
                'label'     => 'Photos',
                'type'     => 'closure',
                'function' => function($entry) {
                    $img = "";
                    foreach ( (array) $entry->photos as $photo) {
                       $img = $img . "<a href='/storage/".$photo."'><img src='/storage/".$photo."'  width='128' height='128'  style='float: left; padding-right: 5px;'></a>";
                    }
                    return $img;
                }
            ],
            [  
                'name'      => 'photo_flower',
                'label'     => 'Photo of flower',
                'type'     => 'image',
                'prefix' => 'storage/',
                'height' => '128px',
                'width'  => '128px',
            ],
            [  
                'name'      => 'photo_plant',
                'label'     => 'Photo of plant',
                'type'     => 'image',
                'prefix' => 'storage/',
                'height' => '128px',
                'width'  => '128px',
             
            ],
        ]);
        
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
                'label'     => 'Primera foto de la hoja,
                                Segunda foto de la hoja y
                                Tercera foto de la hoja',
                'type'      => 'upload_multiple',
                'upload'    => true,
                'disk'      => 'public',
            ],
            [  
                'name'      => 'photo_flower',
                'label'     => 'Foto de la flor',
                'type'      => 'upload',
                'upload'    => true,
                'disk'      => 'public',
            ],
            [  
                'name'      => 'photo_plant',
                'label'     => 'Foto de la planta entera',
                'type'      => 'upload',
                'upload'    => true,
                'disk'      => 'public',
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
