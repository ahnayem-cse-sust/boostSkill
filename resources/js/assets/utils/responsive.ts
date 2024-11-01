// Whenever you intend to use a breakpoint in a template, you should use this; and if you intend to change the breakpoint you should make changes to _responsive.scss file also.

// function to get the breakpoint value.
/**
 * Gets the value of a breakpoint.
 * @param {keyof typeof breakpoints} breakpoint The breakpoint to get the value for.
 * @returns {string} The value of the breakpoint.
 * @sizes
 * xs: "320px",
 * sm: "481px",
 * md: "601px",
 * lg: "769px",
 * xl: "1025px",
 * xxl: "1281px",
 * xxxl: "1441px",
 */
export function getBreakpointValue(breakpoint: keyof typeof breakpoints) {
    return breakpoints[breakpoint];
}

export const breakpoints = {
    // Mobiles
    xs: "320px",
    // Mobile(landscape)
    sm: "481px",
    // Small tablets
    md: "601px",
    // Large Tablets
    lg: "769px",
    // Laptops or Small desktop screens
    xl: "1025px",
    // Large Laptop or Desktop screens
    xxl: "1281px",
    // Extra large Laptop or Desktop screens
    xxxl: "1441px",
} as const;
