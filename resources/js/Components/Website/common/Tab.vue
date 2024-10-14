<script setup lang="ts">
import { ref } from "vue";

defineProps<{
    list: string[];
}>();

const emit = defineEmits<{
    (event: "onTap", payload?: Record<string, NonNullable<string>>): void;
}>();

const selectedTabId = ref<number>(0);

const handleTabSelection = (tabId: number, tappedTab: string) => {
    selectedTabId.value = tabId;
    emit("onTap", { tappedTab });
};
</script>

<template>
    <ul class="tab">
        <li
            :class="[{ selected: index === selectedTabId }, 'tab__item']"
            v-for="(item, index) in list"
            :key="index"
            @click="() => handleTabSelection(index, item)"
        >
            {{ item }}
        </li>
    </ul>
</template>

<style lang="scss" scoped>
.tab {
    --_bar-thickness: 2px;
    --_bar-color: hsl(0, 0%, 92%);
    --_not-selected-color: hsl(0, 0%, 52%);

    display: flex;
    flex-flow: row wrap;
    gap: 0;
    justify-content: center;
    margin-bottom: 2rem;

    transition: all 0.35s var(--ease-out-expo);

    &__item {
        transition: inherit;

        padding: 0.75rem;
        position: relative;

        font-weight: 500;

        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
        cursor: pointer;

        &:not(.selected):hover {
            color: var(--_not-selected-color);
        }

        &::after {
            content: "";
            display: block;
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            width: 100%;
            height: var(--_bar-thickness);
            background-color: var(--_bar-color);
        }
        &.selected::before {
            content: "";
            display: block;
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            width: 100%;
            height: var(--_bar-thickness);
            background-color: var(--color-brand);
            z-index: 2;
        }
    }
}
</style>
