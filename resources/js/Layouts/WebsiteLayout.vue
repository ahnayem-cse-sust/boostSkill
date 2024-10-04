<template>
    <div>
        <Navbar />
        <slot />
    </div>
</template>

<script setup>
import Navbar from "@/Components/Website/Navbar.vue";
</script>

<style>
:root {
    --ff-base: "Manrope", sans-serif;
    --ff-heading: "Manrope", sans-serif;
    --ff-heading-2: "Manrope", sans-serif;
    --ff-heading-3: "Manrope", sans-serif;

    /* Colors */
    --color-text: hsl(0, 0%, 0%);
    --color-bg: hsl(0, 0%, 100%);
    --color-brand: hsl(158, 95%, 34%);
    --color-border: hsl(0, 0%, 60%);

    /* Easing */
    --ease-out-expo: cubic-bezier(0.16, 1, 0.3, 1);
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
    color: var(--color-text);
    background-color: var(--color-bg);
    overflow-x: hidden;
}

body::-webkit-scrollbar {
    width: 0.7rem;
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
    width: 100vw;
    height: 100%;
    max-width: 100%;
    object-position: center;
    object-fit: cover;
}

/* components */

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

.styled-text {
    display: inline-block;
    margin-block: 0.5rem;
    padding: 0.5rem 1rem;
    border-top-left-radius: 2rem;
    border-bottom-right-radius: 2rem;
    background: var(--color-brand);
    color: var(--color-bg);
}


input[type="text"] {
    background: var(--color-bg);
    color: var(--color-text);

    padding: 0.75rem 1.5rem;

    font-size: 0.9rem;
    font-weight: 400;

    border: 1px solid var(--color-border);
    border-radius: 999px;
}

input[type="text"]::placeholder {
    color: var(--color-text);
}
</style>
