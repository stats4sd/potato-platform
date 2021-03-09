<template>
    <div class="d-flex flex-wrap my-4">
        <div class="image col-12 col-md-4">
            <!-- Square CSS from https://stackoverflow.com/a/6615994 -->
            <div
                v-if="coverImage"
                class="sq-outer"
            >
                <div class="sq-dummy" />
                <div class="sq">
                    <a
                        :href="'storage/'+coverImage"
                        target="_blank"
                        class="d-block w-100 h-100 pr-3"
                    >
                        <img
                            class="image-sq"
                            :src="'storage/'+coverImage"
                        >
                    </a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-8">
            <h4
                v-if="title && title.length > 0"
                class="text-info"
            >
                {{ title }}
            </h4>

            <ul class="list-group list-group-flush border-bottom-secondary">
                <li
                    v-for="variable in variables"
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
    </div>
</template>

<script>
    export default {
        props: {
            variables: {
                type: Array,
                default: () => {},
            },
            coverImage: {
                type: String,
                default: null,
            },
            title: {
                type: String,
                default: null,
            },
        }
    }
</script>
