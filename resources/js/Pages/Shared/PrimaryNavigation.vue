<template>
    <Popover as="nav" class="relative bg-primary-900">
        <div class="py-4 sm:py-6 md:py-7 lg:py:8">
            <div class="relative max-w-7xl mx-auto flex items-center justify-between px-4 sm:px-6" aria-label="Global">
                <div class="flex items-center flex-1">
                    <div class="flex items-center justify-between w-full md:w-auto">
                        <Link href="/">
                            <span class="sr-only">{{ appName }}</span>
                            <Logo />
                            <!--<img class="h-8 w-auto sm:h-10" src="https://tailwindui.com/img/logos/workflow-mark-indigo-500.svg" :alt="appName" />-->
                        </Link>
                        <div class="flex items-center md:hidden">
                            <PopoverButton class="bg-primary-600 rounded-md p-2 inline-flex items-center justify-center text-white hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-200 focus:ring-offset-primary-900">
                                <span class="sr-only">Open main menu</span>
                                <MenuIcon class="h-6 w-6" aria-hidden="true" />
                            </PopoverButton>
                        </div>
                    </div>
                    <div class="hidden space-x-8 md:flex md:ml-14">
                        <Link v-for="item in navigation" :key="item.name" :href="item.href" class="text-base font-medium text-white hover:text-gray-300">{{ item.name }}</Link>
                    </div>
                </div>

                <div v-if="canLogin" class="hidden md:flex md:items-center md:space-x-6">

                    <Link v-if="$page.props.user" :href="route('dashboard')" class="text-base font-medium text-white hover:text-gray-300">
                        Dashboard
                    </Link>

                    <template v-else>

                        <Link
                            v-if="canRegister"
                            :href="route('register')"
                            class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700"
                        >
                            Register
                        </Link>

                        <Link
                            :href="route('login')"
                            class="text-base font-medium text-white hover:text-gray-300"
                        >
                            Sign in
                        </Link>

                    </template>
                </div>

            </div>
        </div>

        <transition enter-active-class="duration-150 ease-out" enter-from-class="opacity-0 scale-95" enter-to-class="opacity-100 scale-100" leave-active-class="duration-100 ease-in" leave-from-class="opacity-100 scale-100" leave-to-class="opacity-0 scale-95">
            <PopoverPanel focus class="absolute z-10 top-0 inset-x-0 p-2 transition transform origin-top md:hidden">
                <div class="rounded-lg shadow-md bg-white ring-1 ring-black ring-opacity-5 overflow-hidden">
                    <div class="px-5 pt-4 flex items-center justify-between">
                        <div>
                            <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="" />
                        </div>
                        <div>
                            <PopoverButton class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-600">
                                <span class="sr-only">Close menu</span>
                                <XIcon class="h-6 w-6" aria-hidden="true" />
                            </PopoverButton>
                        </div>
                    </div>
                    <div class="pt-5 pb-6">
                        <div class="px-2 space-y-1">
                            <a v-for="item in navigation" :key="item.name" :href="item.href" class="block px-3 py-2 rounded-md text-base font-medium text-gray-900 hover:bg-gray-50">{{ item.name }}</a>
                        </div>

                        <template v-if="canLogin">

                            <div v-if="$page.props.user" class="mt-6 px-5">
                                <Link  :href="route('dashboard')" class="block px-3 py-2 rounded-md text-base font-medium text-gray-900 hover:bg-gray-50">
                                    Dashboard
                                </Link>
                            </div>

                            <template v-else>

                                <div v-if="canRegister" class="mt-6 px-5">
                                    <Link
                                        :href="route('register')"
                                        class="block text-center w-full py-3 px-4 rounded-md shadow bg-primary-500 text-white font-medium hover:bg-primary-600"
                                    >
                                        Register
                                    </Link>
                                </div>

                                <div class="mt-6 px-5">
                                    <Link
                                        :href="route('login')"
                                        class="block text-center w-full py-3 px-4 rounded-md shadow bg-primary-500 text-white font-medium hover:bg-primary-600"
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

<script>
import { Popover, PopoverButton, PopoverPanel } from '@headlessui/vue'
import { MenuIcon, XIcon } from '@heroicons/vue/outline'
import { Link, usePage } from '@inertiajs/inertia-vue3';
import {computed, defineComponent} from "vue";
import Logo from "@/Components/Logo";

const navigation = [
    { name: 'About', href: route('about') },
    { name: 'Programming', href: route('programming') },
    { name: 'Audiophile', href: route('audiophile') },
    { name: 'Tech', href: route('tech') },
    { name: 'Mental', href: route('about', '#mental') },
]

export default defineComponent({
    components: {
        Logo,
        Link,
        Popover,
        PopoverButton,
        PopoverPanel,
        MenuIcon,
        XIcon,
    },

    setup() {

        const appName = computed(() => usePage().props.value.appName);
        const canLogin = computed(() => usePage().props.value.canLogin);
        const canRegister = computed(() => usePage().props.value.canRegister);

        const logout = () => {
            this.$inertia.post(route('logout'));
        }

        return {
            navigation,
            logout,
            appName,
            canLogin,
            canRegister
        }

    },
})
</script>
