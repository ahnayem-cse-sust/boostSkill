<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head,useForm } from '@inertiajs/vue3';
import { onMounted } from 'vue';
import InputError from '@/Components/Common/InputError.vue';

const props = defineProps({
    course: {
        type: Array,
    },
});

const form = useForm({
    title: props.course[0].title,
    course_category_id: props.course[0].course_category_id,
    course_type: props.course[0].course_type,
    course_level: props.course[0].course_level,
    teacher_id: props.course[0].teacher_id,
    total_hours: props.course[0].total_hours,
    details: props.course[0].details,
    status: props.course[0].status,
    price: props.course[0].price,
    discount_price: props.course[0].discount_price,
});

onMounted(() => {
    // console.log(props.course[0].title);
})

const save = () => {
    form.post(route("admin.course.update",props.course[0].id), {
        onFinish: () => form.reset(),
    });
};

</script>

<template>
    <Head title="Course" />

    <AdminLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Course Update</h2>
        </template>

        <h2>Course Update</h2>

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