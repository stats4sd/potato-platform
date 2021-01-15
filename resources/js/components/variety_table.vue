<template>
    <div class="container">
        <b-table responsive="sm" striped hover :items="varieties" :fields="fields" primary-key="variedad" ref="selectableTable" select-mode="single" selectable @row-selected="onRowSelected">
            <template #cell(selected)="{ rowSelected }">
            </template>
        </b-table>
    <div class="container py-4" v-if="selected.length!=0">
        <h2>Variedad {{selected.variedad}}</h2>
        <b-card class="mb-4">
            <template #header> <h4 class="mb-0">Floración</h4></template>
            <div class="row">
                <div class="col-sm">
                    <p><strong>Habito de crecimiento de la planta:</strong> {{flowering.plant_growth}} </p>
                    <p><strong>Tipo de la disección de la hoja:</strong> {{flowering.leaf_dissection}}
                    <br><strong>Número de foliolos laterales de la hoja:</strong> {{flowering.number_lateral_leaflets}}
                    <br><strong>Número de inter-hojuelas entre foliolos laterales:</strong> {{flowering.number_intermediate_leaflets}}
                    <br><strong>Número de inter-hojuelas sobre peciolulos:</strong> {{flowering.number_leaflets_on_petioles}}</p>
                    <p><strong>Color de tallo de esta planta:</strong> {{flowering.color_stem}}
                    <br><strong>Forma de las alas del tallo:</strong> {{flowering.shape_stem_wings}}
                    <br><strong>Grado de floracion de esta planta:</strong> {{flowering.degree_flowering_plant}}
                    <br><strong>Forma de la corola:</strong> {{flowering.shape_corolla}}
                    <p><strong>Color predominante de la flor:</strong> {{flowering.color_predominant_flower}}
                    <br><strong>Intensidad de color predominante de la flor:</strong> {{flowering.intensity_color_predominant_flower}}
                    <br><strong>Color secundario de la flor:</strong> {{flowering.color_secondary_flower}}
                    <br><strong>Distribución del color secundario de la flor:</strong> {{flowering.distribution_color_secodary_flower}} </p>
                    <p><strong>Pigmentación de las anteras:</strong> {{flowering.pigmentation_anthers}}
                    <br><strong>Pigmentación en el pistilo:</strong> {{flowering.pigmentation_pistil}}
                    <br><strong>Color del cáliz:</strong> {{flowering.color_chalice}}
                    <br><strong>Color del pedicelo:</strong> {{flowering.color_pedicel}} </p>
                    <p><strong>Nivel de tolerancia a la rancha:</strong> {{flowering.level_tolerance_late_blight}}
                    <br><strong>Nivel de tolerancia a la granizada:</strong> {{flowering.level_tolerance_hailstorms}}
                    <br><strong>Nivel de tolerancia a la helada:</strong> {{flowering.level_tolerance_frost}}
                    <br><strong>Nivel de tolerancia a la sequía:</strong> {{flowering.level_tolerance_drought}} </p>
                </div>
                <div class="col-sm">
                    <img v-bind:src="'storage/' +flowering.photo_flower" height="200" fluid alt="Photo Flower"></img>
                    <p><b>Figura 1.</b> Foto de la flor</p>
                    <img v-bind:src="'storage/' +flowering.photo_plant" height="200" fluid alt="Photo Plant"></img>
                    <p><b>Figura 2.</b>  Foto de la planta</p>
                </div>
            </div>
        </b-card>
        <b-card class="mb-4">
            <template #header> <h4 class="mb-0">Fructificación</h4></template>
            <div class="row">
                <div class="col-sm">
                    <strong>Color de las baya:</strong> {{fructification.color_berries}}
                    <br><strong>Forma de la baya:</strong> {{fructification.shape_berry}}
                    <br><strong>La madurez:</strong> {{fructification.maturity_variety}}
                </div>
                <div class="col-sm">
                    <img v-bind:src="'storage/' +fructification.photo_berry" height="200" fluid alt="Photo Berry"></img>
                    <p><b>Figura 1.</b>  Foto de la baya</p>
                </div>
            </div>
        </b-card>
        <b-card class="mb-4">
            <template #header> <h4 class="mb-0">Tubérculos a la cosecha</h4></template>
            <div class="row">
                <div class="col-sm">
                    <p><strong>Color predominante:</strong> {{tubers_at_harvest.color_predominant_tuber}}
                    <br><strong>Intensidad del color predominante:</strong> {{tubers_at_harvest.intensity_color_predominant_tuber}}
                    <br><strong>Color secundario:</strong> {{tubers_at_harvest.color_secondary_tuber}}
                    <br><strong>Distribución del color secundario:</strong> {{tubers_at_harvest.distribution_color_secodary_tuber}} </p>
                    <p><strong>Forma general:</strong> {{tubers_at_harvest.shape_tuber}}
                    <br><strong>Variante de forma:</strong> {{tubers_at_harvest.variant_shape_tuber}}
                    <br><strong>Profundidad de los ojos:</strong> {{tubers_at_harvest.depth_tuber_eyes}} </p>
                    <p><strong>Color predominante de la pulpa:</strong> {{tubers_at_harvest.color_predominant_tuber_pulp}}
                    <br><strong>Color secundario:</strong> {{tubers_at_harvest.color_secondary_tuber_pulp}}
                    <br><strong>Distribución del color secundario:</strong> {{tubers_at_harvest.distribution_color_secodary_tuber_pulp}} </p>
                    <p><strong>Nivel de tolerancia a la rancha:</strong> {{tubers_at_harvest.level_tolerance_late_blight}}
                    <br><strong>Nivel de tolerancia al gorgojo de los andes:</strong> {{tubers_at_harvest.level_tolerance_weevil}}
                    <br><strong>Nivel de tolerancia a la granizada:</strong> {{tubers_at_harvest.level_tolerance_hailstorms}}
                    <br><strong>Nivel de tolerancia a la helada:</strong> {{tubers_at_harvest.level_tolerance_frost}}
                    <br><strong>Nivel de tolerancia a la sequía:</strong> {{tubers_at_harvest.level_tolerance_drought}} </p>
                </div>
                <div class="col-sm">
                    <img v-bind:src="'storage/' +tubers_at_harvest.photo_tuber" height="200" fluid alt="Photo Tuber"></img>
                    <p><b>Figura 1.</b>  Foto de tuber</p>
                </div>
            </div>
        </b-card>
         <b-card class="mb-4">
            <template #header> <h4 class="mb-0">Brotamiento</h4></template>
            <div class="row">
                <div class="col-sm">
                    <strong>Color predominante:</strong> {{sprouts.color_predominant_tuber_shoot}}
                    <br><strong>Color secundario:</strong> {{sprouts.color_secondary_tuber_shoot}}
                    <br><strong>Distribución del color secundario:</strong> {{sprouts.distribution_color_secodary_tuber_shoot}}
                </div>
                <div class="col-sm">
                    <img v-bind:src="'storage/' +sprouts.photo_tuber_shoot" height="200" fluid alt="Photo Tuber Shoot"></img>
                    <p><b>Figura 1.</b>  Foto del brote</p>
                </div>
            </div>
        </b-card>
      
    </div>
</div>

</template>

<script>
  export default {
    data() {
      return {
        fields: ['variedad', 'agricultor', 'región'],
        varieties: [],
        selected: [],
        fructification:[],
        flowering:[],
        tubers_at_harvest:[],
        sprouts:[],
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
                variety_id: this.selected,
            }
            })
            .then((result) => {
                this.fructification = result.data.fructification[0];
                this.flowering = result.data.flowering[0];
                this.tubers_at_harvest = result.data.tubers_at_harvest[0];
                this.sprouts = result.data.sprouts[0];
            }, (error) => {
            console.log(error);
            });
      }
    }
    


  }
</script>