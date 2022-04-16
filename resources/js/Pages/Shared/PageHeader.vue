<script setup>
import PrimaryNavigation from "@/Pages/Shared/PrimaryNavigation";
</script>

<template>
    <header>
        <a class="skip-to-content-link" href="#content">Jump to content</a>
        <PrimaryNavigation />
        <slot></slot>
    </header>
</template>
