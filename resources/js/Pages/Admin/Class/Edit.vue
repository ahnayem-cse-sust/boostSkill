<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head,useForm } from '@inertiajs/vue3';
import { onMounted } from 'vue';
import InputError from '@/Components/Common/InputError.vue';

const props = defineProps({
    data: {
        type: Array,
    },
});

const form = useForm({
    title: props.data[0].title,
    course_category_id: props.data[0].course_category_id,
    course_type: props.data[0].course_type,
    course_level: props.data[0].course_level,
    teacher_id: props.data[0].teacher_id,
    total_hours: props.data[0].total_hours,
    details: props.data[0].details,
    status: props.data[0].status,
    price: props.data[0].price,
    discount_price: props.data[0].discount_price,
});

onMounted(() => {
    // console.log(props.data[0].title);
})

const save = () => {
    form.post(route("admin.class.update",props.data[0].id), {
        onFinish: () => form.reset(),
    });
};

</script>

<template>
    <Head title="Course" />

    <AdminLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Class Update</h2>
        </template>

        <h2>Class Update</h2>

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
            <div class="col-md-6">
                <label for="status" class="form-label">Status</label>
                <input v-model="form.status" type="text" class="form-control" id="status">
            </div>
            <div class="col-md-6">
                <label for="platform" class="form-label">Platform</label>
                <input v-model="form.platform" type="text" class="form-control" id="platform">
            </div>
            <div class="col-md-6">
                <label for="url" class="form-label">Url</label>
                <input v-model="form.url" type="text" class="form-control" id="url">
            </div>
            <div class="col-md-6">
                <label for="description" class="form-label">Description</label>
                <textarea v-model="form.description" rows="5" class="form-control" id="description"></textarea>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </AdminLayout>
</template>