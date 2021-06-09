<template>
    <div>
        <h2 class="mb-4">
            <!-- Variedad {{ variety.id }} {{variety.common_name}} -->
        </h2>
        <farmer-card
            id="farmers"
            :title="'Variedad ' +variety.id +' ' +variety.common_name"
            :sub-sections="farmer"
        />
        <details-section
            id="flowering"
            title="Floración"
            :sub-sections="flowerings"
        />
        <details-section
            id="fruits"
            title="Fructificación"
            :sub-sections="fruits"
        />
        <details-section
            id="tubers"
            title="Tubérculos a la Cosecha"
            :sub-sections="tubersAtHarvests"
        />
        <details-section
            id="sprouts"
            title="Brotamiento"
            :sub-sections="sprouts"
        />
    </div>
</template>

<script>
    import DetailsSection from "./DetailsSection.vue";
    import FarmerCard from './FarmerCard.vue';
    export default {
        components: { DetailsSection, FarmerCard },
        props: {
            variety: {
                type: Object,
                default: () => {}
            },
            values: {
                type: Object,
                default: null
            },
            labels: {
                type: Object,
                default: null
            }
        },
        computed: {
            farmer()  {
                if(!this.labels) return null
                return [
                    {
                        coverImage: this.values.farmer.photo,
                        variables: Object.keys(this.labels.farmer).map((key) => {
                            if(key=='community'){
                                return {
                                    name: key,
                                    label: this.labels.farmer[key],
                                    value: this.values.farmer.community['name']
                                }
                            }
                            if(key=='district'){
                                return {
                                    name: key,
                                    label: this.labels.farmer[key],
                                    value: this.values.farmer.community.district['name']
                                }
                            }
                            if(key=='province'){
                                return {
                                    name: key,
                                    label: this.labels.farmer[key],
                                    value: this.values.farmer.community.district.province['name']
                                }
                            }                          
                            if(key=='region'){
                                return {
                                    name: key,
                                    label: this.labels.farmer[key],
                                    value: this.values.farmer.community.district.province.region['name']
                                }
                            }
                            else{
                                return {
                                    name: key,
                                    label: this.labels.farmer[key],
                                    value: this.values.farmer[key]
                                }
                            }
                        })
                    }
                ];
            },
            fruits()  {
                if(!this.labels) return null
                return [
                    {
                        coverImage: this.values.fruits.photo_berry,
                        variables: Object.keys(this.labels.fruits).map((key) => {
                            return {
                                name: key,
                                label: this.labels.fruits[key],
                                value: typeof  this.values.fruits[key]=== "object" && this.values.fruits[key]!=null ? this.values.fruits[key].label_spanish : this.values.fruits[key],
                            };
                        })
                    }
                ];
            },
            sprouts()  {
                if(!this.labels) return null
                return [
                    {
                        coverImage: this.values.sprouts.photo_tuber_shoot,
                        variables: Object.keys(this.labels.sprouts).map((key) => {
                            return {
                                name: key,
                                label: this.labels.sprouts[key],
                                value: typeof  this.values.sprouts[key]=== "object" && this.values.sprouts[key]!=null ? this.values.sprouts[key].label_spanish : this.values.sprouts[key],
                            };
                        })
                    }
                ];
            },
            flowerings()  {
                if(!this.labels) return null
                var laPlanta = [
                    "choice_plant_growth",
                    "choice_color_stem",
                    "choice_shape_stem_wings"
                ];
                var laHoja = [
                    "choice_leaf_dissection",
                    "choice_number_lateral_leaflets",
                    "choice_number_intermediate_leaflets",
                    "choice_number_leaflets_on_petioles",
                ];
                var laFlor = [
                    "choice_degree_flowering_plant",
                    "choice_shape_corolla",
                    "choice_color_predominant_flower",
                    "choice_intensity_color_predominant_flower",
                    "choice_color_secondary_flower",
                    "choice_distribution_color_secodary_flower",
                    "choice_pigmentation_anthers",
                    "choice_pigmentation_pistil",
                    "choice_color_chalice",
                    "choice_color_pedicel"
                ];
                var tolerancia = [
                    "choice_level_tolerance_late_blight",
                    "choice_level_tolerance_hailstorms",
                    "choice_level_tolerance_frost",
                    "choice_level_tolerance_drought "
                ];
                return [
                    {
                        title: "La Planta",
                        coverImage: this.values.flowerings.photo_plant,
                        variables: laPlanta.map((key) => {
                            return {
                                name: key,
                                value:  typeof  this.values.flowerings[key]=== "object" && this.values.flowerings[key]!=null ? this.values.flowerings[key].label_spanish : this.values.flowerings[key],
                                label: this.labels.flowerings[key] 
                            };
                        })
                    },
                    {
                        title: "La Hoja",
                        coverImage: this.values.flowerings.photo_leaf,
                        variables: laHoja.map((key) => {
                            return {
                                name: key,
                                value:  typeof  this.values.flowerings[key]=== "object" && this.values.flowerings[key]!=null ? this.values.flowerings[key].label_spanish : this.values.flowerings[key],
                                label: this.labels.flowerings[key] 
                            };
                        })
                    },
                    {
                        title: "La Flor",
                        coverImage: this.values.flowerings.photo_flower,
                        variables: laFlor.map((key) => {
                            return {
                                name: key,
                                value:  typeof  this.values.flowerings[key]=== "object" && this.values.flowerings[key]!=null ? this.values.flowerings[key].label_spanish : this.values.flowerings[key],
                                label: this.labels.flowerings[key] 
                            };
                        })
                    },
                    {
                        title: "Tolerancia",
                        coverImage: this.values.flowerings.photo_leaf,
                        variables: tolerancia.map((key) => {
                            return {
                                name: key,
                                value:  typeof  this.values.flowerings[key]=== "object" && this.values.flowerings[key]!=null ? this.values.flowerings[key].label_spanish : this.values.flowerings[key],
                                label: this.labels.flowerings[key] 
                            };
                        })
                    }
                ];
            },
            tubersAtHarvests()  {
                if(!this.labels) return null
                var tubersAtHarvestMain = [
                    "choice_color_predominant_tuber",
                    "choice_intensity_color_predominant_tuber",
                    "choice_color_secondary_tuber",
                    "choice_distribution_color_secodary_tuber",
                    "choice_shape_tuber",
                    "choice_variant_shape_tuber",
                    "choice_depth_tuber_eyes",
                    "choice_color_predominant_tuber_pul",
                    "choice_color_secondary_tuber_pulp",
                    "choice_distribution_color_secodary_tuber_pulp",
                    "number_tubers_plant",
                    "yield_plant"
                ];
                var tubersTolerancia = [
                    "choice_level_tolerance_late_blight",
                    "choice_level_tolerance_weevil",
                    "choice_level_tolerance_hailstorms",
                    "choice_level_tolerance_frost",
                    "choice_level_tolerance_drought"
                ];
                return [
                    {
                        title: '',
                        coverImage: this.values.tubersAtHarvest.photo_tuber,
                        variables: tubersAtHarvestMain.map((key) => {
                            return {
                                name: key,
                                label: this.labels.tubersAtHarvest[key],
                                value: typeof  this.values.tubersAtHarvest[key]=== "object" && this.values.tubersAtHarvest[key]!=null ? this.values.tubersAtHarvest[key].label_spanish : this.values.tubersAtHarvest[key],
                            }
                        })
                    },
                    {
                        title: 'Tolerancia',
                        variables: tubersTolerancia.map((key) => {
                            return {
                                name: key,
                                label: this.labels.tubersAtHarvest[key],
                                value: typeof  this.values.tubersAtHarvest[key]=== "object" && this.values.tubersAtHarvest[key]!=null ? this.values.tubersAtHarvest[key].label_spanish : this.values.tubersAtHarvest[key],
                            }
                        })
                    },
                ]
            }
        },
        mounted() {
            // format data and labels to pass into details sections
            // want data in format:
            // section = [
            //   {
            //     'title': 'La Planta',
            //     'image': 'path/to/image',
            //     'variables': [
            //         {
            //             'label': 'Habito de crecimiento de la planta',
            //             'name': 'plant_growth',
            //             'value': flowering.plant_growth,
            //         }
            //     ]
            // },
        },
    };
</script>