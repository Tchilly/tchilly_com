<template>
    <app-layout title="Page edit">
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Edit {{ page.title }}
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden rounded-lg bg-white p-4 shadow-xl sm:p-6 lg:p-8"
                >
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

                        <editor v-model="form.body" />
                        <form-input-error
                            :message="form.errors.body"
                            class="mt-2"
                        />

                        <hr />

                        <form-button type="submit">Save</form-button>
                    </form>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout";
import FormInputError from "@/Components/Form/InputError.vue";
import FormInput from "@/Components/Form/Input";
import FormLabel from "@/Components/Form/Label";
import FormButton from "@/Components/Form/Button";
import Editor from "@/Components/Form/Editor";
import { useForm } from "@inertiajs/inertia-vue3";
import PrimaryButton from "@/Components/PrimaryButton";

export default defineComponent({
    components: {
        PrimaryButton,
        AppLayout,
        FormInput,
        FormLabel,
        FormButton,
        FormInputError,
        Editor,
    },
    props: {
        page: Object,
    },
    setup(props) {
        const form = useForm({
            title: props.page.title,
            body: props.page.body,
        });

        function submit() {
            form.put(route("dashboard.pages.update", props.page), {
                //
            });
        }

        return {
            form,
            submit,
        };
    },
});
</script>
