<script setup>
import Layout from "../Layout/index.vue";
import { router } from "@inertiajs/vue3";
import Table from "./partial/tables.vue";
import Modal from "./partial/modalRepair.vue";
import { ref } from "vue";

const props = defineProps({
    data: Object,
    asset: Object,
    errors: Object,
    repair: Number,
    total: Number,
    done: Number,
    destroy: Number,
});

const invisibleModal = ref(false);

function toggalModal() {
    return (invisibleModal.value = !invisibleModal.value);
}

const searching = (value) => {
    router.get("/repair", { search: value }, { preserveState: true });
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
                        <h3 class="fw-bold mb-3">Building</h3>
                    </div>
                    <div class="ms-md-auto py-2 py-md-0">
                        <button
                            type="button"
                            @click="toggalModal"
                            class="btn btn-primary btn-round"
                        >
                            Add Repair
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-3">
                        <div class="card card-stats card-round">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-icon">
                                        <div
                                            class="icon-big text-center icon-secondary bubble-shadow-small"
                                        >
                                            <i class="fas fa-database"></i>
                                        </div>
                                    </div>
                                    <div class="col col-stats ms-3 ms-sm-0">
                                        <div class="numbers">
                                            <p class="card-category">
                                                Total Proccess
                                            </p>
                                            <h4 class="card-title">
                                                <!--  -->
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
                                            class="icon-big text-center icon-success bubble-shadow-small"
                                        >
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                    </div>
                                    <div class="col col-stats ms-3 ms-sm-0">
                                        <div class="numbers">
                                            <p class="card-category">Done</p>
                                            <h4 class="card-title">
                                                <!--  -->
                                                {{ props.done }}
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
                                            class="icon-big text-center icon-warning bubble-shadow-small"
                                        >
                                            <i class="fas fa-info-circle"></i>
                                        </div>
                                    </div>
                                    <div class="col col-stats ms-3 ms-sm-0">
                                        <div class="numbers">
                                            <p class="card-category">Repair</p>
                                            <h4 class="card-title">
                                                <!--  -->
                                                {{ props.repair }}
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
                                            class="icon-big text-center icon-danger bubble-shadow-small"
                                        >
                                            <i class="fas fa-times-circle"></i>
                                        </div>
                                    </div>
                                    <div class="col col-stats ms-3 ms-sm-0">
                                        <div class="numbers">
                                            <p class="card-category">Destroy</p>
                                            <h4 class="card-title">
                                                <!--  -->
                                                {{ props.destroy }}
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <Table
                            :data="props.data"
                            @searchTerm="searching"
                        ></Table>
                    </div>
                </div>
            </div>
        </div>
        <Modal
            v-show="invisibleModal"
            @toggle="toggalModal"
            :data="props.asset"
            :errors="props.errors"
        ></Modal>
    </Layout>
</template>
