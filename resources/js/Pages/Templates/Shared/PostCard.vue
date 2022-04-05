<script setup>
import { Link } from "@inertiajs/inertia-vue3";
import MetaData from "@/Pages/Shared/MetaData";

const props = defineProps({
    post: Object,
});
</script>

<template>
    <div class="flex flex-col overflow-hidden rounded-lg shadow-lg">
        <div class="flex-shrink-0">
            <Link :href="route('posts', post)">
                <div
                    v-if="post.photo_object"
                    class="aspect-w-8 aspect-h-5 overflow-hidden rounded-t-md"
                    v-html="post.photo_image"
                ></div>
                <div
                    v-else
                    class="aspect-w-8 aspect-h-5 overflow-hidden rounded-t-md"
                >
                    <img :src="post.photo" class="object-cover object-center" />
                </div>
            </Link>
        </div>
        <div class="flex flex-1 flex-col justify-between bg-white p-6">
            <div class="flex-1">
                <Link :href="route('posts', post)" class="mt-2 block">
                    <p class="text-xl font-semibold text-gray-900">
                        {{ post.title }}
                    </p>
                    <p class="mt-3 text-base text-gray-500">
                        {{ post.preamble }}
                    </p>
                </Link>
            </div>
            <MetaData :post="post" />
        </div>
    </div>
</template>
