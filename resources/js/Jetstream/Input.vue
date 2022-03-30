<script setup>
import { onMounted, ref } from "vue";

defineProps({
    modelValue: String,
});

defineEmits(["update:modelValue"]);

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute("autofocus")) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <input
        ref="input"
        :value="modelValue"
        class="focus:border-indigo-300 focus:ring-indigo-200 rounded-md border-gray-300 shadow-sm focus:ring focus:ring-opacity-50"
        @input="$emit('update:modelValue', $event.target.value)"
    />
</template>
