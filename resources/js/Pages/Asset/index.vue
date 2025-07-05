<script setup>
import Layout from "../Layout/index.vue";
import Tables from "./partial/tables.vue";
import { Link, router } from "@inertiajs/vue3";

const props = defineProps({
    asset: Object,
    total: Number,
    electronic: Number,
    machine: Number,
    furnitur: Number,
});

const searching = (value) => {
    router.get("/asset", { search: value }, { preserveState: true });
};
</script>

<template>
    <Layout>
        <div class="container">
            <div class="page-inner">
                <div
                    class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
                >
                    <div>
                        <h3 class="fw-bold mb-3">Asset</h3>
                    </div>
                    <div class="ms-md-auto py-2 py-md-0">
                        <Link
                            href="/asset/create"
                            class="btn btn-primary btn-round"
                        >
                            Add New Asset
                        </Link>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-3">
                        <div class="card card-stats card-round">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-icon">
                                        <div
                                            class="icon-big text-center icon-primary bubble-shadow-small"
                                        >
                                            <i class="fas fa-database"></i>
                                        </div>
                                    </div>
                                    <div class="col col-stats ms-3 ms-sm-0">
                                        <div class="numbers">
                                            <p class="card-category">
                                                Total Asset
                                            </p>
                                            <h4 class="card-title">
                                                {{ props.total }}
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="card card-stats card-round">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-icon">
                                        <div
                                            class="icon-big text-center icon-info bubble-shadow-small"
                                        >
                                            <i class="fas fa-laptop"></i>
                                        </div>
                                    </div>
                                    <div class="col col-stats ms-3 ms-sm-0">
                                        <div class="numbers">
                                            <p class="card-category">
                                                Electronic
                                            </p>
                                            <h4 class="card-title">
                                                {{ props.electronic }}
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="card card-stats card-round">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-icon">
                                        <div
                                            class="icon-big text-center icon-success bubble-shadow-small"
                                        >
                                            <i class="fas fa-couch"></i>
                                        </div>
                                    </div>
                                    <div class="col col-stats ms-3 ms-sm-0">
                                        <div class="numbers">
                                            <p class="card-category">
                                                Furnitur
                                            </p>
                                            <h4 class="card-title">
                                                {{ props.furnitur }}
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="card card-stats card-round">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-icon">
                                        <div
                                            class="icon-big text-center icon-secondary bubble-shadow-small"
                                        >
                                            <i class="fas fa-car-battery"></i>
                                        </div>
                                    </div>
                                    <div class="col col-stats ms-3 ms-sm-0">
                                        <div class="numbers">
                                            <p class="card-category">Machine</p>
                                            <h4 class="card-title">
                                                {{ props.machine }}
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-12">
                        <Tables
                            :data="props.asset"
                            @searchTerm="searching"
                        ></Tables>
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>
