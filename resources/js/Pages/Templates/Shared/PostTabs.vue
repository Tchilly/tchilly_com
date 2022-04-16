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
    <div class="sm:-mb-12 sm:mt-12">
        <div class="sm:hidden">
            <label class="sr-only" for="current-tab">Select a tab</label>
            <select
                id="current-tab"
                class="focus:ring-indigo-500 focus:border-indigo-500 block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:outline-none sm:text-sm"
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
        <div class="relative top-[1px] hidden sm:block">
            <nav class="flex space-x-8">
                <Link
                    :class="[
                        selected(0)
                            ? 'border-primary-500 text-primary-500'
                            : 'border-transparent text-gray-400 hover:border-gray-300 hover:text-gray-200',
                        'whitespace-nowrap border-b px-1 pb-4 text-sm font-medium',
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
                            ? 'border-primary-500 text-primary-500'
                            : 'border-transparent text-gray-400 hover:border-gray-300 hover:text-gray-200',
                        'whitespace-nowrap border-b px-1 pb-4 text-sm font-medium',
                    ]"
                    :href="route('posts.category', category)"
                >
                    {{ category.title }}
                </Link>
            </nav>
        </div>
    </div>
</template>
