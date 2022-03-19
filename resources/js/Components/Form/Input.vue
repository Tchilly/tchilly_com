<template>
    <div>
        <input
            :id="id"
            ref="input"
            :class="{ 'border-red hover:border-red': error }"
            :value="modelValue"
            class="rounded-md border border-gray-300 px-4 py-2 text-base font-medium shadow-sm hover:border-gray-400 focus:border-gray-400 focus:ring focus:ring-primary-200 focus:ring-opacity-50"
            @input="$emit('update:modelValue', $event.target.value)"
        />

        <form-input-error v-if="error" :message="error" class="mt-2" />
    </div>
</template>

<script>
import { defineComponent } from "vue";
import FormInputError from "@/Components/Form/InputError.vue";

export default defineComponent({
    components: { FormInputError },
    props: ["modelValue", "error", "id"],
    emits: ["update:modelValue"],
    methods: {
        focus() {
            this.$refs.input.focus();
        },
    },
});
</script>
