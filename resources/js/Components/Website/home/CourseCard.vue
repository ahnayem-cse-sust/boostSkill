<script setup lang="ts">
import Button from "@/Components/Button.vue";

defineProps<{
    image?: string;
    title: string;
    subTitle: string;
    description: string;
    price: number;
}>();
</script>

<template>
    <article class="course-card card">
        <div class="course-card__image">
            <img v-if="image" :src="image" alt="" />
            <!-- Will be removed in production -->
            <img v-else src="../../../Images/login-img.jpg" alt="" />
        </div>
        <div>
            <p class="course-card__heading">
                {{ title || "Adobe illustrator for beginners" }}
            </p>
            <p class="course-card__sub-heading">
                {{ subTitle || "Lorem ipsum dolor sit." }}
            </p>
        </div>
        <p class="course-card__description">
            {{
                description ||
                "Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique, iusto?"
            }}
        </p>
        <div class="course-card__bottom">
            <Button class="course-card__add-to-cart"
                >Add to cart
                <font-awesome-icon
                    :icon="['fas', 'arrow-right']"
                    style="margin-inline-start: 0.5rem"
                />
            </Button>
            <p class="course-card__price">${{ price || "50.00" }}</p>
        </div>
    </article>
</template>

<style lang="scss" scoped>
.course-card {
    --_padding: 1.25rem;
    display: grid;
    grid-template-rows: subgrid;
    grid-row: span 4;
    grid-template-columns: 1fr;
    max-height: fit-content;
    padding: 0;
    overflow: hidden;

    > *:not(.course-card__image) {
        padding-inline: var(--_padding);
    }

    > *:last-child {
        padding-block-end: var(--_padding);
    }

    &__image {
        border-bottom-left-radius: var(--rounded-md);
        border-bottom-right-radius: var(--rounded-md);
    }

    &__heading {
        font-size: var(--_padding);
        font-weight: 600;
        line-height: 1.1;
    }

    &__description,
    &__sub-heading {
        font-weight: 500;
        font-size: var(--fs-sm);
    }
    &__sub-heading {
        line-height: 1.3;
        margin-block: 0.45rem;
        opacity: 0.6;
    }
    &__description {
        margin-block-end: 0.25rem;
    }

    &__bottom {
        display: flex;
        flex-flow: row wrap;
        gap: 1rem;
        justify-content: space-between;
        align-items: center;
        margin-block-start: 0.5rem;
    }

    & &__add-to-cart {
        background: white;
        color: var(--color-brand);
        outline: 2px solid var(--color-brand);
        box-shadow: none;
        margin-left: -0.15rem; // optical alignment fix.
    }

    &__price {
        color: var(--color-brand);
        font-weight: 600;
    }

    // hover
    &:hover &__add-to-cart {
        background: var(--color-brand);
        color: var(--color-white);
        outline: 2px solid transparent;
        -webkit-box-shadow: var(--_x) var(--_y) 0px 0px rgba(0, 0, 0, 0.75);
        -moz-box-shadow: var(--_x) var(--_y) 0px 0px rgba(0, 0, 0, 0.75);
        box-shadow: var(--_x) var(--_y) 0px 0px rgba(0, 0, 0, 0.75);

        &:hover {
            -webkit-box-shadow: 0px 0px 0px 0px rgba(0, 0, 0, 0.75);
            -moz-box-shadow: 0px 0px 0px 0px rgba(0, 0, 0, 0.75);
            box-shadow: 0px 0px 0px 0px rgba(0, 0, 0, 0.75);
        }
    }
}
</style>
