<script setup>
import Layout from "../Layout/index.vue";
import { Link, router, usePage } from "@inertiajs/vue3";
import { reactive } from "vue";

const page = usePage();

const props = defineProps({
    office: Object,
    errors: Object,
});
const typeAsset = [
    { label: "Electronic", name: "electronic" },
    { label: "Machine", name: "machine" },
    { label: "Furnitur", name: "furnitur" },
];

const formData = reactive({
    sn: null,
    item: null,
    type: "",
    office: "",
    pic: null,
    description: null,
    _token: page.props.csrf_token,
});

const submitAsset = () => {
    router.post("/asset", formData, {
        onSuccess: () => {
            router.get("/asset");
        },
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
                        <h3 class="fw-bold mb-3">Asset</h3>
                    </div>
                    <div class="ms-md-auto py-2 py-md-0">
                        <Link href="/asset" class="btn btn-primary btn-round">
                            Back
                        </Link>
                    </div>
                </div>
                <form @submit.prevent="submitAsset">
                    <div class="row">
                        <div class="col-6 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="" class="form-label"
                                            >SN</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control"
                                            v-model="formData.sn"
                                            :class="{ 'is-invalid': errors.sn }"
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label"
                                            >Item</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control"
                                            v-model="formData.item"
                                            :class="{
                                                'is-invalid': errors.item,
                                            }"
                                        />
                                        <small
                                            v-if="errors.item"
                                            class="form-text text-muted"
                                            >{{ errors.item }}</small
                                        >
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label"
                                            >Type</label
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
                                                ) in typeAsset"
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
                                        <label for="" class="form-label"
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
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="" class="form-label"
                                            >PIC</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control"
                                            v-model="formData.pic"
                                            :class="{
                                                'is-invalid': errors.pic,
                                            }"
                                        />
                                        <small
                                            v-if="errors.pic"
                                            class="form-text text-muted"
                                            >{{ errors.pic }}</small
                                        >
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label"
                                            >For Office</label
                                        >
                                        <select
                                            class="form-control"
                                            :class="{
                                                'is-invalid': errors.office,
                                            }"
                                            v-model="formData.office"
                                        >
                                            <option value="">Choise</option>
                                            <option
                                                v-for="(
                                                    item, index
                                                ) in props.office"
                                                :key="index"
                                                :value="item.id"
                                            >
                                                {{ item.office_name }}
                                            </option>
                                        </select>
                                        <small
                                            v-if="errors.office"
                                            class="form-text text-muted"
                                            >{{ errors.office }}</small
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
