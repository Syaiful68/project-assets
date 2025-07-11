<script setup>
import { ref, watch } from "vue";
import dayjs from "dayjs";
import "dayjs/locale/id";
import { Link, router } from "@inertiajs/vue3";
import _ from "lodash";
defineProps({
    data: Object,
});

const search = ref("");

const emit = defineEmits(["searchTerm"]);

function timeFormat(timestamp) {
    return dayjs(timestamp).format("DD/MM/YYYY, HH:mm");
}
function unduhFile(file) {
    return (window.location.href = `/download/${file}/armada`);
}

function editArmada(id) {
    return router.get("/armada/" + id);
}

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
                <h4 class="card-title">List Armada</h4>
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
                    <th>Plat Number</th>
                    <th>Compeny</th>
                    <th>Vehicle</th>
                    <th>Rent</th>
                    <th>Do Date</th>
                    <th>Document</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr v-if="data.total === 0">
                    <td colspan="6" class="text-center">Data not found</td>
                </tr>
                <tr v-for="(item, index) in data.data" :key="index">
                    <td>{{ item.plat_number }}</td>
                    <td>{{ item.vendor.compeny_name }}</td>
                    <td>{{ item.vehicle }}</td>
                    <td>{{ item.rent }} Year</td>
                    <td>
                        {{ timeFormat(item.created_at) }}
                        <!-- {{ item.created_at }} -->
                    </td>
                    <td>
                        <button
                            type="button"
                            @click="unduhFile(item.slug)"
                            class="btn btn-link"
                        >
                            {{ item.file_name }}
                        </button>
                    </td>
                    <td>
                        <button
                            type="button"
                            @click="editArmada(item.slug)"
                            class="btn btn-sm btn-info btn-icon"
                        >
                            <i class="fas fa-info"></i>
                        </button>
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
