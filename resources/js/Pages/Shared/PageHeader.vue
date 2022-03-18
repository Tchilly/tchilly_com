<template>
    <header>
        <primary-navigation />
        <slot></slot>
    </header>
</template>

<script>
import Hero from "@/Pages/Shared/Hero";
import { defineComponent } from "vue";
import PrimaryNavigation from "@/Pages/Shared/PrimaryNavigation";

export default defineComponent({
    components: {
        PrimaryNavigation,
        Hero,
    },
});
</script>
