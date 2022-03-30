<template>
    <Listbox ref="input">
        <!--        @change="$emit('update:selectedOption', $event.target.value)"-->
        <div class="relative mt-1">
            <ListboxButton
                class="focus-visible:ring-offset-orange-300 focus-visible:border-indigo-500 relative w-full cursor-default rounded-lg bg-white py-2 pl-3 pr-10 text-left shadow-md focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75 focus-visible:ring-offset-2 sm:text-sm"
            >
                <span class="block truncate">{{ selectedOption.name }}</span>
                <span
                    class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2"
                >
                    <SelectorIcon
                        aria-hidden="true"
                        class="h-5 w-5 text-gray-400"
                    />
                </span>
            </ListboxButton>

            <transition
                leave-active-class="transition duration-100 ease-in"
                leave-from-class="opacity-100"
                leave-to-class="opacity-0"
            >
                <ListboxOptions
                    class="absolute mt-1 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm"
                >
                    <ListboxOption
                        v-for="option in options"
                        :key="option"
                        v-slot="{ active, selected }"
                        :value="option"
                        as="template"
                    >
                        <li
                            :class="[
                                active
                                    ? 'text-amber-900 bg-amber-100'
                                    : 'text-gray-900',
                                'relative cursor-default select-none py-2 pl-10 pr-4',
                            ]"
                        >
                            <span
                                :class="[
                                    selected ? 'font-medium' : 'font-normal',
                                    'block truncate',
                                ]"
                                >{{ option.name }}</span
                            >
                            <span
                                v-if="selected"
                                class="text-amber-600 absolute inset-y-0 left-0 flex items-center pl-3"
                            >
                                <CheckIcon aria-hidden="true" class="h-5 w-5" />
                            </span>
                        </li>
                    </ListboxOption>
                </ListboxOptions>
            </transition>
        </div>
    </Listbox>
</template>

<script>
import { defineComponent, ref } from "vue";
import {
    Listbox,
    ListboxButton,
    ListboxLabel,
    ListboxOption,
    ListboxOptions,
} from "@headlessui/vue";
import { CheckIcon, SelectorIcon } from "@heroicons/vue/solid";

export default defineComponent({
    components: {
        Listbox,
        ListboxLabel,
        ListboxButton,
        ListboxOptions,
        ListboxOption,
        CheckIcon,
        SelectorIcon,
    },
    props: {
        //options: Object,
        //selected: Object,
    },
    //emits: ["update:selectedOption"],
    setup(props) {
        // const current = props.options.filter(function (el) {
        //     return el.name == props.selected;
        // });

        const options = [{ name: "Blog" }, { name: "Page" }];

        const selectedOption = ref(options[0]);

        console.log(selectedOption);
        return {
            selectedOption,
            options,
        };
    },
});
</script>
