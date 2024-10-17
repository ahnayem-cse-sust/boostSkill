<script setup lang="ts">
import Button from "@/Components/Button.vue";
import Tag from "@/Components/Website/Tag.vue";
import { ref } from "vue";

import { isOdd } from "@/utils/helpers";
import { getBreakpointValue } from "@/utils/responsive";
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

// Changes the number of items to show in carousel based on screen size
// If you need to add a new value, add here
const sizes = {
    xxxl: 7,
    xl: 5,
    lg: 4,
    md: 2,
    sm: 1,
};

// Get Number of items to show based on screen size
const getItemsToShow = () => {
    return sizes[
        Object.keys(sizes).find(
            (key) =>
                window.innerWidth >=
                parseInt(getBreakpointValue(key as keyof typeof sizes))
        )
    ];
};

// sets thee initial number of items to show
const itemsToShowInCarousel = ref(getItemsToShow());

const onResize = () => {
    itemsToShowInCarousel.value = getItemsToShow();
};
// Sets the number of items to show in carousel when screen size changes
window.addEventListener("resize", onResize);
</script>

<template>
    <section class="popular-categories">
        <Tag style="margin-block-end: 0.5rem">popular categories</Tag>
        <p class="popular-categories__heading heading-2">
            Popular category you get here
        </p>
        <p class="popular-categories__sub-heading">
            Check out the most demanding categories right nows
        </p>
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
                :items-to-show="itemsToShowInCarousel"
                :snap-align="
                    isOdd(itemsToShowInCarousel) ? 'center-odd' : 'center-even'
                "
                style="width: 97%"
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
@import "../../styles/responsive";

.popular-categories {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-block-start: 6rem;
}

.popular-categories__heading,
.popular-categories__sub-heading {
    text-align: center;

    @include respond-to(md) {
        text-align: unset;
    }
}
.popular-categories__heading {
    font-weight: 600;
    margin-block-end: 0.5rem;
    text-align: center;

    @include respond-to(md) {
        text-align: unset;
        margin-block-end: unset;
    }
}
.popular-categories__cards {
    --_padding: 1rem;
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    gap: 0rem;

    width: 100%;
    max-width: calc(100% - var(--_padding));
    min-height: 10rem;
    padding-block: 2rem 1.125rem;
    margin-block: 3rem;
    background: var(--color-grey);
    border: none;
    position: relative;

    @include respond-to(xl) {
        --_padding: 4rem;
    }

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
