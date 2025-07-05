<script setup>
import { ref } from "vue";
import Sidebar from "./sidenav.vue";
import Appbar from "./appbar.vue";
import { Link } from "@inertiajs/vue3";

const sidebar = ref(false);

function toggleSidebar() {
    return (sidebar.value = !sidebar.value);
}
</script>

<template>
    <div class="wrapper" :class="{ sidebar_minimize: sidebar === true }">
        <Sidebar @toggle="toggleSidebar"> </Sidebar>

        <div class="main-panel">
            <div class="main-header">
                <div class="main-header-logo">
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
                            <!-- <input type="checkbox" class="btn btn-toggle toggle sidebar"> -->
                            <button class="btn btn-toggle toggle-sidebar">
                                <i class="gg-menu-right"></i>
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
                <!-- Navbar Header -->
                <Appbar></Appbar>
                <!-- End Navbar -->
            </div>

            <slot></slot>
        </div>
    </div>
</template>
