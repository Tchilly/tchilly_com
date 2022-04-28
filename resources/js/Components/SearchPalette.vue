<script setup>
import axios from "axios";
import { Inertia } from "@inertiajs/inertia";
import { ref, watch } from "vue";
import { SearchIcon } from "@heroicons/vue/outline";
import {
    Combobox,
    ComboboxInput,
    ComboboxOptions,
    ComboboxOption,
    Dialog,
    DialogPanel,
    DialogOverlay,
    TransitionChild,
    TransitionRoot,
} from "@headlessui/vue";

const searchResult = ref([]);
const query = ref("");

watch(query, fetchData);

async function fetchData() {
    if (query.value !== "") {
        await axios
            .get("/search", { params: { query: query.value } })
            .then((response) => (searchResult.value = response.data))
            .catch((error) => console.log(error));
    } else {
        searchResult.value = [];
    }
}

const onSelect = (selected) => {
    Inertia.get(route("posts.show", selected));
};
</script>

<template>
    <TransitionRoot as="template" @after-leave="query = ''">
        <Dialog
            class="fixed inset-0 z-10 overflow-y-auto p-4 sm:p-6 md:p-28 lg:py-40"
        >
            <TransitionChild
                as="template"
                enter="ease-out duration-300"
                enter-from="opacity-0"
                enter-to="opacity-100"
                leave="ease-in duration-200"
                leave-from="opacity-100"
                leave-to="opacity-0"
            >
                <DialogOverlay
                    aria-hidden="true"
                    class="fixed inset-0 bg-dark-900 bg-opacity-75 transition-opacity"
                />
            </TransitionChild>

            <TransitionChild
                as="template"
                enter="ease-out duration-300"
                enter-from="opacity-0 -translate-y-6"
                enter-to="opacity-100 translate-y-0"
                leave="ease-in duration-200"
                leave-from="opacity-100 translate-y-0"
                leave-to="opacity-0 translate-y-6"
            >
                <DialogPanel
                    class="mx-auto w-full max-w-lg transform overflow-hidden rounded-2xl bg-white text-left align-middle shadow-xl transition-all lg:max-w-xl"
                >
                    <Combobox @update:modelValue="onSelect">
                        <SearchIcon
                            aria-hidden="true"
                            class="pointer-events-none absolute top-3.5 left-4 h-5 w-5 text-gray-400"
                        />
                        <ComboboxInput
                            class="h-12 w-full border-0 bg-transparent pl-11 pr-4 text-gray-800 placeholder-gray-400 focus:ring-0 sm:text-sm"
                            placeholder="Search..."
                            @change="query = $event.target.value"
                        />

                        <ComboboxOptions
                            v-if="searchResult.length > 0"
                            class="max-h-72 scroll-py-2 overflow-y-auto py-2 text-sm text-gray-800"
                            static
                        >
                            <ComboboxOption
                                v-for="item in searchResult"
                                :key="item.id"
                                v-slot="{ active }"
                                :value="item"
                                as="template"
                            >
                                <li
                                    :class="[
                                        'cursor-pointer select-none px-4 py-2',
                                        active && 'bg-primary-600 text-white',
                                    ]"
                                >
                                    {{ item.title }}
                                </li>
                            </ComboboxOption>
                        </ComboboxOptions>

                        <p
                            v-if="query !== '' && searchResult.length === 0"
                            class="p-4 text-sm text-gray-500"
                        >
                            No people found.
                        </p>
                    </Combobox>
                </DialogPanel>
            </TransitionChild>
        </Dialog>
    </TransitionRoot>
</template>
