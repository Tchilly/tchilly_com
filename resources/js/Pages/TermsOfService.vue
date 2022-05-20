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
        <div
            class="relative mx-auto max-w-7xl divide-y-2 divide-primary-700 overflow-hidden py-16 px-4 pb-24 sm:px-6 lg:px-8"
        >
            <div class="prose" v-html="terms" />
        </div>
    </PublicLayout>
</template>
