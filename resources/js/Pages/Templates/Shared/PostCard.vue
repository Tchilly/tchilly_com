<script setup>
import { Link } from "@inertiajs/inertia-vue3";
import MetaData from "@/Pages/Shared/MetaData";
import { ArrowNarrowRightIcon } from "@heroicons/vue/outline";

const props = defineProps({
    post: Object,
});
</script>

<template>
    <Link
        :href="route('posts.show', [post.category, post])"
        class="transition-background focus:ring-primary focus:ring-offset-dark group flex transform-gpu flex-col overflow-hidden rounded-lg bg-gray-200 shadow-xl hover:bg-gray-300 focus:border-transparent focus:outline-none focus-visible:ring-2 focus-visible:ring-gray-500 focus-visible:ring-primary-300 focus-visible:ring-offset-2"
    >
        <div
            v-if="post.photo_object"
            class="aspect-w-8 aspect-h-5 flex-shrink-0 overflow-hidden rounded-t-md transition-all group-hover:scale-105 group-hover:contrast-[1.15]"
            v-html="post.photo_image"
        ></div>
        <div
            v-else
            class="aspect-w-8 aspect-h-5 flex-shrink-0 overflow-hidden rounded-t-md"
        >
            <img :src="post.photo" class="object-cover object-center" />
        </div>
        <div class="flex flex-1 flex-col justify-between p-6">
            <div class="mt-2 block">
                <p class="subtitle text-primary-600">
                    {{ post.category.title }}
                </p>
                <h2
                    class="mt-2 flex justify-between text-xl font-semibold text-gray-600 transition-all"
                >
                    <span>{{ post.title }}</span>
                    <ArrowNarrowRightIcon
                        aria-hidden="true"
                        class="ml-4 h-6 w-6 -translate-x-6 opacity-0 transition-all delay-100 group-hover:translate-x-0 group-hover:opacity-100"
                    />
                </h2>
                <p
                    class="mt-3 text-base text-gray-500 line-clamp-2 lg:line-clamp-3"
                >
                    {{ post.truncated_preamble }}
                </p>
            </div>
            <!-- hidden translate-y-4 opacity-0 transition-all delay-300 group-hover:translate-y-0 group-hover:opacity-100 lg:flex -->
            <!--            <MetaData :post="post" />-->
        </div>
    </Link>
</template>
