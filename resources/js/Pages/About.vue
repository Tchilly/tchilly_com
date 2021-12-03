<template>
    <public-layout title="About">
        <div class="bg-primary-900 overflow-hidden">
            <article class="relative max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
                <!--<div class="hidden lg:block bg-gray-50 absolute top-0 bottom-0 left-3/4 w-screen" />-->
                <header class="mx-auto text-base max-w-prose lg:grid lg:grid-cols-2 lg:gap-8 lg:max-w-none">
                    <div>
                        <div class="inline-flex items-center text-white bg-secondary-800 rounded-full p-1 pr-2 sm:text-base lg:text-sm xl:text-base hover:text-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-secondary-300 focus:ring-offset-gray-900">
                            <h2 class="mx-4 text-sm">Case Study</h2>
                        </div>
                        <h1 class="mt-4 text-3xl leading-8 font-extrabold tracking-tight text-white sm:text-4xl">About me and myself</h1>
                    </div>
                </header>
                <main class="mt-8 lg:grid lg:grid-cols-2 lg:gap-8">
                    <div class="relative lg:row-start-1 lg:col-start-2">
                        <image-dots />
                        <div class="relative text-base mx-auto max-w-prose lg:max-w-none">
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
                    <div class="mt-8 lg:mt-0">
                        <div class="text-base max-w-prose mx-auto lg:max-w-none">
                            <p class="text-lg text-gray-200">Sagittis scelerisque nulla cursus in enim consectetur quam. Dictum urna sed consectetur neque tristique pellentesque. Blandit amet, sed aenean erat arcu morbi.</p>
                        </div>
                        <div class="mt-5 prose prose-indigo text-gray-300 mx-auto lg:max-w-none lg:row-start-1 lg:col-start-1">
                            <p>Sollicitudin tristique eros erat odio sed vitae, consequat turpis elementum. Lorem nibh vel, eget pretium arcu vitae. Eros eu viverra donec ut volutpat donec laoreet quam urna.</p>
                            <p>Bibendum eu nulla feugiat justo, elit adipiscing. Ut tristique sit nisi lorem pulvinar. Urna, laoreet fusce nibh leo. Dictum et et et sit. Faucibus sed non gravida lectus dignissim imperdiet a.</p>
                            <p>Dictum magnis risus phasellus vitae quam morbi. Quis lorem lorem arcu, metus, egestas netus cursus. In.</p>
                            <ul role="list">
                                <li>Quis elit egestas venenatis mattis dignissim.</li>
                                <li>Cras cras lobortis vitae vivamus ultricies facilisis tempus.</li>
                                <li>Orci in sit morbi dignissim metus diam arcu pretium.</li>
                            </ul>
                            <p>Rhoncus nisl, libero egestas diam fermentum dui. At quis tincidunt vel ultricies. Vulputate aliquet velit faucibus semper. Pellentesque in venenatis vestibulum consectetur nibh id. In id ut tempus egestas. Enim sit aliquam nec, a. Morbi enim fermentum lacus in. Viverra.</p>
                            <h2>How we helped</h2>
                            <p>Tincidunt integer commodo, cursus etiam aliquam neque, et. Consectetur pretium in volutpat, diam. Montes, magna cursus nulla feugiat dignissim id lobortis amet. Laoreet sem est phasellus eu proin massa, lectus. Diam rutrum posuere donec ultricies non morbi. Mi a platea auctor mi.</p>
                            <p>Sagittis scelerisque nulla cursus in enim consectetur quam. Dictum urna sed consectetur neque tristique pellentesque. Blandit amet, sed aenean erat arcu morbi.</p>
                        </div>
                    </div>
                </main>
            </article>
        </div>
    </public-layout>
</template>

<script>

import { CameraIcon } from '@heroicons/vue/solid'
import {defineComponent} from "vue";
import PublicLayout from "@/Layouts/PublicLayout";
import ImageDots from "@/Pages/Shared/ImageDots";

export default defineComponent({
    components: {
        ImageDots,
        PublicLayout,
        CameraIcon
    },
})
</script>
