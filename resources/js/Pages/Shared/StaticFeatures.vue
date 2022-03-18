<template>
    <div class="relative bg-primary-800 bg-cover bg-center shadow-lg">
        <div
            class="mx-auto max-w-7xl py-16 px-4 drop-shadow-text-bg filter sm:px-6 lg:grid lg:grid-cols-3 lg:gap-x-8 lg:py-24 lg:px-8"
        >
            <div>
                <h2
                    class="text-base font-semibold uppercase tracking-wide text-secondary-500"
                >
                    The work/streaming/gaming rig
                </h2>
                <p class="mt-2 text-3xl font-extrabold text-primary-300">
                    Specifications
                </p>
                <p class="mt-4 text-lg text-gray-300">
                    I use my computer for both work and leisure, so I needed a
                    computer that had a bit of everything. 64BG ram and 12
                    Cores, Overkill? NAH...
                </p>
            </div>
            <div class="mt-12 lg:col-span-2 lg:mt-0">
                <dl
                    class="space-y-10 sm:grid sm:grid-flow-col sm:grid-cols-2 sm:grid-rows-5 sm:gap-x-6 sm:gap-y-10 sm:space-y-0 lg:gap-x-8"
                >
                    <div
                        v-for="feature in features"
                        :key="feature.name"
                        class="relative"
                    >
                        <dt>
                            <CheckIcon
                                aria-hidden="true"
                                class="absolute h-6 w-6 text-secondary-500"
                            />
                            <p
                                class="ml-9 text-lg font-medium leading-6 text-secondary-500"
                            >
                                {{ feature.name }}
                            </p>
                        </dt>
                        <dd class="mt-2 ml-9 text-base text-gray-50">
                            {{ feature.description }}
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</template>

<script>
import { CheckIcon } from "@heroicons/vue/outline";

const features = [
    {
        name: "CPU",
        description:
            "AMD Ryzen 9 3900x 12-Core processor @ 4.2GHz w/ Fractal Design Celsius+ S36 Dynamic",
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
    {
        name: "Keyboard and mouse",
        description: "Xtrfy K4 TKL RGB + M4 Wireless",
    },
    {
        name: "Monitors",
        description: '2x Philips 27" QHD 1440p IPS-panel @ 75Hz',
    },
];

export default {
    components: {
        CheckIcon,
    },
    setup() {
        return {
            features,
        };
    },
};
</script>
