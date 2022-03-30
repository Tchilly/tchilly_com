<template>
    <app-layout title="Blog edit">
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Create page
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
                            />
                        </div>

                        <div>
                            <form-label for="body">Body</form-label>
                            <editor id="body" v-model="form.body" />
                        </div>

                        <form-input-error
                            :message="form.errors.body"
                            class="mt-2"
                        />

                        <div>
                            <form-label for="category_id">Category</form-label>

                            <select
                                id="category_id"
                                v-model="form.category_id"
                                class="rounded-md border border-gray-300 px-4 py-2 text-base font-medium shadow-sm hover:border-gray-400 focus:border-gray-400 focus:ring focus:ring-primary-200 focus:ring-opacity-50"
                            >
                                <option
                                    v-for="category in categories"
                                    :key="category.id"
                                    :value="category.id"
                                >
                                    {{ category.title }}
                                </option>
                            </select>

                            <form-input-error
                                :message="form.errors.category_id"
                                class="mt-2"
                            />
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
        //blog: Object,
        categories: Object,
    },
    setup(props) {
        const form = useForm({
            title: "",
            body: "",
            category_id: null,
        });

        function submit() {
            form.post(route("dashboard.blogs.store", props.blog), {
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
