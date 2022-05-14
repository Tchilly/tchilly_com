<script setup>
import { ref } from "vue";
import { Link } from "@inertiajs/inertia-vue3";

const props = defineProps({
    categories: Object,
    current: Number,
});

const selected = (id) => props.current === id;
</script>

<template>
    <div class="my-8">
        <div class="sm:hidden">
            <label class="sr-only" for="current-tab">Select a tab</label>
            <select
                id="current-tab"
                class="focus:ring-indigo-500 focus:border-indigo-500 mt-4 block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:outline-none sm:text-sm"
                name="current-tab"
            >
                <option
                    v-for="category in props.categories"
                    :key="category.id"
                    :selected="current"
                    :value="category.id"
                >
                    {{ category.title }}
                </option>
            </select>
        </div>
        <nav class="border-dark-50 hidden space-x-8 border-b sm:flex">
            <Link
                :class="[
                    selected(0)
                        ? 'border-primary-600 text-primary-600'
                        : 'border-transparent text-gray-400 hover:border-gray-400 hover:text-gray-600',
                    'relative top-[1px] whitespace-nowrap border-b px-1 pb-4 text-sm font-medium',
                ]"
                :href="route('posts.show')"
                >All
            </Link>
            <Link
                v-for="category in props.categories"
                :key="category.id"
                :aria-current="selected(category.id) ? 'page' : undefined"
                :class="[
                    selected(category.id)
                        ? 'border-primary-600 text-primary-600'
                        : 'border-transparent text-gray-400 hover:border-gray-400 hover:text-gray-600',
                    'relative top-[1px] whitespace-nowrap border-b px-1 pb-4 text-sm font-medium',
                ]"
                :href="route('posts.show', [category, null])"
            >
                {{ category.title }}
            </Link>
        </nav>
    </div>
</template>
