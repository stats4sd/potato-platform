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
            :sub-sections="flowering"
        />
        <details-section
            id="fruits"
            title="Fructificación"
            :sub-sections="fruits"
        />
        <details-section
            id="tubers"
            title="Tubérculos a la Cosecha"
            :sub-sections="tubersAtHarvest"
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
        data() {
            return {
                labelsFarmer: {
                    'name' :'Guardián',
                    'community' :'Comunidad',
                    'district' :'Distrito',
                    'province' :'Provincia',
                    'region' :'Región',
                    'aguapan_year' :'Pertenece a AGUAPAN desde',
                    'count_varieties' :'Número de variedades en la base de datos'
                },
                labelsFlowering:{
                    'choice_plant_growth': 'Habito de crecimiento de la planta',
                    'choice_color_stem': 'Color de tallo',
                    'choice_shape_stem_wings': 'Forma de las alas del tallo',

                    'choice_leaf_dissection': 'Tipo de la disección de la hoja',
                    'choice_number_lateral_leaflets': 'Número de foliolos laterales de la hoja',
                    'choice_number_intermediate_leaflets': 'Número de inter-hojuelas entre foliolos laterales',
                    'choice_number_leaflets_on_petioles': 'Número de inter-hojuelas sobre peciolulos',

                    'choice_degree_flowering_plant': 'Grado de floracion',
                    'choice_shape_corolla': 'Forma de la corola',
                    'choice_color_predominant_flower': 'Color predominante de la flor',
                    'choice_intensity_color_predominant_flower': 'Intensidad de color predominante de la flor',
                    'choice_color_secondary_flower': 'Color secundario de la flor',
                    'choice_distribution_color_secodary_flower': 'Distribución del color secundario de la flor',
                    'choice_pigmentation_anthers': 'Pigmentación de las anteras',
                    'choice_pigmentation_pistil': 'Pigmentación en el pistilo',
                    'choice_color_chalice': 'Color del cáliz',
                    'choice_color_pedicel': 'Color del pedicelo',

                    'choice_level_tolerance_late_blight': 'Nivel de tolerancia a la rancha',
                    'choice_level_tolerance_hailstorms': 'Nivel de tolerancia a la granizada',
                    'choice_level_tolerance_frost': 'Nivel de tolerancia a la helada',
                    'choice_level_tolerance_drought': 'Nivel de tolerancia a la sequía',
                },
                labelsFructification:{
                    'choice_berries' :'Bayas',
                    'choice_color_berries' :'Color de la baya',
                    'choice_shape_berry' :'Forma de la baya',
                    'choice_maturity_variety' :'La madurez',
                },
                labelsTubersAtHarvest:{
                    'choice_color_predominant_tuber' : 'Color predominante',
                    'choice_intensity_color_predominant_tuber' : 'Intensidad del color predominante',
                    'choice_color_secondary_tuber' : 'Color secundario',
                    'choice_distribution_color_secodary_tuber' : 'Distribución del color secundario',
                    'choice_shape_tuber' : 'Forma general',
                    'choice_variant_shape_tuber' : 'Variante de forma',
                    'choice_depth_tuber_eyes' : 'Profundidad de los ojos',
                    'choice_color_predominant_tuber_pulp' : 'Color predominante de la pulpa',
                    'choice_color_secondary_tuber_pulp' : 'Color secundario de la pulpa',
                    'choice_distribution_color_secodary_tuber_pulp' : 'Distribución del color secundario de la pulpa',
                    'number_tubers_plant' : 'Número de tubérculos por planta',
                    'yield_plant' : 'Rendimiento por planta en kg',

                    'choice_level_tolerance_late_blight' : 'Nivel de tolerancia a la rancha',
                    'choice_level_tolerance_weevil' : 'Nivel de tolerancia al gorgojo de los andes',
                    'choice_level_tolerance_hailstorms' : 'Nivel de tolerancia a la granizada',
                    'choice_level_tolerance_frost' : 'Nivel de tolerancia a la helada',
                    'choice_level_tolerance_drought' : 'Nivel de tolerancia a la sequía',
                },
                labelsSprout:{
                    'choice_color_predominant_tuber_shoot':'Color predominante',
                    'choice_color_secondary_tuber_shoot':'Color secundario',
                    'choice_distribution_color_secodary_tuber_shoot':'Distribución del color secundario',
                }
            }
        },
        computed: {
            farmer()  {
              
                if(!this.variety) return null
             console.log( this.variety.farmer)
                return [
                    {
                        coverImage: this.variety.farmer.photo,
                        variables: Object.keys(this.labelsFarmer).map((key) => {

                            if(key=='community'){
                            return {
                                name: key,
                                label: this.labelsFarmer[key],
                                value: this.variety.farmer[key].name
                            }
                            }
                            if(key=='district'){
                            return {
                                name: key,
                                label: this.labelsFarmer[key],
                                value: this.variety.farmer.community[key].name
                            }
                            }
                            if(key=='province'){
                            return {
                                name: key,
                                label: this.labelsFarmer[key],
                                value: this.variety.farmer.community.district[key].name
                            }
                            }                          
                            if(key=='region'){
                            return {
                                name: key,
                                label: this.labelsFarmer[key],
                                value: this.variety.farmer.community.district.province[key].name
                            }
                            }
                            else{
                            return {
                                name: key,
                                label: this.labelsFarmer[key],
                                value: this.variety.farmer[key]
                            }
                            }
                        })
                    }
                ];
            },
            fruits()  {

                if(!this.labelsFructification) return null

                return [

                    {
                        coverImage: this.variety.fructifications[0].photo_berry,
                        variables: Object.keys(this.labelsFructification).map((key) => {
                            return {
                                name: key,
                                label: this.labelsFructification[key],
                                value: this.variety.fructifications[0][key] ? this.variety.fructifications[0][key].label_spanish :  this.variety.fructifications[0][key] ,
                            }
                        })
                    }
                ];
            },
            sprouts()  {

                if(!this.labelsSprout) return null
                return [
                    {
                        coverImage: this.variety.sprouts.photo_tuber_shoot,
                        variables: Object.keys(this.labelsSprout).map((key) => {
                            return {
                                name: key,
                                label: this.labelsSprout[key],
                                value: this.variety.sprouts[0][key] ? this.variety.sprouts[0][key].label_spanish :  this.variety.sprouts[0][key] ,
                            };
                        })
                    }
                ];
            },
            flowering()  {
                if(!this.labelsFlowering) return null

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
                        coverImage: this.variety.flowerings[0].photo_plant,
                        variables: laPlanta.map((key) => {
                            console.log(this.variety.flowerings[0][key])
                            return {
                                name: key,
                                value: this.variety.flowerings[0][key] ? this.variety.flowerings[0][key].label_spanish :  this.variety.flowerings[0][key] ,
                                label: this.labelsFlowering[key]
                            };
                        })
                    },
                    {
                        title: "La Hoja",
                        coverImage: this.variety.flowerings[0].photo_leaf,
                        variables: laHoja.map((key) => {
                         
                            return {
                                name: key,
                                value: this.variety.flowerings[0][key] ? this.variety.flowerings[0][key].label_spanish :  this.variety.flowerings[0][key] ,
                                label: this.labelsFlowering[key]
                            };
                        })
                    },
                    {
                        title: "La Flor",
                        coverImage: this.variety.flowerings[0].photo_flower,
                        variables: laFlor.map((key) => {
                            return {
                                name: key,
                                value: this.variety.flowerings[0][key] ? this.variety.flowerings[0][key].label_spanish :  this.variety.flowerings[0][key] ,
                                label: this.labelsFlowering[key]
                            };
                        })
                    },
                    {
                        title: "Tolerancia",
                        coverImage: this.variety.flowerings[0].photo_leaf,
                        variables: tolerancia.map((key) => {
                            return {
                                name: key,
                                value: this.variety.flowerings[0][key] ? this.variety.flowerings[0][key].label_spanish :  this.variety.flowerings[0][key] ,
                                label: this.labelsFlowering[key]
                            };
                        })
                    }
                ];
            },
            tubersAtHarvest()  {
                if(!this.labelsTubersAtHarvest) return null
                var tubersAtHarvestMain = [
                    "choice_color_predominant_tuber",
                    "choice_intensity_color_predominant_tuber",
                    "choice_color_secondary_tuber",
                    "choice_distribution_color_secodary_tuber",
                    "choice_shape_tuber",
                    "choice_variant_shape_tuber",
                    "choice_depth_tuber_eyes",
                    "choice_color_predominant_tuber_pulp",
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
                        coverImage: this.variety.tubers_at_harvests[0].photo_tuber,
                        variables: tubersAtHarvestMain.map((key) => {
                            if( typeof this.variety.tubers_at_harvests[0][key] === "object" &&  this.variety.tubers_at_harvests[0][key] != null){

                                return {
                                    name: key,
                                    value: this.variety.tubers_at_harvests[0][key].label_spanish ,
                                    label: this.labelsTubersAtHarvest[key],
                                }
                            }else {
                                return {
                                    name: key,
                                    value: this.variety.tubers_at_harvests[0][key] ,
                                    label: this.labelsTubersAtHarvest[key],
                                }
                            }
                        })
                    },
                    {
                        title: 'Tolerancia',
                        variables: tubersTolerancia.map((key) => {
                            return {
                                name: key,
                                value: this.variety.tubers_at_harvests[0][key] ? this.variety.tubers_at_harvests[0][key].label_spanish :  this.variety.tubers_at_harvests[0][key] ,
                                label: this.labelsTubersAtHarvest[key],
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

