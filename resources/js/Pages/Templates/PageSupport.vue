<script setup>
import { defineProps } from "vue";
import PublicLayout from "@/Layouts/PublicLayout";
import {
    NewspaperIcon,
    PhoneIcon,
    SupportIcon,
    ArrowNarrowRightIcon,
} from "@heroicons/vue/outline";
import LogoCloud from "@/Pages/Shared/LogoCloud";

defineProps({
    page: Object,
});

const supportLinks = [
    {
        name: "Services",
        href: "#",
        description: "Like what you see? Hire me!",
        icon: PhoneIcon,
    },
    {
        name: "Youtube",
        href: "#",
        description: "A like and a follow go a long way.",
        icon: SupportIcon,
    },
    {
        name: "Twitch",
        href: "#",
        description:
            "I do variety streams, follow me to get updates when I go live and such.",
        icon: NewspaperIcon,
    },
];
</script>

<template>
    <PublicLayout :title="page.title">
        <div>
            <div
                class="relative mx-auto max-w-7xl py-16 px-4 pb-24 sm:px-6 lg:px-8"
            >
                <h1
                    class="mt-4 text-xl font-extrabold leading-8 tracking-tight text-white sm:text-4xl"
                >
                    {{ page.title }}
                </h1>

                <div
                    class="prose prose-invert mt-3 sm:mt-4 sm:mb-0 md:prose-lg lg:prose-xl"
                    v-html="page.body"
                />

                <section aria-labelledby="contact-heading" class="mt-16">
                    <h2 id="contact-heading" class="sr-only">Contact us</h2>
                    <div
                        class="grid grid-cols-1 gap-y-20 lg:grid-cols-3 lg:gap-y-0 lg:gap-x-8"
                    >
                        <div
                            v-for="link in supportLinks"
                            :key="link.name"
                            class="flex flex-col rounded-lg bg-dark-300 shadow-md shadow-xl"
                        >
                            <div
                                class="relative flex-1 px-6 pt-16 pb-8 md:px-8"
                            >
                                <div
                                    class="absolute top-0 inline-block flex h-12 w-12 -translate-y-1/2 transform items-center justify-center rounded-md bg-primary-600 shadow-md"
                                >
                                    <component
                                        :is="link.icon"
                                        aria-hidden="true"
                                        class="h-6 w-6 text-white"
                                    />
                                </div>
                                <h3 class="text-xl font-semibold text-white">
                                    {{ link.name }}
                                </h3>
                                <p class="mt-4 text-base text-gray-400">
                                    {{ link.description }}
                                </p>
                            </div>

                            <a
                                :href="link.href"
                                class="group flex items-center justify-between rounded-bl-lg rounded-br-lg bg-dark-300 p-6 text-base font-medium text-primary-300 hover:bg-dark-200 hover:text-primary-200 md:px-8"
                            >
                                <span>Contact us</span>
                                <ArrowNarrowRightIcon
                                    aria-hidden="true"
                                    class="ml-4 h-6 w-6 -translate-x-6 opacity-0 transition-all delay-100 group-hover:translate-x-0 group-hover:opacity-100"
                                />
                            </a>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </PublicLayout>
</template>
