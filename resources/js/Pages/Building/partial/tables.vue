<script setup>
import { ref, watch } from "vue";
import { Link } from "@inertiajs/vue3";
import _ from "lodash";
defineProps({
    data: Object,
});

const search = ref("");

const emit = defineEmits(["searchTerm"]);

function unduhFile(file) {
    return (window.location.href = `/download/${file}/building`);
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
                <h4 class="card-title">List Building</h4>
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
                    <th>Owner</th>
                    <th>Contact</th>
                    <th>Office</th>
                    <th>Address</th>
                    <th>Rent</th>
                    <th>Contract Date</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr v-if="data.total === 0">
                    <td colspan="7" class="text-center">Data not found</td>
                </tr>
                <tr v-for="(item, index) in data.data" :key="index">
                    <td>{{ item.owner_name }}</td>
                    <td>+62 {{ item.contact }}</td>
                    <td>{{ item.office.office_name }}</td>
                    <td>{{ item.address }}</td>
                    <td>{{ item.rent }} Year</td>
                    <td>{{ item.contract }}</td>
                    <td>
                        <a
                            :href="'/download/' + item.id + '/building'"
                            class="btn btn-0"
                            >unduh</a
                        >
                        <!-- <button
                            type="button"
                            @click="unduhFile(item.id)"
                            class="btn btn-0"
                        >
                            Unduh
                        </button> -->
                        <Link :href="'/building/' + item.id">Edit</Link>
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
