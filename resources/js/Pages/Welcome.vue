<script setup>
import { Link } from "@inertiajs/inertia-vue3";
import Cta from "./Shared/Cta";
import Hero from "./Shared/Hero";
import Footer from "./Shared/PageFooter";
import LogoCloud from "./Shared/LogoCloud";
import Feature from "@/Components/Feature";
import Features from "@/Components/Features";
import PublicLayout from "@/Layouts/PublicLayout";
import {
    CodeIcon,
    DesktopComputerIcon,
    VolumeUpIcon,
    ShoppingCartIcon,
    HeartIcon,
    ArrowNarrowRightIcon,
} from "@heroicons/vue/outline";
</script>

<template>
    <PublicLayout title="Welcome">
        <template v-slot:header>
            <Hero />
        </template>

        <LogoCloud />

        <Features>
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

            <Feature alignLeft image="/images/tech.jpg" title="Techy for life">
                <template v-slot:icon>
                    <ShoppingCartIcon aria-hidden="true" class="h-6 w-6" />
                </template>

                <p
                    class="mt-4 text-base leading-7 text-gray-400 lg:text-lg lg:leading-8"
                >
                    I have no idea how many keyboards, mice, and other
                    computer-related accessories I've owned. But it's a lot! I'm
                    very grateful to have the opportunity to be at the forefront
                    of technology and design. It's always been a side hobby, but
                    never for bragging rights. A genuine interest, and being
                    able to provide help and advice to others is really fun.
                </p>

                <div class="mt-6">
                    <Link :href="route('page', 'about')" class="button primary"
                        ><span>More on my rig and gear</span>
                        <ArrowNarrowRightIcon
                            aria-hidden="true"
                            class="ml-4 h-6 w-6"
                        />
                    </Link>
                </div>
            </Feature>

            <Feature image="/images/mental-health.jpg" title="Mental for life">
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
