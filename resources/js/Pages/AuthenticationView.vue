<script setup>
import { reactive, ref } from "vue";
import { router, usePage } from "@inertiajs/vue3";

const page = usePage();

const props = defineProps({
    errors: Object,
});
const formData = reactive({
    user: null,
    password: null,
    _token: page.props.csrf_token,
});

const showPass = ref(true);

function togglePass() {
    return (showPass.value = !showPass.value);
}

const submitLogin = () => {
    router.post("/signin", formData);
};
</script>

<template>
    <div class="wrapper wrapper-login">
        <div class="container container-login animated fadeIn">
            <h3 class="text-center">Sign In</h3>
            <div class="login-form">
                <div
                    class="alert alert-danger"
                    role="alert"
                    v-if="props.errors.msg"
                >
                    {{ props.errors.msg }}
                </div>
                <form @submit.prevent="submitLogin">
                    <div class="form-sub">
                        <div class="form-floating form-floating-custom mb-3">
                            <input
                                id="username"
                                name="username"
                                type="text"
                                class="form-control"
                                placeholder="username"
                                v-model="formData.user"
                                :class="{ 'is-invalid': props.errors.user }"
                            />
                            <label for="username">Username</label>
                            <small
                                v-if="props.errors.user"
                                class="form-text text-muted"
                                >{{ props.errors.user }}</small
                            >
                        </div>
                        <div class="form-floating form-floating-custom mb-3">
                            <input
                                type="password"
                                class="form-control"
                                placeholder="password"
                                v-model="formData.password"
                                :class="{ 'is-invalid': props.errors.password }"
                            />
                            <label for="password">Password</label>
                            <div class="show-password">
                                <i class="icon-eye" @click="togglePass"></i>
                            </div>
                            <small
                                v-if="props.errors.password"
                                class="form-text text-muted"
                                >{{ props.errors.password }}</small
                            >
                        </div>
                    </div>
                    <div class="form-action mb-3">
                        <button type="submit" class="btn btn-primary">
                            Sign In
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
