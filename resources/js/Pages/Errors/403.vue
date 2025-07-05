<script setup>
import Layout from "../Layout/index.vue";
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <Layout>
        <div class="container d-flex justify-content-center align-items-center">
            <div class="page-inner">
                <div class="d-flex flex-column align-items-center">
                    <img
                        src="../../../../public/assets/img/undraw/undraw_not_found_60pq.svg"
                        width="250"
                        alt="Page Not Found"
                    />
                    <h2 class="h1 mt-4 mb-4 fw-bold">Sorry! page not found.</h2>
                    <p class="text-center op-7 mb-5 h5">
                        Website is Under Construction. Check back later!<br />
                    </p>
                    <div>
                        <Link
                            href="/asset"
                            class="btn btn-border btn-primary me-3"
                        >
                            Go Back
                        </Link>
                        <a href="#" class="btn btn-primary">GO TO HOME PAGE</a>
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>
