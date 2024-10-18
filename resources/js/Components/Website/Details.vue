<script setup lang="ts">
defineProps<{
    title: string;
    content: string;
}>();
</script>

<template>
    <details>
        <summary>{{ title }}</summary>
        <p class="content">
            {{ content }}
        </p>
    </details>
</template>

<style scoped>
details {
    --_y: 0.5em;
}

details,
details summary {
    transition: all 0.3s var(--ease-out-expo);
}
details summary::-webkit-details-marker,
details summary::marker {
    display: none;
    content: "";
}

details[open] > summary {
    color: var(--color-brand);
}
details[open] > summary::after {
    top: 50%;
    transform: translateY(-50%) rotateZ(-90deg);
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="hsl(157, 90%, 36%)" stroke="currentColor" stroke-width="0" viewBox="0 0 24 24"><path stroke="none" d="M10.061 19.061 17.121 12l-7.06-7.061-2.122 2.122L12.879 12l-4.94 4.939z"/></svg>')
        center no-repeat;
    background-size: cover;
}
details > summary {
    cursor: pointer;
    -webkit-user-select: none;
    user-select: none;

    padding-block: var(--_y);
    padding-inline-end: 3em;

    font-size: var(--fs-h5);
    font-weight: 600;

    position: relative;

    border-bottom: 1px solid var(--color-border);
}

details > summary::after {
    transition: all 0.3s var(--ease-out-expo);

    display: flex;
    content: "";
    width: 1.6rem;
    height: 1.6rem;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" stroke="currentColor" stroke-width="0" viewBox="0 0 24 24"><path stroke="none" d="M10.061 19.061 17.121 12l-7.06-7.061-2.122 2.122L12.879 12l-4.94 4.939z"/></svg>');
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;

    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    right: 0;
}

details > .content {
    margin: 0;
    padding: var(--_y) 0;
    text-shadow: 0.2px 0.2px hsla(0, 0%, 0%, 0.35);
}
</style>
