<template>
    <div class="container">
        <b-table
            ref="selectableTable"
            responsive="sm"
            striped
            hover
            :items="varieties"
            :fields="fields"
            primary-key="variedad"
            select-mode="single"
            selectable
            @row-selected="onRowSelected"
        >
            <template #cell(selected)="{ rowSelected }" />
        </b-table>
        <div
            v-if="selected.length!=0"
            class="container py-4"
        >
            <h2>Variedad {{ selected.variedad }}</h2>

            <div class="card">
                <h5 class="card-header bg-info">
                    <a
                        id="heading-1"
                        data-toggle="collapse"
                        style="color:white"
                        href="#collapse-1"
                        aria-expanded="true"
                        aria-controls="collapse-1"
                        class="d-block"
                    >
                        <i class="fa fa-chevron-down pull-right" />
                        Floración
                    </a>
                </h5>
                <div
                    id="collapse-1"
                    class="collapse show"
                    aria-labelledby="heading-1"
                >
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm">
                                <p><strong>Habito de crecimiento de la planta:</strong> {{ flowering.plant_growth }} </p>
                                <p>
                                    <strong>Tipo de la disección de la hoja:</strong> {{ flowering.leaf_dissection }}
                                </p><p><strong>Número de foliolos laterales de la hoja:</strong> {{ flowering.number_lateral_leaflets }}</p>
                                <p><strong>Número de inter-hojuelas entre foliolos laterales:</strong> {{ flowering.number_intermediate_leaflets }}</p>
                                <p><strong>Número de inter-hojuelas sobre peciolulos:</strong> {{ flowering.number_leaflets_on_petioles }}</p>
                                <p><strong>Color de tallo de esta planta:</strong> {{ flowering.color_stem }}</p>
                                <p><strong>Forma de las alas del tallo:</strong> {{ flowering.shape_stem_wings }}</p>
                                <p><strong>Grado de floracion de esta planta:</strong> {{ flowering.degree_flowering_plant }}</p>
                                <p><strong>Forma de la corola:</strong> {{ flowering.shape_corolla }}</p>
                                <p><strong>Color predominante de la flor:</strong> {{ flowering.color_predominant_flower }}</p>
                                <p><strong>Intensidad de color predominante de la flor:</strong> {{ flowering.intensity_color_predominant_flower }}</p>
                                <p><strong>Color secundario de la flor:</strong> {{ flowering.color_secondary_flower }}</p>
                                <p><strong>Distribución del color secundario de la flor:</strong> {{ flowering.distribution_color_secodary_flower }} </p>
                                <p><strong>Pigmentación de las anteras:</strong> {{ flowering.pigmentation_anthers }}</p>
                                <p><strong>Pigmentación en el pistilo:</strong> {{ flowering.pigmentation_pistil }}</p>
                                <p><strong>Color del cáliz:</strong> {{ flowering.color_chalice }}</p>
                                <p><strong>Color del pedicelo:</strong> {{ flowering.color_pedicel }} </p>
                                <p><strong>Nivel de tolerancia a la rancha:</strong> {{ flowering.level_tolerance_late_blight }}</p>
                                <p><strong>Nivel de tolerancia a la granizada:</strong> {{ flowering.level_tolerance_hailstorms }}</p>
                                <p><strong>Nivel de tolerancia a la helada:</strong> {{ flowering.level_tolerance_frost }}</p>
                                <p><strong>Nivel de tolerancia a la sequía:</strong> {{ flowering.level_tolerance_drought }} </p>
                            </div>
                            <div class="col-sm py-4">
                                <img
                                    :src="'storage/' +flowering.photo_flower"
                                    height="200"
                                    fluid
                                    alt="Photo Flower"
                                ></img>
                                <p><b>Figura 1.</b> Foto de la flor</p>
                                <img
                                    :src="'storage/' +flowering.photo_plant"
                                    height="200"
                                    fluid
                                    alt="Photo Plant"
                                ></img>
                                <p><b>Figura 2.</b>  Foto de la planta</p>
                            </div>
                        </div>
                        <div class="row">
                            <div
                                v-for="(photo, index) in flowering_photos"
                                class="col-sm"
                            >
                                <img
                                    :src="'storage/' +photo"
                                    height="200"
                                    fluid
                                    alt="Photo Plant"
                                ></img>
                                <p><b>Figura {{ index+2+1 }}.</b>  Foto de la planta</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <h5 class="card-header bg-info">
                    <a
                        id="heading-2"
                        data-toggle="collapse"
                        style="color:white"
                        href="#collapse-2"
                        aria-expanded="true"
                        aria-controls="collapse-2"
                        class="d-block"
                    >
                        <i class="fa fa-chevron-down pull-right" />
                        Fructificación
                    </a>
                </h5>
                <div
                    id="collapse-2"
                    class="collapse show"
                    aria-labelledby="heading-2"
                >
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm">
                                <p><strong>Color de las baya:</strong> {{ fructification.color_berries }}</p>
                                <p><strong>Forma de la baya:</strong> {{ fructification.shape_berry }}</p>
                                <p><strong>La madurez:</strong> {{ fructification.maturity_variety }}</p>
                            </div>
                            <div class="col-sm">
                                <img
                                    :src="'storage/' +fructification.photo_berry"
                                    height="200"
                                    fluid
                                    alt="Photo Berry"
                                ></img>
                                <p><b>Figura 1.</b>  Foto de la baya</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <h5 class="card-header bg-info">
                    <a
                        id="heading-3"
                        data-toggle="collapse"
                        style="color:white"
                        href="#collapse-3"
                        aria-expanded="true"
                        aria-controls="collapse-3"
                        class="d-block"
                    >
                        <i class="fa fa-chevron-down pull-right" />
                        Tubérculos a la cosecha
                    </a>
                </h5>
                <div
                    id="collapse-3"
                    class="collapse show"
                    aria-labelledby="heading-3"
                >
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm">
                                <p><strong>Color predominante:</strong> {{ tubers_at_harvest.color_predominant_tuber }}</p>
                                <p><strong>Intensidad del color predominante:</strong> {{ tubers_at_harvest.intensity_color_predominant_tuber }}</p>
                                <p><strong>Color secundario:</strong> {{ tubers_at_harvest.color_secondary_tuber }}</p>
                                <p><strong>Distribución del color secundario:</strong> {{ tubers_at_harvest.distribution_color_secodary_tuber }} </p>
                                <p><strong>Forma general:</strong> {{ tubers_at_harvest.shape_tuber }}</p>
                                <p><strong>Variante de forma:</strong> {{ tubers_at_harvest.variant_shape_tuber }}</p>
                                <p><strong>Profundidad de los ojos:</strong> {{ tubers_at_harvest.depth_tuber_eyes }} </p>
                                <p><strong>Color predominante de la pulpa:</strong> {{ tubers_at_harvest.color_predominant_tuber_pulp }}</p>
                                <p><strong>Color secundario:</strong> {{ tubers_at_harvest.color_secondary_tuber_pulp }}</p>
                                <p><strong>Distribución del color secundario:</strong> {{ tubers_at_harvest.distribution_color_secodary_tuber_pulp }} </p>
                                <p><strong>Nivel de tolerancia a la rancha:</strong> {{ tubers_at_harvest.level_tolerance_late_blight }}</p>
                                <p><strong>Nivel de tolerancia al gorgojo de los andes:</strong> {{ tubers_at_harvest.level_tolerance_weevil }}</p>
                                <p><strong>Nivel de tolerancia a la granizada:</strong> {{ tubers_at_harvest.level_tolerance_hailstorms }}</p>
                                <p><strong>Nivel de tolerancia a la helada:</strong> {{ tubers_at_harvest.level_tolerance_frost }}</p>
                                <p><strong>Nivel de tolerancia a la sequía:</strong> {{ tubers_at_harvest.level_tolerance_drought }} </p>
                            </div>
                            <div class="col-sm">
                                <img
                                    :src="'storage/' +tubers_at_harvest.photo_tuber"
                                    height="200"
                                    fluid
                                    alt="Photo Tuber"
                                ></img>
                                <p><b>Figura 1.</b>  Foto de tuber</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <h5 class="card-header  bg-info">
                    <a
                        id="heading-4"
                        data-toggle="collapse"
                        style="color:white"
                        href="#collapse-4"
                        aria-expanded="true"
                        aria-controls="collapse-4"
                        class="d-block"
                    >
                        <i class="fa fa-chevron-down pull-right" />
                        Brotamiento
                    </a>
                </h5>
                <div
                    id="collapse-4"
                    class="collapse show"
                    aria-labelledby="heading-4"
                >
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm">
                                <p><strong>Color predominante:</strong> {{ sprouts.color_predominant_tuber_shoot }}</p>
                                <p><strong>Color secundario:</strong> {{ sprouts.color_secondary_tuber_shoot }}</p>
                                <p><strong>Distribución del color secundario:</strong> {{ sprouts.distribution_color_secodary_tuber_shoot }}</p>
                            </div>
                            <div class="col-sm">
                                <img
                                    :src="'storage/' +sprouts.photo_tuber_shoot"
                                    height="200"
                                    fluid
                                    alt="Photo Tuber Shoot"
                                ></img>
                                <p><b>Figura 1.</b>  Foto del brote</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>



