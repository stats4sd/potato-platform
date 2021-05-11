<template>
<div>
    <div class="container">
         <b-button-group size="sm">
            <b-button
                v-for="region in regions"
                :key="region"
               
             
                variant="primary"
                class="mx-2"
                @click="FilterFarmers(region)"
            >
                {{region }}
            </b-button>
         </b-button-group>

    <b-row>
        <div v-for="farmer in farmersFiltered" :key="farmer.id">
            <b-col class="mb-4">
              
                <b-card
                
                    v-bind:img-src="MIX_APP_URL+'/storage/'+farmer.photo"
                    img-alt="Card Image"
                    img-top
                    v-bind:title="farmer.name"
                    style="width: 300px; height:350px;"
                    @click="OpenModal(farmer)"
                
                >
                   
                </b-card>
                             

              
            </b-col>
        </div>
            <b-modal id="modal" title="Guardián" v-model="modalShow" v-if="farmerDetails.length!=0">

                <p class="my-4"><b>Nombre </b>{{ farmerDetails.name }}</p>
                <p class="my-4"><b>Comunidad </b>{{ farmerDetails.community.name }}</p>
                <p class="my-4"><b>Distrito </b>{{ farmerDetails.community.district.name }}</p>
                <p class="my-4"><b>Provincia </b>{{ farmerDetails.community.district.province.name }}</p>
                <p class="my-4"><b>Región </b>{{ farmerDetails.community.district.province.region.name }}</p>
                <p class="my-4"><b>Pertenece a AGUAPAN desde </b>{{ farmerDetails.aguapan_year}}</p>
                <p class="my-4"><b>Número de variedades en la base de datos </b>{{ farmerDetails.varieties_count }}</p>
             
            </b-modal>
    </b-row>
    </div>
       
</div>    
</template>

<script>

export default {
      
        data() {
            return {
                modalShow:false,
                farmers:[],
                farmersFiltered:[],
                regions:[],
                seletedRegion:[],
                MIX_APP_URL:process.env.MIX_APP_URL,
                farmerDetails:[],
               
            };
        },
        mounted() {
            axios.get("api/farmers").then(response => {
                this.farmers = response.data;
                this.farmersFiltered=this.farmers;
                console.log( this.farmers);
                
                this.farmers.forEach(farmer => {
                    if(!this.regions.includes(farmer.community.district.province.region.name)){
                        
                        this.regions.push(farmer.community.district.province.region.name);
                    }
                   
                });

             
            });

           
        },
                       
        methods: {
            FilterFarmers(regionName) {

 
                this.farmersFiltered = this.farmers.filter(farmer => farmer.community.district.province.region.name==regionName);
                   

                console.log( this.farmersFiltered);
                
            },
            OpenModal(farmer){
                console.log(farmer);
                this.modalShow =true;
                this.farmerDetails = farmer;
            }
        }
    }
</script>