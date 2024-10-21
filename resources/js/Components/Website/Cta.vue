<script setup>
import Button from "@/Components/Button.vue";
import { ref } from "vue";

const clientEmail = ref("");

const submitEmail = async (email) => {
    try {
        // Backend API request here.
        console.log(email);
    } catch (error) {
        console.log(error?.message);
    }
};

const onSwiper = (swiper) => {
    console.log(swiper);
};
const onSlideChange = () => {
    console.log("slide change");
};
</script>

<template>
    <section class="home-cta">
        <div class="home-cta__content">
            <p class="home-cta__heading">
                Want to take the next step toward your personal and professional
                goals with
                <span class="styled-text"> Boost Skill? </span>
            </p>
            <p class="home-cta__description">
                Submit your email to stay updated on the latest in technology
                and our courses.
            </p>
            <div class="home-cta__buttons">
                <input
                    type="text"
                    name="home-cta-client-email"
                    id="home-cta-client-email"
                    placeholder="Enter your email"
                    v-model="clientEmail"
                />
                <Button
                    style="
                        background: var(--color-white);
                        color: var(--color-brand);
                    "
                    @on-tap="submitEmail(clientEmail)"
                    >Subscribes now</Button
                >
            </div>
        </div>
        <div class="home-cta__image">
            <img
                class="styled-border-lg"
                src="https://i.pravatar.cc/499"
                alt=""
            />
        </div>
    </section>
</template>

<style scoped lang="scss">
@import "../../assets/styles/responsive";

.home-cta {
    display: grid;
    grid-template-columns: 1fr;
    place-items: center;
    gap: 3rem;

    padding-block: 3rem;

    background: linear-gradient(var(--color-brand), var(--color-brand-dark));
    color: var(--color-white);

    @include respond-to(xl) {
        grid-template-columns: 1.5fr 1fr;
    }

    &__content {
        display: flex;
        flex-direction: column;
    }

    &__heading,
    &__description {
        text-align: center;

        @include respond-to(xl) {
            text-align: unset;
        }
    }

    &__heading {
        font-size: var(--fs-h2);
        font-weight: 600;
        line-height: 1.2;
    }

    &__description {
        margin-block: 0.5rem 2rem;
    }

    &__buttons {
        width: clamp(18.75rem, 100%, 55ch);
        display: flex;
        flex-flow: row wrap;
        gap: 1rem;

        align-items: center;
        justify-content: center;

        input {
            flex-grow: 1;
            &::placeholder {
                font-weight: 500;
            }
        }
        button {
            margin-block-start: 0.25rem;
        }
    }

    &__image {
        --_size: clamp(10rem, 100%, 22rem);
        display: none;
        width: var(--_size);
        height: var(--_size);
        aspect-ratio: 1;

        @include respond-to(xl) {
            display: unset;
        }
    }
}
</style>
