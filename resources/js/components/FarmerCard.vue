<template>
    <div class="card mb-4 border-0">
        <h5 class="card-header bg-info text-light">
            Guardián
        </h5>
       
            <div class="card-body mt-2">
                <sub-section
                    v-for="(subSection, index) in subSections"
                    :key="index"
                    :cover-image="subSection.coverImage ? subSection.coverImage : null"
                    :title="subSection.title ? subSection.title : null"
                    :variables="subSection.variables"
                />
            </div>

    </div>
</template>

<script>
    import SubSection from './SubSection.vue';
    export default {
        components: { SubSection },
        props: {
            id: {
                type: String,
                default: '',
            },
            title: {
                type: String,
                default: 'New Section',
            },
            subSections: {
                type: Array,
                default: () => [],
            },
        },

        data() {
            return {
                'expanded': true,
            }
        },
    }
</script>