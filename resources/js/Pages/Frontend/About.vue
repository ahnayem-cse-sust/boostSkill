
<template>
    <div>
        <Frontend>
            
            <h1>This is {{ title }}</h1>
        </Frontend>
    </div>
</template>

<script setup>
import Frontend from '@/Layouts/FrontendLayout.vue';

defineProps({
    title: String
 });  

</script>