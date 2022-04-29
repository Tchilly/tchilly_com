<script setup>
import { ArrowNarrowRightIcon } from "@heroicons/vue/solid";

defineProps({
    href: String,
    title: String,
    as: String,
    chevron: { type: Boolean, default: false },
    small: { type: Boolean, default: false },
    light: { type: Boolean, default: false },
    target: {
        type: String,
        default: "_self",
    },
});

const classes =
    "group inline-flex items-center rounded-full bg-dark-300 px-6 py-1 text-white shadow-md text-base";
</script>

<template>
    <span
        v-if="as == 'span'"
        :class="[
            'group inline-flex items-center rounded-full bg-dark-300 px-6 py-1 text-base text-white shadow-md',
            small && 'px-[.75rem] py-0.5',
            light && '!bg-gray-200 shadow-none',
        ]"
    >
        <slot></slot>

        <span :class="['text-sm', small && 'text-xs', light && 'text-dark']">{{
            title
        }}</span>

        <ArrowNarrowRightIcon
            v-if="chevron"
            :class="['ml-2 -mr-2 h-5 w-5 text-gray-500', small && 'h-4 w-4']"
            aria-hidden="true"
        />
    </span>

    <a
        v-else
        :class="classes"
        :href="href"
        :target="target"
        class="hover:bg-dark-200 hover:text-gray-200 focus:outline-none focus:ring-2 focus:ring-primary-300 focus:ring-offset-2 focus:ring-offset-gray-900"
        rel="noreferrer"
    >
        <slot></slot>

        <span class="text-sm">{{ title }}</span>

        <ArrowNarrowRightIcon
            v-if="chevron"
            aria-hidden="true"
            class="ml-2 -mr-2 h-5 w-5 text-gray-500"
        />
    </a>
</template>
