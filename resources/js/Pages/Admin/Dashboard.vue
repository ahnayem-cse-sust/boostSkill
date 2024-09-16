<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard" />

    <AdminLayout>
        <template #header>
            <!-- <h2 class="">Admin Dashboard</h2> -->
        </template>

        <div class="">You're logged in!</div>
                
    </AdminLayout>
</template>
