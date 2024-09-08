<script setup>
import InputError from '@/Components/Common/InputError.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <Head title="Log in" />

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

                        <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Register</h3>

                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="form2Example18">Name</label>
                            <input v-model="form.name" type="text" id="name" class="form-control form-control-lg" />
                        </div>
                        <InputError class="mt-2" :message="form.errors.name" />

                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="form2Example18">Email address</label>
                            <input v-model="form.email" type="email" id="email" class="form-control form-control-lg" />
                        </div>
                        <InputError class="mt-2" :message="form.errors.email" />

                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="form2Example28">Password</label>
                            <input v-model="form.password" type="password" id="password" class="form-control form-control-lg" />
                        </div>
                        <InputError class="mt-2" :message="form.errors.password" />

                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="form2Example28">Confirm Password</label>
                            <input v-model="form.password_confirmation" type="password" id="password_confirmation" class="form-control form-control-lg" />
                        </div>
                        <InputError class="mt-2" :message="form.errors.password_confirmation" />
                        
                        <div class="pt-1 mb-4">
                            <Link
                            :href="route('login')"
                            class=""
                            >
                                Already registered?
                            </Link>
                            <button data-mdb-button-init data-mdb-ripple-init class="btn btn-info btn-lg btn-block" type="submit">Register</button>
                        </div>

                    </form>

                    </div>

                </div>
            </div>
        </div>
    </section>
</template>
