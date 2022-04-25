<script setup>
import {
    UsersIcon,
    DesktopComputerIcon,
    CursorClickIcon,
    LightBulbIcon,
    MicrophoneIcon,
    CalculatorIcon,
} from "@heroicons/vue/outline";
import MediaCard from "@/Pages/Shared/MediaCard";

const accessories = [
    {
        name: "Keyboard and mouse",
        description: "Xtrfy K4 TKL RGB + M4 Wireless",
        image: CursorClickIcon,
    },
    {
        name: "Monitors",
        description: "2x Philips 27inch 1440p IPS Panel",
        image: DesktopComputerIcon,
    },
    {
        name: "Streaming",
        description: "Elgato Stream Deck",
        image: CalculatorIcon,
    },
    {
        name: "Lights",
        description: "Elgato Key Light",
        image: LightBulbIcon,
    },
    {
        name: "Microphone",
        description:
            "Elgato Wave 3, shockmount, popfilter, and a low profile boom arm",
        image: MicrophoneIcon,
    },
    {
        name: "Mic accessories",
        description: "Elgato shockmount, popfilter, and Mic Arm LP",
        image: MicrophoneIcon,
    },
];
</script>

<template>
    <section class="relative bg-primary-900">
        <div
            class="h-56 bg-primary-600 sm:h-72 lg:absolute lg:left-0 lg:h-full lg:w-1/2"
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
            <div class="lg:mr-0 lg:ml-auto lg:w-1/2 lg:pl-8">
                <div>
                    <div
                        class="flex h-12 w-12 items-center justify-center rounded-md bg-dark-500 text-white"
                    >
                        <DesktopComputerIcon
                            aria-hidden="true"
                            class="h-6 w-6"
                        />
                    </div>
                </div>
                <h2 class="mt-6 text-3xl font-extrabold text-primary-300">
                    Desk setup & office
                </h2>
                <p class="mt-6 text-lg text-gray-300">
                    I love tech! And gadgets... Honestly, most things with a
                    cord... Anyway, here's what I have on my desk. Coffee goes
                    without saying...
                </p>

                <div class="mt-8 grid gap-8 sm:grid-cols-2 sm:grid-rows-3">
                    <MediaCard
                        v-for="item in accessories"
                        :key="item.title"
                        :description="item.description"
                        :image="item.image"
                        :name="item.name"
                    />
                </div>
            </div>
        </div>
    </section>
</template>
