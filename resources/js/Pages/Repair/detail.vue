<script setup>
import { reactive } from "vue";
import { router, Link, useForm } from "@inertiajs/vue3";
import Layout from "../Layout/index.vue";

const props = defineProps({
    errors: Object,
    asset: Object,
    repair: Object,
});

const typeRepair = [
    { label: "Done", name: "done" },
    { label: "Repair", name: "repair" },
    { label: "Destroy", name: "destroy" },
];

const formData = useForm({
    asset: props.repair.asset_id,
    description: props.repair.description,
    status: props.repair.status,
    _method: "put",
});

const updateRepair = () => {
    formData.post("/building/" + props.building.id);
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
                        <h3 class="fw-bold mb-3">
                            Repair {{ props.repair.repair_asset }}
                        </h3>
                    </div>
                    <div class="ms-md-auto py-2 py-md-0">
                        <Link
                            href="/repair"
                            class="btn btn-label-info btn-round me-2"
                        >
                            Back
                        </Link>
                    </div>
                </div>
                <form @submit.prevent="updateRepair">
                    <div class="row">
                        <div class="col-6 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label">Asset</label>
                                        <select
                                            v-model="formData.asset"
                                            class="form-control"
                                            disabled
                                        >
                                            <option value="">Choise</option>
                                            <option
                                                v-for="(item, index) in asset"
                                                :value="item.id"
                                            >
                                                {{ item.asset_code }} -
                                                {{ item.asset_name }}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"
                                            >Description</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control"
                                            v-model="formData.description"
                                            :class="{
                                                'is-invalid':
                                                    errors.description,
                                            }"
                                            disabled
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label"
                                            >Handler</label
                                        >
                                        <input
                                            type="number"
                                            class="form-control"
                                            v-model="formData.handler"
                                            :class="{
                                                'is-invalid': errors.handler,
                                            }"
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Status</label>
                                        <select
                                            v-model="formData.status"
                                            class="form-control"
                                            :class="{
                                                'is-invalid': errors.status,
                                            }"
                                        >
                                            <option value="">Choise</option>
                                            <option
                                                v-for="(
                                                    item, index
                                                ) in typeRepair"
                                                :key="index"
                                                :value="item.name"
                                            >
                                                {{ item.label }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="card-action">
                                    <button
                                        type="submit"
                                        class="btn btn-primary"
                                    >
                                        save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </Layout>
</template>
