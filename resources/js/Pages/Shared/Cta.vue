<template>
    <div class="bg-primary-900">
        <div
            class="mx-auto max-w-4xl py-16 px-4 sm:px-6 sm:py-24 lg:flex lg:max-w-7xl lg:items-center lg:justify-between lg:px-8"
        >
            <div>
                <h2 class="text-4xl font-extrabold text-white sm:text-4xl">
                    <span class="block">Follow me on Twitch and Youtube</span>
                </h2>
                <p class="block text-2xl text-primary-300">
                    And don't forget to subscribe.
                </p>
            </div>
            <div class="mt-6 space-x-4">
                <Link
                    :href="route('page', 'support')"
                    class="inline-flex rounded-md border border-gray-700 px-4 py-2 text-base font-medium text-white shadow-lg hover:border-gray-600 focus:outline-none focus:ring-2 focus:ring-primary-300 focus:ring-offset-2 focus:ring-offset-gray-900"
                >
                    Other ways to support me
                </Link>

                <a
                    class="hover:to-from-primary-400 inline-flex rounded-md border border-transparent bg-gradient-to-r from-primary-600 to-primary-500 bg-origin-border px-4 py-2 text-base font-medium text-white shadow-lg hover:from-primary-500 focus:outline-none focus:ring-2 focus:ring-primary-300 focus:ring-offset-2 focus:ring-offset-gray-900"
                    href="https://twitch.tv/tchilly_tv"
                    rel="noreferrer"
                    target="_blank"
                >
                    Follow me on twitch
                </a>
            </div>
        </div>
    </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import PrimaryButton from "@/Components/PrimaryButton";

export default {
    components: {
        Link,
        PrimaryButton,
    },

    //
};
</script>
