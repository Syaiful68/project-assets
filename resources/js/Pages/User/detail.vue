<script setup>
import { reactive } from "vue";
import { router, Link } from "@inertiajs/vue3";
import Layout from "../Layout/index.vue";

const props = defineProps({
    errors: Object,
    origin: Object,
    data: Object,
});

const roleUser = [
    { label: "Admin", name: "Admin" },
    { label: "User", name: "User" },
];

const formData = reactive({
    nik: props.data.nik,
    name: props.data.user_name,
    origin: props.data.origin,
    role: props.data.roles,
    user: props.data.user,
    password: null,
});

const updateUser = () => {
    router.post("/user", formData);
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
                        <h3 class="fw-bold mb-3">Detail User</h3>
                    </div>
                    <div class="ms-md-auto py-2 py-md-0">
                        <Link
                            href="/user"
                            class="btn btn-label-info btn-round me-2"
                        >
                            Back
                        </Link>
                    </div>
                </div>
                <form @submit.prevent="updateUser">
                    <div class="row">
                        <div class="col-6 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label">Nik</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            v-model="formData.nik"
                                            :class="{
                                                'is-invalid': errors.nik,
                                            }"
                                            disabled
                                        />
                                        <small
                                            v-if="errors.nik"
                                            class="form-text text-muted"
                                            >{{ errors.nik }}</small
                                        >
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            v-model="formData.name"
                                            :class="{
                                                'is-invalid': errors.name,
                                            }"
                                            disabled
                                        />
                                        <small
                                            v-if="errors.name"
                                            class="form-text text-muted"
                                            >{{ errors.name }}</small
                                        >
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"
                                            >Origins</label
                                        >
                                        <select
                                            class="form-control"
                                            v-model="formData.origin"
                                            :class="{
                                                'is-invalid': errors.origin,
                                            }"
                                        >
                                            <option value="">Choise</option>
                                            <option
                                                v-for="(
                                                    item, index
                                                ) in props.origin"
                                                :key="index"
                                                :value="item.id"
                                            >
                                                {{ item.origin_name }}
                                            </option>
                                        </select>
                                        <small
                                            v-if="errors.origin"
                                            class="form-text text-muted"
                                            >{{ errors.origin }}</small
                                        >
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Roles</label>
                                        <select
                                            class="form-control"
                                            v-model="formData.role"
                                            :class="{
                                                'is-invalid': errors.role,
                                            }"
                                        >
                                            <option value="">Choise</option>
                                            <option
                                                v-for="(
                                                    item, index
                                                ) in roleUser"
                                                :key="index"
                                                :value="item.name"
                                            >
                                                {{ item.label }}
                                            </option>
                                        </select>
                                        <small
                                            v-if="errors.origin"
                                            class="form-text text-muted"
                                            >{{ errors.origin }}</small
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label">User</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            v-model="formData.user"
                                            :class="{
                                                'is-invalid': errors.user,
                                            }"
                                            disabled
                                        />
                                        <small
                                            v-if="errors.user"
                                            class="form-text text-muted"
                                            >{{ errors.user }}</small
                                        >
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"
                                            >Password</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control"
                                            v-model="formData.password"
                                            :class="{
                                                'is-invalid': errors.password,
                                            }"
                                        />
                                        <small
                                            v-if="errors.password"
                                            class="form-text text-muted"
                                            >{{ errors.password }}</small
                                        >
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
