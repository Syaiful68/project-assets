<script setup>
defineProps({
    data: Object,
});
</script>

<template>
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h4 class="card-title">Repair Asset</h4>
            </div>
        </div>
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Description</th>
                    <th>Handler</th>
                    <th>Status</th>
                    <th>Do Date</th>
                </tr>
            </thead>
            <tbody>
                <tr v-if="data.total === 0">
                    <td colspan="6" class="text-center">Data not found</td>
                </tr>
                <tr v-for="(item, index) in data" :key="index">
                    <td>{{ item.repair_asset }}</td>
                    <td>{{ item.description }}</td>
                    <td>{{ item.handler }}</td>
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
                    <td>{{ item.created_at }}</td>
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
