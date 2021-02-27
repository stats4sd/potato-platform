<template>
    <div>
        <h2 class="mb-4">
            Variedad {{ variety.name }}
        </h2>
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
    export default {
        components: { DetailsSection },
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
            fruits()  {

                if(!this.labels) return null

                return [
                    {
                        variables: Object.keys(this.labels.fruits).map((key) => {
                            console.log('key', key)
                            return {
                                name: key,
                                label: this.labels.fruits[key],
                                value: this.values.fruits[key]
                            };
                        })
                    }
                ];
            },
            sprouts()  {

                if(!this.labels) return null
                return [
                    {
                        variables: Object.keys(this.labels.sprouts).map((key) => {
                            return {
                                name: key,
                                label: this.labels.sprouts[key],
                                value: this.values.sprouts[key]
                            };
                        })
                    }
                ];
            },
            flowering()  {
                if(!this.labels) return null

                console.log('#################ahhhhhhhh#####', this.labels)
                var laPlanta = [
                    "plant_growth",
                    "leaf_dissection",
                    "number_lateral_leaflets",
                    "number_intermediate_leaflets",
                    "number_leaflets_on_petioles",
                    "color_stem",
                    "shape_stem_wings"
                ];

                var laFlor = [
                    "degree_flowering_plant",
                    "shape_corolla",
                    "color_predominant_flower",
                    "intensity_color_predominant_flower",
                    "color_secondary_flower",
                    "distribution_color_secodary_flower",
                    "pigmentation_anthers",
                    "pigmentation_pistil",
                    "color_chalice",
                    "color_pedicel"
                ];

                var tolerancia = [
                    "level_tolerance_late_blight",
                    "level_tolerance_hailstorms",
                    "level_tolerance_frost",
                    "level_tolerance_drought "
                ];
                return [
                    {
                        title: "La Planta",
                        variables: laPlanta.map((key) => {
                            return {
                                name: key,
                                value: this.values.flowering[key],
                                label: this.labels.flowering[key]
                            };
                        })
                    },
                    {
                        title: "La Flor",
                        variables: laFlor.map((key) => {
                            return {
                                name: key,
                                value: this.values.flowering[key],
                                label: this.labels.flowering[key]
                            };
                        })
                    },
                    {
                        title: "Tolerancia",
                        variables: tolerancia.map((key) => {
                            return {
                                name: key,
                                value: this.values.flowering[key],
                                label: this.labels.flowering[key]
                            };
                        })
                    }
                ];
            },
            tubersAtHarvest()  {
                if(!this.labels) return null
                var tubersAtHarvestMain = [
                    "color_predominant_tuber",
                    "intensity_color_predominant_tuber",
                    "color_secondary_tuber",
                    "distribution_color_secodary_tuber",
                    "shape_tuber",
                    "variant_shape_tuber",
                    "depth_tuber_eyes",
                    "color_predominant_tuber_pul",
                    "color_secondary_tuber_pulp",
                    "distribution_color_secodary_tuber_pulp"
                ];

                var tubersTolerancia = [
                    "distribution_color_secodary_tuber_pulp",
                    "level_tolerance_late_blight",
                    "level_tolerance_weevil",
                    "level_tolerance_hailstorms",
                    "level_tolerance_frost",
                    "level_tolerance_drought"
                ];

                return [
                    {
                        title: '',
                        variables: tubersAtHarvestMain.map((key) => {
                            return {
                                name: key,
                                value: this.values.tubersAtHarvest[key],
                                label: this.labels.tubersAtHarvest[key],
                            }
                        })
                    },
                    {
                        title: 'Tolerancia',
                        variables: tubersTolerancia.map((key) => {
                            return {
                                name: key,
                                value: this.values.tubersAtHarvest[key],
                                label: this.labels.tubersAtHarvest[key],
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

