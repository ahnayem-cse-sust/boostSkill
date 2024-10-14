<script setup lang="ts">
defineProps<{
    iconName?: string;
    title?: string;
}>();
</script>

<template>
    <article class="popular-category-item">
        <div class="popular-category-item__icon">
            <font-awesome-icon
                :icon="['fas', iconName || 'laptop']"
                size="4x"
            />
        </div>
        <div class="popular-category-item__text">
            <p>{{ title || "Development" }}</p>
            <p>(9)</p>
        </div>
    </article>
</template>

<style scoped>
.popular-category-item,
.popular-category-item__text {
    display: flex;
    flex-direction: column;
    align-items: center;
}
.popular-category-item {
    gap: 0.5rem;
}
.popular-category-item p {
    font-weight: 500;
}
.popular-category-item__icon {
    --_size: 9rem;
    display: flex;
    justify-content: center;
    align-items: center;

    border: 1px solid var(--color-border);
    border-radius: var(--rounded-lg);
    background-color: var(--color-white-700);

    padding: 2rem;
    width: var(--_size);
    height: var(--_size);
    aspect-ratio: 1;
}
</style>
