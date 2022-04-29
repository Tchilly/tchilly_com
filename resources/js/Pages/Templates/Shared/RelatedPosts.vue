<script setup>
import PostCard from "@/Pages/Templates/Shared/PostCard";

const props = defineProps({
    posts: Object,
});
</script>

<template>
    <section class="relative mx-auto max-w-7xl overflow-hidden py-16">
        <h2 class="text-2xl font-bold text-white">Similar posts</h2>
        <div class="mx-auto mt-8 grid gap-8 md:grid-cols-2 lg:grid-cols-3">
            <template v-for="post in posts" :key="post.id">
                <PostCard :post="post" />
            </template>
        </div>
    </section>
</template>
