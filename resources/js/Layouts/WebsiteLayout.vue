<template>
    <Navbar />
    <main>
        <slot />
    </main>
</template>

<script setup>
import Navbar from "@/Components/Website/Navbar.vue";
</script>

<style lang="scss">
@import "../styles/responsive";
@import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

:root {
    --ff-base: "Poppins", sans-serif;
    --ff-heading: "Poppins", sans-serif;
    --ff-heading-2: "Poppins", sans-serif;
    --ff-heading-3: "Poppins", sans-serif;

    --fs-sm: clamp(0.89rem, -0.1vi + 0.91rem, 0.83rem);
    --fs-base: clamp(1rem, 0vi + 1rem, 1rem);
    --fs-h6: clamp(1.13rem, 0.13vi + 1.1rem, 1.2rem);
    --fs-h5: clamp(1.27rem, 0.3vi + 1.2rem, 1.44rem);
    --fs-h4: clamp(1.42rem, 0.53vi + 1.3rem, 1.73rem);
    --fs-h3: clamp(1.6rem, 0.82vi + 1.42rem, 2.07rem);
    --fs-h2: clamp(1.8rem, 1.19vi + 1.53rem, 2.49rem);
    --fs-h1: clamp(2.03rem, 3.43vi + 1.25rem, 4rem);

    --lh-xs: 1;
    --lh-sm: 1.3;
    --lh-base: 1.6;

    /* Colors */
    --color-white-700: hsl(45, 17%, 95%);
    --color-white-800: hsl(0, 0%, 85%);
    --color-white: hsl(0, 0%, 100%);
    --color-grey: hsla(0, 0%, 85%, 0.502);
    --color-black: hsl(0, 0%, 0%);
    --color-black-500: hsl(0, 0%, 15%);
    --color-text: var(--color-black);
    --color-bg: var(--color-white);
    --color-brand: hsl(158, 95%, 34%);
    --color-brand-dark: hsl(158, 95%, 15%);
    --color-secondary: hsl(203, 100%, 6%);
    --color-accent: hsl(203, 95%, 15%);
    --color-border: hsl(0, 0%, 60%);

    /* Easing */
    --ease-out-expo: cubic-bezier(0.16, 1, 0.3, 1);

    /* Roundness */
    --rounded-sm: 0.125rem;
    --rounded: 0.25rem;
    --rounded-md: 0.5rem;
    --rounded-lg: 1rem;
    --rounded-full: 999px;
}
*,
*::after,
*::before {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font: inherit;
    -webkit-tap-highlight-color: transparent; /* to remove the tap highlights on touch screens */
}

html {
    font-family: var(--ff-base);

    text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.004);
    text-rendering: optimizeLegibility !important;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

body {
    font-size: var(--fs-base);
    line-height: var(--lh-sm);

    color: var(--color-text);
    background-color: var(--color-bg);
    overflow-x: hidden;

    @include respond-to(md) {
        line-height: var(--lh-base);
    }
}

body::-webkit-scrollbar {
    width: 0rem;

    @include respond-to(sm) {
        width: 0.7rem;
    }
}

body::-webkit-scrollbar-thumb {
    background-color: var(--color-brand);
    outline: none;
}

/* --------------------------------------- */

a,
button,
input,
select,
textarea {
    color: inherit;
    background-color: transparent;
    border: none;
    outline: none;
    appearance: none;
    text-decoration: none;
}
input,
select,
textarea {
    &::placeholder {
        opacity: 0.6;
    }
}

a,
button {
    cursor: pointer;
}
button:disabled {
    opacity: 0.6;
    cursor: not-allowed;
}

ul {
    margin: 0;
    padding: 0;
}

li {
    list-style: none;
}

p,
h1,
h2,
h3,
h4,
h5,
h6 {
    margin: 0;
    padding: 0;
}
img,
picture,
video {
    max-width: 100%; // fallback
    width: 100vw; // fallback
    width: clamp(0rem, 100vw, 100%);
    height: 100%;
    object-position: center;
    object-fit: cover;
}

/* Utilities */

.heading-1,
.heading-2,
.heading-3,
.heading-4,
.heading-5,
.heading-6 {
    line-height: var(--lh-xs);
    @include respond-to(md) {
        line-height: var(--lh-sm);
    }
}
.heading-1 {
    font-size: var(--fs-h1);
}
.heading-2 {
    font-size: var(--fs-h2);
}
.heading-3 {
    font-size: var(--fs-h3);
}
.heading-4 {
    font-size: var(--fs-h4);
}
.heading-5 {
    font-size: var(--fs-h5);
}
.heading-6 {
    font-size: var(--fs-h6);
}

.text-brand {
    color: var(--color-brand);
}

.styled-text {
    display: inline-block;
    margin-block: 0.5rem;
    padding: 0.25rem 1rem;
    border-top-left-radius: 2rem;
    border-bottom-right-radius: 2rem;
    background: var(--color-brand);
    color: var(--color-white);
}

.styled-border-sm {
    border-top-left-radius: 2rem;
    border-bottom-right-radius: 2rem;
}
.styled-border-md {
    border-top-left-radius: 4rem;
    border-bottom-right-radius: 4rem;
}
.styled-border-lg {
    border-top-left-radius: 6rem;
    border-bottom-right-radius: 6rem;
}
/* components */

main > section {
    @extend .global-container;
}

.global-container {
    width: 100%;

    padding-inline: clamp(
        1.25rem,
        10.87vi + -1.2rem,
        7.5rem
    ); // sm  = 20px, xl = 80px
}

.card {
    display: flex;
    transition: border 0.3s var(--ease-out-expo);
    width: fit-content;
    border-radius: 1rem;
    border: 1.75px solid var(--color-border);
    padding: 1rem;

    -webkit-box-shadow: 0px 3px 0px 0px rgba(0, 0, 0, 0.15);
    -moz-box-shadow: 0px 3px 0px 0px rgba(0, 0, 0, 0.15);
    box-shadow: 0px 3px 0px 0px rgba(0, 0, 0, 0.15);
}

.card:hover {
    border-color: var(--color-brand);
}

input[type="text"] {
    background: var(--color-bg);
    color: var(--color-text);

    padding: 0.75rem 1.5rem;

    font-size: var(--fs-sm);
    font-weight: 400;

    border: 1px solid var(--color-border);
    border-radius: 999px;
}

input[type="text"]::placeholder {
    color: var(--color-text);
}
</style>
