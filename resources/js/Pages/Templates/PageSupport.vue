<script setup>
import PublicLayout from "@/Layouts/PublicLayout";
import {
    NewspaperIcon,
    ChatIcon,
    ArrowNarrowRightIcon,
    PlayIcon,
} from "@heroicons/vue/outline";
import { usePage, Link } from "@inertiajs/inertia-vue3";

defineProps({
    page: Object,
});

const youtube = usePage().props.value.socialMedia.find(
    (x) => x.name === "Youtube"
);

const twitch = usePage().props.value.socialMedia.find(
    (x) => x.name === "Twitch"
);

const supportCards = [
    {
        name: "Services",
        href: route("page", "contact"),
        description:
            "Want some `one on one` tutoring? Lecture or course? Let me know, and I'll see what I can do.",
        links: [
            {
                title: "Programming",
                slug: "programming",
            },
            {
                title: "Tutoring",
                slug: "tutoring",
            },
            {
                title: "Courses",
                slug: "courses",
            },
        ],
        icon: NewspaperIcon,
    },
    {
        ...youtube,
        description:
            "I try to post regularly on YouTube. A like and subscribe go a long way. If you like the content ;)",
        icon: PlayIcon,
    },
    {
        ...twitch,
        description:
            "Variety streams, mainly games, but follow me to get updates when I go live and such.",
        icon: ChatIcon,
    },
];
</script>

<template>
    <PublicLayout :title="page.title">
        <div>
            <div class="relative mx-auto max-w-7xl py-16 px-4 sm:px-6 lg:px-8">
                <h1 class="page-title">
                    {{ page.title }}
                </h1>

                <div
                    class="prose prose-invert mt-3 sm:mt-4 sm:mb-0 md:prose-lg"
                    v-html="page.body"
                />

                <section aria-label="Services" class="mt-16">
                    <div
                        class="grid grid-cols-1 gap-y-20 lg:grid-cols-3 lg:gap-y-0 lg:gap-x-8"
                    >
                        <Link
                            v-for="card in supportCards"
                            :key="card.name"
                            :href="card.href ?? ''"
                            class="group flex flex-col rounded-lg bg-gray-200 shadow-md shadow-xl hover:bg-gray-300"
                            target="_blank"
                        >
                            <div
                                class="relative flex-1 px-6 pt-16 pb-8 md:px-8"
                            >
                                <div
                                    class="absolute top-0 inline-block flex h-12 w-12 -translate-y-1/2 transform items-center justify-center rounded-md bg-primary-600 shadow-md"
                                >
                                    <component
                                        :is="card.icon"
                                        aria-hidden="true"
                                        class="h-6 w-6 text-white"
                                    />
                                </div>
                                <h2
                                    class="flex justify-between text-xl font-semibold text-gray-600 transition-all"
                                >
                                    <span>{{ card.name }}</span>
                                    <ArrowNarrowRightIcon
                                        aria-hidden="true"
                                        class="ml-4 h-6 w-6 -translate-x-6 opacity-0 transition-all delay-100 group-hover:translate-x-0 group-hover:opacity-100"
                                    />
                                </h2>
                                <p class="mt-4 text-base text-gray-500">
                                    {{ card.description }}
                                </p>
                                <ul
                                    v-if="card.links"
                                    class="mt-4 border-t border-gray-400 pt-4"
                                >
                                    <li v-for="link in card.links">
                                        <Link
                                            :href="route('page', link.slug)"
                                            class="flex items-center py-1.5 text-gray-500 hover:text-gray-900"
                                        >
                                            <ArrowNarrowRightIcon
                                                aria-hidden="true"
                                                class="mr-4 h-5 w-5"
                                            />
                                            <span>{{ link.title }}</span>
                                        </Link>
                                    </li>
                                </ul>
                            </div>
                        </Link>
                    </div>
                </section>
            </div>

            <section aria-label="Contact for more information" class="bg-dark">
                <div class="mx-auto max-w-7xl py-16 px-4 sm:px-6 lg:px-8">
                    <div
                        class="overflow-hidden rounded-lg bg-primary-600 shadow-xl lg:grid lg:grid-cols-2 lg:gap-4"
                    >
                        <div
                            class="px-6 pt-10 pb-12 sm:px-16 sm:pt-16 lg:py-16 lg:pr-0 xl:py-20 xl:px-20"
                        >
                            <div class="lg:self-center">
                                <h2
                                    class="text-3xl font-extrabold text-white sm:text-4xl"
                                >
                                    <span class="block"
                                        >Want to know more?</span
                                    >
                                    <!--                                    <span class="block"-->
                                    <!--                                        >Contact me today for more-->
                                    <!--                                        information.</span-->
                                    <!--                                    >-->
                                </h2>
                                <p class="mt-4 text-lg leading-6 text-gray-200">
                                    Contact me today for more information.
                                </p>
                                <a class="button gray mt-6" href="#"
                                    >Contact me</a
                                >
                            </div>
                        </div>
                        <div
                            class="aspect-w-5 aspect-h-3 -mt-6 md:aspect-w-2 md:aspect-h-1"
                        >
                            <img
                                alt="App screenshot"
                                class="translate-x-6 translate-y-6 transform rounded-md object-cover object-left-top sm:translate-x-16 lg:translate-y-20"
                                src="https://tailwindui.com/img/component-images/full-width-with-sidebar.jpg"
                            />
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </PublicLayout>
</template>
