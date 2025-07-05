<script setup>
import ListMenu from "../../../components/listMenu.vue";
import { usePage, Link } from "@inertiajs/vue3";
import { computed } from "vue";

const page = usePage();

const listMenu = [
    {
        label: "Dashboard",
        path: "/dashboard",
        icons: "fas fa-home",
        allowed: ["Admin"],
    },
    {
        label: "Building",
        path: "/building",
        icons: "fas fa-building",
        allowed: ["Admin", "User"],
    },
    {
        label: "Asset",
        path: "/asset",
        icons: "fas fa-database",
        allowed: ["Admin", "User"],
    },
    {
        label: "Repair",
        path: "/repair",
        icons: "fas fa-wrench",
        allowed: ["Admin", "User"],
    },
    {
        label: "Armada",
        path: "/armada",
        icons: "fas fa-truck",
        allowed: ["Admin", "User"],
    },
    {
        label: "Vendors",
        path: "/compeny",
        icons: "fas fa-hands-helping",
        allowed: ["Admin", "User"],
    },
    {
        label: "Report",
        path: "/export",
        icons: "fas fa-clipboard-check",
        allowed: ["Admin", "User"],
    },
    {
        label: "User",
        path: "/user",
        icons: "fas fa-users",
        allowed: ["Admin"],
    },
];

const menus = computed(() => {
    return listMenu.filter((item) => {
        return item.allowed.includes(page.props.auth.user.roles);
    });
});
</script>

<template>
    <!-- Sidebar -->
    <div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="dark">
                <Link href="/asset" class="logo">
                    <img
                        src="../../../../public/assets/img/kaiadmin/logo_light.svg"
                        alt="navbar brand"
                        class="navbar-brand"
                        height="20"
                    />
                </Link>
                <div class="nav-toggle">
                    <button
                        class="btn btn-toggle toggle-sidebar"
                        @click="$emit('toggle')"
                    >
                        <i class="gg-menu-right" @click="$emit('toggle')"></i>
                    </button>
                    <button class="btn btn-toggle sidenav-toggler">
                        <i class="gg-menu-left"></i>
                    </button>
                </div>
                <button class="topbar-toggler more">
                    <i class="gg-more-vertical-alt"></i>
                </button>
            </div>
            <!-- End Logo Header -->
        </div>
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
            <div class="sidebar-content">
                <ul class="nav nav-secondary">
                    <ListMenu
                        v-for="(menu, index) in menus"
                        :key="index"
                        :label="menu.label"
                        :path="menu.path"
                        :icon="menu.icons"
                    ></ListMenu>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Sidebar -->
</template>
