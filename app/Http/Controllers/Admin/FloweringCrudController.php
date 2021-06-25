<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Route;
use App\Models\Variety;
use App\Http\Requests\FloweringRequest;
use App\Models\Flowering;
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
        CRUD::setEntityNameStrings('floración', 'floración');
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
                'name'  => 'plant_growth',
                'type'  => 'text',
                'label' => 'Habito crecimiento',
            ],
            [
                'name'  => 'color_stem',
                'type'  => 'text',
                'label' => 'Color tallo',
            ],
            [
                'name'  => 'shape_stem_wings',
                'type'  => 'text',
                'label' => 'Forma alas tallo',
            ],
            [
                'name'  => 'leaf_dissection',
                'type'  => 'text',
                'label' => 'Disección hoja',
            ],
            [
                'name'  => 'number_lateral_leaflets',
                'type'  => 'text',
                'label' => 'Número foliolos laterales',
            ],
            [
                'name'  => 'number_intermediate_leaflets',
                'type'  => 'text',
                'label' => 'Número inter-hojuelas entre foliolos laterales',
            ],
            [
                'name'  => 'number_leaflets_on_petioles',
                'type'  => 'text',
                'label' => 'Número inter-hojuelas sobre peciolulos',
            ],
            [
                'name'  => 'degree_flowering_plant',
                'type'  => 'text',
                'label' => 'Grado de floración',
            ],
            [
                'name'  => 'shape_corolla',
                'type'  => 'text',
                'label' => 'Forma corola',
            ],
            [
                'name'  => 'color_predominant_flower',
                'type'  => 'text',
                'label' => 'Color predominante flor',
            ],
            [
                'name'  => 'intensity_color_predominant_flower',
                'type'  => 'text',
                'label' => 'Intensidad color predominante flor',
            ],
            [
                'name'  => 'color_secondary_flower',
                'type'  => 'text',
                'label' => 'Color secundario flor',
            ],
            [
                'name'  => 'distribution_color_secodary_flower',
                'type'  => 'text',
                'label' => 'Distribución color secundario flor',
            ],
            [
                'name'  => 'pigmentation_anthers',
                'type'  => 'text',
                'label' => 'Pigmentación anteras',
            ],
            [
                'name'  => 'pigmentation_pistil',
                'type'  => 'text',
                'label' => 'Pigmentación pistilo',
            ],
            [
                'name'  => 'color_chalice',
                'type'  => 'text',
                'label' => 'Color cáliz',
            ],
            [
                'name'  => 'color_pedicel',
                'type'  => 'text',
                'label' => 'Color pedicelo',
            ],
            [
                'name'  => 'level_tolerance_late_blight',
                'type'  => 'text',
                'label' => 'Nivel tolerancia rancha',
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
            CRUD::setValidation(FloweringRequest::class);
            
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
                    'name'  => 'plant_growth',
                    'type'  => 'text',
                    'label' => 'Habito crecimiento',
                ],
                [
                    'name'  => 'color_stem',
                    'type'  => 'text',
                    'label' => 'Color tallo',
                ],
                [
                    'name'  => 'shape_stem_wings',
                    'type'  => 'text',
                    'label' => 'Forma alas tallo',
                ],
                [
                    'name'  => 'leaf_dissection',
                    'type'  => 'text',
                    'label' => 'Disección hoja',
                ],
                [
                    'name'  => 'number_lateral_leaflets',
                    'type'  => 'text',
                    'label' => 'Número foliolos laterales',
                ],
                [
                    'name'  => 'number_intermediate_leaflets',
                    'type'  => 'text',
                    'label' => 'Número inter-hojuelas entre foliolos laterales',
                ],
                [
                    'name'  => 'number_leaflets_on_petioles',
                    'type'  => 'text',
                    'label' => 'Número inter-hojuelas sobre peciolulos',
                ],
                [
                    'name'  => 'degree_flowering_plant',
                    'type'  => 'text',
                    'label' => 'Grado de floración',
                ],
                [
                    'name'  => 'shape_corolla',
                    'type'  => 'text',
                    'label' => 'Forma corola',
                ],
                [
                    'name'  => 'color_predominant_flower',
                    'type'  => 'text',
                    'label' => 'Color predominante flor',
                ],
                [
                    'name'  => 'intensity_color_predominant_flower',
                    'type'  => 'text',
                    'label' => 'Intensidad color predominante flor',
                ],
                [
                    'name'  => 'color_secondary_flower',
                    'type'  => 'text',
                    'label' => 'Color secundario flor',
                ],
                [
                    'name'  => 'distribution_color_secodary_flower',
                    'type'  => 'text',
                    'label' => 'Distribución color secundario flor',
                ],
                [
                    'name'  => 'pigmentation_anthers',
                    'type'  => 'text',
                    'label' => 'Pigmentación anteras',
                ],
                [
                    'name'  => 'pigmentation_pistil',
                    'type'  => 'text',
                    'label' => 'Pigmentación pistilo',
                ],
                [
                    'name'  => 'color_chalice',
                    'type'  => 'text',
                    'label' => 'Color cáliz',
                ],
                [
                    'name'  => 'color_pedicel',
                    'type'  => 'text',
                    'label' => 'Color pedicelo',
                ],
                [
                    'name'  => 'level_tolerance_late_blight',
                    'type'  => 'text',
                    'label' => 'Nivel tolerancia rancha',
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




