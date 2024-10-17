<script setup>
import Tag from "@/Components/Website/Tag.vue";
import Button from "../Button.vue";
import StyledWrapper from "./StyledWrapper.vue";
</script>

<template>
    <section class="about-us">
        <StyledWrapper :size="28" class="about-us__image">
            <img src="https://i.pravatar.cc/699" alt="name" />

            <span class="about-us__image-overlay">
                <Button :square="true">
                    <font-awesome-icon :icon="['fas', 'play']" />
                </Button>
            </span>
        </StyledWrapper>
        <div class="about-us__content">
            <Tag class="about-us__tag">Get more with us</Tag>
            <p class="about-us__heading">
                Thousand of Top Online Courses
                <span class="styled-text">Now in One Place</span>
            </p>
            <p class="about-us__description">
                Discover a vast collection of top-rated courses, covering a wide
                range of subjects and taught by expert instructors. Whether
                you're looking to advance your career.
            </p>
            <ul class="about-us__list">
                <li class="about-us__list-item">
                    <Button :square="true">
                        <font-awesome-icon :icon="['fas', 'chevron-right']" />
                    </Button>
                    <p class="about-us__list-item-title">
                        Explore Inspiring Online Courses
                    </p>
                </li>
                <li class="about-us__list-item">
                    <Button :square="true">
                        <font-awesome-icon :icon="['fas', 'chevron-right']" />
                    </Button>
                    <p class="about-us__list-item-title">
                        Explore Inspiring Online Courses
                    </p>
                </li>
                <li class="about-us__list-item">
                    <Button :square="true">
                        <font-awesome-icon :icon="['fas', 'chevron-right']" />
                    </Button>
                    <p class="about-us__list-item-title">
                        Explore Inspiring Online Courses
                    </p>
                </li>
            </ul>
            <Button class="about-us__learn-more"
                >Learn More
                <font-awesome-icon
                    :icon="['fas', 'arrow-right']"
                    style="margin-inline-start: 0.5rem"
            /></Button>
        </div>
    </section>
</template>

<style lang="scss" scoped>
@import "../../styles/responsive";

.about-us {
    width: 100%;
    display: grid;
    grid-template-columns: 1fr;
    justify-items: center;
    gap: 3rem;

    padding-block: 7rem;

    @include respond-to(xl) {
        grid-template-columns: 1fr 1.5fr;
    }

    &__tag {
        display: flex;
        width: fit-content;
    }

    &__image {
        &-overlay {
            transition: background 0.3s var(--ease-out-expo);
            position: absolute;
            inset: 0;
            background: transparent;
            display: flex;
            justify-content: center;
            align-items: center;

            &:hover,
            :hover {
                background: hsl(0, 0%, 0%, 0.5);
            }
        }
    }

    &__heading {
        font-size: var(--fs-h2);
        font-weight: 600;
        letter-spacing: 0.05rem;
        text-transform: capitalize;
        margin-block-start: 1rem;
        max-width: 24ch;

        @include respond-to(lg) {
            margin-block-start: 2rem;
        }

        span {
            margin-block-start: -0.125rem;
        }
    }
    &__description {
        max-width: 56ch;
        font-weight: 500;
    }

    &__list {
        display: flex;
        flex-direction: column;
        gap: 1.25rem;
        padding: 0;
        margin-block: 2rem 3rem;

        &-item {
            display: flex;
            gap: 1rem;
            align-items: center;

            &-title {
                font-size: var(--fs-h5);
                font-weight: 600;
            }
        }
    }

    &__learn-more {
        margin-inline: auto !important;

        @include respond-to(lg) {
            margin-inline-start: unset !important;
        }
    }
}
</style>
