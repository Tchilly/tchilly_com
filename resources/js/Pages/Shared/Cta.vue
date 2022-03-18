<template>
    <div class="bg-primary-800">
        <div
            class="mx-auto max-w-4xl py-16 px-4 sm:px-6 sm:py-24 lg:flex lg:max-w-7xl lg:items-center lg:justify-between lg:px-8"
        >
            <h2
                class="text-4xl font-extrabold tracking-tight text-primary-100 sm:text-4xl"
            >
                <span class="block">Follow me on Twitch</span>
                <span
                    class="block bg-gradient-to-r from-primary-400 to-primary-500 bg-clip-text text-transparent"
                >
                    And don't forget to subscribe.
                </span>
            </h2>
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
