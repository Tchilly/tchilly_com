<script setup>
import Logo from "@/Components/Logo";
import { Head, Link } from "@inertiajs/inertia-vue3";
import PublicLayout from "@/Layouts/PublicLayout";

defineProps({
    policy: String,
});
</script>

<template>
    <PublicLayout title="Privacy Policy">
        <div class="overflow-hidden bg-primary-900">
            <main
                class="relative mx-auto max-w-7xl divide-y-2 divide-primary-700 py-16 px-4 pb-24 sm:px-6 lg:px-8"
            >
                <div class="prose prose-invert" v-html="policy" />
            </main>
        </div>
    </PublicLayout>
</template>
