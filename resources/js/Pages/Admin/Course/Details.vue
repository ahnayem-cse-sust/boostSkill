<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head } from '@inertiajs/vue3';
import { onMounted } from 'vue';

defineProps({
    course: {
        type: Array,
    },
});

onMounted(() => {
    console.log($props.course);
})

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
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Course Deatils</h2>
        </template>

        <h2>Course Details</h2>

        <form class="row g-3" @submit.prevent="save">
            <div class="col-md-12">
                <label for="title" class="form-label">Course Title</label>
                <input disabled v-model="course.title" type="text" class="form-control" id="title" >
            </div>
            <div class="col-md-6">
                <label for="course_category" class="form-label">Course Category</label>
                <input disabled v-model="course.course_category_id" type="text" class="form-control" id="course_category">
            </div>
            <div class="col-md-6">
                <label for="course_type" class="form-label">Course Type</label>
                <input disabled v-model="course.course_type" type="text" class="form-control" id="course_type">
            </div>
            <div class="col-md-6">
                <label for="course_level" class="form-label">Course Level</label>
                <input disabled v-model="course.course_level" type="text" class="form-control" id="course_level">
            </div>
            <div class="col-md-6">
                <label for="teacher_id" class="form-label">Instructor</label>
                <input disabled v-model="course.teacher_id" type="text" class="form-control" id="teacher_id">
            </div>
            <div class="col-md-6">
                <label for="total_hours" class="form-label">Total Hours</label>
                <input disabled v-model="course.total_hours" type="text" class="form-control" id="total_hours">
            </div>
            <div class="col-md-6">
                <label for="course_type" class="form-label">Course Type</label>
                <input disabled v-model="course.course_type" type="text" class="form-control" id="course_type">
            </div>
            <div class="col-md-6">
                <label for="course_type" class="form-label">Course Type</label>
                <input disabled v-model="course.course_type" type="text" class="form-control" id="course_type">
            </div>

        </form>
    </AdminLayout>
</template>