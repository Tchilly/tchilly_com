<template>
    <div>
        <Head :title="title" />

        <a href="#content" class="skip-to-content-link">Jump to content</a>

        <jet-banner />

        <page-header>
            <div v-if="$slots.header">
                <slot name="header"></slot>
            </div>
        </page-header>

        <!-- Page Content -->
        <main id="content">
            <slot></slot>
        </main>

        <page-footer />

    </div>
</template>

<script>
import { defineComponent } from 'vue'
import JetBanner from '@/Jetstream/Banner.vue'
import { Head, Link } from '@inertiajs/inertia-vue3';
import PageHeader from "@/Pages/Shared/PageHeader";
import PageFooter from "@/Pages/Shared/PageFooter";

export default defineComponent({
    props: {
        title: String,
    },
    components: {
        Head,
        PageHeader,
        PageFooter,
        JetBanner,
        Link,
    },
})
</script>
