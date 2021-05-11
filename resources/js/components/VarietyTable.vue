<template>
<div>
    <div class="container">
        <p>
            Esta página presenta información sobre las variedades que figuran actualmente en la base de datos. 
            Seleccione una variedad en la tabla de abajo para ver información detallada y fotos. 
            Utilice los filtros de la columna de la izquierda para ver variedades por sus características.
        </p>
        <div class="d-flex justify-content-end mb-4">
            <b-input-group class="col-12 col-md-8 col-lg-6 col-xl-4">
                <b-form-input
                    v-model="tableFilter"
                    placeholder="Buscar variedades"
                    class="bg-light border-right-0"
                />
                <template #append>
                    <b-input-group-text class="bg-light border-left-0">
                        <i class="fa fa-search" />
                    </b-input-group-text>
                </template>
            </b-input-group>
        </div>

        <div v-for="(parameter, index) in badgeFilterFlowering" :key="parameter.index">     
            <h4><b-badge v-if="parameter.length" href="#" class="bg-info text-white">{{ index }} : {{ parameter.join(', ') }}</b-badge></h4>
        </div>
        <div v-for="(parameter, index) in badgeFilterFructification" :key="parameter.index">     
            <h4><b-badge v-if="parameter.length" href="#" class="bg-info text-white">{{ index }} : {{ parameter.join(', ') }}</b-badge></h4>
        </div>
        <div v-for="(parameter, index) in badgeFilterTubersAtHarvest" :key="parameter.index">     
            <h4><b-badge v-if="parameter.length" href="#" class="bg-info text-white">{{ index }} : {{ parameter.join(', ') }}</b-badge></h4>
        </div>
        <div v-for="(parameter, index) in badgeFilterSprout" :key="parameter.index">     
            <h4><b-badge v-if="parameter.length" href="#" class="bg-info text-white">{{ index }} : {{ parameter.join(', ') }}</b-badge></h4>
        </div>
       
    </div>
    <div class="row">
        <div class="col-2">
            <div class="ml-3">
            <div class="full-height sidebar shadow">
                <div class="sidebar-header bg-info p-4 mb-0 text-white">
                    <h4 class="p-0 m-0">
                        Filtros
                        <span
                            class="sidebar-icon"
                        ><i
                            class="fas fa-filter"
                        /></span>
                    </h4>
                </div>
                <div class="d-flex flex-column">
                    <b-button
                        v-b-toggle="'collapse-mezcla'"
                        class="bg-info text-left text-white w-100 px-4"
                    >
                        <div> Variedad </div>
                    </b-button>
                    <b-collapse
                        :id="'collapse-mezcla'"
                        class="bg-light"
                    >
                        <div v-for="param in mezclas" :key="param.value">
                        <variety-filter
                        :parameter="param"
                        v-model="selectedFiltersMezcla[param.value]"
                        @updateFilter="filterVariety"
                        ></variety-filter>

                        </div>
                    </b-collapse>
                    <b-button
                        v-b-toggle="'collapse-mezcla'"
                        class="bg-info text-left text-white w-100 px-4"
                    >
                        <div> Campana </div>
                    </b-button>
                    <b-collapse
                        :id="'collapse-mezcla'"
                        class="bg-light"
                    >
                        <div v-for="param in campana" :key="param.value">
                        <variety-filter
                        :parameter="param"
                        v-model="selectedFiltersCampana[param.value]"
                        @updateFilter="filterVariety"
                        ></variety-filter>

                        </div>
                    </b-collapse>
                    <b-button
                        v-b-toggle="'collapse-flowering'"
                        class="bg-info text-left text-white w-100 px-4"
                    >
                        <div> Floración </div>
                    </b-button>
                    <b-collapse
                        :id="'collapse-flowering'"
                        class="bg-light"
                    >
                        <div v-for="param in flowering" :key="param.value">
                        <variety-filter
                        :parameter="param"
                        v-model="selectedFiltersFlowering[param.value]"
                        @updateFilter="filterVariety"
                        ></variety-filter>

                        </div>
                    </b-collapse>
                     <b-button
                        v-b-toggle="'collapse-fructification'"
                        class="bg-info text-left text-white w-100 px-4"
                    >
                        <div> Fructificación </div>
                        <i class="las la-plus" />
                    </b-button>
                    <b-collapse
                        :id="'collapse-fructification'"
                        class="bg-light"
                    >
                        <div v-for="param in fructification" :key="param.value">
                        <variety-filter
                        :parameter="param"
                        v-model="selectedFiltersFructification[param.value]"
                        @updateFilter="filterVariety"
                        ></variety-filter>

                        </div>
                    </b-collapse>
                     <b-button
                        v-b-toggle="'collapse-tubers-at-harvest'"
                        class="bg-info text-left text-white w-100 px-4"
                    >
                        <div>Tubérculos a la Cosecha </div>
                        <i class="las la-plus" />
                    </b-button>
                    <b-collapse
                        :id="'collapse-tubers-at-harvest'"
                        class="bg-light"
                    >
                        <div v-for="param in tubersAtHarvest" :key="param.value">
                        <variety-filter
                        :parameter="param"
                        v-model="selectedFiltersTubersAtHarvest[param.value]"
                        @updateFilter="filterVariety"
                        ></variety-filter>

                        </div>
                    </b-collapse>
                     <b-button
                        v-b-toggle="'collapse-sprout'"
                        class="bg-info text-left text-white w-100 px-4"
                    >
                        <div>Brotamiento </div>
                        <i class="las la-plus" />
                    </b-button>
                    <b-collapse
                        :id="'collapse-sprout'"
                        class="bg-light"
                    >
                        <div v-for="param in sprout" :key="param.value">
                        <variety-filter
                        :parameter="param"
                        v-model="selectedFiltersSprout[param.value]"
                        @updateFilter="filterVariety"
                        ></variety-filter>

                        </div>
                    </b-collapse>
                </div>
            </div>
            </div>
        </div>
        <div class="col-8">
            <div class="container">
                <b-table
                    id="variety-teble"
                    ref="selectableTable"
                    thead-class="bottom-shadow text-info font-weight-normal"
                    responsive="sm"
                    hover
                    :items="varietiesFilter"
                    :fields="fields"
                    primary-key="variedad"
                    select-mode="single"
                    selectable
                    :per-page="perPage"
                    :current-page="currentPage"
                    :filter="tableFilter"
                    @row-selected="onRowSelected"
                    :busy="isBusy"
                    
                />
                <template  v-if="isBusy">
                    <div class="text-center text-info my-2">
                    <b-spinner class="align-middle"></b-spinner>
                    <strong>Loading...</strong>
                    </div>
                </template>
                <b-pagination
                    v-model="currentPage"
                    :total-rows="varieties.length"
                    :per-page="perPage"
                    aria-controls="variety-table"
                />
                <variety-details
                    v-if="selected"
                    class="container py-4"
                    :variety="selected"
                    :values="selectedValues"
                    :labels="selectedLabels"
                />
            </div>
        </div>
    </div>
