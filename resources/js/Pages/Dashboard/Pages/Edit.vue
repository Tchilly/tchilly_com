<template>
    <app-layout title="Page edit">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit {{ page.title }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="p-4 sm:p-6 lg:p-8 bg-white overflow-hidden shadow-xl rounded-lg">
                    <form @submit.prevent="submit">
                    <jet-input v-model="form.title" />
                        <button type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import {defineComponent, reactive} from 'vue'
    import { Link, usePage } from '@inertiajs/inertia-vue3';
    import AppLayout from '@/Layouts/AppLayout';
    import JetInput from '@/Jetstream/Input';
    import {Inertia} from "@inertiajs/inertia";

    export default defineComponent({
        components: {
            AppLayout,
            JetInput
        },
        props: {
            page: Object,
        },
        setup (props) {
            const form = reactive({
                title: props.page.title,
                body: props.page.body,
            })

            function submit() {
                Inertia.put(route('dashboard.pages.update', props.page), form)
            }

            return { form, submit }
        },
    })
</script>
