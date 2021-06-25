<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SproutRequest;
use App\Models\Variety;
use Illuminate\Support\Facades\Route;
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
        CRUD::setEntityNameStrings('brotamiento', 'brotamiento');
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
                'name'  => 'campana',
                'type'  => 'text',
                'label' => 'Campaña',
            ],
            [
                'name'  => 'color_predominant_tuber_shoot',
                'type'  => 'text',
                'label' => 'Color predominante',
            ],
            [
                'name'  => 'color_secondary_tuber_shoot',
                'type'  => 'text',
                'label' => 'Color secundario',
            ],
            [
                'name'  => 'distribution_color_secodary_tuber_shoot',
                'type'  => 'text',
                'label' => 'Distribución color secundario',
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
                'name'  => 'color_predominant_tuber_shoot',
                'type'  => 'text',
                'label' => 'Color predominante',
            ],
            [
                'name'  => 'color_secondary_tuber_shoot',
                'type'  => 'text',
                'label' => 'Color secundario',
            ],
            [
                'name'  => 'distribution_color_secodary_tuber_shoot',
                'type'  => 'text',
                'label' => 'Distribución del color secundario',
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
}