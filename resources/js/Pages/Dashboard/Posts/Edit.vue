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

const setIsOpen = (value) => (isOpen.value = value);

const form = useForm({
    title: props.post.title,
    body: props.post.body ?? "",
    preamble: props.post.preamble ?? "",
    category_id: props.post.category_id,
});

const submit = () => {
    form.put(route("dashboard.posts.update", props.post));
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
                        </div>

                        <div>
                            <FormLabel for="body">Body</FormLabel>
                            <Editor id="body" v-model="form.body" />
                        </div>

                        <FormInputError
                            :message="form.errors.body"
                            class="mt-2"
                        />

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
