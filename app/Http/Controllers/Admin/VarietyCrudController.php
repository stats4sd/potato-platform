<?php

namespace App\Http\Controllers\Admin;

use App\Models\Choice;
use App\Models\Sprout;
use App\Models\Variety;
use App\Models\Flowering;
use Illuminate\Http\Request;
use App\Models\Fructification;
use App\Models\SproutReviewed;
use App\Models\TubersAtHarvest;
use App\Models\FloweringReviewed;
use Prologue\Alerts\Facades\Alert;
use App\Http\Requests\VarietyRequest;
use Illuminate\Support\Facades\Route;
use App\Models\FructificationReviewed;
use App\Models\TubersAtHarvestReviewed;
use Illuminate\Support\Facades\Redirect;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;

/**
 * Class VarietyCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class VarietyCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation {index as traitIndex;}
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
        CRUD::setModel(\App\Models\Variety::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/variety');
        CRUD::setEntityNameStrings('variedad', 'variedades');
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
                'name'  => 'id',
                'type'  => 'text',
                'label' => 'Código Variedad',
            ],
            [
                'name'  => 'name',
                'type'  => 'text',
                'label' => 'Código',
            ],
            [
                'name'  => 'common_name',
                'type'  => 'text',
                'label' => 'Nombre común',
            ],
            [
                'name'  => 'other_name',
                'type'  => 'text',
                'label' => 'Otro Nombre',
            ],
            [
                'name'  => 'is_mixture',
                'type'  => 'check',
                'label' => 'Mezcla',
            ],
            [
                'name'  => 'farmer_id',
                'type'  => 'text',
                'label' => 'Código Agricultor',

            ],
            [
                'name'  => 'files',
                'type'  => 'upload_multiple',
                'label' => 'Archivos',
                'disk'  => 'public',
            ],
            [
                'name'  => 'additional_info',
                'type'  => 'textarea',
                'label' => 'Información adicional',
            ],
        ]);

        $this->crud->addFilter([ 
            'type'  => 'simple',
            'name'  => 'mezcla',
            'label' => 'Mezclas'
        ],
        false, 
        function() { 
            $this->crud->addClause('where', 'id', 'LIKE', "%.%");
        });

        $this->crud->addButtonFromView('line', 'review', 'review', 'beginning');

    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(VarietyRequest::class);

        $this->crud->addFields([
            [
                'name'  => 'id',
                'type'  => 'text',
                'label' => 'Código Variedad',
            ],
            [
                'name'  => 'name',
                'type'  => 'text',
                'label' => 'Código',
            ],
            [
                'name'  => 'common_name',
                'type'  => 'text',
                'label' => 'Nombre común',
            ],
            [
                'name'  => 'other_name',
                'type'  => 'text',
                'label' => 'Otro Nombre',
            ],
            [
                'name'  => 'is_mixture',
                'type'  => 'checkbox',
                'label' => 'Mezcla',
            ],
            [
                'name'  => 'farmer_id',
                'type'  => 'text',
                'label' => 'Agricultor',
            ],
            [
                'name'  => 'files',
                'type'  => 'upload_multiple',
                'label' => 'Archivos',
                'upload'    => true,
                'disk'      => 'uploads',
            ],
            [
                'name'  => 'additional_info',
                'type'  => 'textarea',
                'label' => 'Información adicional',
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

    protected function setupUploadAdditionalInfoRoutes($segment, $routeName, $controller)
    {
        Route::get($segment.'/upload-additional-info', [
            'as'        => $routeName.'.getUploadAdditionalInfo',
            'uses'      => $controller.'@getUploadAdditionalInfoForm',
            'operation' => 'UploadAdditionalInfo',
        ]);

        Route::post($segment.'/search-mezcla', [
            'as'        => $routeName.'.search',
            'uses'      => $controller.'@search',
            'operation' => 'UploadAdditionalInfo',
        ]);

    }

    public function getUploadAdditionalInfoForm() 
    {
      
        $this->crud->setPageLengthMenu([[10, 25, 50, 100, -1], [10, 25, 50, 100, 'backpack::crud.all']],);
        $this->data['crud'] = $this->crud;
    
        // load the view from /resources/views/vendor/backpack/crud/ if it exists, otherwise load the one in the package
        return view('vendor.backpack.crud.upload_additional_info', $this->data);
    
    }

    public function setupUploadAdditionalInfoOperation()
   {     
        CRUD::addColumns([
            [  
                'name'      => 'id',
                'label'     => 'Código Variedad',
                'type'     => 'closure',
                'function' => function($entry) {
                    return "<h6><b>". $entry->id . "</b></h6>";
                }
            ],
            [
                'name'  => 'files',
                'type'  => 'upload_multiple',
                'label' => 'Archivos',
                'disk'  => 'public',
            ],
            [
                'name'  => 'additional_info',
                'type'  => 'textarea',
                'label' => 'Información adicional',
            ],
        ]); 


    }

    protected function setupUploadAdditionalInfoDefaults()
    {
        $this->crud->allowAccess('UploadAdditionalInfo');

        $this->crud->operation('UploadAdditionalInfo', function () {
            $this->crud->setCurrentOperation('list');
            $this->crud->loadDefaultOperationSettingsFromConfig();
            $this->crud->setCurrentOperation('UploadAdditionalInfo');

            $this->crud->addButton('line', 'update', 'view', 'crud::buttons.update', 'end');
            $this->crud->addButton('line', 'delete', 'view', 'crud::buttons.delete', 'end');
        });
       
    }

    public function review()
    {
      
        $variety = Variety::where('id',CRUD::getCurrentEntryId());

        $flowerings =  $variety->with('flowerings.choicePlantGrowth', 
        'flowerings.choiceLeafDissection',
        'flowerings.choiceNumberLateralLeaflets',
        'flowerings.choiceNumberIntermediateLeaflets',
        'flowerings.choiceNumberLeafletsOnPetioles',
        'flowerings.choiceColorStem',
        'flowerings.choiceShapeStemWings',
        'flowerings.choiceDegreeFloweringPlant',
        'flowerings.choiceShapeCorolla',
        'flowerings.choiceColorPredominantFlower',
        'flowerings.choiceIntensityColorPredominantFlower',
        'flowerings.choiceColorSecondaryFlower',
        'flowerings.choiceDistributionColorSecodaryFlower',
        'flowerings.choicePigmentationAnthers',
        'flowerings.choicePigmentationPistil',
        'flowerings.choiceColorChalice',
        'flowerings.choiceColorPedicel',
        'flowerings.choiceLevelToleranceLateBlight',
        'flowerings.choiceLevelToleranceHailstorms',
        'flowerings.choiceLevelToleranceFrost',
        'flowerings.choiceLevelToleranceDrought',
        'flowerings.choiceCampana',
        )->first();

        $floweringProprieties = [
            'choice_plant_growth' => 'Habito de crecimiento de la planta',
            'choice_color_stem' => 'Color de tallo',
            'choice_shape_stem_wings' => 'Forma de las alas del tallo',

            'choice_leaf_dissection' => 'Tipo de la disección de la hoja',
            'choice_number_lateral_leaflets' => 'Número de foliolos laterales de la hoja',
            'choice_number_intermediate_leaflets' => 'Número de inter-hojuelas entre foliolos laterales',
            'choice_number_leaflets_on_petioles' => 'Número de inter-hojuelas sobre peciolulos',

            'choice_degree_flowering_plant' => 'Grado de floracion',
            'choice_shape_corolla' => 'Forma de la corola',
            'choice_color_predominant_flower' => 'Color predominante de la flor',
            'choice_intensity_color_predominant_flower' => 'Intensidad de color predominante de la flor',
            'choice_color_secondary_flower' => 'Color secundario de la flor',
            'choice_distribution_color_secodary_flower' => 'Distribución del color secundario de la flor',
            'choice_pigmentation_anthers' => 'Pigmentación de las anteras',
            'choice_pigmentation_pistil' => 'Pigmentación en el pistilo',
            'choice_color_chalice' => 'Color del cáliz',
            'choice_color_pedicel' => 'Color del pedicelo',

            'choice_level_tolerance_late_blight' => 'Nivel de tolerancia a la rancha',
            'choice_level_tolerance_hailstorms' => 'Nivel de tolerancia a la granizada',
            'choice_level_tolerance_frost' => 'Nivel de tolerancia a la helada',
            'choice_level_tolerance_drought' => 'Nivel de tolerancia a la sequía',
        ];
        $flowerings=$flowerings['flowerings']->toArray();
        $flowerings = $flowerings;

        $floweringPhotos = CRUD::getCurrentEntry()->getMedia('flowerings');

        $fructifications = $variety->with('fructifications.choiceColorBerries', 
            'fructifications.choiceShapeBerry',
            'fructifications.choiceMaturityVariety',
            'fructifications.choiceCampana',
            'fructifications.choiceBerries',
        )->first();

        $fructificationProprieties = [
            'choice_berries' => 'Bayas',
            'choice_color_berries' => 'Color de la baya',
            'choice_shape_berry' => 'Forma de la baya',
            'choice_maturity_variety' => 'La madurez',
        ];

        
        $fructifications=$fructifications['fructifications']->toArray();
        $fructifications = $fructifications;
      

        $fructificationPhotos = CRUD::getCurrentEntry()->getMedia('fructifications');

        $sprouts =  $variety->with('sprouts.choiceColorPredominantTuberShoot',
        'sprouts.choiceColorSecondaryTuberShoot',
        'sprouts.choiceDistributionColorSecodaryTuberShoot',
        'sprouts.choiceCampana',
        )->first();

        $sproutProprieties = [
            'choice_color_predominant_tuber_shoot' => 'Color predominante',
            'choice_color_secondary_tuber_shoot' => 'Color secundario',
            'choice_distribution_color_secodary_tuber_shoot' => 'Distribución del color secundario',
        ];

        $sprouts=$sprouts['sprouts']->toArray();
        $sprouts = $sprouts;
        
        $sproutPhotos = CRUD::getCurrentEntry()->getMedia('sprouts');
        
        $tubersAtHarvests =  $variety->with('tubersAtHarvests.choiceColorPredominantTuber', 
        'tubersAtHarvests.choiceIntensityColorPredominantTuber',
        'tubersAtHarvests.choiceColorSecondaryTuber',
        'tubersAtHarvests.choiceDistributionColorSecodaryTuber',
        'tubersAtHarvests.choiceShapeTuber',
        'tubersAtHarvests.choiceVariantShapeTuber',
        'tubersAtHarvests.choiceDepthTuberEyes',
        'tubersAtHarvests.choiceColorPredominantTuberPulp',
        'tubersAtHarvests.choiceColorSecondaryTuberPulp',
        'tubersAtHarvests.choiceDistributionColorSecodaryTuberPulp',
        'tubersAtHarvests.choiceLevelToleranceLateBlight',
        'tubersAtHarvests.choiceLevelToleranceWeevil',
        'tubersAtHarvests.choiceLevelToleranceHailstorms',
        'tubersAtHarvests.choiceLevelToleranceFrost',
        'tubersAtHarvests.choiceLevelToleranceDrought',
        'tubersAtHarvests.choiceCampana',
        )->first();
        
        $tubersAtHarvests=$tubersAtHarvests['tubersAtHarvests']->toArray();
        $tubersAtHarvests = $tubersAtHarvests;
        
        $tubersAtHarvestPhotos = CRUD::getCurrentEntry()->getMedia('tuber_at_harvests');

        $tubersAtHarvestProprieties = [
            'choice_color_predominant_tuber' => 'Color predominante',
            'choice_intensity_color_predominant_tuber' => 'Intensidad del color predominante',
            'choice_color_secondary_tuber' => 'Color secundario',
            'choice_distribution_color_secodary_tuber' => 'Distribución del color secundario',
            'choice_shape_tuber' => 'Forma general',
            'choice_variant_shape_tuber' => 'Variante de forma',
            'choice_depth_tuber_eyes' => 'Profundidad de los ojos',
            'choice_color_predominant_tuber_pulp' => 'Color predominante de la pulpa',
            'choice_color_secondary_tuber_pulp' => 'Color secundario de la pulpa',
            'choice_distribution_color_secodary_tuber_pulp' => 'Distribución del color secundario de la pulpa',
            'number_tubers_plant' => 'Número de tubérculos por planta',
            'yield_plant' => 'Rendimiento por planta en kg',

            'choice_level_tolerance_late_blight' => 'Nivel de tolerancia a la rancha',
            'choice_level_tolerance_weevil' => 'Nivel de tolerancia al gorgojo de los andes',
            'choice_level_tolerance_hailstorms' => 'Nivel de tolerancia a la granizada',
            'choice_level_tolerance_frost' => 'Nivel de tolerancia a la helada',
            'choice_level_tolerance_drought' => 'Nivel de tolerancia a la sequía',

        ];

        return view('varieties.review', ['variety' => CRUD::getCurrentEntryId(), 
        'choices'=>Choice::all(), 
        'floweringProprieties'=>$floweringProprieties,
        'flowerings'=> $flowerings,
        'floweringPhotos' => $floweringPhotos,

        'fructificationProprieties'=>$fructificationProprieties,
        'fructifications'=> $fructifications,
        'fructificationPhotos' => $fructificationPhotos,

        'tubersAtHarvestProprieties'=>$tubersAtHarvestProprieties,
        'tubersAtHarvests'=> $tubersAtHarvests,
        'tubersAtHarvestPhotos' => $tubersAtHarvestPhotos,

        'sproutProprieties'=>$sproutProprieties,
        'sprouts'=> $sprouts,
        'sproutPhotos' => $sproutPhotos,
        ]);
    }

    public function getVarietyReviewed(Request $request)
    {
        FloweringReviewed::updateOrCreate(['variety_id'=>$request->variety_id],
        [
            'plant_growth'=>$request->choice_plant_growth ,
            'leaf_dissection'=>$request->choice_leaf_dissection ,
            'number_lateral_leaflets'=>$request->choice_number_lateral_leaflets ,
            'number_intermediate_leaflets'=>$request->choice_number_intermediate_leaflets ,
            'number_leaflets_on_petioles'=>$request->choice_number_leaflets_on_petioles,
            'color_stem'=>$request->choice_color_stem ,
            'shape_stem_wings'=>$request->choice_shape_stem_wings ,
            'degree_flowering_plant'=>$request->choice_degree_flowering_plant ,
            'shape_corolla'=>$request->choice_shape_corolla ,
            'color_predominant_flower'=>$request->choice_color_predominant_flower ,
            'intensity_color_predominant_flower'=>$request->choice_intensity_color_predominant_flower ,
            'color_secondary_flower'=>$request->choice_color_secondary_flower ,
            'distribution_color_secodary_flower'=>$request->choice_distribution_color_secodary_flower ,
            'pigmentation_anthers'=>$request->choice_pigmentation_anthers ,
            'pigmentation_pistil'=>$request->choice_pigmentation_pistil ,
            'color_chalice'=>$request->choice_color_chalice ,
            'color_pedicel'=>$request->choice_color_pedicel ,
            'photo_leaf'=>$request->photo_leaf ,
            'photo_flower'=>$request->photo_flower ,
            'photo_plant'=>$request->photo_plant ,
            'level_tolerance_late_blight'=>$request->choice_level_tolerance_late_blight,
            'level_tolerance_hailstorms'=>$request->choice_level_tolerance_hailstorms,
            'level_tolerance_frost'=>$request->choice_level_tolerance_frost,
            'level_tolerance_drought'=>$request->choice_level_tolerance_droughtd,
        ]);

        FructificationReviewed::updateOrCreate(['variety_id' => $request->variety_id],
        [
            'berries' => $request->choice_berries,
            'color_berries' => $request->choice_color_berries,
            'shape_berry' => $request->choice_shape_berry,
            'maturity_variety' => $request->choice_maturity_variety,
            'photo_berry' =>$request->photo_berry,
        ]);

        TubersAtHarvestReviewed::updateOrCreate(['variety_id' => $request->variety_id],
        [
            'color_predominant_tuber' => $request->choice_color_predominant_tuber,
            'intensity_color_predominant_tuber' => $request->choice_intensity_color_predominant_tuber,
            'color_secondary_tuber' => $request->choice_color_secondary_tuber,
            'distribution_color_secodary_tuber' => $request->choice_distribution_color_secodary_tuber,
            'shape_tuber' => $request->choice_shape_tuber,
            'variant_shape_tuber' => $request->choice_variant_shape_tuber,
            'depth_tuber_eyes' => $request->choice_depth_tuber_eyes,
            'color_predominant_tuber_pulp' => $request->choice_color_predominant_tuber_pulp,
            'color_secondary_tuber_pulp' => $request->choice_color_secondary_tuber_pulp,
            'distribution_color_secodary_tuber_pulp' => $request->choice_distribution_color_secodary_tuber_pulp,
            'number_tubers_plant' => $request->number_tubers_plant,
            'yield_plant' => $request->yield_plant,

            'level_tolerance_late_blight' => $request->choice_level_tolerance_late_blight,
            'level_tolerance_weevil' =>  $request->choice_level_tolerance_weevil,
            'level_tolerance_hailstorms' => $request->choice_level_tolerance_hailstorms,
            'level_tolerance_frost' => $request->choice_level_tolerance_frost,
            'level_tolerance_drought' => $request->choice_level_tolerance_drought,
        ]);

        SproutReviewed::updateOrCreate(['variety_id' => $request->variety_id],
        [
            'choice_color_predominant_tuber_shoot' => $request->color_predominant_tuber_shoot,
            'choice_color_secondary_tuber_shoot' => $request->color_secondary_tuber_shoot,
            'choice_distribution_color_secodary_tuber_shoot' => $request->distribution_color_secodary_tuber_shoot,
            'photo_tuber_shoot' =>$request->photo_tuber_shoot
        ]);


        \Alert::add('success', 'The variety <strong>'.$request->variety_id.'</strong><br> has been reviewed successfully.')->flash();
        return   Redirect::to('admin\variety');
    }

}
