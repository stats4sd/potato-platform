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
                'name'  => 'choiceCampana.label_spanish',
                'type'  => 'text',
                'label' => 'Campaña',
            ],
            [
                'name'  => 'choicePlantGrowth.label_spanish',
                'type'  => 'text',
                'label' => 'Habito crecimiento',
            ],
            [
                'name'  => 'choiceColorStem.label_spanish',
                'type'  => 'text',
                'label' => 'Color tallo',
            ],
            [
                'name'  => 'choiceShapeStemWings.label_spanish',
                'type'  => 'text',
                'label' => 'Forma alas tallo',
            ],
            [
                'name'  => 'choiceLeafDissection.label_spanish',
                'type'  => 'text',
                'label' => 'Disección hoja',
            ],
            [
                'name'  => 'choiceNumberLateralLeaflets.label_spanish',
                'type'  => 'text',
                'label' => 'Número foliolos laterales',
            ],
            [
                'name'  => 'choiceNumberIntermediateLeaflets.label_spanish',
                'type'  => 'text',
                'label' => 'Número inter-hojuelas entre foliolos laterales',
            ],
            [
                'name'  => 'choiceNumberLeafletsOnPetioles.label_spanish',
                'type'  => 'text',
                'label' => 'Número inter-hojuelas sobre peciolulos',
            ],
            [
                'name'  => 'choiceDegreeFloweringPlant.label_spanish',
                'type'  => 'text',
                'label' => 'Grado de floración',
            ],
            [
                'name'  => 'choiceShapeCorolla.label_spanish',
                'type'  => 'text',
                'label' => 'Forma corola',
            ],
            [
                'name'  => 'choiceColorPredominantFlower.label_spanish',
                'type'  => 'text',
                'label' => 'Color predominante flor',
            ],
            [
                'name'  => 'choiceIntensityColorPredominantFlower.label_spanish',
                'type'  => 'text',
                'label' => 'Intensidad color predominante flor',
            ],
            [
                'name'  => 'choiceColorSecondaryFlower.label_spanish',
                'type'  => 'text',
                'label' => 'Color secundario flor',
            ],
            [
                'name'  => 'choiceDistributionColorSecodaryFlower.label_spanish',
                'type'  => 'text',
                'label' => 'Distribución color secundario flor',
            ],
            [
                'name'  => 'choicePigmentationAnthers.label_spanish',
                'type'  => 'text',
                'label' => 'Pigmentación anteras',
            ],
            [
                'name'  => 'choicePigmentationPistil.label_spanish',
                'type'  => 'text',
                'label' => 'Pigmentación pistilo',
            ],
            [
                'name'  => 'choiceColorChalice.label_spanish',
                'type'  => 'text',
                'label' => 'Color cáliz',
            ],
            [
                'name'  => 'choiceColorPedicel.label_spanish',
                'type'  => 'text',
                'label' => 'Color pedicelo',
            ],
            [
                'name'  => 'choiceLevelToleranceLateBlight.label_spanish',
                'type'  => 'text',
                'label' => 'Nivel tolerancia rancha',
            ],
            [
                'name'  => 'choiceLevelToleranceHailstorms.label_spanish',
                'type'  => 'text',
                'label' => 'Nivel tolerancia granizada',
            ],
            [
                'name'  => 'choiceLevelToleranceFrost.label_spanish',
                'type'  => 'text',
                'label' => 'Nivel tolerancia helada',
            ],
            [
                'name'  => 'choiceLevelToleranceDrought.label_spanish',
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
                    'label' => 'Habito de crecimiento de la planta',
                ],
                [
                    'name'  => 'color_stem',
                    'type'  => 'text',
                    'label' => 'Color de tallo',
                ],
                [
                    'name'  => 'shape_stem_wings',
                    'type'  => 'text',
                    'label' => 'Forma de las alas del tallo',
                ],
                [
                    'name'  => 'leaf_dissection',
                    'type'  => 'text',
                    'label' => 'Tipo de la disección de la hoja',
                ],
                [
                    'name'  => 'number_lateral_leaflets',
                    'type'  => 'text',
                    'label' => 'Número de foliolos laterales de la hoja',
                ],
                [
                    'name'  => 'number_intermediate_leaflets',
                    'type'  => 'text',
                    'label' => 'Número de inter-hojuelas entre foliolos laterales',
                ],
                [
                    'name'  => 'number_leaflets_on_petioles',
                    'type'  => 'text',
                    'label' => 'Número de inter-hojuelas sobre peciolulos',
                ],
                [
                    'name'  => 'degree_flowering_plant',
                    'type'  => 'text',
                    'label' => 'Grado de floración',
                ],
                [
                    'name'  => 'shape_corolla',
                    'type'  => 'text',
                    'label' => 'Forma de la corola',
                ],
                [
                    'name'  => 'color_predominant_flower',
                    'type'  => 'text',
                    'label' => 'Color predominante de la flor',
                ],
                [
                    'name'  => 'intensity_color_predominant_flower',
                    'type'  => 'text',
                    'label' => 'Intensidad de color predominante de la flor',
                ],
                [
                    'name'  => 'color_secondary_flower',
                    'type'  => 'text',
                    'label' => 'Color secundario de la flor',
                ],
                [
                    'name'  => 'distribution_color_secodary_flower',
                    'type'  => 'text',
                    'label' => 'Distribución del color secundario de la flor',
                ],
                [
                    'name'  => 'pigmentation_anthers',
                    'type'  => 'text',
                    'label' => 'Pigmentación de las anteras',
                ],
                [
                    'name'  => 'pigmentation_pistil',
                    'type'  => 'text',
                    'label' => 'Pigmentación en el pistilo',
                ],
                [
                    'name'  => 'color_chalice',
                    'type'  => 'text',
                    'label' => 'Color del cáliz',
                ],
                [
                    'name'  => 'color_pedicel',
                    'type'  => 'text',
                    'label' => 'Color del pedicelo',
                ],
                [
                    'name'  => 'level_tolerance_late_blight',
                    'type'  => 'text',
                    'label' => 'Nivel de tolerancia a la rancha',
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
        $this->crud->setOperationSetting('setFromDb', false);
        $this->setupListOperation();
    }
}




