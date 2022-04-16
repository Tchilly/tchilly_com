<template>
    <section
        class="bg-gradient-to-br from-dark to-primary-900 md:overflow-hidden"
    >
        <div
            class="relative mx-auto flex max-w-7xl items-center justify-between px-4 sm:px-6 lg:px-8"
        >
            <div class="mb-8 md:grid md:grid-cols-2 md:gap-6 lg:gap-8">
                <div
                    class="mx-auto max-w-md sm:max-w-2xl lg:flex lg:items-center"
                >
                    <div class="py-6 sm:py-8 md:py-16 lg:py-24">
                        <a
                            class="focus:ring-secondary-300 group inline-flex items-center rounded-full bg-dark-300 p-1 pr-2 text-white shadow-lg hover:bg-dark-200 hover:text-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-900 sm:text-base lg:text-sm xl:text-base"
                            href="https://www.twitch.tv/tchilly_tv/schedule"
                            rel="noreferrer"
                            target="_blank"
                        >
                            <span
                                class="rounded-full bg-red-700 px-3 py-0.5 text-xs font-semibold uppercase leading-5 tracking-wide text-white group-hover:bg-red-600"
                                >Live</span
                            >
                            <span class="ml-4 text-sm"
                                >View the streaming schedule</span
                            >
                            <ChevronRightIcon
                                aria-hidden="true"
                                class="ml-2 h-5 w-5 text-gray-500"
                            />
                        </a>
                        <h1
                            class="mt-4 text-3xl font-bold tracking-tight text-white sm:mt-5 sm:text-4xl lg:mt-6 xl:text-5xl"
                        >
                            <h1 class="block">Hey, and welcome!</h1>
                            <span
                                class="block text-xl text-primary-300 sm:text-2xl xl:text-3xl"
                                >When is it okay to be a bit childish?</span
                            >
                        </h1>
                        <p
                            class="sm:text-md mt-3 text-base text-gray-300 sm:mt-5 lg:text-lg xl:text-xl"
                        >
                            When is old to play games? To old to be spending
                            money on stupid shit? To old to demand some alone
                            time? Never!..
                        </p>
                        <div class="mt-10 sm:mt-12">
                            <div
                                class="mt-3 sm:mt-0 sm:flex sm:max-w-sm xl:max-w-md"
                            >
                                <a
                                    class="button large primary"
                                    href="https://twitch.tv/tchilly_tv"
                                    rel="noreferrer"
                                    target="_blank"
                                >
                                    <PlayIcon class="mr-2 h-8 w-8 text-white" />
                                    <span>Check my content yo!</span>
                                </a>
                                <!--                                <a href="https://subs.twitch.tv/tchilly_tv" class="block flex items-center w-full py-3 px-4 rounded-md shadow bg-red-500 text-white font-medium hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-300 focus:ring-offset-gray-900">
                                                                    <PlayIcon class="w-8 h-8 text-white mr-2" />
                                                                    <span>Subscribe</span>
                                                                </a>-->
                            </div>
                            <p class="mt-3 text-sm text-gray-400 sm:mt-4">
                                By subscribing your helping me a bunch, and you
                                will get notified when I go live!
                            </p>
                        </div>
                    </div>
                </div>
                <div
                    class="mt-12 -mb-16 hidden sm:-mb-48 md:block lg:relative lg:m-0"
                >
                    <div
                        class="mx-auto max-w-md px-4 sm:max-w-2xl sm:px-6 lg:max-w-none lg:px-0"
                    >
                        <!-- Illustration taken from Lucid Illustrations: https://lucid.pixsellz.io/ -->
                        <img
                            alt=""
                            class="w-full lg:absolute lg:inset-y-0 lg:right-0 lg:h-full lg:w-auto lg:max-w-none"
                            src="https://tailwindui.com/img/component-images/cloud-illustration-indigo-400.svg"
                        />
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import { ChevronRightIcon, PlayIcon } from "@heroicons/vue/solid";
import { Link } from "@inertiajs/inertia-vue3";

export default {
    components: {
        Link,
        PlayIcon,
        ChevronRightIcon,
    },
};
</script>
