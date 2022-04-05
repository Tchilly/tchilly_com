<script setup>
import { defineProps } from "vue";
import { Head } from "@inertiajs/inertia-vue3";
import JetBanner from "@/Jetstream/Banner.vue";
import PageHeader from "@/Pages/Shared/PageHeader";
import PageFooter from "@/Pages/Shared/PageFooter";

defineProps({
    title: String,
});
</script>

<template>
    <div>
        <Head :title="title" />

        <a class="skip-to-content-link" href="#content">Jump to content</a>

        <JetBanner />

        <PageHeader>
            <div v-if="$slots.header">
                <slot name="header"></slot>
            </div>
        </PageHeader>

        <!-- Page Content -->
        <main id="content">
            <slot></slot>
        </main>

        <PageFooter />
    </div>
</template>
