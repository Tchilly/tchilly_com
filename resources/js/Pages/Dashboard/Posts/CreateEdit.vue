<script setup>
import { ref } from "vue";
import AppLayout from "@/Layouts/AppLayout";
import FormInputError from "@/Components/Form/InputError.vue";
import FormInput from "@/Components/Form/Input";
import FormLabel from "@/Components/Form/Label";
import FormButton from "@/Components/Form/Button";
import Editor from "@/Components/Form/Editor";
import { useForm } from "@inertiajs/inertia-vue3";
import Dialog from "@/Components/Dialog";
import JetSecondaryButton from "@/Jetstream/SecondaryButton.vue";
import { Inertia } from "@inertiajs/inertia";

const props = defineProps({
    post: Object,
    categories: Object,
});

const editable = !!props.post;
const isOpen = ref(false);
const photoPreview = ref(null);
const photoInput = ref(null);

const setIsOpen = (value) => (isOpen.value = value);

const form = useForm({
    id: props.post?.id,
    title: props.post?.title,
    body: props.post?.body ?? "",
    preamble: props.post?.preamble ?? "",
    category_id: props.post?.category_id ?? 1,
    time_span: props.post?.time_span ?? null,
    photo: props.post?.photo_object ? props.post.photo : null,
});

const time_spans = [
    { name: "Unspecified", value: null },
    { name: "One minute", value: 60 },
    { name: "5 minutes", value: 300 },
    { name: "10 minutes", value: 600 },
    { name: "15 minutes", value: 900 },
    { name: "30 minutes", value: 1800 },
    { name: "One hour or more", value: 3600 },
];

const submit = () => {
    if (photoInput.value) {
        form.photo = photoInput.value.files[0];
    }

    editable
        ? form.post(
              route("dashboard.posts.update", {
                  _method: "put",
                  post: props.post,
              })
          )
        : form.post(route("dashboard.posts.store"));
};

const select = () => {
    photoInput.value.click();
};

const updateImage = () => {
    const photo = photoInput.value.files[0];
    if (!photo) return;

    const reader = new FileReader();

    reader.onload = (e) => {
        photoPreview.value = e.target.result;
    };

    reader.readAsDataURL(photo);
};

const deletePhoto = () => {
    Inertia.delete(route("dashboard.posts.delete-photo", props.post), {
        preserveScroll: true,
        onSuccess: () => {
            photoPreview.value = null;
            clear();
        },
    });
};

const clear = () => {
    if (photoInput.value?.value) {
        photoInput.value.value = null;
    }
    form.photo = null;
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
                {{ editable ? `Edit ${post.title}` : "Create post" }}
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden rounded-lg bg-white p-4 shadow-xl sm:p-6 lg:p-8"
                >
                    <form
                        class="space-y-6"
                        enctype="multipart/form-data"
                        @submit.prevent="submit"
                    >
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
                                v-if="form.errors.preamble"
                                :message="form.errors.preamble"
                                class="mt-2"
                            />
                        </div>

                        <div>
                            <FormLabel for="body">Body</FormLabel>
                            <Editor id="body" v-model="form.body" />
                            <FormInputError
                                v-if="form.errors.body"
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
                            <FormLabel for="category_id">Timespan</FormLabel>
                            <select
                                id="time_span"
                                v-model="form.time_span"
                                class="rounded-md border border-gray-300 px-4 py-2 text-base font-medium shadow-sm hover:border-gray-400 focus:border-gray-400 focus:outline-none focus:ring-gray-500 focus-visible:ring-2 focus-visible:ring-gray-500 focus-visible:ring-offset-2"
                            >
                                <option
                                    v-for="time_span in time_spans"
                                    :key="time_span.name"
                                    :value="time_span.value"
                                >
                                    {{ time_span.name }}
                                </option>
                            </select>

                            <p class="mt-1 text-sm text-gray-600">
                                The time it takes to read the post.
                            </p>
                            <FormInputError
                                :message="form.errors.time_span"
                                class="mt-2"
                            />
                        </div>

                        <div>
                            <FormLabel for="image-upload"
                                >Cover photo
                            </FormLabel>

                            <!-- @todo Make this into a component -->

                            <div class="mt-1 max-w-md sm:col-span-2 sm:mt-0">
                                <div v-show="form.photo || photoPreview">
                                    <div
                                        class="h-48 overflow-hidden rounded-md"
                                    >
                                        <!-- Current Profile Photo -->
                                        <img
                                            v-if="form.photo && !photoPreview"
                                            :alt="form.title"
                                            :src="form.photo"
                                            class="block h-full w-full object-cover"
                                        />

                                        <!-- New Profile Photo Preview -->
                                        <div
                                            v-show="photoPreview"
                                            :style="
                                                'background-image: url(\'' +
                                                photoPreview +
                                                '\');'
                                            "
                                            class="h-full bg-cover bg-center bg-no-repeat"
                                        />
                                    </div>

                                    <div>
                                        <JetSecondaryButton
                                            class="mt-2 mr-2"
                                            type="button"
                                            @click.prevent="select"
                                        >
                                            Select A New Photo
                                        </JetSecondaryButton>

                                        <JetSecondaryButton
                                            v-if="form.photo"
                                            class="mt-2"
                                            type="button"
                                            @click.prevent="deletePhoto"
                                        >
                                            Remove Photo
                                        </JetSecondaryButton>
                                    </div>
                                </div>

                                <div
                                    v-show="!form.photo && !photoPreview"
                                    class="align-center flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6"
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

                                        <div class="text-sm text-gray-600">
                                            <label
                                                class="text-indigo-600 hover:text-indigo-500 focus-within:ring-indigo-500 relative cursor-pointer rounded-md bg-white font-medium focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2"
                                                for="image_upload"
                                            >
                                                <span>Upload a file</span>
                                                <input
                                                    id="image_upload"
                                                    ref="photoInput"
                                                    class="sr-only"
                                                    name="photo"
                                                    type="file"
                                                    @change="updateImage"
                                                />
                                            </label>
                                            <span class="pl-1"
                                                >or drag and drop</span
                                            >
                                        </div>
                                        <p class="text-xs text-gray-500">
                                            PNG, JPG, GIF up to 10MB
                                        </p>
                                    </div>

                                    <!-- @todo Needs it's own progress thing, using global now (pressing save triggers this) -->
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
                                :message="form.errors.photo"
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
