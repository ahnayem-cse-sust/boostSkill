<script setup>
import Tag from "@/Components/Website/Tag.vue";
import StartJourneyCard from "./StartJourneyCard.vue";

const getImageUrl = (relativePath) => {
    return new URL(relativePath, import.meta.url).href;
};
</script>

<template>
    <section class="start-journey">
        <div class="start-journey__head" style="margin-bottom: 6rem">
            <Tag
                style="
                    background: var(--color-brand);
                    color: var(--color-white);
                    font-weight: normal;
                "
                >How to Start Journey with Us</Tag
            >
            <p class="start-journey__heading">Start your Learning Today!</p>
            <p class="start-journey__subheading">
                Discover a World of Knowledge and Skills at Your Fingertips –
                Unlock Your Potential and Achieve Your Dreams with Our
                Comprehensive Learning Resources!
            </p>
        </div>
        <StartJourneyCard
            title="Become a Teacher"
            description="Join our team to inspire students, share your knowledge, and
                shape the future."
            :image="getImageUrl('../../assets/Images/become-a-teacher.png')"
            style="margin-block: 1rem"
            size="1.25x"
        />
        <StartJourneyCard
            title="Become a Student"
            description="Join our team to inspire students, share your knowledge, and
                shape the future.Join our team to inspire students, share your knowledge, and
                shape the future."
            :image="getImageUrl('../../assets/Images/become-a-student.png')"
            style="margin-block: 1rem"
            size="1.25x"
            rtl
        />
    </section>
</template>

<style lang="scss" scoped>
.start-journey,
.start-journey__head {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.start-journey {
    width: 100vw;
    margin-inline: calc(-50vw + 50%);
    padding-block: 4rem 6rem;

    display: flex;
    flex-direction: column;
    align-items: center;

    background: var(--color-secondary);

    &__head {
        color: var(--color-white);
    }

    &__heading,
    &__subheading {
        text-align: center;
    }
    &__heading {
        font-size: var(--fs-h2);
        font-weight: 600;

        margin-block: 1rem 0.25rem;
    }
    &__subheading {
        max-width: 72ch;
    }
}
</style>
