<template>
    <app-layout title="Blog edit">
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Edit {{ blog.title }}
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
                                class="py-3"
                            />
                            <form-input-error
                                v-if="form.errors.title"
                                :message="form.errors.title"
                                class="mt-2"
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
                                class="rounded-md border border-gray-300 px-4 py-2 text-base font-medium shadow-sm hover:border-gray-400 focus:border-gray-400 focus:outline-none focus:ring-gray-500 focus-visible:ring-2 focus-visible:ring-gray-500 focus-visible:ring-offset-2"
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

                        <div class="flex justify-between">
                            <form-button type="submit">Save</form-button>
                            <button
                                class="inline-flex justify-center rounded-md border border-transparent bg-white px-4 py-2 text-sm font-medium text-gray-900 hover:bg-gray-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-gray-500 focus-visible:ring-offset-2"
                                removeDialog
                                type="button"
                                @click="setIsOpen(true)"
                            >
                                Delete
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <Dialog :show="isOpen" title="Delete entry" @close="setIsOpen">
            <div class="mt-2">
                <p class="text-sm text-gray-500">
                    Are you sure you want to delete this blog entry?
                </p>
            </div>

            <div class="mt-4">
                <button
                    class="bg-red-600 hover:bg-red-700 focus-visible:ring-red-400 inline-flex justify-center rounded-md border border-transparent px-4 py-2 text-sm font-medium text-white focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2"
                    type="button"
                    @click="remove"
                >
                    Yes, delete!
                </button>
            </div>
        </Dialog>
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
import Dialog from "@/Components/Dialog";

export default defineComponent({
    components: {
        Dialog,
        PrimaryButton,
        AppLayout,
        FormInput,
        FormLabel,
        FormButton,
        FormInputError,
        Editor,
    },
    props: {
        blog: Object,
        categories: Object,
    },
    setup(props) {
        const isOpen = ref(false);

        function setIsOpen(value) {
            isOpen.value = value;
        }

        const form = useForm({
            title: props.blog.title,
            body: props.blog.body ?? "",
            category_id: props.blog.category_id,
        });

        const submit = () => {
            form.put(route("dashboard.blogs.update", props.blog));
        };

        const remove = () => {
            setIsOpen(false);
            form.delete(route("dashboard.blogs.destroy", props.blog));
        };

        return {
            form,
            submit,
            remove,
            setIsOpen,
            isOpen,
        };
    },
});
</script>
