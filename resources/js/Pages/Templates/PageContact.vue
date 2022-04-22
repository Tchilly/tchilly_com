<script setup>
import PublicLayout from "@/Layouts/PublicLayout";
import { MailIcon, PhoneIcon } from "@heroicons/vue/outline";
import { useForm } from "@inertiajs/inertia-vue3";
import FormInputError from "@/Components/Form/InputError.vue";
import FormInput from "@/Components/Form/Input";
import FormLabel from "@/Components/Form/Label";

defineProps({
    page: Object,
});

const form = useForm({
    first_name: "",
    last_name: "",
    email: "",
    company: "",
    phone: "",
    description: "",
    reference: "",
});

const submit = () => {
    form.post(route("contact"), {
        onSuccess: () => form.reset(),
    });
};
</script>

<template>
    <PublicLayout :title="page.title">
        <div class="relative bg-gradient-to-r from-dark to-primary-900">
            <div class="lg:absolute lg:inset-0">
                <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
                    <img
                        alt=""
                        class="h-56 w-full object-cover lg:absolute lg:h-full"
                        src="https://images.unsplash.com/photo-1556761175-4b46a572b786?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1567&q=80"
                    />
                </div>
            </div>
            <div
                class="relative py-16 px-4 pb-24 sm:px-6 lg:mx-auto lg:grid lg:max-w-7xl lg:grid-cols-2 lg:px-8"
            >
                <div class="lg:pr-8">
                    <div class="mx-auto lg:mx-0">
                        <h1 class="page-title">
                            {{ page.title }}
                        </h1>

                        <div
                            class="prose prose-invert mt-8 mt-8 md:prose-lg lg:prose-xl"
                            v-html="page.body"
                        />
                        <form
                            action="#"
                            class="mt-9 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8"
                            @submit.prevent="submit"
                        >
                            <div>
                                <FormLabel
                                    class="text-gray-300"
                                    for="first-name"
                                    >First name
                                </FormLabel>

                                <FormInput
                                    id="first-name"
                                    v-model="form.first_name"
                                    :error="form.errors.first_name"
                                    autocomplete="given-name"
                                    class="focus:ring-primary focus:ring-offset-dark focus-visible:ring-primary-500"
                                />
                                <FormInputError
                                    v-if="form.errors.first_name"
                                    :message="form.errors.first_name"
                                    class="mt-2"
                                />
                            </div>
                            <div>
                                <FormLabel class="text-gray-300" for="last-name"
                                    >Last name
                                </FormLabel>
                                <FormInput
                                    id="last-name"
                                    v-model="form.last_name"
                                    :error="form.errors.last_name"
                                    autocomplete="family-name"
                                    class="focus:ring-primary focus:ring-offset-dark focus-visible:ring-primary-500"
                                />
                                <FormInputError
                                    v-if="form.errors.last_name"
                                    :message="form.errors.last_name"
                                    class="mt-2"
                                />
                            </div>
                            <div class="sm:col-span-2">
                                <FormLabel class="text-gray-300" for="email"
                                    >Email
                                </FormLabel>
                                <FormInput
                                    id="email"
                                    v-model="form.email"
                                    :error="form.errors.email"
                                    autocomplete="email"
                                    class="focus:ring-primary focus:ring-offset-dark focus-visible:ring-primary-500"
                                    name="email"
                                    type="email"
                                />
                                <FormInputError
                                    v-if="form.errors.email"
                                    :message="form.errors.email"
                                    class="mt-2"
                                />
                            </div>
                            <div class="sm:col-span-2">
                                <div class="flex justify-between">
                                    <FormLabel
                                        class="text-gray-300"
                                        for="company"
                                        >Company
                                    </FormLabel>
                                    <span
                                        id="company-description"
                                        class="text-sm text-gray-400"
                                        >Optional</span
                                    >
                                </div>
                                <FormInput
                                    id="company"
                                    v-model="form.company"
                                    :error="form.errors.company"
                                    aria-describedby="company-description"
                                    autocomplete="organization"
                                    class="focus:ring-primary focus:ring-offset-dark focus-visible:ring-primary-500"
                                    name="company"
                                />
                                <FormInputError
                                    v-if="form.errors.company"
                                    :message="form.errors.company"
                                    class="mt-2"
                                />
                            </div>
                            <div class="sm:col-span-2">
                                <div class="flex justify-between">
                                    <FormLabel class="text-gray-300" for="phone"
                                        >Phone
                                    </FormLabel>
                                    <span
                                        id="phone-description"
                                        class="text-sm text-gray-400"
                                        >Optional</span
                                    >
                                </div>
                                <FormInput
                                    id="phone"
                                    v-model="form.phone"
                                    :error="form.errors.phone"
                                    aria-describedby="phone-description"
                                    autocomplete="tel"
                                    class="focus:ring-primary focus:ring-offset-dark focus-visible:ring-primary-500"
                                    name="phone"
                                />
                                <FormInputError
                                    v-if="form.errors.phone"
                                    :message="form.errors.phone"
                                    class="mt-2"
                                />
                            </div>
                            <div class="sm:col-span-2">
                                <div class="flex justify-between">
                                    <FormLabel
                                        class="text-gray-300"
                                        for="how-can-we-help"
                                        >How can I help you?
                                    </FormLabel>
                                    <span
                                        id="how-can-we-help-description"
                                        class="text-sm text-gray-400"
                                        >Max. 500 characters</span
                                    >
                                </div>
                                <div class="mt-1">
                                    <textarea
                                        id="how-can-we-help"
                                        v-model="form.description"
                                        aria-describedby="how-can-we-help-description"
                                        class="focus:ring-indigo-500 focus:border-indigo-500 block w-full rounded-md border border-gray-300 shadow-sm sm:text-sm"
                                        name="how-can-we-help"
                                        rows="4"
                                    />
                                    <FormInputError
                                        v-if="form.errors.description"
                                        :message="form.errors.description"
                                        class="mt-2"
                                    />
                                </div>
                            </div>
                            <div class="sm:col-span-2">
                                <div class="flex justify-between">
                                    <FormLabel
                                        class="text-gray-300"
                                        for="how-did-you-hear-about-us"
                                        >How did you hear about me?
                                    </FormLabel>
                                    <span
                                        id="how-did-you-hear-about-us-description"
                                        class="text-sm text-gray-400"
                                        >Optional</span
                                    >
                                </div>
                                <div class="mt-1">
                                    <FormInput
                                        id="how-did-you-hear-about-us"
                                        v-model="form.reference"
                                        :error="form.errors.reference"
                                        aria-describedby="how-did-you-hear-about-us-description"
                                        class="focus:ring-primary focus:ring-offset-dark focus-visible:ring-primary-500"
                                        name="how-did-you-hear-about-us"
                                    />
                                    <FormInputError
                                        v-if="form.errors.reference"
                                        :message="form.errors.reference"
                                        class="mt-2"
                                    />
                                </div>
                            </div>
                            <div class="text-right sm:col-span-2">
                                <button class="button primary" type="submit">
                                    <MailIcon class="mr-4 h-6 w-6" />
                                    <span>Submit</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </PublicLayout>
</template>
