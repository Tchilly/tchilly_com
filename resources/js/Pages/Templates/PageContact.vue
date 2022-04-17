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
        <div class="mx-auto max-w-7xl py-16 px-4 pb-24 sm:px-6 lg:px-8">
            <h1
                class="mt-4 text-3xl font-extrabold leading-8 tracking-tight text-white sm:text-4xl"
            >
                {{ page.title }}
            </h1>

            <div
                class="prose prose-invert mt-8 mt-8 md:prose-lg lg:prose-xl"
                v-html="page.body"
            />
        </div>
    </PublicLayout>
</template>
