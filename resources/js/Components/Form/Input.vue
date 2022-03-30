<template>
    <input
        :id="id"
        ref="input"
        :class="{ 'border-red-300 hover:border-red-600': error }"
        :value="modelValue"
        class="active:ring-none inline-flex w-full rounded-md border border-gray-300 bg-white px-4 py-2 px-4 py-2 text-base text-sm font-medium font-medium text-gray-900 shadow-sm focus:outline-none focus-visible:ring-2 focus-visible:ring-gray-500 focus-visible:ring-offset-2"
        @input="$emit('update:modelValue', $event.target.value)"
    />
</template>

<script>
import { defineComponent } from "vue";

export default defineComponent({
    props: ["modelValue", "error", "id"],
    emits: ["update:modelValue"],
    methods: {
        focus() {
            this.$refs.input.focus();
        },
    },
});
</script>
