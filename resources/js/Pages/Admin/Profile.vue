<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head } from '@inertiajs/vue3';
import axios from 'axios';
defineProps({
    profileData: {},
})
function save(){
    axios.post(route('admin.profile.update'), {
        profileData: props.profileData,
    })
    .then(function (response) {
        console.log(response);
    })
    .catch(function (error) {
        console.log(error);
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
                <h2 class="text-center mb-4">Update Profile</h2>
                <form action="/update-profile" method="POST" enctype="multipart/form-data">
                    <!-- Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input v-model="profileData.name" type="text" class="form-control" id="name" name="name" placeholder="Enter your full name" required>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input v-model="profileData.email" type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                    </div>

                    <!-- Submit Button -->
                    <button type="button" @click="save" class="btn btn-primary w-100">Save</button>
                </form>
            </div>
        </div>
    </div>
    </AdminLayout>
</template>