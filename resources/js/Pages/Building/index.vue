<script setup>
import Layout from "../Layout/index.vue";
import { Link, router } from "@inertiajs/vue3";
import Table from "./partial/tables.vue";

const props = defineProps({
    building: Object,
});

const searching = (value) => {
    router.get("/building", { search: value }, { preserveState: true });
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
                        <Link
                            href="/building/create"
                            class="btn btn-primary btn-round"
                        >
                            Add Building
                        </Link>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <Table
                            :data="props.building"
                            @searchTerm="searching"
                        ></Table>
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>
