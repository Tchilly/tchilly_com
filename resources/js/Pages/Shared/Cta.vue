<script setup>
import { Link, usePage } from "@inertiajs/inertia-vue3";
import { SupportIcon, ExternalLinkIcon } from "@heroicons/vue/outline";
import { computed } from "vue";

const youtube = usePage().props.value.socialMedia.find(
    (x) => x.name === "Youtube"
).href;
</script>

<template>
    <section
        aria-label="See more"
        class="from-bg-gray-200 to-bg-gray-300 relative bg-gray-200 bg-gradient-to-br"
    >
        <div
            class="relative mx-auto max-w-4xl py-16 px-4 sm:px-6 sm:py-24 lg:flex lg:max-w-7xl lg:items-center lg:justify-between lg:px-8"
        >
            <div>
                <h2
                    class="mb-2 block text-4xl font-extrabold text-gray-600 sm:text-4xl"
                >
                    See more on Twitch and Youtube
                </h2>
                <p class="block text-2xl text-gray-500">
                    And don't forget to subscribe!
                </p>
            </div>
            <div class="mt-6 block sm:flex sm:items-center sm:space-x-4">
                <Link
                    :href="route('page', 'support')"
                    class="button gray mb-4 flex sm:mb-0 sm:inline-flex"
                >
                    <SupportIcon aria-hidden="true" class="mr-4 h-5 w-5" />
                    <span>Other ways to support me</span>
                </Link>

                <a
                    :href="youtube"
                    class="button red flex sm:inline-flex"
                    rel="noreferrer"
                    target="_blank"
                >
                    <span>Subscribe on Youtube</span>
                    <ExternalLinkIcon aria-hidden="true" class="ml-4 h-5 w-5" />
                </a>
            </div>
        </div>
    </section>
</template>
