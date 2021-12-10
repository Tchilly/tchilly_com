<template>
    <public-layout title="About">
        <div class="bg-primary-900 overflow-hidden">
            <article class="relative max-w-7xl mx-auto py-16 pb-24 px-4 sm:px-6 lg:px-8">
                <!--<div class="hidden lg:block bg-gray-50 absolute top-0 bottom-0 left-3/4 w-screen" />-->
                <header class="mx-auto text-base lg:grid lg:grid-cols-2 lg:gap-8 lg:max-w-none">
                    <div>
                        <div class="inline-flex items-center text-white bg-secondary-800 rounded-full p-1 pr-2 sm:text-base lg:text-sm xl:text-base hover:text-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-secondary-300 focus:ring-offset-gray-900">
                            <h2 class="mx-4 text-sm">Case Study</h2>
                        </div>
                        <h1 class="mt-4 text-3xl leading-8 font-extrabold tracking-tight text-white sm:text-4xl">{{ page.title }}</h1>
                    </div>
                </header>
                <main class="mt-8 lg:grid lg:grid-cols-2 lg:gap-8">
                    <div class="relative lg:row-start-1 lg:col-start-2">
                        <image-dots class="right-0 -mr-16 -mt-16" />
                        <div class="relative text-base mx-auto lg:max-w-none">
                            <figure>
                                <div class="aspect-w-12 aspect-h-7 lg:aspect-none">
                                    <img class="rounded-lg shadow-lg object-cover object-center" src="https://images.unsplash.com/photo-1546913199-55e06682967e?ixlib=rb-1.2.1&auto=format&fit=crop&crop=focalpoint&fp-x=.735&fp-y=.55&w=1184&h=1376&q=80" alt="Whitney leaning against a railing on a downtown street" width="1184" height="1376" />
                                </div>
                                <figcaption class="mt-3 flex text-sm text-gray-500">
                                    <CameraIcon class="flex-none w-5 h-5 text-gray-400" aria-hidden="true" />
                                    <span class="ml-2">Photograph by Marcus O’Leary</span>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                    <div class="prose mt-8 lg:mt-0" v-html="page.body">
<!--                    <p class="text-2xl font-light text-primary-50">Sagittis scelerisque nulla cursus in enim consectetur quam. Dictum urna sed consectetur neque tristique pellentesque. Blandit amet, sed aenean erat arcu morbi.</p>-->
                    </div>
                </main>
            </article>
        </div>

        <static-features />

    </public-layout>
</template>

<script>

import { CameraIcon } from '@heroicons/vue/solid'
import {defineComponent} from "vue";
import PublicLayout from "@/Layouts/PublicLayout";
import ImageDots from "@/Pages/Shared/ImageDots";
import StaticFeatures from "@/Pages/Shared/StaticFeatures";

export default defineComponent({
    components: {
        StaticFeatures,
        ImageDots,
        PublicLayout,
        CameraIcon
    },
    props: {
        page: Object,
    }
})
</script>
