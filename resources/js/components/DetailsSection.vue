<template>
    <div class="card mb-4 border-0">
        <h5 class="card-header bg-info text-light p-0 rounded">
            <b-button
                :id="'collapse-heading'+id"
                variant="link"
                class="text-white w-100 px-4 py-3"
                :class="expanded ? 'not-collapsed' : 'collapsed'"
                :aria-expanded="expanded ? 'true' : 'false'"
                :aria-controls="'collapse'+id"
                @click="expanded = !expanded"
            >
                <h5 class="d-flex justify-content-between m-0 align-items-center">
                    <span>{{ title }}</span>
                    <i
                        :class="expanded ? 'fa fa-caret-down' : 'fa fa-caret-right'"
                    />
                </h5>
            </b-button>
        </h5>
        <b-collapse
            :id="'collapse'+id"
            v-model="expanded"
            :aria-labelledby="'collapse-heading'"
        >
            <div class="card-body mt-2">
                <sub-section
                    v-for="(subSection, index) in subSections"
                    :key="index"
                    :data="subSection"
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