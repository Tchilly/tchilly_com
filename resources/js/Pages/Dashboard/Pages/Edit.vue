<template>
    <app-layout title="Page edit">
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Edit {{ page.title }}
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="rounded-lg bg-white p-4 shadow-xl sm:p-6 lg:p-8">
                    <form class="space-y-6" @submit.prevent="submit">
                        <div>
                            <form-label for="title">Title</form-label>
                            <form-input
                                id="title"
                                v-model="form.title"
                                :error="form.errors.title"
                                S
                            />
                        </div>

                        <div>
                            <form-label for="body">Body</form-label>
                            <editor id="body" v-model="form.body" />
                            <form-input-error
                                :message="form.errors.body"
                                class="mt-2"
                            />
                        </div>

                        <div>
                            <Listbox v-model="selectedTemplate">
                                <div class="relative">
                                    <ListboxLabel
                                        class="mb-3 block text-sm font-medium text-gray-700"
                                        >Template
                                    </ListboxLabel>
                                    <ListboxButton
                                        class="active:ring-none relative inline-flex w-full rounded-md border border-gray-300 bg-white px-4 py-2 px-4 py-2 text-base text-sm font-medium font-medium text-gray-900 shadow-sm focus:outline-none focus-visible:ring-2 focus-visible:ring-gray-500 focus-visible:ring-offset-2"
                                    >
                                        <span class="block truncate">{{
                                            selectedTemplate.name
                                        }}</span>
                                        <span
                                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2"
                                        >
                                            <SelectorIcon
                                                aria-hidden="true"
                                                class="h-5 w-5 text-gray-400"
                                            />
                                        </span>
                                    </ListboxButton>

                                    <transition
                                        enter-active-class="transition duration-100 ease-out"
                                        enter-from-class="transform scale-95 opacity-0"
                                        enter-to-class="transform scale-100 opacity-100"
                                        leave-active-class="transition duration-75 ease-out"
                                        leave-from-class="transform scale-100 opacity-100"
                                        leave-to-class="transform scale-95 opacity-0"
                                    >
                                        <ListboxOptions
                                            class="absolute mt-1 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm"
                                        >
                                            <ListboxOption
                                                v-for="template in templates"
                                                :key="template"
                                                v-slot="{ active, selected }"
                                                :value="template"
                                                as="template"
                                            >
                                                <li
                                                    :class="[
                                                        active
                                                            ? 'bg-gray-100 text-gray-900'
                                                            : 'text-gray-900',
                                                        'relative cursor-default select-none py-2 pl-10 pr-4',
                                                    ]"
                                                >
                                                    <span
                                                        :class="[
                                                            selected
                                                                ? 'font-medium'
                                                                : 'font-normal',
                                                            'block truncate',
                                                        ]"
                                                        >{{
                                                            template.name
                                                        }}</span
                                                    >
                                                    <span
                                                        v-if="selected"
                                                        class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-600"
                                                    >
                                                        <CheckIcon
                                                            aria-hidden="true"
                                                            class="h-5 w-5"
                                                        />
                                                    </span>
                                                </li>
                                            </ListboxOption>
                                        </ListboxOptions>
                                    </transition>
                                </div>
                            </Listbox>
                        </div>

                        <hr />

                        <form-button type="submit">Save</form-button>
                    </form>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import { defineComponent, ref } from "vue";
import AppLayout from "@/Layouts/AppLayout";
import FormInputError from "@/Components/Form/InputError.vue";
import FormInput from "@/Components/Form/Input";
import FormLabel from "@/Components/Form/Label";
import FormButton from "@/Components/Form/Button";
import Editor from "@/Components/Form/Editor";
import { useForm } from "@inertiajs/inertia-vue3";
import PrimaryButton from "@/Components/PrimaryButton";
import {
    Listbox,
    ListboxButton,
    ListboxLabel,
    ListboxOption,
    ListboxOptions,
} from "@headlessui/vue";
import { CheckIcon, SelectorIcon } from "@heroicons/vue/solid";

export default defineComponent({
    components: {
        PrimaryButton,
        AppLayout,
        FormInput,
        FormLabel,
        FormButton,
        FormInputError,
        Editor,
        Listbox,
        ListboxButton,
        ListboxOptions,
        ListboxOption,
        ListboxLabel,
        CheckIcon,
        SelectorIcon,
    },
    props: {
        page: Object,
        templates: Object,
    },
    setup(props) {
        const current = props.templates.findIndex(
            (template, i) => template.name === props.page.template
        );

        const selectedTemplate = ref(props.templates[current] ?? 0);

        const form = useForm({
            title: props.page.title,
            body: props.page.body,
            template: selectedTemplate,
        });

        function submit() {
            form.transform((data) => ({
                ...data,
                template: form.template.name,
            })).put(route("dashboard.pages.update", props.page, {}));
        }

        return {
            form,
            submit,
            selectedTemplate,
        };
    },
});
</script>
