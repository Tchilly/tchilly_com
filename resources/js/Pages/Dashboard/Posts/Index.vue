<script setup>
import { defineProps } from "vue";
import { Link } from "@inertiajs/inertia-vue3";
import AppLayout from "@/Layouts/AppLayout.vue";

const props = defineProps({
    posts: Object,
});
</script>

<template>
    <app-layout title="Blogs">
        <template #header>
            <div class="md:flex md:items-center md:justify-between">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Posts
                </h2>
                <Link
                    :href="route('dashboard.posts.create')"
                    class="inline-flex items-center rounded-md border border-transparent bg-gray-800 px-4 py-2 text-sm font-semibold uppercase tracking-widest text-white transition hover:bg-gray-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-gray-500 focus-visible:ring-offset-2 active:bg-gray-900 disabled:opacity-25"
                >
                    Create
                </Link>
            </div>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="overflow-hidden rounded-lg bg-white shadow-xl">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-gray-50">
                            <tr>
                                <th
                                    class="py-3.5 pl-4 pr-3 text-left text-base font-semibold text-gray-900 sm:pl-6"
                                    scope="col"
                                >
                                    Title
                                </th>
                                <th
                                    class="text-small py-3.5 pl-3 pr-4 text-left text-gray-700 sm:pr-6"
                                    scope="col"
                                >
                                    Category
                                </th>

                                <th class="relative py-3.5 px-3" scope="col">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            <tr v-for="post in posts" :key="post.id">
                                <td
                                    class="whitespace-nowrap py-4 pl-4 pr-3 text-base font-medium text-gray-900 sm:pl-6"
                                >
                                    <Link
                                        :href="route('posts.show', post)"
                                        class="text-primary-500 hover:text-primary-600 hover:underline"
                                        >{{ post.title }}
                                    </Link>
                                </td>
                                <td class="py-3.5 px-3 text-sm text-gray-600">
                                    {{ post.category.title ?? "" }}
                                </td>
                                <td
                                    class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6"
                                >
                                    <a
                                        :href="
                                            route('dashboard.posts.edit', post)
                                        "
                                        class="text-indigo-600 hover:text-indigo-900"
                                        >Edit<span class="sr-only"
                                            >, {{ post.id }}</span
                                        ></a
                                    >
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </app-layout>
</template>
