<script setup>
import { Link, usePage } from "@inertiajs/vue3";
import { computed } from "vue";

const page = usePage();
const user = computed(() => page.props.auth.user);

defineProps({
    label: String,
    path: String,
    icon: String,
    allowed: Array,
});
</script>

<template>
    <li class="nav-item" :class="{ active: $page.url.startsWith(path) }">
        <Link :href="path" class="collapsed">
            <i :class="icon"></i>
            <p>{{ label }}</p>
        </Link>
    </li>
</template>
