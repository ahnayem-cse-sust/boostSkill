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
        <div class="home-cta--wrapper container">
            <div class="home-cta__content">
                <p class="home-cta__heading">
                    Want to take the next step toward your personal and
                    professional goals with
                    <span class="styled-text"> Boost Skill? </span>
                </p>
                <p class="home-cta__description">
                    Submit your email to stay updated on the latest in
                    technology and our courses.
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
        </div>
    </section>
</template>

<style scoped lang="scss">
.home-cta {
    width: 100vw;
    padding-block: 3rem;
    margin-inline: calc(-50vw + 50%);

    background: linear-gradient(var(--color-brand), var(--color-brand-dark));
    color: var(--color-white);

    &--wrapper {
        display: grid;
        grid-template-columns: 1fr 1fr;
        place-items: center;
        gap: 3rem;
    }

    &__content {
        display: flex;
        flex-direction: column;
        padding-inline-start: 1rem;
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
        display: flex;
        gap: 1rem;
        align-items: center;

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
        width: 27rem;
        height: 27rem;
        aspect-ratio: 1;
    }
}
</style>
