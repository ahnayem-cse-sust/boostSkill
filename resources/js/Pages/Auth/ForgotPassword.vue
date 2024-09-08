<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import InputError from '@/Components/Common/InputError.vue';

defineProps({
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
    <Head title="Forgot Password" />
    <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
    </div>

    <section class="vh-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-1 px-0 d-none d-sm-block"></div>
                <div class="col-sm-6 px-0 d-none d-sm-block">
                    <img src="../../Images/login-img.jpg"
                    alt="Login image" class="w-100 vh-100" style="object-fit: contain; object-position: left;">
                </div>
                <div class="col-sm-5 text-black">

                    <div class="px-5 mt-5 ms-xl-4">
                    <i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i>
                    <span class="h1 fw-bold mb-0">Logo</span>
                    </div>
                    <div class="px-5 mt-5 text-sm text-gray-600">
                        Forgot your password? No problem. Just let us know your email address and we will email you a password reset
                        link that will allow you to choose a new one.
                    </div>
                    <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

                        <form style="width: 23rem;" @submit.prevent="submit">
                            <div data-mdb-input-init class="form-outline mb-4">
                                <input v-model="form.email" type="email" id="email" class="form-control form-control-lg" />
                                <label class="form-label" for="form2Example18">Email address</label>
                            </div>
                            <InputError class="mt-2" :message="form.errors.email" />
                            <div class="pt-1 mb-4">
                                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-info btn-lg btn-block" type="submit">Email Password Reset Link</button>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </section>
    
</template>
