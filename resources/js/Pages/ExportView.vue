<script setup>
import Layout from "./Layout/index.vue";
import { ref } from "vue";

const props = defineProps({
    repair: Object,
    asset: Object,
    errors: Object,
});

const dataExport = [
    { label: "Repair", name: "repair" },
    { label: "Asset", name: "asset" },
];

const from = ref("");
const to = ref("");
const dataType = ref("");

function downloaded() {
    return (window.location.href = `/export/data?from=${from.value}&to=${to.value}&type=${dataType.value}`);
    // console.log(to.value, from.value, dataType.value);
}
</script>

<template>
    <Layout>
        <div class="container">
            <div class="page-inner">
                <div
                    class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
                >
                    <div>
                        <h3 class="fw-bold mb-3">Export Data</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="card card-body">
                            <div class="row">
                                <div class="col-5">
                                    <label for="" class="form-label"
                                        >From</label
                                    >
                                    <input
                                        type="date"
                                        v-model="from"
                                        class="form-control"
                                    />
                                </div>
                                <div class="col-5">
                                    <label for="" class="form-label">To</label>
                                    <input
                                        type="date"
                                        v-model="to"
                                        class="form-control"
                                    />
                                </div>
                                <div class="col-2">
                                    <label for="" class="form-label"
                                        >Data</label
                                    >
                                    <select
                                        v-model="dataType"
                                        class="form-control"
                                    >
                                        <option value="">Choise</option>
                                        <option
                                            v-for="(item, index) in dataExport"
                                            :key="index"
                                            :value="item.name"
                                        >
                                            {{ item.label }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex justify-content-end">
                                        <button
                                            @click="downloaded()"
                                            type="button"
                                            class="btn btn-primary mt-3"
                                        >
                                            submit
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>
