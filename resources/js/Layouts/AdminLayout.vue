<template>
    <div class="container-fluid">
        <!-- <div class="row">
                <Navbar />
        </div> -->
        <div class="row">
            <main>
                <Sidebar @clicked-hide-sidebar="sidebarHide" />
                <div class="main-content" :class="{'low-margin': state.isActiveSidebar}">
                    <Navbar />
                    <div class="container">
                        <slot />
                    </div>
                </div>
            </main>
        </div>
    </div>
</template>

<script setup>
import Navbar from '@/Components/Admin/Navbar.vue';
import Sidebar from '@/Components/Admin/Sidebar.vue';
import { reactive } from 'vue';

const state = reactive({ isActiveSidebar: false });

function sidebarHide(){
    state.isActiveSidebar=!state.isActiveSidebar
}
</script>

<style scoped>
.main-content{
    margin-left: 280px;
    position: fixed;
    top: 0px;
    right: 0px;
    width: -webkit-fill-available;
    transition: 0.5s;
}
.low-margin{
    margin-left: 83px;
}
</style>
