<template>
    <div>
        <h2>Variedad {{ variety.name }}</h2>
        <details-section
            title="Fructificación"
            :sub-sections="fructification"
        />
    </div>
</template>

<script>
    import DetailsSection from './DetailsSection.vue'
    export default {
        components: { DetailsSection },
        props: {
            'variety': {
                type: Object,
                default: () => {}
            },
            'fructification': {
                type: Object,
                default: () => {},
            },
            'flowering': {
                type: Object,
                default: () => {},
            },
            'tubersAtHarvest': {
                type: Object,
                default: () => {},
            },
            'sprouts': {
                type: Object,
                default: () => {},
            },
            'floweringPhotos': {
                type: Array,
                default: () => [],
            },
        }
    }
</script>

