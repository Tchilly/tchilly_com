<script setup xmlns="http://www.w3.org/1999/html">
import { ref } from "vue";
import AppLayout from "@/Layouts/AppLayout";
import FormInputError from "@/Components/Form/InputError.vue";
import FormInput from "@/Components/Form/Input";
import FormLabel from "@/Components/Form/Label";
import FormButton from "@/Components/Form/Button";
import Editor from "@/Components/Form/Editor";
import { useForm } from "@inertiajs/inertia-vue3";
import Dialog from "@/Components/Dialog";

const props = defineProps({
    post: Object,
    categories: Object,
});

const isOpen = ref(false);
const photoPreview = ref(null);
const photoInput = ref(null);

const setIsOpen = (value) => (isOpen.value = value);

const form = useForm({
    _method: "PUT",
    title: props.post.title,
    body: props.post.body ?? "",
    preamble: props.post.preamble ?? "",
    category_id: props.post.category_id,
    photo: null,
});

const submit = () => {
    if (photoInput.value) {
        form.photo = photoInput.value.files[0];
    }

    form.post(route("dashboard.posts.update", props.post));
};

const remove = () => {
    setIsOpen(false);
    form.delete(route("dashboard.posts.destroy", props.post));
};
</script>

<template>
    <AppLayout title="Blog edit">
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Edit {{ post.title }}
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden rounded-lg bg-white p-4 shadow-xl sm:p-6 lg:p-8"
                >
                    <form class="space-y-6" @submit.prevent="submit">
                        <div>
                            <FormLabel for="title">Title</FormLabel>
                            <FormInput
                                id="title"
                                v-model="form.title"
                                :error="form.errors.title"
                                class="py-3"
                            />
                            <FormInputError
                                v-if="form.errors.title"
                                :message="form.errors.title"
                                class="mt-2"
                            />
                        </div>

                        <div>
                            <FormLabel for="preamble">Preamble</FormLabel>
                            <textarea
                                id="preamble"
                                v-model="form.preamble"
                                class="active:ring-none inline-flex h-32 w-full rounded-md border border-gray-300 bg-white px-4 py-2 px-4 py-2 py-3 text-base text-sm font-medium font-medium text-gray-900 shadow-sm focus:outline-none focus-visible:ring-2 focus-visible:ring-gray-500 focus-visible:ring-offset-2"
                            ></textarea>
                            <FormInputError
                                :message="form.errors.preamble"
                                class="mt-2"
                            />
                        </div>

                        <div>
                            <FormLabel for="body">Body</FormLabel>
                            <Editor id="body" v-model="form.body" />
                            <FormInputError
                                :message="form.errors.body"
                                class="mt-2"
                            />
                        </div>

                        <div>
                            <FormLabel for="category_id">Category</FormLabel>
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
                            <FormInputError
                                :message="form.errors.category_id"
                                class="mt-2"
                            />
                        </div>

                        <div>
                            <FormLabel for="image-upload"
                                >Cover photo
                            </FormLabel>
                            <div class="mt-1 sm:col-span-2 sm:mt-0">
                                <div
                                    class="flex max-w-lg justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6"
                                >
                                    <div class="space-y-1 text-center">
                                        <svg
                                            aria-hidden="true"
                                            class="mx-auto h-12 w-12 text-gray-400"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 48 48"
                                        >
                                            <path
                                                d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                            ></path>
                                        </svg>
                                        <div class="flex text-sm text-gray-600">
                                            <label
                                                class="text-indigo-600 hover:text-indigo-500 focus-within:ring-indigo-500 relative cursor-pointer rounded-md bg-white font-medium focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2"
                                                for="image-upload"
                                            >
                                                <span>Upload a file</span>
                                                <input
                                                    id="image-upload"
                                                    ref="photoInput"
                                                    class="sr-only"
                                                    name="image_upload"
                                                    type="file"
                                                    @change="form.photo"
                                                />
                                            </label>
                                            <p class="pl-1">or drag and drop</p>
                                        </div>
                                        <p class="text-xs text-gray-500">
                                            PNG, JPG, GIF up to 10MB
                                        </p>
                                    </div>

                                    <progress
                                        v-if="form.progress"
                                        :value="form.progress.percentage"
                                        max="100"
                                    >
                                        {{ form.progress.percentage }}%
                                    </progress>
                                </div>
                            </div>
                            <FormInputError
                                :message="form.errors.image_upload"
                                class="mt-2"
                            />
                        </div>

                        <hr />

                        <div class="flex justify-between">
                            <FormButton type="submit">Save</FormButton>
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
                    class="inline-flex justify-center rounded-md border border-transparent bg-red-600 px-4 py-2 text-sm font-medium text-white hover:bg-red-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-red-400 focus-visible:ring-offset-2"
                    type="button"
                    @click="remove"
                >
                    Yes, delete!
                </button>
            </div>
        </Dialog>
    </AppLayout>
</template>
