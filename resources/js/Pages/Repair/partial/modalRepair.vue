<script setup>
import { reactive } from "vue";
import { router, usePage } from "@inertiajs/vue3";

const page = usePage();
defineProps({
    data: Object,
    errors: Object,
});

const formData = reactive({
    asset: "",
    description: null,
    _token: page.props.csrf_token,
});

const submitRepair = () => {
    router.post("/repair", formData);
};
</script>

<template>
    <div
        class="modal"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New Repair</h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                        @click="$emit('toggle')"
                    ></button>
                </div>
                <form @submit.prevent="submitRepair">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Asset</label>
                            <select
                                v-model="formData.asset"
                                class="form-control"
                                :class="{ 'is-invalid': errors.asset }"
                            >
                                <option value="">Choise</option>
                                <option
                                    v-for="(item, index) in data"
                                    :key="index"
                                    :value="item.id"
                                >
                                    {{ item.asset_code }} -
                                    {{ item.asset_name }}
                                </option>
                            </select>
                            <small
                                v-if="errors.asset"
                                class="form-text text-muted"
                                >{{ errors.asset }}</small
                            >
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">
                                Description
                            </label>
                            <input
                                type="text"
                                v-model="formData.description"
                                class="form-control"
                                :class="{ 'is-invalid': errors.description }"
                            />
                            <small
                                v-if="errors.description"
                                class="form-text text-muted"
                                >{{ errors.description }}</small
                            >
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal"
                            @click="$emit('toggle')"
                        >
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<style scoped>
.modal {
    display: block;
}
</style>
