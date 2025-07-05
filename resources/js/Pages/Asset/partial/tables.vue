<script setup>
import { ref, watch } from "vue";
import { Link } from "@inertiajs/vue3";
import _ from "lodash";
defineProps({
    data: Object,
});

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
                <h4 class="card-title">List Asset</h4>
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
                    <th>TAGS</th>
                    <th>Item</th>
                    <th>Type</th>
                    <th>Condition</th>
                    <th>Location</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr v-if="data.total === 0">
                    <td colspan="6" class="text-center">Data not found</td>
                </tr>
                <tr v-for="(item, index) in data.data" :key="index">
                    <td>{{ item.asset_code }}</td>
                    <td>{{ item.asset_name }}</td>
                    <td>{{ item.type }}</td>
                    <td>
                        <span
                            v-if="item.condition === 'good'"
                            class="badge badge-success"
                            >Good</span
                        >
                        <span
                            v-if="item.condition === 'repair'"
                            class="badge badge-warning"
                            >Repair</span
                        >
                        <span
                            v-if="item.condition === 'destroy'"
                            class="badge badge-danger"
                            >Destroy</span
                        >
                    </td>
                    <td>{{ item.office.office_name }}</td>
                    <td>
                        <Link :href="'/asset/' + item.asset_code">Edit</Link>
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
