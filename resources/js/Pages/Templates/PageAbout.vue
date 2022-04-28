<script setup>
import PublicLayout from "@/Layouts/PublicLayout";
import Pill from "@/Components/Pill";
import StaticFeatures from "@/Pages/Shared/StaticFeatures";
import TechFeatures from "@/Pages/Shared/TechFeatures";
import ImageDots from "@/Pages/Shared/ImageDots";

defineProps({
    page: Object,
});
</script>

<template>
    <PublicLayout :title="page.title">
        <div
            class="relative mx-auto max-w-7xl overflow-hidden py-16 px-4 pb-24 sm:px-6 lg:px-8"
        >
            <Pill as="span" class="mb-4" title="Case study" />
            <h1 class="page-title">
                {{ page.title }}
            </h1>

            <div class="mt-8 lg:grid lg:grid-cols-2 lg:gap-8">
                <div class="relative lg:col-start-2 lg:row-start-1">
                    <ImageDots class="right-0 -mr-16 -mt-16" />
                    <div class="relative mx-auto text-base lg:max-w-none">
                        <img
                            alt=""
                            class="rounded-xl shadow-md"
                            src="/images/gaming-dark.jpg"
                        />
                    </div>
                </div>
                <div>
                    <p
                        v-if="page.preamble"
                        class="mt-3 text-xl font-bold italic leading-8 text-gray-50 sm:mt-4 md:text-2xl lg:text-3xl lg:leading-10"
                        v-html="page.preamble"
                    ></p>
                    <div
                        class="prose prose-invert md:prose-lg"
                        v-html="page.body"
                    ></div>
                </div>
            </div>
        </div>

        <TechFeatures />

        <StaticFeatures />
    </PublicLayout>
</template>
