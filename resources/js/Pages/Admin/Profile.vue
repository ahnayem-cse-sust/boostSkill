<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head } from '@inertiajs/vue3';
import { reactive } from 'vue';
import axios from 'axios';
import {useToast} from 'vue-toast-notification';

const $toast = useToast();

const props = defineProps({
    profileData: {},
})

const state = reactive({ editFlag: false });

function save(){
    console.log(props.profileData);
    axios.post(route('admin.profile.update'), {
        id: props.profileData.id,
        name: props.profileData.name,
        email: props.profileData.email,
    })
    .then(function (response) {
        console.log(response);
        state.editFlag=false;
        $toast.success('You did it!',{position: 'top-right'});
    })
    .catch(function (error) {
        // console.log(error);
    });
}
</script>

<template>
    <Head title="Profile" />

    <AdminLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Profile</h2>
        </template>

        <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="text-center mb-4" v-if="!state.editFlag">Profile Information </h2>
                <h2 class="text-center mb-4" v-if="state.editFlag">Update Profile</h2>
                <button type="button" @click="state.editFlag=!state.editFlag" v-if="!state.editFlag" class="btn btn-primary float-right">Edit</button>
                <form action="/update-profile" method="POST" enctype="multipart/form-data">
                    <!-- Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input v-model="profileData.name" :disabled="!state.editFlag" type="text" class="form-control" id="name" name="name" placeholder="Enter your full name" required>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input v-model="profileData.email" :disabled="!state.editFlag" type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                    </div>

                    <!-- Submit Button -->
                    <button type="button" @click="save" v-if="state.editFlag" class="btn btn-primary w-100">Save</button>
                </form>
            </div>
        </div>
    </div>
    </AdminLayout>
</template>