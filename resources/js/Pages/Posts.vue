<script setup>
import { Link } from "@inertiajs/inertia-vue3";
import { ArrowNarrowLeftIcon } from "@heroicons/vue/outline";
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
                <h1 class="page-title">
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
            <section>
                <div
                    aria-label="Blog post list"
                    class="mt-12 mb-8 grid gap-8 pt-8 md:grid-cols-2 lg:grid-cols-3"
                >
                    <article
                        v-for="post in props.posts.data"
                        v-if="props.posts.data.length >= 1"
                        :key="post.id"
                    >
                        <PostCard :post="post" />
                    </article>
                    <p v-else class="text-white">Nothing posted here yet...</p>
                </div>
                <Link
                    v-if="props.posts.next_page_url"
                    :href="props.posts.next_page_url"
                    :only="['posts']"
                    as="button"
                    class="button gray flex items-center"
                >
                    <ArrowNarrowLeftIcon class="mr-2 h-5 w-5" />
                    <span>Older posts</span>
                </Link>
            </section>
        </div>
    </PublicLayout>
</template>
