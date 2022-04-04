<script setup>
import { defineProps } from "vue";
import PublicLayout from "@/Layouts/PublicLayout";
import MetaData from "@/Pages/Shared/MetaData";
import { Link, usePage } from "@inertiajs/inertia-vue3";

defineProps({
    posts: Object,
});
</script>

<template>
    <PublicLayout title="Posts">
        <div class="overflow-hidden bg-primary-900">
            <main
                class="relative mx-auto max-w-7xl divide-y-2 divide-primary-700 py-16 px-4 pb-24 sm:px-6 lg:px-8"
            >
                <div>
                    <h1
                        class="mt-4 text-3xl font-extrabold leading-8 tracking-tight text-white sm:text-4xl"
                    >
                        Blog posts
                    </h1>
                    <div
                        class="mt-3 sm:mt-4 lg:grid lg:grid-cols-2 lg:items-center lg:gap-5"
                    >
                        <p class="text-xl text-gray-300">
                            Get weekly articles in your inbox on how to grow
                            your business.
                        </p>
                        <form
                            class="mt-6 flex flex-col sm:flex-row lg:mt-0 lg:justify-end"
                        >
                            <div>
                                <label class="sr-only" for="email-address"
                                    >Email address</label
                                >
                                <input
                                    id="email-address"
                                    autocomplete="email"
                                    class="focus:ring-indigo-500 focus:border-indigo-500 w-full appearance-none rounded-md border border-gray-300 bg-white px-4 py-2 text-base text-gray-900 placeholder-gray-500 focus:outline-none lg:max-w-xs"
                                    name="email-address"
                                    placeholder="Enter your email"
                                    required=""
                                    type="email"
                                />
                            </div>
                            <div
                                class="mt-2 flex w-full flex-shrink-0 rounded-md shadow-sm sm:mt-0 sm:ml-3 sm:inline-flex sm:w-auto"
                            >
                                <button
                                    class="flex w-full items-center justify-center rounded-md border border-transparent bg-secondary-600 px-4 py-2 text-base font-medium text-white hover:bg-secondary-700 focus:outline-none focus:ring-2 focus:ring-secondary-500 focus:ring-offset-2 sm:inline-flex sm:w-auto"
                                    type="button"
                                >
                                    Notify me
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div
                    class="mx-auto mt-12 grid max-w-lg gap-5 pt-12 lg:max-w-none lg:grid-cols-3"
                >
                    <div
                        v-for="post in posts"
                        :key="post.title"
                        class="flex flex-col overflow-hidden rounded-lg shadow-lg"
                    >
                        <div class="flex-shrink-0">
                            <Link :href="route('posts', post)">
                                <div
                                    class="aspect-w-8 aspect-h-5 overflow-hidden rounded-t-md"
                                    v-html="post.photo_image"
                                ></div>
                            </Link>
                        </div>
                        <div
                            class="flex flex-1 flex-col justify-between bg-white p-6"
                        >
                            <div class="flex-1">
                                <p class="text-indigo-600 text-sm font-medium">
                                    <Link
                                        :href="`#${post.category.id}`"
                                        class="hover:underline"
                                    >
                                        {{ post.category.title }}
                                    </Link>
                                </p>
                                <Link
                                    :href="route('posts', post)"
                                    class="mt-2 block"
                                >
                                    <p
                                        class="text-xl font-semibold text-gray-900"
                                    >
                                        {{ post.title }}
                                    </p>
                                    <p class="mt-3 text-base text-gray-500">
                                        {{ post.preamble }}
                                    </p>
                                </Link>
                            </div>
                            <MetaData :post="post" />
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </PublicLayout>
</template>
