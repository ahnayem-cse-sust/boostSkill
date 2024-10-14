<script setup lang="ts">
import Details from "@/Components/Website/Details.vue";
import StyledWrapper from "@/Components/Website/StyledWrapper.vue";
import Tag from "@/Components/Website/Tag.vue";
</script>

<template>
    <section class="home-faq">
        <div class="home-faq__image">
            <StyledWrapper :size="30">
                <img src="https://i.pravatar.cc/699" alt="" />
            </StyledWrapper>
        </div>
        <div class="home-faq__content">
            <Tag>Frequently Asked Questions</Tag>
            <p class="home-faq__heading">
                Start Learning From World&apos;s Pro Instructors
            </p>
            <p>
                The point of using Lorem Ipsum is that it has a more-or-less
                normal distribution of letters, as opposed to using 'Content
                here, content here', making it look like readable English.
            </p>

            <div class="home-faq__list">
                <Details
                    v-for="i in 5"
                    title="What kind of courses do we offer?"
                    content="It is a
              long established fact that a reader will be distracted by the
              readable content of a page when looking at its layout. The point of
              using Lorem Ipsum is that it has a more-or-less normal distribution
              of letters."
                />
            </div>
        </div>
    </section>
</template>

<style lang="scss" scoped>
.home-faq {
    display: flex;
    margin-block: 7rem;

    > * {
        flex: 0 0 50%;
    }

    &__image {
        display: flex;
        align-items: center;
    }

    &__heading {
        font-size: var(--fs-h2);
        font-weight: 600;
        line-height: var(--lh-h2);
        margin-block: 1rem 0.25rem;
        max-width: 24ch;

        + * {
            margin-block-end: 2rem;
            max-width: 50ch;
        }
    }

    &__list {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }
}
</style>
