<script setup>
import Vue from "@inertiajs/inertia-vue3";

defineProps({
    name: String,
    description: String,
    image: Vue.FC,
});
</script>

<template>
    <div class="flex">
        <div class="mr-6 flex-shrink-0">
            <component
                :is="image"
                aria-hidden="true"
                class="h-6 w-6 text-primary-300"
            />
        </div>
        <div>
            <h3 class="subtitle text-primary-300">{{ name }}</h3>
            <p class="mt-1 text-base leading-7 text-gray-200">
                {{ description }}
            </p>
        </div>
    </div>
</template>
