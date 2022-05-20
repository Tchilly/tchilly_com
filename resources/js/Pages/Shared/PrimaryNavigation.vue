<script setup>
import { ref } from "vue";
import { Link, usePage } from "@inertiajs/inertia-vue3";
import hotkeys from "hotkeys-js";
import { Popover, PopoverButton, PopoverPanel } from "@headlessui/vue";
import { MenuIcon, XIcon, SearchIcon, CogIcon } from "@heroicons/vue/outline";
import Logo from "@/Components/Logo";
import SearchPalette from "@/Components/SearchPalette";

const navigation = [
    { name: "Blog", href: route("posts.show", false, false) },
    { name: "About me", href: route("page", "about", false) },
    { name: "Contact", href: route("page", "contact", false) },
    /*    {name: "Mental", href: route("page", ["about", "#mental"])},*/
];

const appName = usePage().props.value.appName;
const canLogin = usePage().props.value.canLogin;
const canRegister = usePage().props.value.canRegister;
const openSearch = ref(false);

hotkeys("ctrl+k, alt+shift+s", function (event, handler) {
    event.preventDefault();
    openSearch.value = true;
});
</script>

<template>
    <Popover aria-label="Main menu" as="nav" class="relative">
        <div
            class="relative mx-auto flex max-w-7xl items-center justify-between py-4 px-4 sm:py-6 sm:px-6 md:py-8 lg:py-10"
        >
            <div class="flex flex-1 items-center">
                <div class="flex w-full items-center justify-between md:w-auto">
                    <Link :href="route('index')">
                        <span class="sr-only">{{ appName }}</span>
                        <Logo class="text-gray-200 hover:text-white" />
                    </Link>
                </div>
                <div class="hidden space-x-8 md:ml-14 md:flex">
                    <Link
                        v-for="item in navigation"
                        :key="item.name"
                        :class="[
                            $page.url.startsWith(item.href)
                                ? 'border-white text-white hover:text-white'
                                : 'text-primary-100 hover:text-white',
                        ]"
                        :href="item.href"
                        class="border-b border-transparent text-base font-medium hover:border-white"
                        >{{ item.name }}
                    </Link>
                </div>
            </div>

            <div class="flex items-center">
                <button
                    class="mr-4 inline-flex items-center justify-between space-x-4 rounded-md border border-transparent bg-gray-200 p-2 text-sm text-gray-700 shadow-sm hover:bg-gray-50 focus:border-transparent focus:outline-none focus-visible:ring-2 focus-visible:ring-primary-300 focus-visible:ring-offset-2 focus-visible:ring-offset-primary-600 md:mr-0 md:px-4"
                    @click="openSearch = true"
                >
                    <SearchIcon
                        aria-hidden="true"
                        class="pointer-events-none h-6 w-6 text-gray-500 md:h-5 md:w-5"
                    />
                    <span class="hidden pr-8 md:inline-block">Search ...</span>

                    <kbd
                        class="hidden rounded bg-gray-300 px-2 font-sans text-sm font-medium text-gray-600 md:inline-block"
                    >
                        Ctrl
                    </kbd>
                    <span class="!mx-1 hidden md:inline-block">+</span>
                    <kbd
                        class="!ml-0 hidden rounded bg-gray-300 px-2 font-sans text-sm font-medium text-gray-600 md:inline-block"
                    >
                        K
                    </kbd>
                </button>
                <PopoverButton
                    class="inline-flex items-center justify-center rounded-md bg-primary-600 p-2 text-white hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-200 focus:ring-offset-2 focus:ring-offset-primary-900 md:hidden"
                >
                    <span class="sr-only">Open main menu</span>
                    <MenuIcon aria-hidden="true" class="h-6 w-6" />
                </PopoverButton>
            </div>

            <SearchPalette :show="openSearch" @close="openSearch = false" />

            <div
                v-if="canLogin"
                class="hidden md:flex md:items-center md:space-x-6"
            >
                <Link
                    v-if="$page.props.user"
                    :href="route('dashboard.index')"
                    class="bg-dark-300 hover:bg-dark-100 ml-6 rounded p-2 text-base font-medium text-gray-300 hover:text-white"
                >
                    <CogIcon aria-hidden="true" class="h-5 w-5" />
                    <span class="sr-only">Dashboard</span>
                </Link>
            </div>
        </div>

        <transition
            enter-active-class="duration-150 ease-out"
            enter-from-class="opacity-0 scale-95"
            enter-to-class="opacity-100 scale-100"
            leave-active-class="duration-100 ease-in"
            leave-from-class="opacity-100 scale-100"
            leave-to-class="opacity-0 scale-95"
        >
            <PopoverPanel
                class="absolute inset-x-0 top-0 z-10 origin-top transform p-2 transition md:hidden"
                focus
            >
                <div
                    class="overflow-hidden rounded-lg bg-white shadow-md ring-1 ring-black ring-opacity-5"
                >
                    <div class="flex items-center justify-between px-5 pt-4">
                        <Logo :alt="appName" class="flex items-center" />
                        <div>
                            <PopoverButton
                                class="focus:ring-indigo-600 inline-flex items-center justify-center rounded-md bg-white p-2 text-gray-400 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset"
                            >
                                <span class="sr-only">Close menu</span>
                                <XIcon aria-hidden="true" class="h-6 w-6" />
                            </PopoverButton>
                        </div>
                    </div>
                    <div class="pt-5 pb-6">
                        <div class="space-y-1 px-2">
                            <a
                                v-for="item in navigation"
                                :key="item.name"
                                :href="item.href"
                                class="block rounded-md px-3 py-2 text-base font-medium text-gray-900 hover:bg-gray-50"
                                >{{ item.name }}
                            </a>
                        </div>

                        <template v-if="canLogin">
                            <div v-if="$page.props.user" class="mt-6 px-5">
                                <Link
                                    :href="route('dashboard.index')"
                                    class="block rounded-md px-3 py-2 text-base font-medium text-gray-900 hover:bg-gray-50"
                                >
                                    Dashboard
                                </Link>
                            </div>

                            <template v-else>
                                <div v-if="canRegister" class="mt-6 px-5">
                                    <Link
                                        :href="route('register')"
                                        class="block w-full rounded-md bg-primary-500 py-3 px-4 text-center font-medium text-white shadow hover:bg-primary-600"
                                    >
                                        Register
                                    </Link>
                                </div>

                                <div class="mt-6 px-5">
                                    <Link
                                        :href="route('login')"
                                        class="block w-full rounded-md bg-primary-500 py-3 px-4 text-center font-medium text-white shadow hover:bg-primary-600"
                                    >
                                        Sign in
                                    </Link>
                                </div>
                            </template>
                        </template>
                    </div>
                </div>
            </PopoverPanel>
        </transition>
    </Popover>
</template>
