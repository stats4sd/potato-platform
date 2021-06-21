<template>
    <div>
        
        <div class="container my-4">
            <div class="accordion-area" role="tablist">
                
                    
                  
            
                <h3>What variety are you going to add photos?</h3>
                
                <form method="POST" action="/store-images" enctype="multipart/form-data" >
                    <input type="hidden" name="_token" :value="csrf">
                    <b-form-select @change="getVarietyImages" class="mb-3" name="varietyId" v-model="varietyId" :options="varieties" value-field="id" text-field="id"></b-form-select>
                    
            
                
                    <div class="py-4 mx-4">
                        <h3>Flowering</h3>
                            <div class="row py-4 mx-4 justify-content-center">
                                    <media-library-collection
                                    multiple 
                                    name="flowerings" 
                                    collection="flowerings"
                                    :initial-value="testImage"

                                    >
                                   <template
                                        slot="fields"
                                        slot-scope="{
                                            getCustomPropertyInputProps,
                                            getCustomPropertyInputListeners,
                                            getCustomPropertyInputErrors,
                                            getNameInputProps,
                                            getNameInputListeners,
                                            getNameInputErrors,
                                        }"
                                    >
                                    <div class="media-library-properties">
                                        <div class="media-library-field">
                                            <label class="media-library-label">Name</label>
                                            <input
                                                class="media-library-input"
                                                v-bind="getNameInputProps('name')"
                                                v-on="getNameInputListeners('name')"
                                            />
                                        </div>
                                        <div class="media-library-field">
                                            <label class="media-library-label">Photo Type</label>
                                            <input
                                                class="media-library-input"
                                                list="photo-list"
                                                v-bind="getCustomPropertyInputProps('photo_type')"
                                                v-on="getCustomPropertyInputListeners('photo_type')"
                                            />
                                            
                                            <datalist id="photo-list">
                                                <div  v-for="floweringPhoto in floweringPhotos" :key="floweringPhoto.value">
                                                    <option>{{ floweringPhoto.text }}</option>
                                                </div>
                                            </datalist>
                                        </div>

                                        <div class="media-library-field">
                                            <label class="media-library-label">Campana</label>
                                            <input
                                                class="media-library-input"
                                                list="campana-list"
                                                v-bind="getCustomPropertyInputProps('campana')"
                                                v-on="getCustomPropertyInputListeners('campana')"
                                            />
                                            
                                            <datalist id="campana-list">
                                                <div  v-for="campana in campanas" :key="campana.id">
                                                    <option>{{ campana.label_spanish }}</option>
                                                </div>
                                            </datalist>
                                        </div>
                                        <div class="media-library-field">
                                            <label class="media-library-label">Public</label>
                                            <input
                                                class="media-library-input"
                                                list="show-image"
                                                v-bind="getCustomPropertyInputProps('public')"
                                                v-on="getCustomPropertyInputListeners('public')"
                                            />
                                            <datalist id="show-image">
                                                <option>Yes</option>
                                                <option>No</option>
                                            </datalist>
                                        </div>
                                       
                                    </div>
                                        
                                    </template>
                                    </media-library-collection>

                            </div>
                        <h3>Fructification</h3>
                            <div class="row py-4 mx-4 justify-content-center">
                                <media-library-collection
                                    multiple 
                                    name="fructifications" 
                                    collection="fructifications"
                                    :initial-value="fructificationImages"
                                >
                                <template
                                        slot="fields"
                                        slot-scope="{
                                            getCustomPropertyInputProps,
                                            getCustomPropertyInputListeners,
                                            getCustomPropertyInputErrors,
                                            getNameInputProps,
                                            getNameInputListeners,
                                            getNameInputErrors,
                                        }"
                                    >
                                    <div class="media-library-properties">
                                        <div class="media-library-field">
                                            <label class="media-library-label">Name</label>
                                            <input
                                                class="media-library-input"
                                                v-bind="getNameInputProps('name')"
                                                v-on="getNameInputListeners('name')"
                                            />
                                        </div>
                                     
                                        <div class="media-library-field">
                                            <label class="media-library-label">Photo Type</label>
                                            <input
                                                :value="fructificationPhoto"
                                                class="media-library-input"
                                                v-bind="getCustomPropertyInputProps('photo_type')"
                                                v-on="getCustomPropertyInputListeners('photo_type')"
                                            />
                                        </div>
                                        
                                        <div class="media-library-field">
                                            <label class="media-library-label">Campana</label>
                                            <input
                                                class="media-library-input"
                                                list="campana-list"
                                                v-bind="getCustomPropertyInputProps('campana')"
                                                v-on="getCustomPropertyInputListeners('campana')"
                                            />
                                            
                                            <datalist id="campana-list">
                                                <div  v-for="campana in campanas" :key="campana.id">
                                                    <option>{{ campana.label_spanish }}</option>
                                                </div>
                                            </datalist>
                                        </div>
                                        <div class="media-library-field">
                                            <label class="media-library-label">Public</label>
                                            <input
                                                class="media-library-input"
                                                list="show-image"
                                                v-bind="getCustomPropertyInputProps('public')"
                                                v-on="getCustomPropertyInputListeners('public')"
                                            />
                                            <datalist id="show-image">
                                                <option>Yes</option>
                                                <option>No</option>
                                            </datalist>
                                        </div>
                                    </div>
                                        
                                    </template>
                                </media-library-collection>
                            </div>
                        <h3>Tuber at Harvest</h3>
                            <div class="row py-4 mx-4 justify-content-center">
                                <media-library-collection
                                    multiple 
                                    name="tuber_at_harvests" 
                                    collection="tuber_at_harvests"
                                    :initial-value="tubersAtHarvestImages"
                                >
                                <template
                                        slot="fields"
                                        slot-scope="{
                                            getCustomPropertyInputProps,
                                            getCustomPropertyInputListeners,
                                            getCustomPropertyInputErrors,
                                            getNameInputProps,
                                            getNameInputListeners,
                                            getNameInputErrors,
                                        }"
                                    >
                                    <div class="media-library-properties">
                                        <div class="media-library-field">
                                            <label class="media-library-label">Name</label>
                                            <input
                                                class="media-library-input"
                                                v-bind="getNameInputProps('name')"
                                                v-on="getNameInputListeners('name')"
                                            />
                                        </div>
                                     
                                        <div class="media-library-field">
                                            <label class="media-library-label">Photo Type</label>
                                            <input
                                                :value="tuberAtHarvestPhoto"
                                                class="media-library-input"
                                                v-bind="getCustomPropertyInputProps('photo_type')"
                                                v-on="getCustomPropertyInputListeners('photo_type')"
                                       
                                            />
                                        </div>
                                        <div class="media-library-field">
                                            <label class="media-library-label">Campana</label>
                                            <input
                                                class="media-library-input"
                                                list="campana-list"
                                                v-bind="getCustomPropertyInputProps('campana')"
                                                v-on="getCustomPropertyInputListeners('campana')"
                                            />
                                            
                                            <datalist id="campana-list">
                                                <div  v-for="campana in campanas" :key="campana.id">
                                                    <option>{{ campana.label_spanish }}</option>
                                                </div>
                                            </datalist>
                                        </div>
                                        <div class="media-library-field">
                                            <label class="media-library-label">Public</label>
                                            <input
                                                class="media-library-input"
                                                list="show-image"
                                                v-bind="getCustomPropertyInputProps('public')"
                                                v-on="getCustomPropertyInputListeners('public')"
                                            />
                                            <datalist id="show-image">
                                                <option>Yes</option>
                                                <option>No</option>
                                            </datalist>
                                        </div>
                                    </div>
                                    </template>
                                </media-library-collection>
                            </div>
                        <h3>Sprout</h3>
                            <div class="row py-4 mx-4 justify-content-center">
                                <media-library-collection
                                    multiple 
                                    name="sprouts" 
                                    collection="sprouts"
                                    :initial-value="sproutImages"
                                >
                                <template
                                        slot="fields"
                                        slot-scope="{
                                            getCustomPropertyInputProps,
                                            getCustomPropertyInputListeners,
                                            getCustomPropertyInputErrors,
                                            getNameInputProps,
                                            getNameInputListeners,
                                            getNameInputErrors,
                                        }"
                                    >
                                    <div class="media-library-properties">
                                        <div class="media-library-field">
                                            <label class="media-library-label">Name</label>
                                            <input
                                                class="media-library-input"
                                                v-bind="getNameInputProps('name')"
                                                v-on="getNameInputListeners('name')"
                                            />
                                        </div>
                                   
                                        <div class="media-library-field">
                                            <label class="media-library-label">Photo Type</label>
                                            <input
                                                :value="sproutPhoto"
                                                class="media-library-input"
                                                v-bind="getCustomPropertyInputProps('photo_type')"
                                                v-on="getCustomPropertyInputListeners('photo_type')"
                                                enable
                                            />
                                        </div>
                                        <div class="media-library-field">
                                            <label class="media-library-label">Campana</label>
                                            <input
                                                class="media-library-input"
                                                list="campana-list"
                                                v-bind="getCustomPropertyInputProps('campana')"
                                                v-on="getCustomPropertyInputListeners('campana')"
                                            />
                                            
                                            <datalist id="campana-list">
                                                <div  v-for="campana in campanas" :key="campana.id">
                                                    <option>{{ campana.label_spanish }}</option>
                                                </div>
                                            </datalist>
                                        </div>
                                        <div class="media-library-field">
                                            <label class="media-library-label">Public</label>
                                            <input
                                                class="media-library-input"
                                                list="show-image"
                                                v-bind="getCustomPropertyInputProps('public')"
                                                v-on="getCustomPropertyInputListeners('public')"
                                            />
                                            <datalist id="show-image">
                                                <option>Yes</option>
                                                <option>No</option>
                                            </datalist>
                                        </div>
                                    </div>
                                        
                                    </template>
                                </media-library-collection>
                            </div>

                        <div style="text-align: center;">
                            <button type="submit" class="site-btn my-4" >
                                Submit
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
    props:['testImage'],
    data() {
        return {
            varietyId:null,
            varieties:[],
            campanas:[],
            selectedCampana:null,
            floweringImages:null,
            fructificationImages:[],
            tubersAtHarvestImages:[],
            sproutImages:[],
            tubersAtHarvestImages:[],
            showImage:"public",
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            floweringPhotos:[
                { value: 'photo_leaf', text: 'Photo Leaf' },
                { value: 'photo_flower', text: 'Photo Flower'},
                { value: 'photo_plant', text: 'Photo Plant' }
            ],
            fructificationPhoto:"Photo berry",
            tuberAtHarvestPhoto:"Photo tuber",
            sproutPhoto: "Photo tuber shoot"
          
        };
    },
    mounted () {
        axios.get(rootUrl+'/api/varieties-list').then(response => {
            this.varieties = response.data;
        }),
        axios.get(rootUrl+'/api/campanas').then((response) => {
            this.campanas = response.data;
        })
    },
    watch: {
      
    },
    computed: {
           

        },
    methods: {
        getVarietyImages() {
                axios({
                    method: "post",
                    url: "/variety-images",
                    data: {
                        variety_id: this.varietyId
                    }
                }).then(

                    result => {
                        console.log("result", result.data);
                        this.floweringImages = result.data.floweringImages;
                        this.fructificationImages = result.data.fructificationImages;
                        this.sproutImages = result.data.sproutImages;
                        this.tubersAtHarvestImages = result.data.tubersAtHarvestImages;
                    },
                    error => {
                        console.log(error);
                    }
                );
            },
    }
};
</script>
