<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import InputError from '@/Components/Common/InputError.vue';

const form = useForm({
    title: "",
    status: "",
});

const save = () => {
    form.post(route("admin.payment.store"), {
        onFinish: () => form.reset(),
    });
};

</script>

<template>
    <Head title="Payment" />

    <AdminLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Create New Payment</h2>
        </template>

        <h2>New Payment</h2>

        <form class="row g-3" @submit.prevent="save">
            <div class="col-md-12">
                <label for="student_id" class="form-label">Student ID</label>
                <input v-model="form.student_id" type="text" class="form-control" id="title">
                <InputError class="mt-2" :message="form.errors.title" />
            </div>
            

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </AdminLayout>
</template>