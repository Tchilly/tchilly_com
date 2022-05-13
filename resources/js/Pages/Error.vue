<script setup>
import { computed } from "vue";
import { Link } from "@inertiajs/inertia-vue3";

const props = defineProps({
    status: Number,
});

const title = computed(() => {
    return {
        503: "503: Service Not Available",
        500: "500: Error",
        403: "403: Access refused",
        404: "Uh oh! I think you’re lost",
    }[props.status];
});

const description = computed(() => {
    return {
        503: "Sorry, we are operationg a maintenance. Come back later.",
        500: "Oups, an error occured.",
        403: "Sorry, you are not allowed to access this content.",
        404: "It looks like the page you’re looking for doesn't exist.",
    }[props.status];
});
</script>

<template>
    <main
        class="flex h-full min-h-screen flex-col bg-cover bg-top sm:bg-top"
        style="
            background-image: url('https://images.unsplash.com/photo-1545972154-9bb223aac798?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=3050&q=80&exp=8&con=-15&sat=-75&bri=-60');
        "
    >
        <div
            class="mx-auto max-w-7xl px-4 py-16 text-center sm:px-6 sm:py-24 lg:px-8 lg:py-48"
        >
            <p class="subtitle">{{ status }}</p>
            <h1
                class="mt-2 text-4xl font-extrabold tracking-tight text-white sm:text-5xl"
            >
                {{ title }}
            </h1>
            <p class="mt-2 text-lg font-medium text-white text-opacity-50">
                {{ description }}
            </p>
            <div class="mt-6">
                <Link :href="route('index')" class="button gray">
                    Go back home
                </Link>
            </div>
        </div>
    </main>
</template>
