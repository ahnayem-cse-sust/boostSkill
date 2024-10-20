<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    data: {
        type: Array,
    },
});


</script>

<template>
    <Head title="Courses" />

    <AdminLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Exam List</h2>
        </template>

        <h2>All Exams</h2>

        <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Date</th>
            <th scope="col">Duration</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(d, index) in data" :key="index">
            <th scope="row">{{ index+1 }}</th>
            <td>{{ d.title }}</td>
            <td>{{ d.date_time }}</td>
            <td>{{ d.duration }}</td> 
            <td>
                <a :href="route('admin.exam.details',d.id)">details</a>
                <a :href="route('admin.exam.edit',d.id)">edit</a>
            </td> 
            </tr>
        </tbody>
        </table>

        
    </AdminLayout>
</template>