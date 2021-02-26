<template>
    <div class="card">
        <h5 class="card-header bg-info text-light p-0 rounded">
            <b-button
                :id="'collapse-heading'+id"
                variant="link"
                class="text-white w-100 px-4"
                :class="expanded ? 'not-collapsed' : 'collapsed'"
                :aria-expanded="expanded ? 'true' : 'false'"
                :aria-controls="'collapse-'+id"
            >
                <h5 class="d-flex justify-content-between m-0 align-items-center">
                    <span>{{ title }}</span>
                    <i
                        :class="expanded ? 'fa fa-caret-down' : 'fa fa-caret-right'"
                    />
                    </i>
                </h5>
            </b-button>
        </h5>
        <b-collapse
            :id="'collapse-'+id"
            v-model="expanded"
            :aria-labelledby="'collapse-heading-'+id"
        >
            <div class="card-body">
                <sub-section
                    v-for="(subSection, subtitle) in subSections"
                    :key="subtitle"
                    :subtitle="subtitle"
                    :data="subSection"
                    :cover-image="subSection.coverImage"
                />
            </div>
        </b-collapse>
    </div>
</template>

<script>
    import SubSection from './SubSection.vue';
    export default {
        components: { SubSection },
        props: {
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

        mounted() {
            console.log('details Mounted')
            console.log('subsections', this.subSections);
        }
    }
</script>