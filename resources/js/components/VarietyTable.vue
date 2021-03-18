<template>
<div>
    <div class="container">
        <p>
            This page presents the varieties currently listed in the database.
            Select a variety in the table to see detailed information and
            photos. Use the search field to filter the results.
        </p>
        <div class="d-flex justify-content-end mb-4">
            <b-input-group class="col-12 col-md-8 col-lg-6 col-xl-4">
                <b-form-input
                    v-model="tableFilter"
                    placeholder="Search varieties"
                    class="bg-light border-right-0"
                />
                <template #append>
                    <b-input-group-text class="bg-light border-left-0">
                        <i class="fa fa-search" />
                    </b-input-group-text>
                </template>
            </b-input-group>
        </div>
        <div v-for="(parameter, index) in badgeFilter" :key="parameter.index">     
            <h4><b-badge v-if="parameter.length" href="#" class="bg-info text-white">{{ index }} : {{ parameter.join(', ') }}</b-badge></h4>
        </div>
       
    </div>
    <div class="row">
        <div class="col-4">
            <div class="d-md-flex d-block px-4">
            <div class="full-height sidebar shadow">
                <div class="sidebar-header bg-info p-4 mb-0 text-white">
                    <h4 class="p-0 m-0">
                        Filters
                        <span
                            class="sidebar-icon"
                        ><i
                            class="las la-filter"
                        /></span>
                    </h4>
                </div>
                <div class="d-flex flex-column">
                    <div v-for="(parameter, index) in parameters" :key="index">
                        <b-button
                            v-b-toggle="'collapse-'+index.substring(0,4)"
                            class="bg-info text-white w-100 px-4"
                        >
                            <div>{{ index }}</div>
                            <i class="las la-plus" />
                        </b-button>
                        <b-collapse
                            :id="'collapse-'+index.substring(0,4)"
                            class="bg-light"
                        >
                            <div v-for="param in parameter" :key="param.value">
                            <variety-filter
                            :parameter="param"
                            v-model="selectedFilters[param.value]"
                            v-on:click.native="filterVariety"
                            ></variety-filter>

                            </div>
                        </b-collapse>

                    </div>
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
                    :items="varieties"
                    :fields="fields"
                    primary-key="variedad"
                    select-mode="single"
                    selectable
                    :per-page="perPage"
                    :current-page="currentPage"
                    :filter="tableFilter"
                    @row-selected="onRowSelected"
                />
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
                        key: "name",
                        label: "Variedad"
                    },
                    {
                        key: "farmer.name",
                        label: "Agricultor"
                    },
                    {
                        key: "farmer.community.district.province.region.name",
                        label: "Región"
                    }
                ],
                varieties: [],
                selected: null,
                selectedValues: null,
                selectedLabels: null,
                floweringPhotos: [],
                currentPage: 1,
                perPage: 5,
                tableFilter: "",
                parameters:[],
                selectedFilters: {},
                badgeFilter:{},
            };
        },
        mounted() {
            axios.get("api/varieties").then(response => {
                console.log(response.data);
                this.varieties = response.data;
            });
            axios.get("api/parameter-filters").then(response => {
                console.log(response.data);
                this.parameters = response.data;
                this.parameters.forEach(parameter => {
                    this.selectedFilters[parameter.value] = [];
                    this.badgeFilter[parameter.label] = [];
                });
            });  
        },
        methods: {
            onRowSelected(items) {
                this.selected = items[items.length - 1];
                console.log(this.selected);
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

                this.parameters.forEach(parameter => {
                    this.badgeFilter[parameter.label] = this.selectedFilters[parameter.value];
                });
                axios({
                    method: "post",
                    url: "/varieties-filter",
                    data: {
                            selectedFilters: this.selectedFilters,
                        },
                    
                }).then(
                    result => {
                        console.log("result filter", result.data);
                        this.varieties = result.data
                    },
                    error => {
                        console.log("error filter", error);
                    }
                );
            }
        }
    };
</script>