<template>
<div>
    <div class="container">
        <p>
            Esta página presenta información sope las variedades que figuran actualmente en la base de datos.
        </p>
        <p>
            Utilice la caja de búsqueda o los filtros de la columna de la izquierda para ver variedades por sus características.
        </p>
        <p>
            Seleccione una variedad en la tabla de abajo para ver información detallada y fotos. 
        </p>
        <div class="d-flex justify-content-end mb-4">
            <b-input-group class="col-12 col-md-8 col-lg-6 col-xl-4">
                <b-form-input
                    v-model="tableFilter"
                    placeholder="Buscar variedades"
                    class="bg-light border-right-0"
                    debounce="500"
                />
                <template #append>
                    <b-input-group-text class="bg-light border-left-0">
                        <i class="fa fa-search" />
                    </b-input-group-text>
                </template>
            </b-input-group>
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
            Mostrando  {{ varietiesFilter.length }} variedades
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
                    :total-rows="varietiesFilter.length"
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
                        label: "Variedad Código"
                    },
                    {
                        key: "common_name",
                        label: "Nombre común"
                    },
                    {
                        key: "farmer.name",
                        label: "Guardián"
                    },
                    {
                        key: "farmer.community.name",
                        label: "Comunidad"
                    },
                    {
                        key: "farmer.community.district.name",
                        label: "Distrito"
                    },
                    {
                        key: "farmer.community.district.province.name",
                        label: "Provincia"
                    },
                    {
                        key: "farmer.community.district.province.region.name",
                        label: "Región"
                    }
                ],
                varieties: [],
                varietiesFilter: [],
                farmers: [],
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
                selectedFiltersFlowering: {},
                selectedFiltersFructification: {},
                selectedFiltersTubersAtHarvest: {},
                selectedFiltersSprout: {},
                selectedVariety:{},
                isBusy:true,
            };
        },
        mounted() {
            axios.get("api/varieties").then(response => {
                this.isBusy=false;
                this.varieties = response.data;
                this.varietiesFilter = this.varieties;
            });
  
            axios.get("api/parameter-filters").then(response => {
                this.parameters = response.data;
                this.flowering =  this.parameters['Floración'];

                this.flowering.forEach(parameter => {
                    this.selectedFiltersFlowering[parameter.value] = [];
                });

                this.fructification =  this.parameters['Fructificación'];

                this.fructification.forEach(parameter => {
                    this.selectedFiltersFructification[parameter.value] = [];
                });

                this.tubersAtHarvest =  this.parameters['Tubérculos a la Cosecha'];

                this.tubersAtHarvest.forEach(parameter => {
                    this.selectedFiltersTubersAtHarvest[parameter.value] = [];
                });

                this.sprout =  this.parameters['Brotamiento'];

                this.sprout.forEach(parameter => {
                    this.selectedFiltersSprout[parameter.value] = [];
                });
            });  
        },
        watch:{
            tableFilter(){
                this.filterVariety();
            }
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
                        this.selectedValues  = result.data.values;
                        this.selectedLabels = result.data.labels;
                       
                    },
                    error => {
                        console.log(error);
                    }
                );
            },
            
            
            filterVariety(){

                this.varietiesFilter = this.varieties;

                this.varietiesFilter =  this.varietiesFilter.filter((item) => { 
                        if(item.common_name){
                            return item.id.toLowerCase().includes(this.tableFilter.toLowerCase()) 
                            || item.farmer.name.toLowerCase().includes(this.tableFilter.toLowerCase()) 
                            || item.farmer.community.name.toLowerCase().includes(this.tableFilter.toLowerCase()) 
                            || item.farmer.community.district.name.toLowerCase().includes(this.tableFilter.toLowerCase()) 
                            || item.farmer.community.district.province.name.toLowerCase().includes(this.tableFilter.toLowerCase()) 
                            || item.farmer.community.district.province.region.name.toLowerCase().includes(this.tableFilter.toLowerCase()) 
                            || item.common_name.toLowerCase().includes(this.tableFilter.toLowerCase()) 
                        }

                        return item.id.toLowerCase().includes(this.tableFilter.toLowerCase()) 
                        || item.farmer.name.toLowerCase().includes(this.tableFilter.toLowerCase()) 
                        || item.farmer.community.name.toLowerCase().includes(this.tableFilter.toLowerCase()) 
                        || item.farmer.community.district.name.toLowerCase().includes(this.tableFilter.toLowerCase()) 
                        || item.farmer.community.district.province.name.toLowerCase().includes(this.tableFilter.toLowerCase()) 
                        || item.farmer.community.district.province.region.name.toLowerCase().includes(this.tableFilter.toLowerCase()) 
                })

                

                for (const [key, value] of Object.entries(this.selectedFiltersFlowering)) {
                    if(value.length>0){
                        this.varietiesFilter =   this.varietiesFilter.filter((item) => { 
                            return Object.values(value).includes(item.flowerings[0][key]) 
                        })
                    }
                }

                for (const [key, value] of Object.entries(this.selectedFiltersFructification)) {
                    if(value.length>0){
                        this.varietiesFilter =   this.varietiesFilter.filter((item) => { 
                            return Object.values(value).includes(item.fructifications[0][key]) 
                        })
                    }
                }

                for (const [key, value] of Object.entries(this.selectedFiltersTubersAtHarvest)) {
                    if(value.length>0){
                        this.varietiesFilter =   this.varietiesFilter.filter((item) => { 
                            return Object.values(value).includes(item.tubers_at_harvests[0][key]) 
                        })
                    }
                }

                 for (const [key, value] of Object.entries(this.selectedFiltersSprout)) {
                    if(value.length>0){
                        this.varietiesFilter =   this.varietiesFilter.filter((item) => { 
                            return Object.values(value).includes(item.sprouts[0][key]) 
                        })
                    }
                }
                                
              


            }
        }
    };
</script>