<script setup>
import Layout from "../Layout/index.vue";
import { Link, router, usePage } from "@inertiajs/vue3";
import { reactive } from "vue";

const page = usePage();

const props = defineProps({
    vendor: Object,
    errors: Object,
});
const typeArmada = [
    { label: "Car", name: "car" },
    { label: "Blind Van", name: "blindvan" },
    { label: "Truck", name: "truck" },
];
const fuelArmada = [
    { label: "Pertalite", name: "pertalite" },
    { label: "Bio Solar", name: "solar" },
];

const formData = reactive({
    compeny: "",
    plat: null,
    vehicle: null,
    type: "",
    fuels: "",
    rent: null,
    contract: null,
    description: null,
    file: null,
    _token: page.props.csrf_token,
});

const submitArmada = () => {
    router.post("/armada", formData, {
        forceFormData: true,
    });
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
                        <h3 class="fw-bold mb-3">Armada Create</h3>
                    </div>
                    <div class="ms-md-auto py-2 py-md-0">
                        <Link href="/armada" class="btn btn-primary btn-round">
                            Back
                        </Link>
                    </div>
                </div>
                <form @submit.prevent="submitArmada">
                    <div class="row">
                        <div class="col-6 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label"
                                            >Compeny</label
                                        >
                                        <select
                                            class="form-control"
                                            v-model="formData.compeny"
                                            :class="{
                                                'is-invalid': errors.compeny,
                                            }"
                                        >
                                            <option value="">Choise</option>
                                            <option
                                                v-for="(item, index) in vendor"
                                                :key="index"
                                                :value="item.id"
                                            >
                                                {{ item.compeny_name }}
                                            </option>
                                        </select>
                                        <small
                                            v-if="errors.compeny"
                                            class="form-text text-muted"
                                            >{{ errors.compeny }}</small
                                        >
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"
                                            >Plat Number</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control"
                                            v-model="formData.plat"
                                            :class="{
                                                'is-invalid': errors.plat,
                                            }"
                                        />
                                        <small
                                            v-if="errors.plat"
                                            class="form-text text-muted"
                                            >{{ errors.plat }}</small
                                        >
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"
                                            >Vehicle</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control"
                                            v-model="formData.vehicle"
                                            :class="{
                                                'is-invalid': errors.vehicle,
                                            }"
                                        />
                                        <small
                                            v-if="errors.vehicle"
                                            class="form-text text-muted"
                                            >{{ errors.vehicle }}</small
                                        >
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"
                                            >Type Car</label
                                        >
                                        <select
                                            class="form-control"
                                            v-model="formData.type"
                                            :class="{
                                                'is-invalid': errors.type,
                                            }"
                                        >
                                            <option value="">Choise</option>
                                            <option
                                                v-for="(
                                                    item, index
                                                ) in typeArmada"
                                                :key="index"
                                                :value="item.name"
                                            >
                                                {{ item.label }}
                                            </option>
                                        </select>
                                        <small
                                            v-if="errors.type"
                                            class="form-text text-muted"
                                            >{{ errors.type }}</small
                                        >
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"
                                            >Fuels Type</label
                                        >
                                        <select
                                            class="form-control"
                                            v-model="formData.fuels"
                                            :class="{
                                                'is-invalid': errors.fuels,
                                            }"
                                        >
                                            <option value="">Choise</option>
                                            <option
                                                v-for="(
                                                    item, index
                                                ) in fuelArmada"
                                                :key="index"
                                                :value="item.name"
                                            >
                                                {{ item.label }}
                                            </option>
                                        </select>
                                        <small
                                            v-if="errors.fuels"
                                            class="form-text text-muted"
                                            >{{ errors.fuels }}</small
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label">Rent</label>
                                        <input
                                            type="number"
                                            class="form-control"
                                            v-model="formData.rent"
                                            :class="{
                                                'is-invalid': errors.rent,
                                            }"
                                        />
                                        <small
                                            v-if="errors.rent"
                                            class="form-text text-muted"
                                            >{{ errors.rent }}</small
                                        >
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"
                                            >Contract</label
                                        >
                                        <input
                                            type="date"
                                            class="form-control"
                                            v-model="formData.contract"
                                            :class="{
                                                'is-invalid': errors.contract,
                                            }"
                                        />
                                        <small
                                            v-if="errors.contract"
                                            class="form-text text-muted"
                                            >{{ errors.contract }}</small
                                        >
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
                                        />
                                        <small
                                            v-if="errors.description"
                                            class="form-text text-muted"
                                            >{{ errors.description }}</small
                                        >
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">File</label>
                                        <input
                                            type="file"
                                            class="form-control"
                                            @input="
                                                formData.file =
                                                    $event.target.files[0]
                                            "
                                            :class="{
                                                'is-invalid': errors.file,
                                            }"
                                        />
                                        <small
                                            v-if="errors.file"
                                            class="form-text text-muted"
                                            >{{ errors.file }}</small
                                        >
                                    </div>
                                </div>
                                <div class="card-action">
                                    <div class="d-flex justify-content-end">
                                        <button
                                            type="submit"
                                            class="btn btn-primary rounded"
                                        >
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </Layout>
</template>
