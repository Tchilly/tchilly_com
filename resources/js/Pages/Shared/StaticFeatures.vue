<script setup>
import { CheckIcon } from "@heroicons/vue/outline";

const features = [
    {
        name: "CPU",
        description: "AMD Ryzen 9 3900x 12-Core processor @ 4.2GHz",
    },
    {
        name: "Memory",
        description: "64GB G.Skill DDR4 @ 3600Mhz",
    },
    {
        name: "Graphics Card",
        description: "AMD RX 5700 XT (Needs an upgrade)",
    },
    {
        name: "Motherboard",
        description: "Asus ROG Strix X470-F",
    },
    {
        name: "PSU",
        description: "Seasonic FOCUS GX 750W",
    },
    {
        name: "Main drive",
        description: "Samsung 970 EVO Plus 1TB NVMe-SSD",
    },
    {
        name: "Extra Storage",
        description: "2x Seagate BarraCuda Desktop 2TB 7200rpm 256MB",
    },
    {
        name: "Chassi",
        description: "Fractal Design Define S2 Blackout",
    },
];
</script>

<template>
    <section aria-labelledby="static-features" class="bg-gray-200">
        <div
            class="mx-auto max-w-7xl py-16 px-4 sm:px-6 lg:grid lg:grid-cols-3 lg:gap-x-8 lg:py-24 lg:px-8"
        >
            <div>
                <h2 id="static-features" class="subtitle text-primary-600">
                    My work, streaming, and gaming rig
                </h2>
                <p class="mt-2 text-3xl font-extrabold text-gray-600">
                    Specifications
                </p>
                <p class="mt-4 text-lg text-gray-500">
                    I use my computer for both work and leisure, so I needed a
                    computer that had a bit of everything. 64BG ram and 12
                    Cores, Overkill? NAH...
                </p>
            </div>
            <div class="mt-12 lg:col-span-2 lg:mt-0">
                <dl
                    class="space-y-10 sm:grid sm:grid-flow-row sm:grid-cols-2 sm:grid-rows-4 sm:gap-x-6 sm:gap-y-10 sm:space-y-0 lg:gap-x-8"
                >
                    <div
                        v-for="feature in features"
                        :key="feature.name"
                        class="relative"
                    >
                        <dt>
                            <CheckIcon
                                aria-hidden="true"
                                class="absolute h-6 w-6 text-primary-600"
                            />
                            <p class="subtitle ml-9 text-primary-600">
                                {{ feature.name }}
                            </p>
                        </dt>
                        <dd class="mt-2 ml-9 text-base leading-7 text-gray-500">
                            {{ feature.description }}
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </section>
</template>
