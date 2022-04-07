<script setup>
import { defineProps } from "vue";
import PublicLayout from "@/Layouts/PublicLayout";
import PostCard from "@/Pages/Templates/Shared/PostCard";

defineProps({
    posts: Object,
});
</script>

<template>
    <PublicLayout title="Posts">
        <div class="overflow-hidden bg-primary-900">
            <main
                class="relative mx-auto max-w-7xl divide-y-2 divide-primary-700 py-16 px-4 pb-24 sm:px-6 lg:px-8"
            >
                <div>
                    <h1
                        class="mt-4 text-3xl font-extrabold leading-8 tracking-tight text-white sm:text-4xl"
                    >
                        Blog posts
                    </h1>
                    <div
                        class="mt-3 sm:mt-4 lg:grid lg:grid-cols-2 lg:items-center lg:gap-5"
                    >
                        <p class="text-xl text-gray-300">
                            I'm not that exciting, but I do like to share.
                        </p>
                        <!-- Sub -->
                    </div>
                </div>
                <div
                    class="mx-auto mt-12 grid max-w-lg gap-5 pt-12 lg:max-w-none lg:grid-cols-3"
                >
                    <template v-for="post in posts" :key="post.id">
                        <PostCard :post="post" />
                    </template>
                </div>
            </main>
        </div>
    </PublicLayout>
</template>
