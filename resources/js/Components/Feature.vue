<template>
    <div class="mb-32">
        <div
            class="min-h-lg lg:mx-auto lg:grid lg:max-w-7xl lg:grid-flow-col-dense lg:grid-cols-2 lg:gap-24 lg:px-8"
        >
            <div
                :class="{ 'lg:col-start-2': alignLeft }"
                class="relative z-10 px-4 sm:px-6 lg:mx-auto lg:mx-0 lg:py-16 lg:px-0"
            >
                <div>
                    <!-- Icon -->
                    <div v-if="$slots.icon" class="mb-6">
                        <span
                            class="flex h-12 w-12 items-center justify-center rounded-md bg-primary-600 text-primary-900"
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
                class="relative z-0 mt-12 sm:mt-16 lg:mt-0"
            >
                <div
                    :class="
                        alignLeft
                            ? '-ml-48 pr-4 sm:pr-6 md:-ml-16'
                            : '-mr-48 pl-4 sm:pl-6 md:-mr-16'
                    "
                    class="lg:relative lg:m-0 lg:h-full lg:px-0"
                >
                    <image-dots
                        :class="
                            alignLeft
                                ? '-left-full -mt-20 ml-20'
                                : '-right-full -mt-20 mr-20'
                        "
                    />
                    <img
                        :class="alignLeft ? 'lg:right-0' : 'lg:left-0'"
                        :src="image"
                        alt="Inbox user interface"
                        class="w-full rounded-xl shadow-xl ring-1 ring-black ring-opacity-5 lg:absolute lg:h-full lg:w-auto lg:min-w-max lg:max-w-none"
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
