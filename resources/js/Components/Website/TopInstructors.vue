<script setup>
import Button from "@/Components/Button.vue";
import Tag from "@/Components/Website/Tag.vue";
import TeacherCard from "@/Components/Website/TeacherCard.vue";
import GridColumn from "./common/GridColumn.vue";
</script>

<template>
    <section class="top-instructors">
        <div class="top-instructors__head">
            <Tag>Skilled Instructors</Tag>
            <p class="top-instructors__heading">Learn from Creative Experts</p>
            <p class="top-instructors__description">
                Boost Skill classes are taught by industry leaders excited to
                share their tools, techniques, and professional journeys with
                you.
            </p>
        </div>
        <div class="top-instructors__cards">
            <GridColumn
                :columns="{
                    sm: 2,
                    lg: 3,
                }"
            >
                <TeacherCard
                    name="Ali abdali"
                    image="https://i.pravatar.cc/500"
                />
                <TeacherCard
                    name="John Doe"
                    title="Software Engineer"
                    image="https://i.pravatar.cc/501"
                />
                <TeacherCard
                    name="rehana nur"
                    title="teacher"
                    image="https://i.pravatar.cc/502"
                />
                <TeacherCard
                    name="nazmus sakib"
                    title="web developer"
                    image="https://i.pravatar.cc/503"
                />
                <TeacherCard
                    name="Nayem"
                    title="Software Engineer"
                    image="https://i.pravatar.cc/504"
                />
                <TeacherCard
                    name="mijan"
                    title="Web designer"
                    image="https://i.pravatar.cc/505"
                />
            </GridColumn>
        </div>
        <Button style="margin-block-start: 2rem"
            >See All Instructors
            <font-awesome-icon
                :icon="['fas', 'arrow-right']"
                style="margin-inline-start: 0.5rem"
        /></Button>
    </section>
</template>

<style scoped lang="scss">
.top-instructors,
.top-instructors__head {
    display: flex;
    flex-direction: column;
    align-items: center;
}
.top-instructors {
    margin-inline: auto;
    padding-block: 10rem;
    gap: 3rem;

    &__heading,
    &__description {
        text-align: center;
    }

    &__heading {
        font-size: var(--fs-h2);
        font-weight: 600;
        margin-block: 0.5rem 0;
    }

    &__description {
        max-width: 55ch;
        font-weight: 500;
    }

    &__cards {
        width: clamp(0rem, 50rem, 100%);
    }
}
</style>
