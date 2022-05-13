<script setup>
import { usePage, Link } from "@inertiajs/inertia-vue3";
import Logo from "@/Components/Logo";

const appName = usePage().props.value.appName;
const social = usePage().props.value.socialMedia;

const footerNavigation = {
    services: [
        { name: "Programming", href: route("page", "programming") },
        { name: "Tutoring", href: route("page", "tutoring") },
        { name: "Courses", href: route("page", "courses") },
    ],
    site: [
        { name: "About", href: route("page", "about") },
        { name: "Blog", href: route("posts.show") },
        { name: "Contact", href: route("page", "contact") },
    ],
    legal: [
        // { name: "Claim", href: "#" },
        { name: "Privacy", href: route("policy.show") },
        { name: "Terms", href: route("terms.show") },
    ],
    social: [...social],
};
</script>

<template>
    <footer aria-labelledby="footer-heading" class="bg-gray-50">
        <h2 id="footer-heading" class="sr-only">Footer</h2>
        <div class="mx-auto max-w-7xl px-4 pt-16 pb-8 sm:px-6 lg:px-8 lg:pt-24">
            <div class="sm:grid sm:grid-cols-2 md:grid-cols-4 xl:gap-8">
                <div>
                    <h3 class="subtitle text-gray-500">Services</h3>
                    <ul class="mt-4 space-y-4" role="list">
                        <li
                            v-for="item in footerNavigation.services"
                            :key="item.name"
                        >
                            <a
                                :href="item.href"
                                class="text-base text-gray-500 hover:text-black hover:underline"
                            >
                                {{ item.name }}
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="mt-8 md:mt-0">
                    <h3 class="subtitle text-gray-500">Navigation</h3>
                    <ul class="mt-4 space-y-4" role="list">
                        <li
                            v-for="item in footerNavigation.site"
                            :key="item.name"
                        >
                            <a
                                :href="item.href"
                                class="text-base text-gray-500 hover:text-black hover:underline"
                            >
                                {{ item.name }}
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="mt-8 md:mt-0">
                    <h3 class="subtitle text-gray-500">Legal</h3>
                    <ul class="mt-4 space-y-4" role="list">
                        <li
                            v-for="item in footerNavigation.legal"
                            :key="item.name"
                        >
                            <a
                                :href="item.href"
                                class="text-base text-gray-500 hover:text-black hover:underline"
                            >
                                {{ item.name }}
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="mt-8 md:mt-0">
                    <Link class="md:float-right" href="/">
                        <span class="sr-only">{{ appName }}</span>
                        <Logo class="text-gray-400 hover:text-gray-800" />
                    </Link>
                </div>

                <!--                <div class="mt-12 xl:mt-0">-->
                <!--                    <h3-->
                <!--                        class="text-sm font-semibold uppercase tracking-wider text-gray-500"-->
                <!--                    >-->
                <!--                        Subscribe to our newsletter-->
                <!--                    </h3>-->
                <!--                    <p class="mt-4 text-base text-gray-700">-->
                <!--                        The latest news, articles, and resources, sent to your-->
                <!--                        inbox weekly.-->
                <!--                    </p>-->
                <!--                    <form class="mt-4 sm:flex sm:max-w-md">-->
                <!--                        <label class="sr-only" for="email-address"-->
                <!--                            >Email address</label-->
                <!--                        >-->
                <!--                        <input-->
                <!--                            id="email-address"-->
                <!--                            autocomplete="email"-->
                <!--                            class="focus:ring-indigo-500 focus:border-indigo-500 w-full min-w-0 appearance-none rounded-md border border-gray-300 bg-white py-2 px-4 text-base text-gray-900 placeholder-gray-500 shadow-sm focus:placeholder-gray-400 focus:outline-none"-->
                <!--                            name="email-address"-->
                <!--                            placeholder="Enter your email"-->
                <!--                            required=""-->
                <!--                            type="email"-->
                <!--                        />-->
                <!--                        <div-->
                <!--                            class="mt-3 rounded-md sm:mt-0 sm:ml-3 sm:flex-shrink-0"-->
                <!--                        >-->
                <!--                            <button-->
                <!--                                class="flex w-full items-center justify-center rounded-md border border-transparent bg-gradient-to-r from-primary-600 to-primary-600 bg-origin-border px-4 py-3 text-base font-medium text-white shadow-sm hover:from-primary-700 hover:to-primary-700"-->
                <!--                                type="submit"-->
                <!--                            >-->
                <!--                                Subscribe-->
                <!--                            </button>-->
                <!--                        </div>-->
                <!--                    </form>-->
                <!--                </div>-->
            </div>
            <div
                class="mt-12 border-t border-gray-200 pt-8 md:flex md:items-center md:justify-between lg:mt-16"
            >
                <div class="flex space-x-4 md:order-2">
                    <a
                        v-for="item in footerNavigation.social"
                        :key="item.name"
                        :href="item.href"
                        class="rounded-full bg-gray-200 p-2 text-gray-400 text-white hover:bg-gray-300 hover:text-gray-500"
                        rel="noreferrer"
                    >
                        <span class="sr-only">{{ item.name }}</span>
                        <div v-html="item.icon" />
                    </a>
                </div>
                <p class="mt-8 text-base text-gray-500 md:order-1 md:mt-0">
                    &copy; 2022 {{ appName }}. All rights reserved.
                </p>
            </div>
        </div>
    </footer>
</template>
