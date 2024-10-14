<script setup>
import Tag from "@/Components/Website/Tag.vue";
import BecomeAStudentCard from "./BecomeAStudentCard.vue";

const getImageUrl = (relativePath) => {
    return new URL(relativePath, import.meta.url).href;
};
</script>

<template>
    <section class="become-a-student">
        <div class="become-a-student__head" style="margin-bottom: 6rem">
            <Tag
                style="
                    background: var(--color-brand);
                    color: var(--color-white);
                    font-weight: normal;
                "
                >How to Start Journey with Us</Tag
            >
            <p class="become-a-student__heading">Start your Learning Today!</p>
            <p class="become-a-student__subheading">
                Discover a World of Knowledge and Skills at Your Fingertips –
                Unlock Your Potential and Achieve Your Dreams with Our
                Comprehensive Learning Resources!
            </p>
        </div>
        <BecomeAStudentCard
            title="Become a Teacher"
            description="Join our team to inspire students, share your knowledge, and
                shape the future."
            :image="getImageUrl('../../Images/become-a-teacher.png')"
            style="margin-block: 1rem"
            size="1.25x"
        />
        <BecomeAStudentCard
            title="Become a Student"
            description="Join our team to inspire students, share your knowledge, and
                shape the future.Join our team to inspire students, share your knowledge, and
                shape the future."
            :image="getImageUrl('../../Images/become-a-student.png')"
            style="margin-block: 1rem"
            size="1.25x"
            rtl
        />
    </section>
</template>

<style lang="scss" scoped>
.become-a-student,
.become-a-student__head {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.become-a-student {
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
