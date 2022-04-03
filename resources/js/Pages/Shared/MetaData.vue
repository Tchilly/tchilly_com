<script setup>
import { defineProps } from "vue";

defineProps({
    post: Object,
});
</script>

<template>
    <div class="mt-6 flex items-center">
        <div class="flex-shrink-0">
            <a>
                <span class="sr-only">Author</span>
                <img
                    :src="post.user.profile_photo_url"
                    alt=""
                    class="h-10 w-10 rounded-full"
                />
            </a>
        </div>
        <div class="ml-3">
            <p class="text-sm font-medium text-gray-400">
                <a class="hover:underline">
                    {{ post.user.name }}
                </a>
            </p>
            <div class="flex space-x-1 text-sm text-gray-500">
                <time :datetime="post.created_at">
                    {{ post.created_at_formatted }}
                </time>
                <span aria-hidden="true"> &middot; </span>
                <span> {{ post.time_span }} read </span>
            </div>
        </div>
    </div>
</template>
