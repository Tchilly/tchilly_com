<script setup>
import { defineProps } from "vue";
import PublicLayout from "@/Layouts/PublicLayout";
import ImageDots from "@/Pages/Shared/ImageDots";
import StaticFeatures from "@/Pages/Shared/StaticFeatures";
import MetaData from "@/Pages/Shared/MetaData";
import { CameraIcon } from "@heroicons/vue/outline";
import { Link, usePage } from "@inertiajs/inertia-vue3";
import RelatedPosts from "@/Pages/Shared/RelatedPosts";

const props = defineProps({
    post: Object,
    posts: Object,
});

console.log(props.post);
</script>

<template>
    <PublicLayout :title="post.title">
        <div class="overflow-hidden bg-primary-900">
            <article
                class="relative mx-auto max-w-7xl py-16 px-4 pb-24 sm:px-6 lg:px-8"
            >
                <header>
                    <div>
                        <Link
                            :href="`#${post.category.id}`"
                            class="inline-flex items-center rounded-full bg-secondary-800 p-1 pr-2 text-white hover:text-gray-200 hover:underline focus:outline-none focus:ring-2 focus:ring-secondary-300 focus:ring-offset-2 focus:ring-offset-gray-900 sm:text-base lg:text-sm xl:text-base"
                        >
                            <h2 class="mx-4 text-sm">
                                {{ post.category.title }}
                            </h2>
                        </Link>
                        <h1
                            class="mt-4 text-3xl font-extrabold leading-8 tracking-tight text-white sm:text-4xl"
                        >
                            {{ post.title }}
                        </h1>
                    </div>
                    <MetaData :post="post" class="text-white" />
                </header>
                <main class="mt-8 lg:grid lg:grid-cols-2 lg:gap-8">
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
                            class="mt-6 text-xl font-thin italic leading-8 text-gray-100 md:text-2xl lg:text-3xl lg:leading-10"
                            v-html="post.preamble"
                        ></p>
                        <div
                            class="prose prose-invert mt-8 md:prose-lg lg:prose-xl"
                            v-html="post.body"
                        ></div>
                    </div>
                </main>
            </article>
        </div>

        <RelatedPosts :posts="posts" />
    </PublicLayout>
</template>
