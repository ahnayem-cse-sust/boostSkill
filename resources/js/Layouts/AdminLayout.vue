<template>
    <div>
        <Sidebar />
        <Navbar />
        <div class="content">
            <slot />
        </div>
    </div>
</template>

<script setup>
import Navbar from '@/Components/Admin/Navbar.vue';
import Sidebar from '@/Components/Admin/Sidebar.vue';
</script>

