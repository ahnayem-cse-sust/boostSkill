<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import InputError from '@/Components/Common/InputError.vue';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('admin.login'), {
        onFinish: () => form.reset('admin.password'),
    });
};
</script>

<template>
    <Head title="Admin Log in" />

    <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
        {{ status }}
    </div>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">

                    <form style="width: 23rem;" @submit.prevent="submit">

                    <div class="mb-md-5 mt-md-4 pb-5">

                    <h2 class="fw-bold mb-2 text-uppercase">Admin Login</h2>
                    <p class="text-white-50 mb-5">Please enter your email and password!</p>

                    <div data-mdb-input-init class="form-outline form-white mb-4">
                        <input v-model="form.email" type="email" id="email" class="form-control form-control-lg" />
                        <label class="form-label" for="email">Email</label>
                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>

                    <div data-mdb-input-init class="form-outline form-white mb-4">
                        <input v-model="form.password" type="password" id="password" class="form-control form-control-lg" />
                        <label class="form-label" for="password">Password</label>
                        <InputError class="mt-2" :message="form.errors.password" />
                    </div>

                    <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>

                    </div>
                    </form>
                </div>
                </div>
            </div>
            </div>
        </div>
    </section>
</template>

<style scoped>
.gradient-custom {
/* fallback for old browsers */
background: #5d5664;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right, rgb(105, 96, 115), rgb(65, 68, 73));

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right, rgb(93, 84, 103), rgb(81, 86, 93))
}
</style>
