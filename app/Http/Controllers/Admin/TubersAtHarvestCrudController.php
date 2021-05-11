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
                'type'  => 'text',
                'label' => 'Número tubérculos planta',
            ],
            [
                'name'  => 'yield_plant',
                'type'  => 'text',
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
            [
                'name'  => 'photo_tuber',
                'type'  => 'text',
                'label' => 'Foto tubérculo',
            ],
            [
                'name'  => 'campana',
                'type'  => 'text',
                'label' => 'Campaña',
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
        CRUD::addField(
            [   // Upload
                'name'      => 'photo_tuber',
                'label'     => 'Suba la foto del tubérculo',
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

    protected function setupUploadPhotoRoutes($segment, $routeName, $controller)
    {
        Route::get($segment.'/upload-photo', [
            'as'        => $routeName.'.getUploadPhoto',
            'uses'      => $controller.'@getUploadPhotoForm',
            'operation' => 'UploadPhoto',
        ]);

        Route::post($segment.'/search-mezcla', [
            'as'        => $routeName.'.search',
            'uses'      => $controller.'@search',
            'operation' => 'UploadPhoto',
        ]);

    }

    public function getUploadPhotoForm() 
    {
      
        $this->crud->setPageLengthMenu([[10, 25, 50, 100, -1], [10, 25, 50, 100, 'backpack::crud.all']],);
        $this->data['crud'] = $this->crud;
    
        // load the view from /resources/views/vendor/backpack/crud/ if it exists, otherwise load the one in the package
        return view('vendor.backpack.crud.upload_photo', $this->data);
    
    }

    public function setupUploadPhotoOperation()
    {
        $this->crud->query =  $this->crud->query->orderByRaw('(photo_tuber is NULL) desc');
        $this->crud->denyAccess('create');
        $this->crud->denyAccess('delete');

        $this->crud->addFilter([
            'type'  => 'simple',
            'name'  => 'photo_empty',
            'label' => 'Fotos faltantes'
        ], 
        false, 
        function() { // if the filter is active
            $this->crud->addClause('where', 'photo_tuber', null); 
        } );
 
        // select2 filter
        $this->crud->addFilter([
            'name'  => 'variety_code',
            'type'  => 'text',
            'label' => 'Código Variedad'
        ],
        false,
        function ($value) { // if the filter is active
            $this->crud->addClause('where', 'variety_id', $value);
        });

        CRUD::addColumns([
            [  
                'name'      => 'variety_id',
                'label'     => 'Código Variedad',
                'type'     => 'closure',
                'function' => function($entry) {
                    return "<h6><b>". $entry->variety_id . "</b></h6>";
                }
            ],
            [  
                'name'      => 'photos_missing',
                'label'     => 'Subir Fotos',
                'type'     => 'closure',
                'function' => function($entry) {
                   if(!empty($entry->photo_tuber))
                   {
                       return '<h6 style="color:green;">Completo</h6>';
                   } else {
                    return '<h6 style="color:red;">Incompleto</h6>';
                   } 
                },
                'orderable'  => true,
                'orderLogic' => function ($query, $column, $columnDirection) {
                  
                        return $query->orderByRaw('(photo_tuber is NULL) ' . $columnDirection);
                    }
            ],
            [
                'name'      => 'photo_tuber',
                'label'     => 'Foto del tubérculo',
                'type'     => 'image',
                'prefix' => 'storage/',
                'height' => '128px',
                'width'  => '128px',
            ],
        ]);
    }

    protected function setupUploadPhotoDefaults()
    {
        $this->crud->allowAccess('UploadPhoto');

        $this->crud->operation('UploadPhoto', function () {
            $this->crud->setCurrentOperation('list');
            $this->crud->loadDefaultOperationSettingsFromConfig();
            $this->crud->setCurrentOperation('UploadPhoto');

            $this->crud->addButton('line', 'update', 'view', 'crud::buttons.update', 'end');
            $this->crud->addButton('line', 'delete', 'view', 'crud::buttons.delete', 'end');
        });
    }
       
}