<script setup>
import Button from "../Button.vue";
</script>

<template>
    <section class="hero">
        <div class="container">
            <h1 class="hero__title">
                Better <span class="text-brand">education</span> for A better
                world
            </h1>
            <p class="hero__description">
                Lorem Ipsum is simply dummy text of the printing and typesetting
                industry. Lorem Ipsum has been the industry's standard dummy
                text ever since the 1500s, when an unknown printer took a galley
                of type and scrambled it to make a type specimen book.
            </p>
            <div class="hero__buttons">
                <Button :to="route('website.courses')"
                    >Check our courses
                    <font-awesome-icon
                        :icon="['fas', 'arrow-right']"
                        style="margin-inline-start: 0.5rem"
                    />
                </Button>
                <span class="hero__video-btn">
                    <Button style="width: 3.5rem" :square="true">
                        <font-awesome-icon :icon="['fas', 'play']"
                    /></Button>
                    <p>Watch our class demo</p>
                </span>
            </div>
        </div>
    </section>
</template>

<style scoped>
.hero {
    display: flex;
    align-items: center;

    width: 100vw;
    margin-inline: calc(-50vw + 50%);

    min-height: 100vh;
    min-height: 100dvh;
    min-height: 100svh;

    background: linear-gradient(hsl(0, 0%, 0%, 0.8), hsl(0, 0%, 0%, 0.2)),
        linear-gradient(hsl(0, 0%, 0%, 0.2), hsl(0, 0%, 0%, 0.6)),
        url("../../Images/home-hero.jpg");

    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    clip-path: polygon(100% 0, 100% 73%, 37% 90%, 0 74%, 0 0);
}

.hero__title {
    color: var(--color-bg);
    text-transform: uppercase;
    font-weight: bold;
    font-size: 4rem;
    letter-spacing: 0.25rem;

    max-width: 21ch;

    margin-block-start: -10rem; /* fixes center issue regarding background */
}

.hero__description {
    color: var(--color-white-800);

    max-width: 72ch;
}
.hero__buttons {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-block-start: 2rem;
}

.hero__video-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    padding: 0.5rem;

    color: var(--color-bg);
}
.hero__video-btn p {
    max-width: 10ch;
}
</style>
