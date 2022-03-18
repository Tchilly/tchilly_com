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
                    <form @submit.prevent="submit">
                        <editor v-model="form.body" />
                        <jet-input-error :message="form.errors.body" class="mt-2" />

                        <jet-input v-model="form.title" />
                        <jet-input-error :message="form.errors.title" class="mt-2" />

                        <button type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>

    </app-layout>
</template>

<script>
import {defineComponent} from "vue";
import AppLayout from "@/Layouts/AppLayout";
import JetInputError from '@/Jetstream/InputError.vue'
import JetInput from "@/Jetstream/Input";
import Editor from "@/Components/Editor";
import {useForm} from "@inertiajs/inertia-vue3";

export default defineComponent({
    components: {
        AppLayout,
        JetInput,
        JetInputError,
        Editor
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
