<script setup>
import PublicLayout from "@/Layouts/PublicLayout";
import ImageDots from "@/Pages/Shared/ImageDots";
import MetaData from "@/Pages/Shared/MetaData";
import RelatedPosts from "@/Pages/Templates/Shared/RelatedPosts";
import Pill from "@/Components/Pill";
import Prism from "prismjs";
import "prismjs/components/prism-clike.js";
import "prismjs/components/prism-markup-templating.js";
import "prismjs/components/prism-markup.js";
import "prismjs/components/prism-php.js";
import "prismjs/components/prism-css.js";
import "prismjs/components/prism-scss.js";
import "prismjs/components/prism-json.js";
import "prismjs/components/prism-bash.js";
import "prismjs/components/prism-javascript.js";
import { onMounted } from "vue";

onMounted(() => {
    Prism.highlightAll();
});

const props = defineProps({
    post: Object,
    posts: Object,
});
</script>

<template>
    <PublicLayout :title="post.title">
        <article
            class="relative mx-auto max-w-7xl py-16 px-4 pb-24 sm:px-6 lg:px-8"
        >
            <header>
                <Pill
                    :href="route('posts.category', post.category)"
                    :title="post.category.title"
                    chevron
                    class="mb-4"
                />
                <h1 class="page-title">
                    {{ post.title }}
                </h1>
                <MetaData :post="post" class="text-white" />
            </header>
            <main
                :class="{
                    'lg:grid lg:grid-cols-2 lg:gap-8': post.photo_object,
                }"
                class="mt-8"
            >
                <div
                    v-if="post.photo_object"
                    class="relative lg:col-start-2 lg:row-start-1"
                >
                    <ImageDots class="right-0 -mr-16 -mt-16" />
                    <div class="relative mx-auto text-base lg:max-w-none">
                        <figure>
                            <div
                                class="aspect-w-8 aspect-h-5 overflow-hidden rounded-md shadow-lg"
                                v-html="post.photo_image"
                            ></div>
                            <!-- <figcaption
                                    class="mt-3 flex text-sm text-gray-300"
                                >
                                    <CameraIcon
                                        aria-hidden="true"
                                        class="h-5 w-5 flex-none text-gray-300"
                                    />
                                    <span class="ml-2"
                                        >Photograph by Marcus O’Leary</span
                                    >
                                </figcaption> -->
                        </figure>
                    </div>
                </div>
                <div>
                    <p
                        class="mt-6 text-xl font-bold italic leading-8 text-gray-50 md:text-2xl lg:text-3xl lg:leading-10"
                        v-html="post.preamble"
                    ></p>
                    <div
                        class="prose prose-invert mt-8 max-w-none lg:prose-lg"
                        v-html="post.body"
                    ></div>
                </div>
            </main>
        </article>

        <RelatedPosts :posts="posts" />
    </PublicLayout>
</template>
