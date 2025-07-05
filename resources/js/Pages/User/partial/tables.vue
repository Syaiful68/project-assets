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
                <h4 class="card-title">List User</h4>
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
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>User</th>
                    <th>Origin</th>
                    <th>Roles</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr v-if="data.total === 0">
                    <td colspan="5" class="text-center">Data not found</td>
                </tr>
                <tr v-for="(item, index) in data.data" :key="index">
                    <td>{{ item.user_name }}</td>
                    <td>{{ item.user }}</td>
                    <td>{{ item.origin.origin_name }}</td>
                    <td>{{ item.roles }}</td>
                    <td>
                        <Link :href="'/user/' + item.user">Edit</Link>
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
