<script setup>
import { PlayIcon } from "@heroicons/vue/solid";
import Pill from "@/Components/Pill";
import { Link } from "@inertiajs/inertia-vue3";
</script>

<template>
    <section class="relative bg-gradient-to-br from-dark to-primary-900">
        <div
            class="max-w-7xl px-4 sm:px-6 md:grid md:grid-cols-2 md:gap-6 lg:mx-auto lg:gap-8 lg:px-8"
        >
            <div class="py-6 sm:py-8 md:py-16 lg:py-24">
                <Pill
                    chevron
                    href="https://www.youtube.com/channel/UC6qdm9HB9c24VasS1LvoEew"
                    target="_blank"
                    title="Watch the streams and such"
                >
                    <span
                        class="-ml-5 mr-4 rounded-full bg-red-700 px-3 py-0.5 text-xs font-semibold uppercase leading-5 tracking-wide text-white group-hover:bg-red-600"
                        >Youtube</span
                    >
                </Pill>
                <h1
                    class="mt-4 text-3xl font-bold tracking-tight text-white sm:mt-5 sm:text-4xl lg:mt-6 xl:text-5xl"
                >
                    <span class="mb-2 block">Hey, and welcome!</span>
                    <span
                        class="block text-xl text-primary-400 sm:text-2xl xl:text-3xl"
                        >When is it okay to be a bit childish?</span
                    >
                </h1>
                <p
                    class="sm:text-md mt-3 text-base text-gray-300 sm:mt-5 lg:text-lg xl:text-xl xl:leading-8"
                >
                    When is old to play games? To old to be spending money on
                    stupid shit? To old to demand some alone time? Never!..
                </p>
                <div class="mt-10 sm:mt-12">
                    <div class="mt-3 sm:mt-0 sm:flex sm:max-w-sm xl:max-w-md">
                        <Link
                            :href="route('posts.show')"
                            class="button large primary"
                        >
                            <PlayIcon class="mr-4 h-8 w-8 text-white" />
                            <span>Check my videos, tutorials and more!</span>
                        </Link>
                    </div>
                    <p class="mt-3 text-sm text-gray-400 sm:mt-4">
                        Hey! By subscribing your helping me a bunch, and you
                        will get notified when I go live!
                    </p>
                </div>
            </div>
            <div class="relative hidden md:flex">
                <img
                    alt=""
                    class="absolute -mt-4 h-full max-w-none lg:inset-y-0"
                    src="https://tailwindui.com/img/component-images/cloud-illustration-indigo-400.svg"
                />
            </div>
        </div>
    </section>
</template>
