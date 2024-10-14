<script setup>
import Button from "@/Components/Button.vue";
import Tag from "@/Components/Website/Tag.vue";
import { ref } from "vue";

import { Carousel, Slide } from "vue3-carousel";
import "vue3-carousel/dist/carousel.css";
import PopularCategoryItem from "./PopularCategoryItem.vue";

const myCarousel = ref(null);

const icons = [
    "laptop",
    "money-bill",
    "pen-nib",
    "dollar-sign",
    "school",
    "people-roof",
    "laptop",
    "money-bill",
    "pen-nib",
    "dollar-sign",
    "school",
    "people-roof",
];
</script>

<template>
    <section class="popular-categories">
        <Tag style="margin-block-end: 0.5rem">popular categories</Tag>
        <p class="popular-categories__heading">Popular category you get here</p>
        <p>Check out the most demanding categories right nows</p>
        <div class="popular-categories__cards card">
            <Button
                :square="true"
                class="popular-categories__cards-btn popular-categories__cards-btn--prev"
                @on-tap="myCarousel.prev()"
            >
                <font-awesome-icon :icon="['fas', 'chevron-left']" />
            </Button>
            <carousel
                ref="myCarousel"
                :items-to-show="7"
                snap-align="start"
                style="max-width: 97%"
            >
                <slide v-for="iconName in icons" :key="iconName">
                    <PopularCategoryItem
                        :iconName="iconName"
                        :title="iconName"
                    />
                </slide>
            </carousel>
            <Button
                :square="true"
                class="popular-categories__cards-btn popular-categories__cards-btn--next"
                @on-tap="myCarousel.next()"
            >
                <font-awesome-icon :icon="['fas', 'chevron-right']" />
            </Button>
        </div>
    </section>
</template>

<style lang="scss" scoped>
.popular-categories {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-block-start: 6rem;
}
.popular-categories__heading {
    font-size: var(--fs-h2);
    font-weight: 600;
}
.popular-categories__cards {
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    gap: 0rem;

    width: 100%;
    max-width: 100%;
    min-height: 10rem;
    padding-block: 2rem 1.125rem;
    margin-block: 3rem;
    background: var(--color-grey);
    border: none;
    position: relative;

    &-btn {
        position: absolute;
        top: 50%;
        z-index: 2;

        &--prev {
            left: 0;
            transform: translate(-50%, -50%);
        }
        &--next {
            right: 0;
            transform: translate(50%, -50%);
        }
    }
}

/* swiper.js */
swiper-container {
    width: 100%;
    height: 40rem;
}

swiper-slide {
    text-align: center;
    font-size: 18px;
    background: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
}

swiper-slide img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
}
</style>
