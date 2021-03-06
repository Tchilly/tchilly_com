<template>
    <div>
        <Head :title="title" />

        <JetBanner />

        <div class="min-h-screen bg-gray-100">
            <nav class="border-b border-gray-100 bg-white">
                <!-- Primary Navigation Menu -->
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="flex h-16 justify-between">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="flex shrink-0 items-center">
                                <Link :href="route('index')">
                                    <Logo class="text-gray-800" />
                                </Link>
                            </div>

                            <!-- Navigation Links -->
                            <div
                                class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex"
                            >
                                <JetNavLink
                                    :active="route().current('dashboard.index')"
                                    :href="route('dashboard.index')"
                                >
                                    Dashboard
                                </JetNavLink>
                                <JetNavLink
                                    :active="
                                        route().current('dashboard.pages*')
                                    "
                                    :href="route('dashboard.pages.index')"
                                >
                                    Pages
                                </JetNavLink>
                                <JetNavLink
                                    :active="
                                        route().current('dashboard.posts*')
                                    "
                                    :href="route('dashboard.posts.index')"
                                >
                                    Posts
                                </JetNavLink>
                            </div>
                        </div>

                        <div class="hidden sm:ml-6 sm:flex sm:items-center">
                            <div class="relative ml-3">
                                <!-- Teams Dropdown -->
                                <JetDropdown
                                    v-if="$page.props.jetstream.hasTeamFeatures"
                                    align="right"
                                    width="60"
                                >
                                    <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button
                                                class="inline-flex items-center rounded-md border border-transparent bg-white px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition hover:bg-gray-50 hover:text-gray-700 focus:bg-gray-50 focus:outline-none active:bg-gray-50"
                                                type="button"
                                            >
                                                {{
                                                    $page.props.user
                                                        .current_team.name
                                                }}

                                                <svg
                                                    class="ml-2 -mr-0.5 h-4 w-4"
                                                    fill="currentColor"
                                                    viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                >
                                                    <path
                                                        clip-rule="evenodd"
                                                        d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                                        fill-rule="evenodd"
                                                    />
                                                </svg>
                                            </button>
                                        </span>
                                    </template>

                                    <template #content>
                                        <div class="w-60">
                                            <!-- Team Management -->
                                            <template
                                                v-if="
                                                    $page.props.jetstream
                                                        .hasTeamFeatures
                                                "
                                            >
                                                <div
                                                    class="block px-4 py-2 text-xs text-gray-400"
                                                >
                                                    Manage Team
                                                </div>

                                                <!-- Team Settings -->
                                                <JetDropdownLink
                                                    :href="
                                                        route(
                                                            'teams.show',
                                                            $page.props.user
                                                                .current_team
                                                        )
                                                    "
                                                >
                                                    Team Settings
                                                </JetDropdownLink>

                                                <JetDropdownLink
                                                    v-if="
                                                        $page.props.jetstream
                                                            .canCreateTeams
                                                    "
                                                    :href="
                                                        route('teams.create')
                                                    "
                                                >
                                                    Create New Team
                                                </JetDropdownLink>

                                                <div
                                                    class="border-t border-gray-100"
                                                />

                                                <!-- Team Switcher -->
                                                <div
                                                    class="block px-4 py-2 text-xs text-gray-400"
                                                >
                                                    Switch Teams
                                                </div>

                                                <template
                                                    v-for="team in $page.props
                                                        .user.all_teams"
                                                    :key="team.id"
                                                >
                                                    <form
                                                        @submit.prevent="
                                                            switchToTeam(team)
                                                        "
                                                    >
                                                        <JetDropdownLink
                                                            as="button"
                                                        >
                                                            <div
                                                                class="flex items-center"
                                                            >
                                                                <svg
                                                                    v-if="
                                                                        team.id ==
                                                                        $page
                                                                            .props
                                                                            .user
                                                                            .current_team_id
                                                                    "
                                                                    class="text-green-400 mr-2 h-5 w-5"
                                                                    fill="none"
                                                                    stroke="currentColor"
                                                                    stroke-linecap="round"
                                                                    stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    viewBox="0 0 24 24"
                                                                >
                                                                    <path
                                                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                                                                    />
                                                                </svg>
                                                                <div>
                                                                    {{
                                                                        team.name
                                                                    }}
                                                                </div>
                                                            </div>
                                                        </JetDropdownLink>
                                                    </form>
                                                </template>
                                            </template>
                                        </div>
                                    </template>
                                </JetDropdown>
                            </div>

                            <!-- Settings Dropdown -->
                            <div class="relative ml-3">
                                <JetDropdown align="right" width="48">
                                    <template #trigger>
                                        <button
                                            v-if="
                                                $page.props.jetstream
                                                    .managesProfilePhotos
                                            "
                                            class="flex rounded-full border-2 border-transparent text-sm transition focus:border-gray-300 focus:outline-none"
                                        >
                                            <img
                                                :alt="$page.props.user.name"
                                                :src="
                                                    $page.props.user
                                                        .profile_photo_url
                                                "
                                                class="h-8 w-8 rounded-full object-cover"
                                            />
                                        </button>

                                        <span
                                            v-else
                                            class="inline-flex rounded-md"
                                        >
                                            <button
                                                class="inline-flex items-center rounded-md border border-transparent bg-white px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition hover:text-gray-700 focus:outline-none"
                                                type="button"
                                            >
                                                {{ $page.props.user.name }}

                                                <svg
                                                    class="ml-2 -mr-0.5 h-4 w-4"
                                                    fill="currentColor"
                                                    viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                >
                                                    <path
                                                        clip-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        fill-rule="evenodd"
                                                    />
                                                </svg>
                                            </button>
                                        </span>
                                    </template>

                                    <template #content>
                                        <!-- Account Management -->
                                        <div
                                            class="block px-4 py-2 text-xs text-gray-400"
                                        >
                                            Manage Account
                                        </div>

                                        <JetDropdownLink
                                            :href="route('profile.show')"
                                        >
                                            Profile
                                        </JetDropdownLink>

                                        <JetDropdownLink
                                            v-if="
                                                $page.props.jetstream
                                                    .hasApiFeatures
                                            "
                                            :href="route('api-tokens.index')"
                                        >
                                            API Tokens
                                        </JetDropdownLink>

                                        <div class="border-t border-gray-100" />

                                        <!-- Authentication -->
                                        <Link
                                            :href="route('logout')"
                                            as="button"
                                            class="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 transition hover:bg-gray-100 focus:bg-gray-100 focus:outline-none"
                                            method="post"
                                            >Logout
                                        </Link>
                                    </template>
                                </JetDropdown>
                            </div>
                        </div>

                        <!-- Hamburger -->
                        <div class="-mr-2 flex items-center sm:hidden">
                            <button
                                class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 transition hover:bg-gray-100 hover:text-gray-500 focus:bg-gray-100 focus:text-gray-500 focus:outline-none"
                                @click="
                                    showingNavigationDropdown =
                                        !showingNavigationDropdown
                                "
                            >
                                <svg
                                    class="h-6 w-6"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        :class="{
                                            hidden: showingNavigationDropdown,
                                            'inline-flex':
                                                !showingNavigationDropdown,
                                        }"
                                        d="M4 6h16M4 12h16M4 18h16"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                    />
                                    <path
                                        :class="{
                                            hidden: !showingNavigationDropdown,
                                            'inline-flex':
                                                showingNavigationDropdown,
                                        }"
                                        d="M6 18L18 6M6 6l12 12"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Responsive Navigation Menu -->
                <div
                    :class="{
                        block: showingNavigationDropdown,
                        hidden: !showingNavigationDropdown,
                    }"
                    class="sm:hidden"
                >
                    <div class="space-y-1 pt-2 pb-3">
                        <JetResponsiveNavLink
                            :active="route().current('dashboard.index')"
                            :href="route('dashboard.index')"
                        >
                            Dashboard
                        </JetResponsiveNavLink>
                    </div>

                    <!-- Responsive Settings Options -->
                    <div class="border-t border-gray-200 pt-4 pb-1">
                        <div class="flex items-center px-4">
                            <div
                                v-if="
                                    $page.props.jetstream.managesProfilePhotos
                                "
                                class="mr-3 shrink-0"
                            >
                                <img
                                    :alt="$page.props.user.name"
                                    :src="$page.props.user.profile_photo_url"
                                    class="h-10 w-10 rounded-full object-cover"
                                />
                            </div>

                            <div>
                                <div
                                    class="text-base font-medium text-gray-800"
                                >
                                    {{ $page.props.user.name }}
                                </div>
                                <div class="text-sm font-medium text-gray-500">
                                    {{ $page.props.user.email }}
                                </div>
                            </div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <JetResponsiveNavLink
                                :active="route().current('profile.show')"
                                :href="route('profile.show')"
                            >
                                Profile
                            </JetResponsiveNavLink>

                            <JetResponsiveNavLink
                                v-if="$page.props.jetstream.hasApiFeatures"
                                :active="route().current('api-tokens.index')"
                                :href="route('api-tokens.index')"
                            >
                                API Tokens
                            </JetResponsiveNavLink>

                            <!-- Authentication -->
                            <Link
                                :href="route('logout')"
                                as="button"
                                class="block w-full border-l-4 border-transparent py-2 pl-3 pr-4 text-left text-base font-medium text-gray-600 transition hover:border-gray-300 hover:bg-gray-50 hover:text-gray-800 focus:border-gray-300 focus:bg-gray-50 focus:text-gray-800 focus:outline-none"
                                method="post"
                                >Logout
                            </Link>

                            <!-- Team Management -->
                            <template
                                v-if="$page.props.jetstream.hasTeamFeatures"
                            >
                                <div class="border-t border-gray-200" />

                                <div
                                    class="block px-4 py-2 text-xs text-gray-400"
                                >
                                    Manage Team
                                </div>

                                <!-- Team Settings -->
                                <JetResponsiveNavLink
                                    :active="route().current('teams.show')"
                                    :href="
                                        route(
                                            'teams.show',
                                            $page.props.user.current_team
                                        )
                                    "
                                >
                                    Team Settings
                                </JetResponsiveNavLink>

                                <JetResponsiveNavLink
                                    v-if="$page.props.jetstream.canCreateTeams"
                                    :active="route().current('teams.create')"
                                    :href="route('teams.create')"
                                >
                                    Create New Team
                                </JetResponsiveNavLink>

                                <div class="border-t border-gray-200" />

                                <!-- Team Switcher -->
                                <div
                                    class="block px-4 py-2 text-xs text-gray-400"
                                >
                                    Switch Teams
                                </div>

                                <template
                                    v-for="team in $page.props.user.all_teams"
                                    :key="team.id"
                                >
                                    <form @submit.prevent="switchToTeam(team)">
                                        <JetResponsiveNavLink as="button">
                                            <div class="flex items-center">
                                                <svg
                                                    v-if="
                                                        team.id ===
                                                        $page.props.user
                                                            .current_team_id
                                                    "
                                                    class="text-green-400 mr-2 h-5 w-5"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    viewBox="0 0 24 24"
                                                >
                                                    <path
                                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                                                    />
                                                </svg>
                                                <div>{{ team.name }}</div>
                                            </div>
                                        </JetResponsiveNavLink>
                                    </form>
                                </template>
                            </template>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Heading -->
            <header v-if="$slots.header" class="bg-white shadow">
                <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <slot />
            </main>
        </div>
    </div>
</template>

<script setup>
import Logo from "@/Components/Logo";
import JetBanner from "@/Jetstream/Banner.vue";
import JetDropdown from "@/Jetstream/Dropdown.vue";
import JetDropdownLink from "@/Jetstream/DropdownLink.vue";
import JetNavLink from "@/Jetstream/NavLink.vue";
import JetResponsiveNavLink from "@/Jetstream/ResponsiveNavLink.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import { ref } from "vue";

defineProps({
    title: String,
});

const showingNavigationDropdown = ref(false);

const switchToTeam = (team) => {
    this.$inertia.put(
        route("current-team.update"),
        {
            team_id: team.id,
        },
        {
            preserveState: false,
        }
    );
};
</script>
