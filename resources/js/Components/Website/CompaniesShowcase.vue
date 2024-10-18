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
            <div class="companies-showcase__image" v-for="company in companies">
                <img :key="company" :src="company" alt="" />
            </div>
        </div>
    </section>
</template>

<style scoped lang="scss">
@import "../../styles/responsive";

.companies-showcase {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 3rem;

    width: 100vw;
    margin-inline: calc(-50vw + 50%);
    padding: 1rem 2rem;
    margin-block: 10rem;

    background: var(--color-brand);

    &__heading {
        font-size: var(--fs-base);
        font-weight: 500;
        color: var(--color-white);
        text-align: center;

        @include respond-to(md) {
            font-size: var(--fs-h6);
            text-align: unset;
        }
    }

    &__logos {
        // display: grid;
        // grid-template-columns: repeat(auto-fit, minmax(3rem, 1fr));
        // place-items: center;
        // gap: 4rem;

        display: flex;
        flex-flow: row wrap;
        justify-content: center;
        gap: 3rem;

        padding-block: 1rem 2rem;

        @include respond-to(md) {
            gap: 4rem;
        }
    }

    &__image {
        flex: 0 1 clamp(3rem, 100vw, 30%);

        @include respond-to(md) {
            flex: 0 1 clamp(3rem, 100vw, 10%);
        }

        img {
            height: 3.5rem;
            object-fit: contain;
        }
    }
}
</style>
