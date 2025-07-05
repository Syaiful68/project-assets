<script setup>
import { reactive } from "vue";
import { router, Link } from "@inertiajs/vue3";
import Layout from "../Layout/index.vue";

const props = defineProps({
    errors: Object,
    compeny: Object,
});

const formData = reactive({
    compeny: props.compeny.compeny_name,
    owner: props.compeny.owner_name,
    contact: props.compeny.contact,
    address: props.compeny.address,
});

const updateCompeny = () => {
    router.put("/compeny/" + props.compeny.id, formData);
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
                        <h3 class="fw-bold mb-3">Create Compeny</h3>
                    </div>
                    <div class="ms-md-auto py-2 py-md-0">
                        <Link
                            href="/compeny"
                            class="btn btn-label-info btn-round me-2"
                        >
                            Back
                        </Link>
                    </div>
                </div>
                <form @submit.prevent="updateCompeny">
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label"
                                            >Compeny</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control"
                                            v-model="formData.compeny"
                                            :class="{
                                                'is-invalid': errors.compeny,
                                            }"
                                        />
                                    </div>
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
                                <div class="card-action">
                                    <div class="d-flex justify-content-end">
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
                    </div>
                </form>
            </div>
        </div>
    </Layout>
</template>
