<template>
    <div class="py-6 md:py-12 lg:py-24">
        <div
            class="md:flex-column min-h-lg md:grid md:grid-cols-2 lg:mx-auto lg:max-w-7xl lg:grid-flow-col-dense lg:gap-24 lg:px-8"
        >
            <div
                :class="{ 'lg:col-start-2': alignLeft }"
                class="relative z-10 px-4 sm:px-6 lg:mx-auto lg:mx-0 lg:py-16 lg:px-0"
            >
                <div>
                    <!-- Icon -->
                    <div v-if="$slots.icon" class="mb-6">
                        <span
                            class="flex h-12 w-12 items-center justify-center rounded-md bg-dark-400 text-primary-500"
                        >
                            <slot name="icon"></slot>
                        </span>
                    </div>

                    <!-- Content -->
                    <div>
                        <!-- Title -->
                        <h2
                            class="text-3xl font-extrabold tracking-tight text-gray-300"
                        >
                            {{ title }}
                        </h2>

                        <!-- Body -->
                        <slot></slot>
                    </div>
                </div>

                <!-- Footer -->
                <div
                    v-if="$slots.footer"
                    class="mt-8 border-t border-gray-600 pt-6"
                >
                    <slot name="footer"></slot>
                </div>
            </div>

            <!-- Images -->
            <div
                :class="{ 'lg:col-start-1': alignLeft }"
                class="relative z-0 mt-12 hidden md:mt-16 md:block lg:mt-0"
            >
                <div
                    :class="
                        alignLeft
                            ? 'mr-0 pr-0 pl-6 lg:-ml-16 lg:-ml-48 lg:pl-0 lg:pr-6'
                            : '-mr-48 pl-4 sm:pl-6 md:-mr-16'
                    "
                    class="lg:relative lg:m-0 lg:h-full lg:px-0"
                >
                    <image-dots
                        :class="
                            alignLeft
                                ? 'right-full lg:-mr-64 xl:-mt-20 xl:-mr-28'
                                : 'left-full lg:-ml-16 xl:-mt-20 xl:ml-20'
                        "
                    />
                    <img
                        :class="alignLeft ? 'lg:right-0' : 'lg:left-0'"
                        :src="image"
                        alt="Inbox user interface"
                        class="w-full rounded-xl shadow-md md:mt-16 lg:absolute lg:h-[450px] lg:w-auto lg:min-w-max lg:max-w-none xl:mt-0 xl:h-[620px]"
                    />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { defineComponent } from "vue";
import ImageDots from "@/Pages/Shared/ImageDots";

export default defineComponent({
    components: {
        ImageDots,
    },
    props: {
        title: String,
        alignLeft: Boolean,
        image: String,
    },
    setup() {
        return {
            //
        };
    },
});
</script>
