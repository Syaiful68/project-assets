<script setup>
import Layout from "../Layout/index.vue";
import icon404 from "../../../../public/assets/img/undraw/undraw_page_not_found_su7k.svg";
import icon503 from "../../../../public/assets/img/undraw/undraw_Taken_if77.svg";
import icon500 from "../../../../public/assets/img/undraw/undraw_maintenance_rjtm.svg";
import icon403 from "../../../../public/assets/img/undraw/undraw_firewall_cfej.svg";

import { computed } from "vue";
import { Link } from "@inertiajs/vue3";

const props = defineProps({ status: Number });

const title = computed(() => {
    return {
        503: "Service Unavailable",
        500: "Server Error",
        404: "Page Not Found",
        403: "Forbidden",
    }[props.status];
});

const description = computed(() => {
    return {
        503: "Sorry, we are doing some maintenance. Please check back soon.",
        500: "Whoops, something went wrong on our servers.",
        404: "Sorry, the page you are looking for could not be found.",
        403: "Sorry, you are forbidden from accessing this page.",
    }[props.status];
});
const icon = computed(() => {
    return {
        503: icon503,
        500: icon500,
        404: icon404,
        403: icon403,
    }[props.status];
});
</script>

<template>
    <div class="container d-flex justify-content-center align-items-center">
        <div class="page-inner">
            <div class="d-flex flex-column align-items-center">
                <img :src="icon" width="250" alt="Page Not Found" />
                <h2 class="h1 mt-4 mb-4 fw-bold">{{ title }}</h2>
                <p class="text-center op-7 mb-5 h5">{{ description }}<br /></p>
                <div>
                    <Link href="/asset" class="btn btn-border btn-primary me-3">
                        GO Back
                    </Link>
                    <a href="#" class="btn btn-primary">GO TO HOME PAGE</a>
                </div>
            </div>
        </div>
    </div>
</template>
