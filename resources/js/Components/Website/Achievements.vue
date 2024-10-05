<script setup></script>

<template>
    <section class="achievements">
        <p class="achievements__heading">Our Achievements</p>
        <ul class="achievements__card card">
            <li class="achievements__item">
                <p class="achievements__number">2000+</p>
                <p class="achievements__category-name">active Students</p>
            </li>
            <li class="achievements__item">
                <p class="achievements__number">100+</p>
                <p class="achievements__category-name">Faculty Courses</p>
            </li>
            <li class="achievements__item">
                <p class="achievements__number">700+</p>
                <p class="achievements__category-name">Best Professors</p>
            </li>
            <li class="achievements__item">
                <p class="achievements__number">50+</p>
                <p class="achievements__category-name">Award Achieved</p>
            </li>
        </ul>
    </section>
</template>

<style scoped>
.achievements {
    display: flex;
    flex-direction: column;
    align-items: center;
}
.achievements__heading {
    --_circle-size: 1rem;
    --_circle-overlap-fix: calc(var(--_circle-size) / 2);

    max-width: fit-content;
    font-size: var(--fs-h2);
    font-weight: 600;
    position: relative;
    margin-block-end: calc(var(--_circle-overlap-fix) + 3rem);
}
.achievements__heading::after {
    --_y: 0.5rem;
    --_thickness: 1.5px;

    content: "";
    display: flex;
    width: 100%;
    height: var(--_thickness);
    background: var(--color-brand);
    margin-block-start: var(--_y);
}
.achievements__heading::before {
    --_thickness: 3px;

    content: "";
    display: flex;
    width: var(--_circle-size);
    height: var(--_circle-size);
    aspect-ratio: 1;
    border-radius: var(--rounded-full);
    border: var(--_thickness) solid var(--color-brand);
    background: var(--color-bg);
    position: absolute;
    top: 100%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.achievements__card {
    background: var(--color-brand);
    color: var(--color-white);

    border-radius: var(--rounded-full);

    display: flex;
    flex-direction: row;
    padding-block: 2rem;
}

.achievements__item {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding-inline: 4rem;
}

.achievements__item + .achievements__item {
    border-left: 1px solid var(--color-white-800);
}
.achievements__number {
    font-size: var(--fs-h1);
    font-weight: 500;
    margin-bottom: -0.75rem;
}
.achievements__category-name {
    text-transform: capitalize;
}
</style>
