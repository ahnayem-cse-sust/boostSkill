<template>
    <div class="grid-col" :style="gridStyles">
        <slot></slot>
    </div>
</template>

<style lang="scss" scoped>
@import "../../../styles/responsive";

.grid-col {
    // Loop through breakpoints imported from _responsive.scss to create responsive media queries
    @each $key, $_ in $breakpoints {
        @include respond-to($key) {
            --_columns: var(--_columns-#{$key});
        }
    }

    // Default column configuration
    --_columns: var(--_columns-xs);
    --_column-gap: 1rem;
    --_row-gap: 1rem;

    width: 100%;

    display: grid;
    place-content: start center;

    grid-template-columns: repeat(
        auto-fit,
        minmax(
            calc(100% / var(--_columns) - var(--_column-gap)),
            calc(100% / var(--_columns) - var(--_column-gap))
        )
    );

    > * {
        margin-block-end: var(--_row-gap);
    }
    column-gap: var(--_column-gap);
}
</style>

<script setup lang="ts">
import { computed } from "vue";

type CssSizeUnits =
    | `${number}${"px" | "rem" | "em" | "ch" | "vw" | "vh" | "%"}`
    | string;

// Define the shape of the Columns object
type DeviceColumns =
    | number
    | {
          sm?: number;
          md?: number;
          lg?: number;
          xl?: number;
          xxl?: number;
          xxxl?: number;
      };

// Define props, allowing either a number or the Columns object
const { columns, gap } = defineProps<{
    columns: DeviceColumns;
    gap?:
        | `${number}${"px" | "rem" | "em"}`
        | `${number}${"px" | "rem" | "em"} ${number}${"px" | "rem" | "em"}`;
}>();

// Array of breakpoints in mobile-first order
const breakpoints = ["xs", "sm", "md", "lg", "xl", "xxl", "xxxl"];

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
            columns?.[fallbackDevice as keyof DeviceColumns];
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

    // Set the gap values if defined
    if (gap) {
        const gapArray = gap.split(" ");

        if (gapArray.length === 1) {
            styleObject["--_row-gap"] = gapArray[0];
            styleObject["--_column-gap"] = gapArray[0];
        } else if (gapArray.length === 2) {
            styleObject["--_row-gap"] = gapArray[0];
            styleObject["--_column-gap"] = gapArray[1];
        }
    }

    return styleObject;
});
</script>
