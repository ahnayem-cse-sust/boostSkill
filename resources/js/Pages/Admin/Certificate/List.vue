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
    <Head title="Certificate" />

    <AdminLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Certificate List</h2>
        </template>

        <h2>All Certificate</h2>

        <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Course Type</th>
            <th scope="col">Instructor Name</th>
            <th scope="col">Price</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(d, index) in data" :key="index">
            <th scope="row">{{ index+1 }}</th>
            <td>{{ d.title }}</td>
            <td>{{ d.course_type }}</td>
            <td>{{ d.teacher_id }}</td>
            <td>{{ d.price }}</td> 
            <td>
                <a :href="route('admin.certificate.details',d.id)">details</a>
                <a :href="route('admin.certificate.edit',d.id)">edit</a>
            </td> 
            </tr>
        </tbody>
        </table>

        
    </AdminLayout>
</template>