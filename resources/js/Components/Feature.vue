<template>
    <div class="mb-32">
        <div class="lg:mx-auto lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-2 lg:grid-flow-col-dense lg:gap-24 min-h-lg">
            <div
                class="relative z-10 px-4 lg:mx-auto sm:px-6 lg:py-16 lg:mx-0 lg:px-0"
                :class="{ 'lg:col-start-2' : alignLeft }"
            >

                <div>

                    <!-- Icon -->
                    <div v-if="$slots.icon" class="mb-6">
                        <span class="h-12 w-12 rounded-md flex items-center justify-center text-primary-900 bg-primary-600">
                            <slot name="icon"></slot>
                        </span>
                    </div>

                    <!-- Content -->
                    <div>

                        <!-- Title -->
                        <h2 class="text-3xl font-extrabold tracking-tight text-gray-300">{{title}}</h2>

                        <!-- Body -->
                        <slot></slot>

                    </div>
                </div>

                <!-- Footer -->
                <div v-if="$slots.footer" class="mt-8 border-t border-gray-600 pt-6">
                    <slot name="footer"></slot>
                </div>

            </div>

            <!-- Images -->
            <div class="relative z-0 mt-12 sm:mt-16 lg:mt-0" :class="{ 'lg:col-start-1' : alignLeft }">

                <div
                    class="lg:px-0 lg:m-0 lg:relative lg:h-full"
                    :class="alignLeft ? 'pr-4 -ml-48 sm:pr-6 md:-ml-16' : 'pl-4 -mr-48 sm:pl-6 md:-mr-16'"
                >
                    <image-dots :class="alignLeft ? '-left-full -mt-20 ml-20' : '-right-full -mt-20 mr-20'" />
                    <img
                        class="
                            w-full
                            rounded-xl
                            shadow-xl
                            ring-1 ring-black ring-opacity-5
                            lg:absolute lg:h-full lg:w-auto lg:max-w-none lg:min-w-max
                        "
                        :class="alignLeft ? 'lg:right-0' : 'lg:left-0'"
                        :src="image"
                        alt="Inbox user interface"
                    />
                </div>
            </div>

        </div>
    </div>
</template>



<script>
import {defineComponent} from "vue";
import ImageDots from "@/Pages/Shared/ImageDots";

export default defineComponent({
    components: {
        ImageDots
    },
    props: {
        title: String,
        alignLeft: Boolean,
        image: String
    },
    setup() {
        return {
            //
        };
    },
});

</script>
