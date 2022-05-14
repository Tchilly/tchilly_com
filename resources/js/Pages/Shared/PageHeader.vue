<script setup>
import PrimaryNavigation from "@/Pages/Shared/PrimaryNavigation";
</script>

<template>
    <header
        class="bg-primary relative bg-gradient-to-br from-primary-600 to-primary-700"
    >
        <div class="absolute top-0 left-0 h-full w-full overflow-hidden">
            <svg
                class="absolute inset-0 h-full w-full"
                fill="none"
                preserveAspectRatio="xMidYMid slice"
                viewBox="0 0 1463 360"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path
                    class="text-primary-700 text-opacity-50"
                    d="M-82.673 72l1761.849 472.086-134.327 501.315-1761.85-472.086z"
                    fill="currentColor"
                ></path>
                <path
                    class="text-primary-600 text-opacity-40"
                    d="M-217.088 544.086L1544.761 72l134.327 501.316-1761.849 472.086z"
                    fill="currentColor"
                ></path>
            </svg>
        </div>
        <PrimaryNavigation />
        <slot></slot>
    </header>
</template>