</div>    
</template>



<script>
import VarietyDetails from "./VarietyDetails.vue";
import VarietyFilter from './VarietyFilter.vue';

    export default {
        components: { VarietyDetails, VarietyFilter },
        data() {
            return {
                fields: [
                     {
                        key: "id",
                        label: "Variedad Codigo"
                    },
                    {
                        key: "common_name",
                        label: "Nombre común"
                    },
                    {
                        key: "farmer.name",
                        label: "Agricultor(a)"
                    },
                    {
                        key: "farmer.community.name",
                        label: "Comunidad"
                    },
                    {
                        key: "farmer.community.district.name",
                        label: "District"
                    },
                    {
                        key: "farmer.community.district.province.name",
                        label: "Province"
                    },
                    {
                        key: "farmer.community.district.province.region.name",
                        label: "Región"
                    }
                ],
                varieties: [],
                campana: [{
                    label: "Anos",
                    options :[
                        {text:"2019-2020", value:"2019_2020", disabled: false },
                        {text:"2020-2021", value:"2020_2021", disabled: false },
                    ],
                    value: "mezcla"
                }],
                varietiesFilter: [],
                selected: null,
                selectedValues: null,
                selectedLabels: null,
                floweringPhotos: [],
                currentPage: 1,
                perPage: 5,
                tableFilter: "",
                parameters:[],
                flowering:[],
                fructification:[],
                tubersAtHarvest:[],
                sprout:[],
                mezclas:[{
                    label: "Tipo de variedad",
                    options :[
                        {text:"Mezcla", value:"mezcla", disabled: false },
                        {text:"Sin Mezcla", value:"no_mezclas", disabled: false },
                    ],
                    value: "mezcla"
                }],
                selectedFiltersMezcla: {},
                selectedFiltersCampana:{},
                selectedFiltersFlowering: {},
                selectedFiltersFructification: {},
                selectedFiltersTubersAtHarvest: {},
                selectedFiltersSprout: {},
                badgeFilterFlowering: {},
                badgeFilterFructification: {},
                badgeFilterTubersAtHarvest: {},
                badgeFilterSprout: {},
                isBusy:true,
            };
        },
        mounted() {
            axios.get("api/varieties").then(response => {
                this.varieties = response.data;
                this.varietiesFilter = this.varieties;
                this.isBusy=false;
    
            });
            axios.get("api/parameter-filters").then(response => {
                this.parameters = response.data;
                this.flowering =  this.parameters['Floración'];

                this.flowering.forEach(parameter => {
                    this.selectedFiltersFlowering[parameter.value] = [];
                    this.badgeFilterFlowering[parameter.label] = [];

                });

                this.fructification =  this.parameters['Fructificación'];

                this.fructification.forEach(parameter => {
                    
                    this.selectedFiltersFructification[parameter.value] = [];
                    this.badgeFilterFructification[parameter.label] = [];

                });

                this.tubersAtHarvest =  this.parameters['Tubérculos a la Cosecha'];

                this.tubersAtHarvest.forEach(parameter => {
                    
                    this.selectedFiltersTubersAtHarvest[parameter.value] = [];
                    this.badgeFilterTubersAtHarvest[parameter.label] = [];

                });

                this.sprout =  this.parameters['Brotamiento'];

                this.sprout.forEach(parameter => {
                    
                    this.selectedFiltersSprout[parameter.value] = [];
                    this.badgeFilterSprout[parameter.label] = [];

                });
            });  
        },
        methods: {
            onRowSelected(items) {
                this.selected = items[items.length - 1];
       
                axios({
                    method: "post",
                    url: "/variety-details",
                    data: {
                        variety_id: this.selected.id
                    }
                }).then(
                    result => {
                        console.log("result", result.data);

                        this.selectedValues = result.data.values;
                        this.selectedLabels = result.data.labels;

                        // this.floweringPhotos =  JSON.parse(this.flowering.photos);
                    },
                    error => {
                        console.log(error);
                    }
                );
            },
            
            filterVariety(){

                var varieties = this.varieties;
                if(this.selectedFiltersMezcla.mezcla.length==0) {
                    this.varietiesFilter= varieties
                }

                if(this.selectedFiltersMezcla.mezcla.includes('mezcla')) {
                    var filterVarieties = varieties.filter(item => item.id.includes("."))
                    this.varietiesFilter = filterVarieties
                }

                if(this.selectedFiltersMezcla.mezcla.includes('no_mezclas')) {
                    var filterVarieties = varieties.filter(item => !item.id.includes("."))
                    this.varietiesFilter=filterVarieties
                }

                this.flowering.forEach(parameter => {
                    this.badgeFilterFlowering[parameter.label] = this.selectedFiltersFlowering[parameter.value];
                });

                this.fructification.forEach(parameter => {
                    this.badgeFilterFructification[parameter.label] = this.selectedFiltersFructification[parameter.value];
                });

                this.tubersAtHarvest.forEach(parameter => {
                    this.badgeFilterTubersAtHarvest[parameter.label] = this.selectedFiltersTubersAtHarvest[parameter.value];
                });

                 this.sprout.forEach(parameter => {
                    this.badgeFilterSprout[parameter.label] = this.selectedFiltersSprout[parameter.value];
                });

                if(this.selectedFiltersFlowering.length>0 || this.selectedFiltersFructification.length>0 || this.selectedFiltersTubersAtHarvest.length>0 || this.selectedFiltersSprout.length>0){

                    axios({
                        method: "post",
                        url: "/varieties-filter",
                        data: {
                                selectedFiltersFlowering: this.selectedFiltersFlowering,
                                selectedFiltersFructification: this.selectedFiltersFructification,
                                selectedFiltersTubersAtHarvest: this.selectedFiltersTubersAtHarvest,
                                selectedFiltersSprout: this.selectedFiltersSprout,
                            },
                        
                    }).then(
                        result => {
                            console.log(result.data);
                            this.varietiesFilter = result.data
                        },
                        error => {
                            console.log("error filter", error);
                        }
                    );
                }
            }
        }
    };
</script>