<script>
    export default {
        data() {
            return {
                fields: [
                    {
                        key: 'name',
                        label: 'variedad',
                    },
                    {
                        key: 'farmer.name',
                        label: 'agricultor',
                    },
                    {
                        key: 'farmer.community.district.province.region.name',
                        label: 'región',
                    }
                ],
                varieties: [],
                selected: [],
                fructification:[],
                flowering:[],
                tubers_at_harvest:[],
                sprouts:[],
                flowering_photos:[],
            }
        },
        mounted () {
            axios.get('api/varieties').then((response) => {
                console.log(response.data)
                this.varieties = response.data;
            })
        },
        methods:{
            onRowSelected(items) {
                this.selected = items[items.length -1];
                console.log(this.selected);
                axios({
                    method: 'post',
                    url: "/variety-details",
                    data: {
                        variety_id: this.selected.id,
                    }
                })
                    .then((result) => {
                        this.fructification = result.data.fructification[0];
                        this.flowering = result.data.flowering[0];
                        this.tubers_at_harvest = result.data.tubers_at_harvest[0];
                        this.sprouts = result.data.sprouts[0];
                        this.flowering_photos =  JSON.parse(this.flowering.photos);

                    }, (error) => {
                        console.log(error);
                    });
            }
        }



    }
</script>