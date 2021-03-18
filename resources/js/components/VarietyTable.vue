<template>
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
        <div v-for="parameter in parameters" :key="parameter.value">
            <variety-filter
            :parameter="parameter"
            v-model="selectedFilters[parameter.value]"
            v-on:click.native="filterVariety"
            ></variety-filter>
        </div>
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