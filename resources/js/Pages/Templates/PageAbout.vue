<script setup>
import PublicLayout from "@/Layouts/PublicLayout";
import Pill from "@/Components/Pill";
import StaticFeatures from "@/Pages/Shared/StaticFeatures";
import TechFeatures from "@/Pages/Shared/TechFeatures";

defineProps({
    page: Object,
});
</script>

<template>
    <PublicLayout :title="page.title">
        <div class="relative bg-gradient-to-r from-dark to-primary-900">
            <div class="lg:absolute lg:inset-0">
                <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
                    <img
                        alt=""
                        class="h-56 w-full object-cover lg:absolute lg:h-full"
                        src="/images/audio.jpg"
                    />
                </div>
            </div>
            <div
                class="relative py-16 px-4 pb-24 sm:px-6 lg:mx-auto lg:grid lg:max-w-7xl lg:grid-cols-2 lg:px-8"
            >
                <div class="lg:pr-8">
                    <Pill as="span" class="mb-4" title="Case study" />
                    <h1 class="page-title">
                        {{ page.title }}
                    </h1>
                    <div
                        class="prose prose-invert mt-8 mt-8 md:prose-lg"
                        v-html="page.body"
                    />
                </div>
            </div>
        </div>

        <TechFeatures />

        <StaticFeatures />
    </PublicLayout>
</template>
