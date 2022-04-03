<script setup>
import { defineProps } from "vue";
import PublicLayout from "@/Layouts/PublicLayout";
import ImageDots from "@/Pages/Shared/ImageDots";
import StaticFeatures from "@/Pages/Shared/StaticFeatures";
import MetaData from "@/Pages/Shared/MetaData";
import { CameraIcon } from "@heroicons/vue/outline";
import { Link, usePage } from "@inertiajs/inertia-vue3";

defineProps({
    post: Object,
});
</script>

<template>
    <PublicLayout :title="post.title">
        <div class="overflow-hidden bg-primary-900">
            <article
                class="relative mx-auto max-w-7xl py-16 px-4 pb-24 sm:px-6 lg:px-8"
            >
                <header>
                    <div>
                        <Link
                            :href="`#${post.category.id}`"
                            class="inline-flex items-center rounded-full bg-secondary-800 p-1 pr-2 text-white hover:text-gray-200 hover:underline focus:outline-none focus:ring-2 focus:ring-secondary-300 focus:ring-offset-2 focus:ring-offset-gray-900 sm:text-base lg:text-sm xl:text-base"
                        >
                            <h2 class="mx-4 text-sm">
                                {{ post.category.title }}
                            </h2>
                        </Link>
                        <h1
                            class="mt-4 text-3xl font-extrabold leading-8 tracking-tight text-white sm:text-4xl"
                        >
                            {{ post.title }}
                        </h1>
                    </div>
                    <MetaData :post="post" class="text-white" />
                </header>
                <main class="mt-8 lg:grid lg:grid-cols-2 lg:gap-8">
                    <div class="relative lg:col-start-2 lg:row-start-1">
                        <ImageDots class="right-0 -mr-16 -mt-16" />
                        <div class="relative mx-auto text-base lg:max-w-none">
                            <figure>
                                <div
                                    class="aspect-w-12 aspect-h-7 lg:aspect-none"
                                >
                                    <img
                                        alt="Whitney leaning against a railing on a downtown street"
                                        class="rounded-lg object-cover object-center shadow-lg"
                                        height="1376"
                                        src="https://images.unsplash.com/photo-1546913199-55e06682967e?ixlib=rb-1.2.1&auto=format&fit=crop&crop=focalpoint&fp-x=.735&fp-y=.55&w=1184&h=1376&q=80"
                                        width="1184"
                                    />
                                </div>
                                <figcaption
                                    class="mt-3 flex text-sm text-gray-300"
                                >
                                    <CameraIcon
                                        aria-hidden="true"
                                        class="h-5 w-5 flex-none text-gray-300"
                                    />
                                    <span class="ml-2"
                                        >Photograph by Marcus O’Leary</span
                                    >
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                    <div>
                        <p
                            class="mt-6 text-3xl font-thin italic leading-10 text-gray-100"
                            v-html="post.preamble"
                        ></p>
                        <div class="prose mt-8" v-html="post.body"></div>
                    </div>
                </main>
            </article>
        </div>

        <StaticFeatures />
    </PublicLayout>
</template>
