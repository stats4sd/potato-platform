<?php

namespace App\Http\Controllers\Admin;

use App\Models\Choice;
use App\Models\Variety;
use App\Http\Requests\VarietyRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
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
        // dd(  $floweringPhotos);

        return view('varieties.review', ['variety' => CRUD::getCurrentEntryId(), 
        'choices'=>Choice::all(), 
        'floweringProprieties'=>$floweringProprieties,
        'flowerings'=> $flowerings,
        'floweringPhotos' => $floweringPhotos,
        ]);
    }

    public function getVarietyReviewed(Request $request)
    {
        dd($request);
    }

}
