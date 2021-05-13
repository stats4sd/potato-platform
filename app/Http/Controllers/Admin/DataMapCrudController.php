<?php

namespace App\Http\Controllers\Admin;

use App\Models\Variable;
use App\Http\Requests\DataMapRequest;
use App\Http\Requests\DataMapStoreRequest;
use App\Http\Requests\DataMapUpdateRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class DataMapCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class DataMapCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation  { store as traitStore;  update as traitUpdate; }
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\DataMap');

        $this->crud->setRoute(config('backpack.base.route_prefix') . '/datamap');
        $this->crud->setEntityNameStrings('datamap', 'data_maps');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        $this->crud->addColumns([
            [
                'name' => 'id',
                'label' => 'value',
            ],
            [
                'name' => 'title',
                'label' => 'Title'
            ],
            [
                'name' => 'location',
                'label' => 'Location'
            ],
            [
                'name' => 'repeat_group',
                'label' => 'Repeat Group Name'
            ],
            [
                'type' => "relationship",
                'name' => 'xlsforms',
            ]
        ]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(DataMapStoreRequest::class);

        $this->crud->addFields([
            
            [
                'name' => 'id',
                'label' => 'value',
            ],
            [
                'name' => 'title',
                'label' => 'Title'
            ],
            [
                'name' => 'location',
                'label' => 'Location'
            ],
            [
                'name' => 'repeat_group',
                'label' => 'Repeat Group Name'
            ],
            [
                'type' => "relationship",
                'name' => 'xlsforms',
            ]
                
        ]);
    }

    



    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
        $this->crud->modifyField('id', [
            'attributes' => [
                'readonly' => true,
            ],
        ]);
        $this->crud->setValidation(DataMapUpdateRequest::class);
    }


    protected function setupShowOperation()
    {
        $this->crud->addColumns([
            [
                'name' => 'id',
                'label' => 'value',
            ],
            [
                'name' => 'title',
                'label' => 'Title'
            ],
            [
                'name' => 'location',
                'label' => 'Location'
            ],
            [
                'name' => 'repeat_group',
                'label' => 'Repeat Group Name'
            ],
            [
                'type' => "relationship",
                'name' => 'xlsforms',
            ]
        ]);
    }
}
