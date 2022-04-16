<script setup>
import Logo from "@/Components/Logo";
import { Head, Link } from "@inertiajs/inertia-vue3";
import PublicLayout from "@/Layouts/PublicLayout";

defineProps({
    terms: String,
});
</script>

<template>
    <PublicLayout title="Terms of service">
        <div class="overflow-hidden bg-primary-900">
            <main
                class="relative mx-auto max-w-7xl divide-y-2 divide-primary-700 py-16 px-4 pb-24 sm:px-6 lg:px-8"
            >
                <div class="prose prose-invert" v-html="terms" />
            </main>
        </div>
    </PublicLayout>
</template>
