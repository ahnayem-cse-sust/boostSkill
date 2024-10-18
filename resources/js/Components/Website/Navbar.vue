<template>
    <nav class="home-nav navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="home-nav__logo" href="#" style="color: var(--color-brand)"
                ><BrandLogo variant="full"
            /></a>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li
                        class="nav-item"
                        v-for="link in navLinks"
                        :key="link.text + 'nav-link'"
                    >
                        <Link
                            :class="[
                                'nav-link',
                                {
                                    active:
                                        fullUrlWithoutTrailingSlash ===
                                        link.url,
                                },
                            ]"
                            aria-current="page"
                            :href="link.url"
                            >{{ link.text }}</Link
                        >
                    </li>
                </ul>
                <form class="home-nav__search-wrapper d-flex" role="search">
                    <input
                        class="home-nav__search"
                        type="search"
                        placeholder="Search"
                        aria-label="Search"
                    />
                    <button class="home-nav__search-button" type="submit">
                        <font-awesome-icon :icon="['fas', 'search']" />
                    </button>
                </form>
                <ul class="navbar-nav mx-auto mx-lg-0 mb-2 mb-lg-0">
                    <li class="nav-item">
                        <Link
                            class="nav-link"
                            aria-current="page"
                            :href="route('login')"
                            >Sign In/Sign Up</Link
                        >
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script setup lang="ts">
import BrandLogo from "@/Components/Website/common/BrandLogo.vue";
import { Link } from "@inertiajs/vue3";
import { computed, ref } from "vue";

const fullUrl = ref(window.location.href);
const fullUrlWithoutTrailingSlash = computed(() => {
    const urlLength = fullUrl.value.length;
    if (fullUrl.value[urlLength - 1] !== "/") return fullUrl.value;

    return fullUrl.value.slice(0, urlLength - 1);
});

const navLinks = [
    {
        text: "Home",
        url: route("website.home"),
    },
    {
        text: "Courses",
        url: route("website.courses"),
    },
    {
        text: "Tutorials",
        url: route("website.tutorials"),
    },
    {
        text: "About us",
        url: route("website.about_us"),
    },
    {
        text: "Contact us",
        url: route("website.contact_us"),
    },
    {
        text: "Instructors",
        url: route("website.instructors"),
    },
];
</script>

<style lang="scss" scoped>
.home-nav {
    padding-block: 1rem;

    &__logo {
        padding-inline-end: 1.5rem;
    }

    &__search {
        width: 100%;
        --_border-thickness: 1px;

        font-size: var(--fs-sm);

        padding: 0.35em 1em;

        border-radius: var(--rounded-full);
        border: var(--_border-thickness) solid var(--color-border);

        &-wrapper {
            position: relative;
            margin-inline-end: 0.5rem;
        }

        &-button {
            display: flex;
            justify-content: center;
            align-items: center;

            padding-inline: 0.75em 1em;

            position: absolute;
            inset: 0 0 0 auto;

            border-radius: inherit;
            border-top-right-radius: var(--rounded-full);
            border-bottom-right-radius: var(--rounded-full);
            background: var(--color-brand);
            color: var(--color-bg);
        }
    }
}
.nav-link {
    font-size: var(--fs-sm);
    font-weight: 500;
    padding: 0.25em 0.75em;

    &.active {
        background-color: var(--color-brand);
        color: var(--color-white);
        border-radius: var(--rounded-full);
    }
}
</style>
