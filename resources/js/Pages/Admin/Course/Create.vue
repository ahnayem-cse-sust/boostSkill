<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import InputError from '@/Components/Common/InputError.vue';

const form = useForm({
    title: "",
    course_category_id: "",
    course_type: "",
    course_level: "",
    teacher_id: "",
    total_hours: "",
    details: "",
    status: "",
    price: "",
    discount_price: "",
});

const save = () => {
    form.post(route("admin.course.store"), {
        onFinish: () => form.reset(),
    });
};

</script>

<template>
    <Head title="Course" />

    <AdminLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Create Course</h2>
        </template>

        <h2>Create New Course</h2>

        <form class="row g-3" @submit.prevent="save">
            <div class="col-md-12">
                <label for="title" class="form-label">Course Title</label>
                <input v-model="form.title" type="text" class="form-control" id="title">
                <InputError class="mt-2" :message="form.errors.title" />
            </div>
            <div class="col-md-6">
                <label for="course_category" class="form-label">Course Category</label>
                <input v-model="form.course_category_id" type="text" class="form-control" id="course_category">
                <InputError class="mt-2" :message="form.errors.course_category_id" />
            </div>
            <div class="col-md-6">
                <label for="course_type" class="form-label">Course Type</label>
                <input v-model="form.course_type" type="text" class="form-control" id="course_type">
                <InputError class="mt-2" :message="form.errors.course_type" />
            </div>
            <div class="col-md-6">
                <label for="course_level" class="form-label">Course Level</label>
                <input v-model="form.course_level" type="text" class="form-control" id="course_level">
            </div>
            <div class="col-md-6">
                <label for="teacher_id" class="form-label">Instructor</label>
                <input v-model="form.teacher_id" type="text" class="form-control" id="teacher_id">
            </div>
            <div class="col-md-6">
                <label for="total_hours" class="form-label">Total Hours</label>
                <input v-model="form.total_hours" type="text" class="form-control" id="total_hours">
            </div>
            <div class="col-md-6">
                <label for="course_type" class="form-label">Course Type</label>
                <input v-model="form.course_type" type="text" class="form-control" id="course_type">
            </div>
            <div class="col-md-6">
                <label for="course_type" class="form-label">Course Type</label>
                <input v-model="form.course_type" type="text" class="form-control" id="course_type">
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </AdminLayout>
</template>