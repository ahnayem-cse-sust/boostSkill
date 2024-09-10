<script setup>
import {Link} from '@inertiajs/vue3';
defineProps({
    items: [
            {
                title: 'Profile',
                link: "route('user.profile.edit')"
            }
            ],
});
</script>

<style scoped>
.dropdown-menu[data-bs-popper]{
    left:auto;
    right: 0;
}
</style>

<template>
    <div class="btn-group">
        <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <font-awesome-icon :icon="['fas', 'user']" />
        </button>
        <ul class="dropdown-menu">
            <li v-for="(item,i) in items" :key="i">
                <Link class="dropdown-item" :href="item.link" :method="item.method" as="button"> {{ item.title }} </Link>
            </li>
        </ul>
    </div>
</template>