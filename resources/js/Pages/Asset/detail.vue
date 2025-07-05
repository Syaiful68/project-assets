<script setup>
import Layout from "../Layout/index.vue";
import Tables from "./partial/tableRepair.vue";
import { Link, router } from "@inertiajs/vue3";
import { reactive } from "vue";

const props = defineProps({
    office: Object,
    asset: Object,
    errors: Object,
    repair: Object,
});
const typeAsset = [
    { label: "Electronic", name: "electronic" },
    { label: "Machine", name: "machine" },
    { label: "Furnitur", name: "furnitur" },
];

const formData = reactive({
    sn: props.asset.sn,
    item: props.asset.asset_name,
    type: props.asset.type,
    office: props.asset.location,
    pic: props.asset.pic,
    description: props.asset.description,
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
                        <h3 class="fw-bold mb-3">
                            Asset - {{ props.asset.asset_code }}
                        </h3>
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
                                            disabled
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
                                            disabled
                                        />
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
                                            disabled
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
                <div class="row">
                    <div class="col-12 col-md-12">
                        <Tables :data="repair"></Tables>
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>
