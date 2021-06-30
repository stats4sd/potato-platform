<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\FructificationRequest;
use App\Models\Variety;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\Route;

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
        CRUD::setEntityNameStrings('fructificación', 'fructificación');
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
                'name'  => 'variety_id',
                'type'  => 'text',
                'label' => 'Código Variedad',
            ],
            [
                'name'  => 'choiceCampana.label_spanish',
                'type'  => 'text',
                'label' => 'Campaña',
            ],
            [
                'name'  => 'choiceBerries.label_spanish',
                'type'  => 'text',
                'label' => 'Bayas',
            ],
            [
                'name'  => 'choiceColorBerries.label_spanish',
                'type'  => 'text',
                'label' => 'Color baya',
            ],
            [
                'name'  => 'choiceShapeBerry.label_spanish',
                'type'  => 'text',
                'label' => 'Forma baya',
            ],
            [
                'name'  => 'choiceMaturityVariety.label_spanish',
                'type'  => 'text',
                'label' => 'Madurez variedad',
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
        CRUD::setValidation(FructificationRequest::class);
        
        // CRUD::setFromDb(); // fields
        $this->crud->addFields([
            [
                'name'  => 'variety_id',
                'type'  => 'text',
                'label' => 'Código Variedad',
            ],
            [
                'name'  => 'campana',
                'type'  => 'text',
                'label' => 'Campaña',
            ],
            [
                'name'  => 'berries',
                'type'  => 'text',
                'label' => 'Bayas',
            ],
            [
                'name'  => 'color_berries',
                'type'  => 'text',
                'label' => 'Color baya',
            ],
            [
                'name'  => 'shape_berry',
                'type'  => 'text',
                'label' => 'Forma baya',
            ],
            [
                'name'  => 'maturity_variety',
                'type'  => 'text',
                'label' => 'Madurez variedad',
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
        $this->crud->setOperationSetting('setFromDb', false);
        $this->setupListOperation();
    }

}
