<script setup>
import PostCard from "@/Pages/Templates/Shared/PostCard";

const props = defineProps({
    posts: Object,
});
</script>

<template>
    <div class="overflow-hidden bg-dark-900">
        <div class="relative mx-auto max-w-7xl py-16 px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-bold text-white">Similar posts</h2>

            <div
                class="mx-auto mt-8 grid max-w-lg gap-8 lg:max-w-none lg:grid-cols-3"
            >
                <template v-for="post in posts" :key="post.id">
                    <PostCard :post="post" />
                </template>
            </div>
        </div>
    </div>
</template>
