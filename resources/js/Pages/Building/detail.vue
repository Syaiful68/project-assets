<script setup>
import { reactive } from "vue";
import { router, Link, useForm } from "@inertiajs/vue3";
import Layout from "../Layout/index.vue";

const props = defineProps({
    errors: Object,
    location: Object,
    building: Object,
});

const formData = useForm({
    owner: props.building.owner_name,
    contact: props.building.contact,
    address: props.building.address,
    rent: props.building.rent,
    contract: props.building.contract,
    office: props.building.office_id,
    file: null,
    _method: "put",
});

const updateBuilding = () => {
    formData.post("/building/" + props.building.id, {
        onSuccess: () => {
            router.get("/building");
        },
    });
    // router.put(`/building/${props.building.id}`, formData, {
    //     forceFormData: true,
    // });
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
                        <h3 class="fw-bold mb-3">Add New Building</h3>
                    </div>
                    <div class="ms-md-auto py-2 py-md-0">
                        <Link
                            href="/building"
                            class="btn btn-label-info btn-round me-2"
                        >
                            Back
                        </Link>
                    </div>
                </div>
                <form @submit.prevent="updateBuilding">
                    <div class="row">
                        <div class="col-6 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label">Owner</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            v-model="formData.owner"
                                            :class="{
                                                'is-invalid': errors.owner,
                                            }"
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"
                                            >Contact</label
                                        >
                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <span
                                                    class="input-group-text"
                                                    id="basic-addon1"
                                                    >+62</span
                                                >
                                                <input
                                                    type="number"
                                                    min="0"
                                                    class="form-control"
                                                    v-model="formData.contact"
                                                    :class="{
                                                        'is-invalid':
                                                            errors.contact,
                                                    }"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"
                                            >Address</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control"
                                            v-model="formData.address"
                                            :class="{
                                                'is-invalid': errors.address,
                                            }"
                                        />
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
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Office</label>
                                        <select
                                            class="form-control"
                                            v-model="formData.office"
                                            :class="{
                                                'is-invalid': errors.office,
                                            }"
                                        >
                                            <option value="">Choise</option>
                                            <option
                                                v-for="(
                                                    item, index
                                                ) in props.location"
                                                :key="index"
                                                :value="item.id"
                                            >
                                                {{ item.office_name }}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"
                                            >File Contract</label
                                        >
                                        <input
                                            type="file"
                                            class="form-control"
                                            @input="
                                                formData.file =
                                                    $event.target.files[0]
                                            "
                                            :class="{
                                                'is-invalid': errors.contract,
                                            }"
                                        />
                                    </div>
                                </div>
                                <div class="card-action">
                                    <button
                                        type="submit"
                                        class="btn btn-primary"
                                    >
                                        Submit
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
