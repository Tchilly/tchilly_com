<template>
    <div class="bg-primary-900 pt-10 sm:pt-16 lg:pt-8 lg:pb-14 lg:overflow-hidden">
        <div class="relative max-w-7xl mx-auto flex items-center justify-between px-4 sm:px-6">
            <div class="lg:grid lg:grid-cols-2 lg:gap-8">
                <div class="mx-auto max-w-md px-4 sm:max-w-2xl sm:px-6 lg:px-0 lg:flex lg:items-center">
                    <div class="lg:py-24">
                        <a href="https://www.twitch.tv/tchilly_tv/schedule" target="_blank" class="inline-flex items-center text-white bg-secondary-800 rounded-full p-1 pr-2 sm:text-base lg:text-sm xl:text-base hover:text-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-secondary-300 focus:ring-offset-gray-900">
                            <span class="px-3 py-0.5 text-white text-xs font-semibold leading-5 uppercase tracking-wide bg-secondary-600 rounded-full">Live</span>
                            <span class="ml-4 text-sm">View the streaming schedule</span>
                            <ChevronRightIcon class="ml-2 w-5 h-5 text-gray-500" aria-hidden="true" />
                        </a>
                        <h1 class="mt-4 text-3xl tracking-tight font-bold text-white sm:mt-5 sm:text-4xl lg:mt-6 xl:text-5xl">
                            <span class="block">Tchilly</span>
                            <span class="block text-primary-50">It's okay to be childish</span>
                        </h1>
                        <p class="mt-3 text-base text-gray-300 sm:mt-5 sm:text-md lg:text-lg xl:text-xl">
                            When is old to play games? To old to be spending money on stupid shit? To old to demand some alone time? Never!..
                        </p>
                        <div class="mt-10 sm:mt-12">
                            <div class="sm:flex mt-3 sm:mt-0 sm:max-w-sm xl:max-w-md">
                                <a href="https://twitch.tv/tchilly_tv" target="_blank" class="block flex items-center w-full py-3 px-4 rounded-md shadow bg-gradient-to-r from-primary-600 to-primary-500 text-white font-medium hover:from-primary-500 hover:to-primary-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-200 focus:ring-offset-gray-900">
                                    <PlayIcon class="w-8 h-8 text-white mr-2" />
                                    <span>Watch</span>
                                </a>
<!--                                <a href="https://subs.twitch.tv/tchilly_tv" class="block flex items-center w-full py-3 px-4 rounded-md shadow bg-red-500 text-white font-medium hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-300 focus:ring-offset-gray-900">
                                    <PlayIcon class="w-8 h-8 text-white mr-2" />
                                    <span>Subscribe</span>
                                </a>-->
                            </div>
                            <p class="mt-3 text-sm text-gray-400 sm:mt-4">By subscribing your helping me a bunch, and you will get notified when I go live!</p>
                        </div>
                    </div>
                </div>
                <div class="mt-12 -mb-16 sm:-mb-48 lg:m-0 lg:relative">
                    <div class="mx-auto max-w-md px-4 sm:max-w-2xl sm:px-6 lg:max-w-none lg:px-0">
                        <!-- Illustration taken from Lucid Illustrations: https://lucid.pixsellz.io/ -->
                        <img class="w-full lg:absolute lg:inset-y-0 lg:right-0 lg:h-full lg:w-auto lg:max-w-none" src="https://tailwindui.com/img/component-images/cloud-illustration-indigo-400.svg" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { ChevronRightIcon, PlayIcon } from '@heroicons/vue/solid'
import { Link } from '@inertiajs/inertia-vue3';

export default {
    components: {
        Link,
        PlayIcon,
        ChevronRightIcon,
    }
}
</script>
