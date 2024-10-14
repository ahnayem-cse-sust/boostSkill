<!-- 
Mobile:
mobile-md: Medium mobile screens (up to 22.5rem / 360px)
mobile-lg: Large mobile screens (up to 26.875rem / 430px)

Tablet:
tablet-sm: Small tablet screens (up to 48rem / 768px)
tablet-md: Medium tablet screens (up to 61rem / 991px)
tablet-lg: Large tablet screens (up to 73.75rem / 1180px)

Desktop:
desktop-sm: Small desktop screens (up to 80rem / 1280px)
desktop-md: Medium desktop screens (up to 90rem / 1440px)
desktop-lg: Large desktop screens (up to 96rem / 1536px)
desktop-xl: Extra-large desktop screens (above 120rem / 1920px)
-->

<template>
    <div class="grid-col" :style="gridStyles">
        <slot></slot>
    </div>
</template>

<style lang="scss" scoped>
.grid-col {
    $breakpoints: (
        "mobile-sm": "22.5rem",
        "mobile-md": "26.875rem",
        "mobile-lg": "36rem",
        "tablet-sm": "48rem",
        "tablet-md": "61rem",
        "tablet-lg": "73.75rem",
        "desktop-sm": "80rem",
        "desktop-md": "90rem",
        "desktop-lg": "96rem",
        "desktop-xl": "120rem",
    );

    // Loop through breakpoints to create responsive media queries
    @each $key, $value in $breakpoints {
        @media screen and (min-width: #{$value}) {
            --_columns: var(
                --_columns-#{$key}
            ); // No need for nested fallbacks anymore
        }
    }

    // Default column configuration for mobile-sm
    --_columns: var(--_columns-mobile-sm);
    --_column-gap: 1rem;
    --_row-gap: 1rem;

    display: grid;
    grid-template-columns: repeat(
        auto-fit,
        minmax(
            calc(100% / var(--_columns) - var(--_column-gap)),
            calc(100% / var(--_columns) - var(--_column-gap))
        )
    );
    column-gap: var(--_column-gap);
    row-gap: var(--_row-gap);
}
</style>

<script setup lang="ts">
import { computed } from "vue";

// Define the shape of the Columns object
type DeviceColumns =
    | number
    | { sm?: number; md?: number; lg?: number; xl?: number };
type Columns = {
    mobile?: DeviceColumns;
    tablet?: DeviceColumns;
    desktop?: DeviceColumns;
};

// Define props, allowing either a number or the Columns object
const { columns } = defineProps<{
    columns: Columns | number;
}>();

// Array of breakpoints in mobile-first order
const breakpoints = [
    "mobile-sm",
    "mobile-md",
    "mobile-lg",
    "tablet-sm",
    "tablet-md",
    "tablet-lg",
    "desktop-sm",
    "desktop-md",
    "desktop-lg",
    "desktop-xl",
];

// Helper function to get the column count for a given device and size
const getDeviceSizeColumns = (
    device: DeviceColumns | undefined,
    size: string
): number | undefined => {
    // If the device is a number, use it directly for all sizes
    if (typeof device === "number") return device;

    // If it's an object, return the specific size if defined
    return device?.[size as keyof typeof device];
};

// Cascading fallback logic
const getBreakpointColumns = (breakpoint: string): number => {
    // Find fallback values by progressively moving to smaller breakpoints
    const breakpointIndex = breakpoints.indexOf(breakpoint);
    for (let i = breakpointIndex; i >= 0; i--) {
        const fallbackBreakpoint = breakpoints[i];
        const [fallbackDevice, fallbackSize] = fallbackBreakpoint.split("-");
        const fallbackDeviceColumns =
            columns?.[fallbackDevice as keyof Columns];
        const fallbackColumnValue = getDeviceSizeColumns(
            fallbackDeviceColumns,
            fallbackSize
        );
        if (fallbackColumnValue !== undefined) {
            return fallbackColumnValue;
        }
    }

    // Final fallback if no value is provided anywhere (1 column by default)
    return 1;
};

// Dynamically generate the style object for grid columns
const gridStyles = computed(() => {
    const styleObject: Record<string, string> = {};

    // Ensure every breakpoint gets the correct number of columns, falling back as needed
    breakpoints.forEach((breakpoint) => {
        styleObject[`--_columns-${breakpoint}`] =
            getBreakpointColumns(breakpoint).toString();
    });

    // IMPLEMENT ROW AND COLUMN GAP PROPERTIES;

    return styleObject;
});
</script>
