<script setup>
import { defineProps } from "vue";

defineProps({
    post: {
        user: Object,
        created_at: Date,
        created_at_formatted: Date,
        updated_at_formatted: Date,
        recently_updated: Boolean,
        time_span: String,
    },
});
</script>

<template>
    <div class="mt-6 flex sm:items-center">
        <div class="flex-shrink-0">
            <a>
                <span class="sr-only">Author</span>
                <img
                    :src="
                        post.user.profile_photo_url
                            ? post.user.profile_photo_url
                            : null
                    "
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
            <div class="text-sm text-gray-500 sm:space-x-1">
                <time :datetime="post.created_at" class="block sm:inline-block">
                    {{ `Created: ${post.created_at_formatted}` }}
                </time>

                <span
                    v-show="post.recently_updated"
                    aria-hidden="true"
                    class="hidden sm:inline-block"
                    >&middot;</span
                >

                <span
                    v-show="post.recently_updated"
                    class="block sm:inline-block"
                    >{{
                        post.recently_updated
                            ? `Updated: ${post.updated_at_formatted}`
                            : ""
                    }}</span
                >

                <span aria-hidden="true" class="hidden sm:inline-block"
                    >&middot;</span
                >

                <span class="block sm:inline-block">
                    {{ post.time_span }} read
                </span>
            </div>
        </div>
    </div>
</template>
