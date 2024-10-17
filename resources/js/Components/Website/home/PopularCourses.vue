script
<script setup lang="ts">
import Button from "@/Components/Button.vue";
import CourseCard from "@/Components/Website/home/CourseCard.vue";
import axios from "axios";
import { ref } from "vue";
import GridColumn from "../common/GridColumn.vue";
import Tab from "../common/Tab.vue";
import Tag from "../Tag.vue";

const mockData: Course[] = [
    {
        id: "1",
        title: "Mastering Digital Marketing",
        subtitle: "Learn SEO, PPC, and Social Media",
        description:
            "This course covers the essential tools and strategies in digital marketing, from SEO and PPC to effective social media management.",
        image: "https://example.com/images/digital-marketing.jpg",
        category: "marketing",
        price: 50.99,
    },
    {
        id: "2",
        title: "Graphic Design for Beginners",
        subtitle: "Create Stunning Designs with Adobe Illustrator",
        description:
            "This beginner course will teach you the basics of graphic design and how to use Adobe Illustrator to create professional-level graphics.",
        image: "https://example.com/images/graphic-design.jpg",
        category: "graphic design",
        price: 51.99,
    },
    {
        id: "3",
        title: "Creative Writing: Crafting Compelling Stories",
        subtitle: "Develop your storytelling skills",
        description:
            "Unlock your creativity and learn how to craft compelling stories with this comprehensive creative writing course.",
        image: "https://example.com/images/creative-writing.jpg",
        category: "writing",
        price: 52.99,
    },
    {
        id: "4",
        title: "React for Web Developers",
        subtitle: "Build Dynamic Websites with React",
        description:
            "This course will teach you the fundamentals of React and how to build dynamic, modern websites using React.js.",
        image: "https://example.com/images/react-web-development.jpg",
        category: "web development",
        price: 53.99,
    },
    {
        id: "5",
        title: "App Development with Flutter",
        subtitle: "Create Cross-Platform Apps with Ease",
        description:
            "Learn how to develop high-performance, cross-platform mobile applications using Flutter and Dart.",
        image: "https://example.com/images/flutter-app-development.jpg",
        category: "app development",
        price: 54.99,
    },
    {
        id: "6",
        title: "Entrepreneurship Essentials",
        subtitle: "Build and Grow Your Business",
        description:
            "Learn the core concepts of entrepreneurship, including business planning, funding, and scaling your startup.",
        image: "https://example.com/images/entrepreneurship.jpg",
        category: "business",
        price: 55.99,
    },
    {
        id: "7",
        title: "Video Editing with Premiere Pro",
        subtitle: "Create Professional Videos with Adobe Premiere Pro",
        description:
            "This course will teach you how to edit videos like a pro using Adobe Premiere Pro, from basic cuts to advanced color grading.",
        image: "https://example.com/images/video-editing.jpg",
        category: "video and photography",
        price: 56.99,
    },
    {
        id: "8",
        title: "Full-Stack Programming with JavaScript",
        subtitle: "Master Front-End and Back-End Development",
        description:
            "Become a full-stack developer by learning JavaScript for both client-side and server-side development.",
        image: "https://example.com/images/full-stack-js.jpg",
        category: "programming",
        price: 57.99,
    },
    {
        id: "9",
        title: "Building RESTful APIs with Node.js",
        subtitle: "Create Scalable Back-End Services",
        description:
            "Learn how to design and build RESTful APIs using Node.js and Express to create scalable back-end services.",
        image: "https://example.com/images/nodejs-api.jpg",
        category: "web development",
        price: 58.99,
    },
    {
        id: "10",
        title: "Content Writing for SEO",
        subtitle: "Create High-Quality, SEO-Optimized Content",
        description:
            "This course will teach you how to write engaging, SEO-friendly content that ranks high on search engines.",
        image: "https://example.com/images/content-writing.jpg",
        category: "writing",
        price: 59.99,
    },
];

type CourseCategory =
    | "marketing"
    | "graphic design"
    | "writing"
    | "web development"
    | "app development"
    | "business"
    | "video and photography"
    | "programming";

type Course = {
    id: string;
    title: string;
    subtitle: string;
    description: string;
    image: string;
    category: CourseCategory;
    price: number;
};

const allPopularCourses = ref<Course[]>([]);
const filteredPopularCourses = ref<Course[]>([]);

const categories = [
    "All Courses",
    "Marketing",
    "Graphic Design",
    "Writing",
    "Web Development",
    "App Development",
    "Business",
    "Video & Photography",
    "Programming",
];

async function fetchPopularCourses(apiUrl: `https://${string}`) {
    try {
        // Handle the backend data (popular courses)
        const res = await axios.get(apiUrl);
        // Sets state
        allPopularCourses.value = res.data;
        filteredPopularCourses.value = res.data;
    } catch (error) {
        console.error(error);
    }
}

function setInitialData() {
    allPopularCourses.value = mockData;
    filteredPopularCourses.value = mockData.slice(0, 8);
}

// fetchPopularCourses("https://apiurl.com/get");
setInitialData();

const handleTabSelection = (category: string) => {
    console.log(category);

    if (!category) return;
    if (category.toLowerCase() === "All Courses".toLowerCase())
        return (filteredPopularCourses.value = allPopularCourses.value?.slice(
            0,
            8
        ));

    const filteredResult = allPopularCourses.value
        ?.slice(0, 8)
        ?.filter(
            (course: Course) =>
                course.category.toLowerCase() === category.toLowerCase()
        );

    return (filteredPopularCourses.value = filteredResult);
};
</script>

<template>
    <section id="home-popular-courses" class="popular-courses">
        <section class="popular-courses__head">
            <Tag>popular courses</Tag>
            <p class="popular-courses__heading">
                Explore inspiring online courses
            </p>
            <p class="popular-courses__sub-heading">
                Checkout the high demanding categories now
            </p>
        </section>
        <Tab
            :list="categories"
            @on-tap="({ tappedTab }) => handleTabSelection(tappedTab)"
        />
        <GridColumn
            :columns="{
                sm: 2,
                xl: 3,
                xxl: 4,
            }"
            gap="2rem 1rem"
            class="popular-courses__cards"
        >
            <CourseCard
                v-if="filteredPopularCourses.length !== 0"
                v-for="course in filteredPopularCourses"
                :title="course.title"
                :sub-title="course.subtitle"
                :description="course.description"
                :price="course.price"
            />
            <p v-else class="popular-courses__not-found-text">
                Sorry, no courses found for this category
            </p>
        </GridColumn>

        <div class="popular-courses__buttons">
            <Button outlined :to="route('website.courses')"
                >View all popular courses</Button
            >
            <Button :to="route('website.courses')">View all courses</Button>
        </div>
    </section>
</template>

<style lang="scss" scoped>
.popular-courses {
    padding-block: 6rem;

    &__head {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        margin-block-end: 2rem;
    }

    &__heading {
        font-size: var(--fs-h2);
        font-weight: 600;
        text-transform: capitalize;

        margin-block-start: 0.75rem;
    }
    &__sub-heading {
        color: var(--color-secondary);
        font-weight: 500;
    }

    &__cards {
        min-height: 80vh;;
        min-height: 80dvh;;
        min-height: 80svh;;
    }

    &__buttons {
        margin-block: 3rem;
        display: flex;
        flex-flow: row wrap;
        gap: 2rem;
        justify-content: center;
    }

    &__not-found-text {
        text-align: center;
        margin: 0 auto;
    }
}
</style>
