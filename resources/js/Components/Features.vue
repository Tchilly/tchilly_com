<script setup>
defineProps({
    title: String,
});
</script>

<template>
    <section :aria-label="title" class="relative flex flex-col overflow-hidden">
        <slot></slot>
    </section>
</template>
