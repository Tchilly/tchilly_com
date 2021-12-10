<template>
    <app-layout title="Pages">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Pages
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="p-4 sm:p-6 lg:p-8 bg-white overflow-hidden shadow-xl rounded-lg">
                    <ul>
                        <li :key="page.id" v-for="page in pages" class="flex items-center justify-between">
                            <Link :href="route('page', page.slug)">{{ page.title }}</Link>
                            <Link :href="route('dashboard.pages.edit', page)">Edit</Link>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import { Link, usePage } from '@inertiajs/inertia-vue3';
    import AppLayout from '@/Layouts/AppLayout.vue'

    export default defineComponent({
        components: {
            AppLayout,
            Link,
        },
        props: {
            pages: Object,
        }
    })
</script>
