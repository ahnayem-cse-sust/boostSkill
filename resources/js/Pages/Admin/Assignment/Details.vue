<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head } from '@inertiajs/vue3';
import { onMounted } from 'vue';

const props = defineProps({
    data: {
        type: Array,
    },
});

onMounted(() => {
    // console.log(props.data[0].title);
})



</script>

<template>
    <Head title="Course" />

    <AdminLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Assignment Deatils</h2>
        </template>

        <h2>Assignment Details</h2>

        <form class="row g-3">
            <div class="col-md-12">
                <label for="title" class="form-label">Assignment Title</label>
                <input disabled v-model="data[0].title" type="text" class="form-control" id="title" >
            </div>
            

        </form>
    </AdminLayout>
</template>