<script setup>
import { computed } from "vue";

const emit = defineEmits(["update:checked"]);

const props = defineProps({
    checked: {
        type: [Array, Boolean],
        default: false,
    },
    value: {
        type: String,
        default: null,
    },
});

const proxyChecked = computed({
    get() {
        return props.checked;
    },

    set(val) {
        emit("update:checked", val);
    },
});
</script>

<template>
    <input
        v-model="proxyChecked"
        :value="value"
        class="text-indigo-600 focus:border-indigo-300 focus:ring-indigo-200 rounded border-gray-300 shadow-sm focus:ring focus:ring-opacity-50"
        type="checkbox"
    />
</template>
