<template>
    <div class="container">
        <p>This page presents the varieties currently listed in the database. Select a variety in the table to see detailed information and photos. Use the search field to filter the results.</p>
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
            :fructification="fructification"
            :flowering="flowering"
            :tubers-at-harvest="tubersAtHarvest"
            :sprouts="sprouts"
            :flowering-photos="floweringPhotos"
        />
    </div>
</template>



<script>
    import VarietyDetails from './VarietyDetails.vue'


    export default {
        components: { VarietyDetails },
        data() {
            return {
                fields: [
                    {
                        key: 'name',
                        label: 'Variedad',
                    },
                    {
                        key: 'farmer.name',
                        label: 'Agricultor',
                    },
                    {
                        key: 'farmer.community.district.province.region.name',
                        label: 'Región',
                    }
                ],
                varieties: [],
                selected: null,
                fructification:[],
                flowering:[],
                tubersAtHarvest:[],
                sprouts:[],
                floweringPhotos:[],
                currentPage: 1,
                perPage: 15,
                tableFilter: '',
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
                        this.tubersAtHarvest = result.data.tubers_at_harvest[0];
                        this.sprouts = result.data.sprouts[0];
                        this.floweringPhotos =  JSON.parse(this.flowering.photos);

                    }, (error) => {
                        console.log(error);
                    });
            }
        }



    }
</script>