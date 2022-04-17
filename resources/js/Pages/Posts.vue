<script setup>
import { defineProps } from "vue";
import PublicLayout from "@/Layouts/PublicLayout";
import PostCard from "@/Pages/Templates/Shared/PostCard";
import PostTabs from "@/Pages/Templates/Shared/PostTabs";

const props = defineProps({
    posts: Object,
    categories: Object,
    category: Object,
});

const current = props.category?.id ?? 0;
</script>

<template>
    <PublicLayout title="Posts">
        <div
            class="relative mx-auto max-w-7xl divide-y divide-primary-700 py-16 px-4 pb-24 sm:px-6 lg:px-8"
        >
            <div>
                <h1
                    class="mt-4 text-xl font-extrabold leading-8 tracking-tight text-white sm:text-4xl"
                >
                    {{ category ? `${category?.title} posts` : "Blog posts" }}
                </h1>
                <div class="lg:grid lg:grid-cols-2 lg:items-center lg:gap-5">
                    <div
                        class="prose prose-invert mt-3 sm:mt-4 sm:mb-0 md:prose-lg lg:prose-xl"
                    >
                        {{
                            category
                                ? category?.body
                                : "I'm not that exciting, but I do like to share."
                        }}
                    </div>
                    <!-- Sub -->
                </div>
                <PostTabs
                    v-if="props.categories"
                    :categories="props.categories"
                    :current="current"
                />
            </div>
            <section
                aria-label="Blog post list"
                class="mt-12 grid gap-8 pt-8 md:grid-cols-2 lg:grid-cols-3"
            >
                <article
                    v-for="post in props.posts"
                    v-if="props.posts.length >= 1"
                    :key="post.id"
                >
                    <PostCard :post="post" />
                </article>
                <p v-else class="text-white">Nothing posted here yet...</p>
            </section>
        </div>
    </PublicLayout>
</template>
