<script setup>
import { Head } from "@inertiajs/inertia-vue3";
import JetBanner from "@/Jetstream/Banner.vue";
import Cta from "@/Pages/Shared/Cta";
import PageHeader from "@/Pages/Shared/PageHeader";
import PageFooter from "@/Pages/Shared/PageFooter";
import Prism from "prismjs";
import "prismjs/components/prism-clike.js";
import "prismjs/components/prism-markup-templating.js";
import "prismjs/components/prism-markup.js";
import "prismjs/components/prism-php.js";
import "prismjs/components/prism-css.js";
import "prismjs/components/prism-scss.js";
import "prismjs/components/prism-json.js";
import "prismjs/components/prism-bash.js";
import "prismjs/components/prism-javascript.js";

defineProps({
    title: String,
});
</script>

<template>
    <div class="flex h-full min-h-screen flex-col bg-dark">
        <Head :title="title" />

        <JetBanner />

        <PageHeader>
            <div v-if="$slots.header">
                <slot name="header"></slot>
            </div>
        </PageHeader>

        <!-- Page Content -->
        <main id="content" class="flex-grow">
            <slot></slot>
        </main>

        <Cta />

        <PageFooter />
    </div>
</template>
