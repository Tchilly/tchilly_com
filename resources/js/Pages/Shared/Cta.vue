<script setup>
import { Link } from "@inertiajs/inertia-vue3";
import { ArrowNarrowRightIcon, ExternalLinkIcon } from "@heroicons/vue/outline";
</script>

<template>
    <div class="bg-primary-900">
        <div
            class="mx-auto max-w-4xl py-16 px-4 sm:px-6 sm:py-24 lg:flex lg:max-w-7xl lg:items-center lg:justify-between lg:px-8"
        >
            <div>
                <h2 class="text-4xl font-extrabold text-white sm:text-4xl">
                    <span class="block">See more on Twitch and Youtube</span>
                </h2>
                <p class="block text-2xl text-primary-300">
                    And don't forget to subscribe!
                </p>
            </div>
            <div class="mt-6 space-x-4">
                <Link :href="route('page', 'support')" class="button outlined">
                    <span>Other ways to support me</span>
                    <ArrowNarrowRightIcon
                        aria-hidden="true"
                        class="ml-4 h-5 w-5"
                    />
                </Link>

                <a
                    class="button primary"
                    href="https://www.youtube.com/channel/UC6qdm9HB9c24VasS1LvoEew"
                    rel="noreferrer"
                    target="_blank"
                >
                    <span>Subscribe on Youtube</span>
                    <ExternalLinkIcon aria-hidden="true" class="ml-4 h-5 w-5" />
                </a>
            </div>
        </div>
    </div>
</template>
