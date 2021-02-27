<template>
    <div class="d-flex flex-wrap my-4">
        <div class="image col-12 col-md-4">
            <img
                :src="data.image ? data.image : 'https://via.placeholder.com/200' "
            >
        </div>
        <div class="col-12 col-md-8">
            <h4
                v-if="data.title && data.title.length > 0"
                class="text-info"
            >
                {{ data.title }}
            </h4>

            <ul class="list-group list-group-flush border-bottom-secondary">
                <li
                    v-for="variable in data.variables"
                    :key="variable.name"
                    class="list-group-item d-flex justify-content-between pl-0"
                >
                    <div class="font-weight-bold col-8 pl-0">
                        {{ variable.label }}
                    </div>
                    <div class="mr-auto col-4">
                        {{ variable.value }}
                    </div>
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
