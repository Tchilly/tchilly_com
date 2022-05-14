<script setup>
import { Head } from "@inertiajs/inertia-vue3";
import JetBanner from "@/Jetstream/Banner.vue";
import Cta from "@/Pages/Shared/Cta";
import PageHeader from "@/Pages/Shared/PageHeader";
import PageFooter from "@/Pages/Shared/PageFooter";

defineProps({
    title: String,
});
</script>

<template>
    <div class="flex h-full min-h-screen flex-col bg-gray-100">
        <Head :title="title" />

        <a class="skip-to-content-link" href="#content">Jump to content</a>

        <JetBanner />

        <PageHeader>
            <template v-if="$slots.header">
                <slot name="header"></slot>
            </template>
        </PageHeader>

        <!-- Page Content -->
        <main id="content" class="flex-grow">
            <slot></slot>
        </main>

        <Cta />

        <PageFooter />
    </div>
</template>
