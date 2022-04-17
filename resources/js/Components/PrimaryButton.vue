<script setup>
/**
 * @deprecated
 */

import { Link } from "@inertiajs/inertia-vue3";

defineProps({
    href: String,
});
</script>

<template>
    <Link
        :href="href"
        class="hover:to-from-primary-400 inline-flex rounded-md border border-transparent bg-gradient-to-r from-primary-600 to-primary-500 bg-origin-border px-4 py-2 text-base font-medium text-white shadow-lg hover:from-primary-500 focus:outline-none focus:ring-2 focus:ring-primary-300 focus:ring-offset-2 focus:ring-offset-gray-900"
    >
        <slot></slot>
    </Link>
</template>
