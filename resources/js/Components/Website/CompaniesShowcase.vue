<script setup>
import { onMounted, ref } from "vue";
const companies = ref(["1", "2", "3", "4", "5"]);

const getImageUrl = () => {
    for (let i = 0; i < companies.value.length; i++) {
        companies.value[i] = new URL(
            `../../assets/companies/partner-logo-${i + 1}.svg`,
            import.meta.url
        );
    }
};

onMounted(() => {
    getImageUrl();
});
</script>

<template>
    <section class="companies-showcase">
        <p class="companies-showcase__heading">
            Trusted by over 500+ companies and millions of learners around the
            world
        </p>
        <div class="companies-showcase__logos">
            <img
                v-for="company in companies"
                :key="company"
                :src="company"
                alt=""
            />
        </div>
    </section>
</template>

<style scoped lang="scss">
.companies-showcase {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 3rem;

    width: 100vw;
    margin-inline: calc(-50vw + 50%);
    padding: 1rem 7rem;
    margin-block: 10rem;

    background: var(--color-brand);

    &__heading {
        font-size: 1.25rem;
        font-weight: 500;
        color: var(--color-white);
    }

    &__logos {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(10rem, 1fr));
        place-items: center;
        gap: 4rem;

        padding-block: 1rem 2rem;

        img {
            object-fit: contain;
            height: 3.5rem;
        }
    }
}
</style>
