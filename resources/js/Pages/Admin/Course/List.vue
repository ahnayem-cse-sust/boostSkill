<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    courses: {
        type: Array,
    },
});


</script>

<template>
    <Head title="Courses" />

    <AdminLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Create Course</h2>
        </template>

        <h2>All Courses</h2>

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
            <tr v-for="(course, index) in courses" :key="index">
            <th scope="row">{{ index+1 }}</th>
            <td>{{ course.title }}</td>
            <td>{{ course.course_type }}</td>
            <td>{{ course.teacher_id }}</td>
            <td>{{ course.price }}</td> 
            <td>
                <a :href="route('admin.course.details',course.id)">details</a>
                <a :href="route('admin.course.edit',course.id)">edit</a>
            </td> 
            </tr>
        </tbody>
        </table>

        
    </AdminLayout>
</template>