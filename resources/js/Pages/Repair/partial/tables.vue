<script setup>
import { ref, watch } from "vue";
import { Link } from "@inertiajs/vue3";
import dayjs from "dayjs";
import "dayjs/locale/id";

import _ from "lodash";
defineProps({
    data: Object,
});

function timeFormat(timestamp) {
    return dayjs(timestamp).format("DD/MM/YYYY, HH:mm");
}

const search = ref("");

const emit = defineEmits(["searchTerm"]);

watch(
    search,
    _.debounce((value) => {
        emit("searchTerm", value);
    }, 1000)
);
</script>

<template>
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h4 class="card-title">Repair Asset</h4>
                <div class="form-group ms-auto">
                    <div class="input-icon">
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Search for..."
                            v-model="search"
                        />
                        <span class="input-icon-addon">
                            <i class="fa fa-search"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Tags Asset</th>
                    <th>Status</th>
                    <th>Do Date</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr v-if="data.total === 0">
                    <td colspan="6" class="text-center">Data not found</td>
                </tr>
                <tr v-for="(item, index) in data.data" :key="index">
                    <td>{{ item.repair_asset }}</td>
                    <td>{{ item.asset.asset_name }}</td>

                    <td>
                        <span
                            v-if="item.status === 'done'"
                            class="badge badge-success"
                            >Done</span
                        >
                        <span
                            v-if="item.status === 'repair'"
                            class="badge badge-warning"
                            >Repair</span
                        >
                        <span
                            v-if="item.status === 'destroy'"
                            class="badge badge-danger"
                            >Destroy</span
                        >
                        <!-- {{ item.status }} -->
                    </td>
                    <td>{{ timeFormat(item.created_at) }}</td>
                    <td>
                        <Link :href="'/repair/' + item.repair_asset">Edit</Link>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="card-body">
            <div class="d-flex justify-content-end">
                <ul class="pagination pg-primary">
                    <li
                        class="page-item"
                        :class="{ active: item.active }"
                        v-for="(item, index) in data.links"
                        :key="index"
                    >
                        <!--  -->
                        <a
                            :href="item.url"
                            class="page-link"
                            v-html="item.label"
                        ></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>
