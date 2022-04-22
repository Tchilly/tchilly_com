<script setup>
import PublicLayout from "@/Layouts/PublicLayout";
import Pill from "@/Components/Pill";

defineProps({
    page: Object,
});
</script>

<template>
    <PublicLayout :title="page.title">
        <div class="mx-auto max-w-7xl py-16 px-4 pb-24 sm:px-6 lg:px-8">
            <Pill as="span" class="mb-4" title="Service" />
            <h1 class="page-title">
                {{ page.title }}
            </h1>
            <div
                class="prose prose-invert mt-8 mt-8 md:prose-lg"
                v-html="page.body"
            />
        </div>
    </PublicLayout>
</template>
