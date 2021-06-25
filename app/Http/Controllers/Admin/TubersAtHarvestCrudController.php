<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Route;
use App\Models\Variety;
use App\Http\Requests\TubersAtHarvestRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class TubersAtHarvestCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class TubersAtHarvestCrudController extends CrudController
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
        CRUD::setModel(\App\Models\TubersAtHarvest::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/tubers_at_harvest');
        CRUD::setEntityNameStrings('tubérculos en la cosecha', 'tubérculos a la cosecha');
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
                'name'  => 'color_predominant_tuber',
                'type'  => 'text',
                'label' => 'Color predominante',
            ],
            [
                'name'  => 'intensity_color_predominant_tuber',
                'type'  => 'text',
                'label' => 'Intensidad color predominante',
            ],
            [
                'name'  => 'color_secondary_tuber',
                'type'  => 'text',
                'label' => 'Color secundario',
            ],
            [
                'name'  => 'distribution_color_secodary_tuber',
                'type'  => 'text',
                'label' => 'Distribución color secundario',
            ],
            [
                'name'  => 'shape_tuber',
                'type'  => 'text',
                'label' => 'Forma',
            ],
            [
                'name'  => 'variant_shape_tuber',
                'type'  => 'text',
                'label' => 'Variante forma',
            ],
            [
                'name'  => 'depth_tuber_eyes',
                'type'  => 'text',
                'label' => 'Profundidad ojos',
            ],
            [
                'name'  => 'color_predominant_tuber_pulp',
                'type'  => 'text',
                'label' => 'Color predominante pulpa',
            ],
            [
                'name'  => 'color_secondary_tuber_pulp',
                'type'  => 'text',
                'label' => 'Color secundario pulpa',
            ],
            [
                'name'  => 'distribution_color_secodary_tuber_pulp',
                'type'  => 'text',
                'label' => 'Distribución color secundario pulpa',
            ],
            [
                'name'  => 'number_tubers_plant',
                'type'  => 'number',
                'label' => 'Número tubérculos planta',
            ],
            [
                'name'  => 'yield_plant',
                'type'  => 'number',
                'label' => 'Rendimiento planta kg',
            ],
            [
                'name'  => 'level_tolerance_late_blight',
                'type'  => 'text',
                'label' => 'Nivel tolerancia rancha',
            ],
            [
                'name'  => 'level_tolerance_weevil',
                'type'  => 'text',
                'label' => 'Nivel tolerancia gorgojo andes',
            ],
            [
                'name'  => 'level_tolerance_hailstorms',
                'type'  => 'text',
                'label' => 'Nivel tolerancia granizada',
            ],
            [
                'name'  => 'level_tolerance_frost',
                'type'  => 'text',
                'label' => 'Nivel tolerancia helada',
            ],
            [
                'name'  => 'level_tolerance_drought',
                'type'  => 'text',
                'label' => 'Nivel tolerancia sequía',
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
        CRUD::setValidation(TubersAtHarvestRequest::class);
        
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
                'name'  => 'color_predominant_tuber',
                'type'  => 'text',
                'label' => 'Color predominante',
            ],
            [
                'name'  => 'intensity_color_predominant_tuber',
                'type'  => 'text',
                'label' => 'Intensidad del color predominante',
            ],
            [
                'name'  => 'color_secondary_tuber',
                'type'  => 'text',
                'label' => 'Color secundario',
            ],
            [
                'name'  => 'distribution_color_secodary_tuber',
                'type'  => 'text',
                'label' => 'Distribución del color secundario',
            ],
            [
                'name'  => 'shape_tuber',
                'type'  => 'text',
                'label' => 'Forma general',
            ],
            [
                'name'  => 'variant_shape_tuber',
                'type'  => 'text',
                'label' => 'Variante de forma',
            ],
            [
                'name'  => 'depth_tuber_eyes',
                'type'  => 'text',
                'label' => 'Profundidad de los ojos',
            ],
            [
                'name'  => 'color_predominant_tuber_pulp',
                'type'  => 'text',
                'label' => 'Color predominante de la pulpa',
            ],
            [
                'name'  => 'color_secondary_tuber_pulp',
                'type'  => 'text',
                'label' => 'Color secundario de la pulpa',
            ],
            [
                'name'  => 'distribution_color_secodary_tuber_pulp',
                'type'  => 'text',
                'label' => 'Distribución del color secundario de la pulpa',
            ],
            [
                'name'  => 'number_tubers_plant',
                'type'  => 'number',
                'label' => 'Número de tubérculos por planta',
            ],
            [
                'name'  => 'yield_plant',
                'type'  => 'number',
                'label' => 'Rendimiento por planta en kg',
            ],
            [
                'name'  => 'level_tolerance_late_blight',
                'type'  => 'text',
                'label' => 'Nivel de tolerancia a la rancha',
            ],
            [
                'name'  => 'level_tolerance_weevil',
                'type'  => 'text',
                'label' => 'Nivel de tolerancia al gorgojo andes',
            ],
            [
                'name'  => 'level_tolerance_hailstorms',
                'type'  => 'text',
                'label' => 'Nivel de tolerancia a la granizada',
            ],
            [
                'name'  => 'level_tolerance_frost',
                'type'  => 'text',
                'label' => 'Nivel de tolerancia a la helada',
            ],
            [
                'name'  => 'level_tolerance_drought',
                'type'  => 'text',
                'label' => 'Nivel de tolerancia a la sequía',
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