<template>
    <p class="tag">
        <slot />
    </p>
</template>

<style scoped>
.tag {
    display: inline-flex;
    padding: 0.25rem 2rem;

    font-weight: 600;
    text-transform: capitalize;
    color: var(--color-text);

    border: 1px solid var(--color-border);
    border-radius: 999px;
}
</style>
