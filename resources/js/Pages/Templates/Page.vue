<script setup>
import { defineProps } from "vue";
import PublicLayout from "@/Layouts/PublicLayout";
import ImageDots from "@/Pages/Shared/ImageDots";
import StaticFeatures from "@/Pages/Shared/StaticFeatures";
import { CameraIcon } from "@heroicons/vue/outline";

defineProps({
    page: Object,
});
</script>

<template>
    <PublicLayout :title="page.title">
        <div class="overflow-hidden bg-primary-900">
            <article
                class="relative mx-auto max-w-7xl py-16 px-4 pb-24 sm:px-6 lg:px-8"
            >
                <header>
                    <div>
                        <div
                            class="inline-flex items-center rounded-full bg-secondary-800 p-1 pr-2 text-white hover:text-gray-200 focus:outline-none focus:ring-2 focus:ring-secondary-300 focus:ring-offset-2 focus:ring-offset-gray-900 sm:text-base lg:text-sm xl:text-base"
                        >
                            <h2 class="mx-4 text-sm">Case Study</h2>
                        </div>
                        <h1
                            class="mt-4 text-3xl font-extrabold leading-8 tracking-tight text-white sm:text-4xl"
                        >
                            {{ page.title }}
                        </h1>
                    </div>
                </header>
                <main
                    class="prose prose-invert mt-8 mt-8 md:prose-lg lg:prose-xl"
                    v-html="page.body"
                />
            </article>
        </div>

        <StaticFeatures />
    </PublicLayout>
</template>
