<script setup>
import { defineProps } from "vue";
import { CalendarIcon, ClockIcon, PencilIcon } from "@heroicons/vue/outline";

const props = defineProps({
    post: {
        user: Object,
        created_at: Date,
        created_at_formatted: Date,
        updated_at_formatted: Date,
        recently_updated: Boolean,
        time_span: Number,
        time_span_formatted: String,
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
                        props.post.user.profile_photo_url
                            ? props.post.user.profile_photo_url
                            : null
                    "
                    alt=""
                    class="h-10 w-10 rounded-full"
                />
            </a>
        </div>
        <div class="ml-4">
            <p class="mb-1 text-sm font-medium text-gray-300">
                <span>
                    {{ props.post.user.name }}
                </span>
            </p>
            <div class="text-sm text-gray-400">
                <time
                    :datetime="props.post.created_at"
                    class="mr-3 inline-flex items-center"
                >
                    <CalendarIcon aria-hidden="true" class="mr-1 h-4 w-4" />
                    <span>{{ props.post.created_at_formatted }}</span>
                </time>

                <span
                    v-if="props.post.is_updated"
                    :title="`Edited ${props.post.updated_at_formatted}`"
                    class="mr-3 flex items-center sm:inline-flex"
                >
                    <PencilIcon aria-hidden="true" class="mr-1 h-4 w-4" />
                </span>

                <span
                    v-if="props.post.time_span_formatted"
                    class="flex items-center sm:inline-flex"
                >
                    <ClockIcon aria-hidden="true" class="mr-1 h-4 w-4" />
                    <span>
                        {{ props.post.time_span_formatted }}
                    </span>
                </span>
            </div>
        </div>
    </div>
</template>
