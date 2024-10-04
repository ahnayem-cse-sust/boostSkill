<script setup>
defineProps({
    size: Number, // in rem;; If not specified it will be 100%; Better to not specify when using with grid layout
});
</script>

<template>
    <div
        class="styled-image-wrapper"
        :style="size ? `--_size: ${size}rem` : '--_size: 100%'"
    >
        <div class="content">
            <slot />
        </div>
    </div>
</template>

<style scoped>
.styled-image-wrapper {
    --_size: 100%;
    --_x: 0.45rem;
    --_y: var(--_x);
    --_border: 0.5rem;

    width: var(--_size);
    height: var(--_size);
    position: relative;
    margin-inline: var(--_x); /* fixes border overlap */
    margin-block: var(--_y); /* fixes border overlap */
}

.styled-image-wrapper .content {
    width: 100%;
    height: 100%;
    border: var(--_border) solid var(--color-bg);
    background: hsl(0, 0%, 94%);
}
.styled-image-wrapper::after,
.styled-image-wrapper::before {
    display: block;
    content: "";
    width: 70%;
    aspect-ratio: 1;

    background: var(--color-brand);
    position: absolute;
    z-index: -1;
}
.styled-image-wrapper::after {
    top: calc(var(--_y) * -1);
    right: calc(var(--_x) * -1);
}
.styled-image-wrapper::before {
    bottom: calc(var(--_y) * -1);
    left: calc(var(--_x) * -1);
}
</style>
