<script setup lang="ts">
import Button from "@/Components/Button.vue";
import { computed } from "vue";

const { size } = defineProps<{
    size?: "1.15x" | "1.25x" | "1.5x" | "1.75x" | "2x";
    rtl?: boolean; // default: false; rlt (right to left), Used to reverse the layout order of card image and text content
    image: string;
    title: string;
    description: string;
}>();

const cardStyle = computed(() => {

    const styleObject: Record<string, string> = {};

    if (size) {
        styleObject["--_size"] = size?.substring(0, size.length - 1);
    }

    return styleObject;
});
</script>

<template>
    <article class="proposition-card" :data-rtl="rtl" :style="cardStyle">
        <div class="proposition-card__content">
            <p class="proposition-card__heading">{{ title }}</p>
            <p class="proposition-card__description">
                {{ description }}
            </p>
            <Button
                style="
                    margin-block-start: 1rem;
                    width: fit-content;
                    direction: ltr;
                "
                >Join Now
                <font-awesome-icon
                    :icon="['fas', 'arrow-right']"
                    style="margin-inline-start: 0.5rem"
                />
            </Button>
        </div>
        <div class="proposition-card__image">
            <img :src="image" alt="" />
        </div>
    </article>
</template>

<style lang="scss" scoped>
.proposition-card {
    --_size: 1;
    --_bg: var(--color-white);
    --_x-adjustment: 3rem;

    min-width: calc(50rem * calc(var(--_size) / 1.2));
    max-width: 100%;

    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    margin-inline-start: calc(calc(var(--_x-adjustment) * -1) * var(--_size));

    &[data-rtl="true"] {
        flex-direction: row-reverse;
        margin-inline-end: calc(calc(var(--_x-adjustment) * -1) * var(--_size));

        .proposition-card__content {
            direction: rtl;
            right: 0;
            left: calc(calc(var(--_x-adjustment) * -1) * var(--_size));

            border-radius: 0 var(--rounded-md) var(--rounded-md) 0;
        }
    }

    &__content {
        display: flex;
        flex-direction: column;
        justify-content: center;

        background: var(--_bg);
        border-radius: var(--rounded-md) 0 0 var(--rounded-md);
        flex: 1 0 auto;
        height: calc(13rem * var(--_size));
        padding: 1rem 2rem;

        position: relative;
        right: calc(calc(var(--_x-adjustment) * -1) * var(--_size));
    }
    &__heading {
        color: var(--color-brand);
        font-size: var(--fs-h2);
        font-weight: 600;
        margin-block-end: -0.25rem;
    }
    &__description {
        max-width: 40ch;
    }
    &__image {
        // display: none;
        flex: 0 0 calc(20rem * var(--_size));
        width: calc(20rem * var(--_size));
        height: calc(20rem * var(--_size));
        aspect-ratio: 1;

        overflow: hidden;
        background: var(--_bg);
        border-radius: var(--rounded-full);
        border: 5px solid var(--color-brand);

        img {
            position: relative;
            z-index: 1;
        }
    }
}
</style>
