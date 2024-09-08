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
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <Head title="Log in" />

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

                    <div class="px-5 ms-xl-4">
                    <i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i>
                    <span class="h1 fw-bold mb-0">Logo</span>
                    </div>

                    <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

                    <form style="width: 23rem;" @submit.prevent="submit">

                        <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log in</h3>

                        <InputError class="mt-2" :message="form.errors.email" />

                        <div data-mdb-input-init class="form-outline mb-4">
                        <input v-model="form.email" type="email" id="email" class="form-control form-control-lg" />
                        <label class="form-label" for="form2Example18">Email address</label>
                        </div>

                        <div data-mdb-input-init class="form-outline mb-4">
                        <input v-model="form.password" type="password" id="password" class="form-control form-control-lg" />
                        <label class="form-label" for="form2Example28">Password</label>
                        </div>
                        <InputError class="mt-2" :message="form.errors.password" />

                        <div class="pt-1 mb-4">
                        <button data-mdb-button-init data-mdb-ripple-init class="btn btn-info btn-lg btn-block" type="submit">Login</button>
                        </div>

                        <p class="small mb-5 pb-lg-2">
                            <Link
                                v-if="canResetPassword"
                                :href="route('password.request')"
                                class="link-info"
                            >
                                Forgot your password?
                            </Link>
                        </p>
                        <p>Don't have an account?
                            <Link
                                v-if="canResetPassword"
                                :href="route('register')"
                                class="link-info"
                            >
                            Register here
                            </Link>
                        </p>

                    </form>

                    </div>

                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>
.bg-image-vertical {
position: relative;
overflow: hidden;
background-repeat: no-repeat;
background-position: right center;
background-size: auto 100%;
}

@media (min-width: 1025px) {
.h-custom-2 {
height: 100%;
}
}
</style>
