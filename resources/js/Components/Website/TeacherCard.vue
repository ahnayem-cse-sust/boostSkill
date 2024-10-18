<script setup>
defineProps({
    name: String,
    title: String,
    image: String,
    size: Number, // in rem;; If not specified it will be 100%; Better to not specify when using with grid layout
});
</script>

<template>
    <article
        class="teacher-card"
        :style="size ? `--_size: ${size}rem` : '--_size: 100%'"
    >
        <div class="teacher-card__image">
            <img
                :src="
                    image ||
                    'https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2'
                "
                :alt="`${name || 'John Doe'}\'s profile picture`"
            />
        </div>
        <div class="teacher-card__info">
            <div class="teacher-card__background"></div>
            <p class="teacher-card__name">{{ name || "John Doe" }}</p>
            <p class="teacher-card__title">
                {{ title || "Software Engineer" }}
            </p>
        </div>
    </article>
</template>

<style scoped>
.teacher-card {
    --_size: 100%;
    display: flex;
    position: relative;
    width: var(--_size);
    overflow: hidden;
    border-radius: var(--rounded-md);
}

.teacher-card__image {
    width: var(--_size);
    height: var(--_size);
    aspect-ratio: 1;
}

.teacher-card__info {
    transition: all 0.3s var(--ease-out-expo);
    padding: 0.5rem 1rem;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    position: absolute;

    min-height: 5rem;
    bottom: 0;
    left: 0;
    right: 0;
}
.teacher-card:hover .teacher-card__info {
    min-height: 100%;
}

.teacher-card__background {
    background: var(--color-brand);
    mix-blend-mode: multiply;
    position: absolute;
    inset: 0;
}
.teacher-card__name {
    text-transform: capitalize;
    font-size: var(--fs-h6);
    font-weight: 600;
    letter-spacing: 0.035rem;
    color: var(--color-white);
    z-index: 1;
}
.teacher-card__title {
    color: var(--color-white);
    z-index: 1;
    margin-top: -0.35rem;
}
</style>
