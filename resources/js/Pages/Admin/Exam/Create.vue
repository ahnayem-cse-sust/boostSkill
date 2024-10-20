<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import InputError from '@/Components/Common/InputError.vue';

const form = useForm({
    title: "",
    course_id: "",
    date_time: "",
    duration: ""
});

const save = () => {
    form.post(route("admin.exam.store"), {
        onFinish: () => form.reset(),
    });
};

</script>

<template>
    <Head title="Exam" />

    <AdminLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Create Online Exam</h2>
        </template>

        <h2>Create Online Exam</h2>

        <form class="row g-3" @submit.prevent="save">
            <div class="col-md-12">
                <label for="title" class="form-label">Class Title</label>
                <input v-model="form.title" type="text" class="form-control" id="title">
                <InputError class="mt-2" :message="form.errors.title" />
            </div>
            <div class="col-md-6">
                <label for="course_id" class="form-label">Course Name</label>
                <input v-model="form.course_id" type="text" class="form-control" id="course_id">
                <InputError class="mt-2" :message="form.errors.course_id" />
            </div>
            <div class="col-md-6">
                <label for="date_time" class="form-label">Date</label>
                <input v-model="form.date_time" type="text" class="form-control" id="date_time">
                <InputError class="mt-2" :message="form.errors.date_time" />
            </div>
            <div class="col-md-6">
                <label for="duration" class="form-label">Duration</label>
                <input v-model="form.duration" type="text" class="form-control" id="duration">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </AdminLayout>
</template>