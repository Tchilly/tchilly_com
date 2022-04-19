<script setup>
import { ArrowNarrowRightIcon } from "@heroicons/vue/solid";

defineProps({
    href: String,
    title: String,
    as: String,
    chevron: { type: Boolean, default: false },
    target: {
        type: String,
        default: "_self",
    },
});

const classes =
    "group inline-flex items-center rounded-full bg-dark-300 px-6 py-1 text-white shadow-lg  sm:text-base lg:text-sm xl:text-base";
</script>

<template>
    <div>
        <span v-if="as == 'span'" :class="classes">
            <slot></slot>

            <span class="text-sm">{{ title }}</span>

            <ArrowNarrowRightIcon
                v-if="chevron"
                aria-hidden="true"
                class="ml-2 -mr-2 h-5 w-5 text-gray-500"
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
    </div>
</template>
