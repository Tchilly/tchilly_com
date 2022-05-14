<script setup>
import { Link } from "@inertiajs/inertia-vue3";
import PublicLayout from "@/Layouts/PublicLayout";
import Pill from "@/Components/Pill";
import StaticFeatures from "@/Pages/Shared/StaticFeatures";
import TechFeatures from "@/Pages/Shared/TechFeatures";
import Feature from "@/Components/Feature";
import Features from "@/Components/Features";
import {
    CodeIcon,
    DesktopComputerIcon,
    VolumeUpIcon,
    HeartIcon,
    ArrowNarrowRightIcon,
} from "@heroicons/vue/outline";

defineProps({
    page: Object,
});
</script>

<template>
    <PublicLayout :title="page.title">
        <div class="relative bg-gray-200">
            <div class="h-56 sm:h-72 lg:absolute lg:right-0 lg:h-full lg:w-1/2">
                <img
                    alt="Support team"
                    class="h-full w-full object-cover"
                    src="/images/tech.jpg"
                />
            </div>
            <div
                class="relative mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:py-24 lg:px-8"
            >
                <div class="lg:ml-0 lg:mr-auto lg:w-1/2 lg:pr-8">
                    <Pill as="span" class="mb-4" title="Who am I?">
                        <span
                            class="-ml-5 mr-4 rounded-full bg-primary-600 px-3 py-0.5 text-xs font-semibold uppercase leading-5 tracking-wide text-white"
                            >Case study</span
                        >
                    </Pill>

                    <h1 class="page-title">
                        {{ page.title }}
                    </h1>

                    <div class="mt-6">
                        <p
                            v-if="page.preamble"
                            class="mt-3 text-xl font-bold italic leading-8 text-gray-50 sm:mt-4 md:text-2xl lg:text-3xl lg:leading-10"
                            v-html="page.preamble"
                        ></p>
                        <div class="prose md:prose-lg" v-html="page.body"></div>
                    </div>
                </div>
            </div>
        </div>

        <Features title="More about my interest in programming and gaming">
            <Feature
                alignLeft
                image="/images/programming-dark.jpg"
                title="Programmer for life"
            >
                <template #icon>
                    <CodeIcon aria-hidden="true" class="h-6 w-6" />
                </template>

                <p
                    class="mt-4 text-base leading-7 text-gray-600 lg:text-lg lg:leading-8"
                >
                    I love programming! Ever since I got my first Commodore 64,
                    I've been passionate about programming. Learning and writing
                    in BASIC was mesmerizing, and a few nights later, my first
                    "Hello World" was printed on the screen. Documentation back
                    then was, well, lacking. And my English wasn't the best
                    either. But it was there the passion all started. Fast
                    forward, I've stuck with PHP and JavaScript with some Python
                    on the side and I really enjoy programming with Laravel,
                    Vue, and Tailwind.
                </p>

                <div class="mt-6">
                    <Link
                        :href="route('page', 'programming')"
                        class="button primary"
                        ><span>Need some help?</span>
                        <ArrowNarrowRightIcon
                            aria-hidden="true"
                            class="ml-4 h-6 w-6"
                        />
                    </Link>
                </div>
            </Feature>

            <Feature image="/images/gaming-dark.jpg" title="Gamer for life">
                <template v-slot:icon>
                    <DesktopComputerIcon aria-hidden="true" class="h-6 w-6" />
                </template>

                <p
                    class="mt-4 text-base leading-7 text-gray-600 lg:text-lg lg:leading-8"
                >
                    I've been an avid PC and console gamer for as long as I can
                    remember. From my first Commodore 64 and Sega Master System
                    growing up playing Alex Kidd, Bubble Bobble, and The Last
                    Ninja. Up until currently, playing mostly MMORPGs like World
                    of Warcraft. Although; Instagib on DM-Morpheus. If you know,
                    you know... I've always loved playing games.
                </p>

                <div class="mt-6">
                    <Link class="button primary" href="#"
                        ><span>Find me on Twitch</span>
                        <ArrowNarrowRightIcon
                            aria-hidden="true"
                            class="ml-4 h-6 w-6"
                        />
                    </Link>
                </div>
            </Feature>
        </Features>

        <TechFeatures />

        <StaticFeatures />

        <Features title="More about my interest in audio and mental health">
            <Feature image="/images/audio.jpg" title="Audiophile for life">
                <template v-slot:icon>
                    <VolumeUpIcon aria-hidden="true" class="h-6 w-6" />
                </template>

                <p
                    class="mt-4 text-base leading-7 text-gray-600 lg:text-lg lg:leading-8"
                >
                    Music has always been my <em>go-to</em> stress and mood
                    fixer, and with time I guess I've become pickier in regards
                    to sound quality. I love fiddling with amps and speakers and
                    I make custom speakers in my little garage. Modeling,
                    measuring, and building the enclosures. There's something
                    special about working with your hands when all they know is
                    keyboards.
                </p>

                <div class="mt-6">
                    <Link
                        :href="route('posts.show', ['audio', null])"
                        class="button primary"
                        ><span>Check the blog for projects</span>
                        <ArrowNarrowRightIcon
                            aria-hidden="true"
                            class="ml-4 h-6 w-6"
                        />
                    </Link>
                </div>
            </Feature>

            <Feature
                align-left
                image="/images/mental-health.jpg"
                title="Mental for life"
            >
                <template v-slot:icon>
                    <HeartIcon aria-hidden="true" class="h-6 w-6" />
                </template>

                <p
                    class="mt-4 text-base leading-7 text-gray-600 lg:text-lg lg:leading-8"
                >
                    We're all a bit mental, in the sense that we are all unique
                    with our own little quirks. But if you sum up those quirks
                    and it impairs your life on a daily basis, you should
                    probably see a doctor. I waited a long time, too long, and
                    it was painful. In the end, I got diagnosed with ADHD and
                    Bipolar disorder. It's the best and worst thing about me.
                </p>

                <div class="mt-6">
                    <Link
                        :href="route('posts.show', ['life', null])"
                        class="button primary"
                        ><span>What is ADHD and Bipolar disorder?</span>
                        <ArrowNarrowRightIcon
                            aria-hidden="true"
                            class="ml-4 h-6 w-6"
                        />
                    </Link>
                </div>

                <template v-slot:footer>
                    <blockquote>
                        <div>
                            <p class="text-base text-gray-500">
                                &ldquo;There is a crack, a crack in everything.
                                That's how the light gets in.&rdquo;
                            </p>
                        </div>
                        <footer class="mt-3">
                            <div class="flex items-center space-x-3">
                                <div class="flex-shrink-0">
                                    <img
                                        alt="Leonard Cohen Profile"
                                        class="h-6 w-6 rounded-full"
                                        src="/images/leonard-cohen.jpg"
                                    />
                                </div>
                                <div
                                    class="text-base font-medium text-gray-500"
                                >
                                    Leonard Cohen, Anthem
                                </div>
                            </div>
                        </footer>
                    </blockquote>
                </template>
            </Feature>
        </Features>
    </PublicLayout>
</template>
