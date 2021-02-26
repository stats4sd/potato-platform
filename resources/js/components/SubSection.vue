<template>
    <div class="d-flex flex-wrap">
        <div class="image col-12 col-md-6 col-xl-4">
            <img
                :src="data.image ? data.image : 'https://via.placeholder.com/300' "
            >
        </div>
        <div class="col-12 col-md-6 col-xl-8">
            <h4 v-if="data.title && data.title.length > 0">
                {{ data.title }}
            </h4>

            <ul class="list-group list-group-flush">
                <li
                    v-for="variable in data.variables"
                    :key="variable.name"
                    class="list-group-item d-flex justify-content-between"
                >
                    <div>
                        {{ variable.label }}
                    </div>
                    <div>{{ variable.value }}</div>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            data: {
                type: Object,
                default: () => {},
            },
        }
    }
</script>
