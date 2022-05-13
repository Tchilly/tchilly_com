<script setup>
import { Link } from "@inertiajs/inertia-vue3";
import PublicLayout from "@/Layouts/PublicLayout";
import Pill from "@/Components/Pill";
import StaticFeatures from "@/Pages/Shared/StaticFeatures";
import TechFeatures from "@/Pages/Shared/TechFeatures";
import ImageDots from "@/Pages/Shared/ImageDots";
import Feature from "@/Components/Feature";
import Features from "@/Components/Features";
import {
    CodeIcon,
    DesktopComputerIcon,
    VolumeUpIcon,
    ShoppingCartIcon,
    HeartIcon,
    ArrowNarrowRightIcon,
} from "@heroicons/vue/outline";

defineProps({
    page: Object,
});
</script>

<template>
    <PublicLayout :title="page.title">
        <div class="relative bg-primary-900">
            <div
                class="h-56 bg-primary-600 sm:h-72 lg:absolute lg:right-0 lg:h-full lg:w-1/2"
            >
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
                    <Pill as="span" class="mb-4" title="Case study" />

                    <h1 class="page-title">
                        {{ page.title }}
                    </h1>

                    <div class="mt-6">
                        <p
                            v-if="page.preamble"
                            class="mt-3 text-xl font-bold italic leading-8 text-gray-50 sm:mt-4 md:text-2xl lg:text-3xl lg:leading-10"
                            v-html="page.preamble"
                        ></p>
                        <div
                            class="prose prose-invert md:prose-lg"
                            v-html="page.body"
                        ></div>
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
                <template v-slot:icon>
                    <CodeIcon aria-hidden="true" class="h-6 w-6" />
                </template>

                <p
                    class="mt-4 text-base leading-7 text-gray-400 lg:text-lg lg:leading-8"
                >
                    Commodore 64 and BASIC, are where the passion all started.
                    From there; C, Delphi, Python, ASP, PHP, and a bunch more.
                    I'm not fluent anymore in any of them, but I've stuck with
                    PHP and JS. Writing most of my code with Laravel and Vue.
                    I'm a senior full-stack web developer with a passion for
                    design as well.
                </p>

                <div class="mt-6">
                    <Link :href="route('page', 'about')" class="button primary"
                        ><span>More stuff about programming</span>
                        <ArrowNarrowRightIcon
                            aria-hidden="true"
                            class="ml-4 h-6 w-6"
                        />
                    </Link>
                </div>

                <template v-slot:footer>
                    <blockquote>
                        <div>
                            <p class="text-base text-gray-400">
                                &ldquo;A jack of all trades is a master of none,
                                but oftentimes better than a master of
                                one.&rdquo;
                            </p>
                        </div>
                        <footer class="mt-3">
                            <div class="flex items-center space-x-3">
                                <div
                                    class="text-base font-medium text-gray-500"
                                >
                                    Viktor Vicsek
                                </div>
                            </div>
                        </footer>
                    </blockquote>
                </template>
            </Feature>

            <Feature image="/images/gaming-dark.jpg" title="Gamer for life">
                <template v-slot:icon>
                    <DesktopComputerIcon aria-hidden="true" class="h-6 w-6" />
                </template>

                <p
                    class="mt-4 text-base leading-7 text-gray-400 lg:text-lg lg:leading-8"
                >
                    I've been an avid PC and console gamer for as long as I can
                    remember. From my first Commodore 64 and Sega Master System
                    playing Alex Kidd, Bubble Bobble and The Last Ninja. Up
                    until now, playing mostly MMORPGs like World of Warcraft
                    I've always loved playing games.
                </p>

                <div class="mt-6">
                    <Link :href="route('page', 'about')" class="button primary">
                        <span>More about games and specs</span>
                        <ArrowNarrowRightIcon
                            aria-hidden="true"
                            class="ml-4 h-6 w-6"
                        />
                    </Link>
                </div>

                <template v-slot:footer>
                    <blockquote>
                        <div>
                            <p class="text-base text-gray-400">
                                &ldquo;It’s time to kick ass and chew bubble
                                gum... and I’m all outta gum.&rdquo;
                            </p>
                        </div>
                        <footer class="mt-3">
                            <div class="flex items-center space-x-3">
                                <div class="flex-shrink-0">
                                    <img
                                        alt="Duke Nukem Profile"
                                        class="h-8 w-8 rounded-full"
                                        src="/images/duke-nukem.jpg"
                                    />
                                </div>
                                <div
                                    class="text-base font-medium text-gray-500"
                                >
                                    Duke Nukem
                                </div>
                            </div>
                        </footer>
                    </blockquote>
                </template>
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
                    class="mt-4 text-base leading-7 text-gray-400 lg:text-lg lg:leading-8"
                >
                    Music has always been my <em>go-to</em> stress and mood
                    fixer, and with time I guess I've become pickier in regards
                    to sound quality. I love fiddling with amps and speakers and
                    I make custom speakers in my little garage. Modeling,
                    measuring, and building the enclosures.
                </p>

                <div class="mt-6">
                    <Link :href="route('page', 'about')" class="button primary"
                        ><span>More speaker related stuff</span>
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
                    class="mt-4 text-base leading-7 text-gray-400 lg:text-lg lg:leading-8"
                >
                    We're all a bit mental, in the sense that we are all unique
                    with our own little quirks. But if you sum up those quirks
                    and it impairs your life on a daily basis, you should
                    probably see a doctor. I waited a long time, too long, and
                    it was painful. In the end, I got diagnosed with ADHD and
                    Bipolar disorder. It's the best and worst thing about me.
                </p>

                <div class="mt-6">
                    <Link :href="route('page', 'about')" class="button primary"
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
                            <p class="text-base text-gray-400">
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
