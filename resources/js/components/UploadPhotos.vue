<template>
    <div>
        
        <div class="container my-4">
            <div class="accordion-area" role="tablist">
                
                    
                  
            
                <h3>What variety are you going to add photos?</h3>
                
                <form method="POST" action="/store-images" enctype="multipart/form-data" >
                    <input type="hidden" name="_token" :value="csrf">
                    <b-form-select  name="varietyId" v-model="varietyId" placeholder="Enter variety ID"></b-form-select>
                    <b-form-select  name="selectedCampana" v-model="selectedCampana" :options="campanas" value-field="id" text-field="label_spanish"></b-form-select>
            
                
                    <div class="py-4 mx-4">
                        <h3>Flowering</h3>
                            <div class="row py-4 mx-4 justify-content-center">
                                    <media-library-collection
                                    multiple 
                                    name="flowering" 
                                    collection="flowering"
                                    />
                            </div>
                        <h3>Fructification</h3>
                            <div class="row py-4 mx-4 justify-content-center">
                                <media-library-collection
                                    multiple 
                                    name="fructification" 
                                    collection="fructification"
                                    />
                            </div>
                        <h3>Tuber at Harvest</h3>
                            <div class="row py-4 mx-4 justify-content-center">
                                <media-library-collection
                                    multiple 
                                    name="tubers_at_harvest" 
                                    collection="tubers_at_harvest"
                                    />
                            </div>
                        <h3>Sprout</h3>
                            <div class="row py-4 mx-4 justify-content-center">
                                <media-library-collection
                                    multiple 
                                    name="sprout" 
                                    collection="sprout"
                                    />
                            </div>

                        <div style="text-align: center;">
                            <button type="submit" class="site-btn my-4" >
                                Next
                            </button>
                        </div>
                    </div>
                </form>
 
            </div>
        </div>
        
    </div>

</template>





<script>
import {   MediaLibraryCollection } from 'media-library-pro-vue2-collection';
import axios from 'axios';

const rootUrl = process.env.MIX_APP_URL
export default {
    components: { MediaLibraryCollection, axios},
    data() {
        return {
            currentStep: this.form ? 4 : 1,
            steps: [
                {
                    'id': 1,
                    'title': "Variety ID / Campana",
                },
                {
                    'id': 2,
                    'title': "Upload photos",
                },
                {
                    'id': 3,
                    'title': "Preview and Finish",
                }
            ],
            varietyId:"",
            campanas:[],
            selectedCampana:null,
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
          
        };
    },
    mounted () {
            axios.get(rootUrl+'/api/campanas').then((response) => {
                this.campanas = response.data;
            })
    },
    watch: {
        varietyId(){
            this.varietyId =  this.varietyId.toUpperCase();
        }
    },
    computed: {
            // At some point, it'd be ideal to work out how to do this for any number of steps, perhaps using an array of 'visible' values instead of seperates...
            visible1: {
                get: function() {return this.currentStep === 1},
                set: function(newValue) { if(newValue) this.currentStep = 1 },
            },
            visible2: {
                get: function() {return this.currentStep === 2},
                set: function(newValue) { if(newValue) this.currentStep = 2 },
            },
            visible3: {
                get: function() {return this.currentStep === 3},
                set: function(newValue) { if(newValue) this.currentStep = 3 },
            },
            visible4: {
                get: function() {return this.currentStep === 4},
                set: function(newValue) { if(newValue) this.currentStep = 4 },
            },

        },
    methods: {
        getAllImages(items) {
                this.isBusyVarietyDetails = true;
                this.selected = items[items.length - 1];
                axios({
                    method: "post",
                    url: "/variety-details",
                    data: {
                        variety_id: this.selected.id
                    }
                }).then(
                    result => {
                        this.isBusyVarietyDetails = false;
                        console.log("result", result.data);
                        this.selectedValues  = result.data.values;
                        this.selectedLabels = result.data.labels;
                
                       
                    },
                    error => {
                        this.isBusyVarietyDetails = false;
                        console.log(error);
                    }
                );
            },
    }
};
</script>
