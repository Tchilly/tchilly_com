<script setup>
import Cta from "./Shared/Cta";
import Hero from "./Shared/Hero";
import Footer from "./Shared/PageFooter";
import LogoCloud from "./Shared/LogoCloud";
import Feature from "@/Components/Feature";
import Features from "@/Components/Features";
import SecondaryButton from "@/Components/SecondaryButton";
import PublicLayout from "@/Layouts/PublicLayout";
</script>

<template>
    <PublicLayout title="Welcome">
        <template v-slot:header>
            <Hero />
        </template>

        <div class="bg-primary-900">
            <LogoCloud />

            <Features>
                <Feature image="/images/gaming-dark.jpg" title="Gamer for life">
                    <template v-slot:icon>
                        <DesktopComputerIcon
                            aria-hidden="true"
                            class="h-6 w-6"
                        />
                    </template>

                    <p class="mt-4 text-lg text-gray-400">
                        I've been an avid PC and console gamer for as long as I
                        can remember. From my first Commodore 64 and Sega Master
                        System playing Alex Kidd, Bubble Bobble and The Last
                        Ninja. Up until now, playing mostly MMORPG's like World
                        of Warcraft I've always loved playing games.
                    </p>

                    <div class="mt-6">
                        <SecondaryButton :href="route('page', 'about')"
                            >More about games and specs
                        </SecondaryButton>
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

                    <p class="mt-4 text-lg text-gray-400">
                        Commodore 64 and BASIC, is where the passion all
                        started. From there; C, Delphi, Python, ASP, PHP and a
                        bunch more. I'm not fluent anymore in any of them, but
                        I've stuck with PHP and JS. Writing most of my code with
                        Laravel and Vue. I'm a senior full stack web developer
                        with a passion for design as well.
                    </p>

                    <div class="mt-6">
                        <SecondaryButton :href="route('page', 'about')"
                            >More stuff about programming
                        </SecondaryButton>
                    </div>

                    <template v-slot:footer>
                        <blockquote>
                            <div>
                                <p class="text-base text-gray-400">
                                    &ldquo;A jack of all trades is a master of
                                    none, but oftentimes better than a master of
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

                    <p class="mt-4 text-lg text-gray-400">
                        Music has always been my <em>go-to</em> stress and mood
                        fixer, and with time I guess I've become more picky in
                        regards to sound quality. I love fiddling with amps and
                        speakers and I make custom speakers in my little garage.
                        Modelling, measuring and building the enclosures.
                    </p>

                    <div class="mt-6">
                        <SecondaryButton :href="route('page', 'about')"
                            >More speaker related stuff
                        </SecondaryButton>
                    </div>
                </Feature>

                <Feature
                    alignLeft
                    image="/images/tech.jpg"
                    title="Techy for life"
                >
                    <template v-slot:icon>
                        <ShoppingCartIcon aria-hidden="true" class="h-6 w-6" />
                    </template>

                    <p class="mt-4 text-lg text-gray-400">
                        I have no idea how many keyboards, mice and other
                        computer related accessories I've owned. But it's a lot!
                        I'm very grateful to have the opportunity to be the
                        forefront of technology and design. It's always been a
                        side hobby, but never for bragging rights. A genuine
                        interest, being able to provide help and advice to
                        others are really fun.
                    </p>

                    <div class="mt-6">
                        <SecondaryButton :href="route('page', 'about')"
                            >More on my rig and gear
                        </SecondaryButton>
                    </div>
                </Feature>

                <Feature
                    image="/images/mental-health.jpg"
                    title="Mental for life"
                >
                    <template v-slot:icon>
                        <HeartIcon aria-hidden="true" class="h-6 w-6" />
                    </template>

                    <p class="mt-4 text-lg text-gray-400">
                        We're all a bit mental, in the sense that we are all
                        unique with our own little quirks. But if you sum up
                        those quirks and it impairs your life on a daily basis,
                        you should probable see a doctor. I waited a long time,
                        to long, and it was painful. In the end I got diagnosed
                        with ADHD and Bipolar disorder. It's the best and worst
                        thing about me.
                    </p>

                    <div class="mt-6">
                        <SecondaryButton :href="route('page', 'about')"
                            >What is ADHD and Bipolar disorder?
                        </SecondaryButton>
                    </div>

                    <template v-slot:footer>
                        <blockquote>
                            <div>
                                <p class="text-base text-gray-400">
                                    &ldquo;There is a crack, a crack in
                                    everything. That's how the light gets
                                    in.&rdquo;
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

            <!--            <Metrics />-->

            <Cta />
        </div>
    </PublicLayout>
</template>
