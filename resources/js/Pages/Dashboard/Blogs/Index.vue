<template>
    <app-layout title="Blogs">
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Blogs
            </h2>
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
                            <tr v-for="blog in blogs" :key="blog.id">
                                <td
                                    class="whitespace-nowrap py-4 pl-4 pr-3 text-base font-medium text-gray-900 sm:pl-6"
                                >
                                    {{ blog.title }}
                                    <!--                                    <span-->
                                    <!--                                        v-if="blog.recently_updated"-->
                                    <!--                                        class="ml-2 text-sm text-gray-400"-->
                                    <!--                                        >(Updated recently)</span-->
                                    <!--                                    >-->
                                </td>
                                <td class="py-3.5 px-3 text-sm text-gray-600">
                                    {{ blog.category.title ?? "" }}
                                </td>
                                <td
                                    class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6"
                                >
                                    <a
                                        :href="
                                            route('dashboard.blogs.edit', blog)
                                        "
                                        class="text-indigo-600 hover:text-indigo-900"
                                        >Edit<span class="sr-only"
                                            >, {{ blog.id }}</span
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

<script>
import { defineComponent } from "vue";
import { Link } from "@inertiajs/inertia-vue3";
import AppLayout from "@/Layouts/AppLayout.vue";

export default defineComponent({
    components: {
        AppLayout,
        Link,
    },
    props: {
        blogs: Object,
    },
});
</script>
