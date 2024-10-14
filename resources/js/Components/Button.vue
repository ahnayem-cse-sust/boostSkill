<script setup lang="ts">
import { Link } from "@inertiajs/vue3";
defineProps<{
    square?: boolean;
    outlined?: boolean;
    name?: string;
    to?: string;
}>();

defineEmits<{
    (event: "onTap"): void;
}>();
</script>

<template>
    <Link :href="to" v-if="to">
        <button
            type="button"
            :class="[outlined ? 'outlined' : 'primary']"
            :style="square && 'aspect-ratio: 1'"
            @click="$emit('onTap')"
        >
            <slot />
        </button>
    </Link>
    <button
        type="button"
        :class="[outlined ? 'outlined' : 'primary']"
        :style="square && 'aspect-ratio: 1'"
        v-else
        :name
        @click="$emit('onTap')"
    >
        <slot />
    </button>
</template>

<style scoped>
a {
    display: inline-flex;
    width: fit-content;
}
button {
    transition: all 0.3s var(--ease-out-expo);

    display: flex;
    justify-content: center;
    align-items: center;

    border-radius: 100rem;
    padding: 0.5rem 1rem;

    font-size: 1rem;
    font-weight: 600;
}

button.primary {
    --_y: 3px;
    --_x: 2px;
    background-color: var(--color-brand);
    color: var(--color-white);

    -webkit-box-shadow: var(--_x) var(--_y) 0px 0px rgba(0, 0, 0, 0.75);
    -moz-box-shadow: var(--_x) var(--_y) 0px 0px rgba(0, 0, 0, 0.75);
    box-shadow: var(--_x) var(--_y) 0px 0px rgba(0, 0, 0, 0.75);

    margin-block-end: calc(var(--_y) + 2px);
    margin-inline-end: calc(var(--_x) + 2px);
}

button.outlined {
    outline: 2px solid var(--color-brand);
    color: var(--color-brand);
    background: transparent;
}

button.primary:hover {
    -webkit-box-shadow: 0px 0px 0px 0px rgba(0, 0, 0, 0.75);
    -moz-box-shadow: 0px 0px 0px 0px rgba(0, 0, 0, 0.75);
    box-shadow: 0px 0px 0px 0px rgba(0, 0, 0, 0.75);
}
button.outlined:hover {
    background: var(--color-brand);
    color: var(--color-white);
}
</style>
