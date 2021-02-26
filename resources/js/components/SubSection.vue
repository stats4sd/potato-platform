<template>
    <div class="d-flex">
        <div class="image col-12 col-lg-6 col-xl-4">
            <img
                src="coverImage"
                width="100%"
            >
        </div>
        <div class="col-12 col-lg-6 col-xl-8">
            <h4 v-if="subTitle">
                {{ subTitle }}
            </h4>

            <ul class="list-group list-group-flush">
                <li
                    v-for="(value, label) in data"
                    :key="label"
                    class="list-group-item d-flex justify-content-between"
                >
                    <div>{{ label }}</div>
                    <div>{{ value }}</div>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            subTitle: {
                type: String,
                default: null,
            },
            data: {
                type: Object,
                default: () => {},
            },
            coverImage: {
                type: String,
                default: '',
            },
        }
    }
</script>
