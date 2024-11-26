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
    student_id: props.data[0].student_id,
});

onMounted(() => {
    // console.log(props.data[0].title);
})

const save = () => {
    form.post(route("admin.payment.update",props.data[0].id), {
        onFinish: () => form.reset(),
    });
};

</script>

<template>
    <Head title="Payment" />

    <AdminLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Payment Update</h2>
        </template>

        <h2>Payment Update</h2>

        <form class="row g-3" @submit.prevent="save">
            <div class="col-md-12">
                <label for="title" class="form-label">Student ID</label>
                <input v-model="form.title" type="text" class="form-control" id="title">
                <InputError class="mt-2" :message="form.errors.title" />
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </AdminLayout>
</template>