<template>
    <div>
       
    <li class="list-group-item p-0">
        <b-button
            v-b-toggle="'collapse-'+parameter.value"
            variant="white"
            class="btn-flush text-left d-flex justify-content-between w-100"
            @click="parameterSelected=parameter.value"
        >
            <div>{{ parameter.label }}</div>
            <i class="fas fa-plus" />
        </b-button>
        <b-collapse
            :id="'collapse-'+parameter.value"
            class="bg-light"
        >
            <b-checkbox-group
                :options="parameter.options"
                stacked
                class="px-4 py-2 padded-checkbox-group"
                @input="updateInput"
            />
        </b-collapse>
    </li>
    </div>


</template>

<script>
    export default {
        props:['parameter'],
        data() {
            return {
                parameterSelected:null,
                parameterValueSelected:[],
            }
        },
        
        methods: {
            updateInput(value) {
               this.$emit('input', value)
               this.$emit('updateFilter')
            }
        }
    }
</script>
