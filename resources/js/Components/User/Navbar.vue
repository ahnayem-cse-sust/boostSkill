<template>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">BoostSkill</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                
            </ul>
            <ul class="navbar-nav mb-2 mb-lg-0 ">
                <i class="fad fa-laugh-wink"></i>
                <li class="nav-item">
                    <ProfileDropDown :items="menuItems"/>
                </li>
            </ul>
            </div>
        </div>
    </nav>
</template>

<script setup>
import ProfileDropDown from '../Common/ProfileDropDown.vue';

const menuItems = [
                    {
                        title: 'Profile',
                        link: route('profile.edit'),
                        method: "get"
                    },
                    {
                        title: 'Logout',
                        link: route('logout'),
                        method: "post"
                    },
                ];

</script>

<style scoped>

</style>