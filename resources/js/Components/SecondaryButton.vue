<template>
    <Link
        :href="href"
        class="
            inline-flex
            bg-gradient-to-r
            from-secondary-700
            to-secondary-600
            bg-origin-border
            px-4
            py-2
            border border-transparent
            text-base
            font-medium
            rounded-md
            shadow-sm
            text-white
            hover:from-secondary-600 hover:to-from-secondary-600
            focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-secondary-300 focus:ring-offset-gray-900
        "
    >
        <slot></slot>
    </Link>
</template>

<script>

import { Link } from '@inertiajs/inertia-vue3'
import {defineComponent} from "vue";

export default defineComponent({
    props: {
        href: String
    },
    components: {
        Link,
    },
    setup() {
        return {
            //
        };
    },
});

</script>
