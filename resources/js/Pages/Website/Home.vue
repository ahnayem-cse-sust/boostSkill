<template>
    <div>
        <Frontend>
            <Head title="Home" />

            <h1 style="margin-block: 1rem">Components style guide</h1>
            <Button
                name="testButtonName"
                @onTap="() => console.log('do things here!')"
                :to="route('website.courses')"
            >
                Primary style button

                <span
                    style="margin-inline-start: 0.5rem"
                    class="fas fa-arrow-right"
                ></span> </Button
            ><Button
                outlined="true"
                name="testButtonName"
                @onTap="() => console.log('do things here!')"
                :to="route('website.courses')"
            >
                Outlined style button

                <span
                    style="margin-inline-start: 0.5rem"
                    class="fas fa-arrow-right"
                ></span>
            </Button>

            <div class="card">card</div>
            <Tag>skilled instructor</Tag>
            <input
                type="text"
                name="text"
                id="text"
                placeholder="Email Address"
            />

            <Details
                style="max-width: 62ch"
                title="What kind of courses do you offer?"
                content="Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo, odio ad ipsam delectus, beatae ab iusto maxime ex eius voluptates quia recusandae adipisci tempore nobis id fuga unde consequuntur sunt."
            />
            <Details
                style="max-width: 62ch"
                title="What kind of courses do you offer?"
                content="Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo, odio ad ipsam delectus, beatae ab iusto maxime ex eius voluptates quia recusandae adipisci tempore nobis id fuga unde consequuntur sunt."
            />
            <Details
                style="max-width: 62ch"
                title="What kind of courses do you offer?"
                content="Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo, odio ad ipsam delectus, beatae ab iusto maxime ex eius voluptates quia recusandae adipisci tempore nobis id fuga unde consequuntur sunt."
            />
            <Details
                style="max-width: 62ch"
                title="What kind of courses do you offer?"
                content="Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo, odio ad ipsam delectus, beatae ab iusto maxime ex eius voluptates quia recusandae adipisci tempore nobis id fuga unde consequuntur sunt."
            />

            <h2>
                Thousand of Top Online Courses
                <span class="styled-text">Now in One Place</span>
            </h2>

            <h4
                style="
                    display: inline-block;
                    color: var(--color-brand);
                    margin-top: 2rem;
                    margin-bottom: 0.5rem;
                "
            >
                Customized image Wrapper style
            </h4>
            <StyledWrapper size="20"
                ><img
                    src="https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
                    alt=""
            /></StyledWrapper>

            <TeacherCard
                name="Ali Abdali"
                title="Software Engineer"
                size="20"
            />
        </Frontend>
    </div>
</template>

<script setup>
import Button from "@/Components/Button.vue";
import Details from "@/Components/Website/Details.vue";
import StyledWrapper from "@/Components/Website/StyledWrapper.vue";
import Tag from "@/Components/Website/Tag.vue";
import TeacherCard from "@/Components/Website/TeacherCard.vue";
import Frontend from "@/Layouts/WebsiteLayout.vue";
import { Head } from "@inertiajs/vue3";
</script>
