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

<style lang="scss" scoped>
@import "../../styles/responsive";

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
    --_orientation: column;
    --_divider: 1px solid var(--color-white-800);

    background: var(--color-brand);
    color: var(--color-white);

    display: flex;
    flex-flow: var(--_orientation);

    padding-block: 1rem 2rem;
    width: clamp(20rem, 100%, 25rem);

    @include respond-to(lg) {
        --_orientation: row wrap;

        border-radius: var(--rounded-full);

        width: clamp(20rem, 100%, 100%);
        padding-block: 2rem;
    }
}

.achievements__item {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding-block: 1rem;

    @include respond-to(lg) {
        padding-block: 0;
        padding-inline: 4rem;
    }
}

.achievements__item + .achievements__item {
    border-top: var(--_divider);

    @include respond-to(lg) {
        border-top: none;
        border-left: var(--_divider);
    }
}
.achievements__number {
    font-size: var(--fs-h6);
    font-weight: 500;

    @include respond-to(md) {
        font-size: var(--fs-h4);
    }
    @include respond-to(lg) {
        margin-bottom: -0.75rem;
        font-size: var(--fs-h2);
    }
}
.achievements__category-name {
    text-transform: capitalize;
    text-align: center;

    font-size: var(--fs-sm);
    line-height: var(--lh-xs);

    @include respond-to(lg) {
        font-size: var(--fs-base);
        line-height: var(--lh-sm);
    }
}
</style>
