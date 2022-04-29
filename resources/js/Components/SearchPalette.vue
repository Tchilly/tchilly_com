<script setup>
import axios from "axios";
import { Inertia } from "@inertiajs/inertia";
import { ref, watch } from "vue";
import hotkeys from "hotkeys-js";
import { SearchIcon, DocumentIcon, RefreshIcon } from "@heroicons/vue/outline";
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
import Pill from "@/Components/Pill";
import { debounce } from "lodash";

const searchResult = ref([]);
const query = ref("");
const loading = ref(false);

const fetchData = async () => {
    if (query.value !== "") {
        loading.value = true;

        await axios
            .get("/search", { params: { query: query.value } })
            .then((response) => {
                searchResult.value = response.data;
            })
            .catch((error) => console.log(error))
            .finally(() => {
                loading.value = false;
            });
    } else {
        searchResult.value = [];
        loading.value = false;
    }
};

watch(query, fetchData);

const onSelect = (selected) => {
    Inertia.get(route("posts.show", selected));
};

hotkeys("ctrl+b", function (event, handler) {
    event.stopPropagation();
    Inertia.get(route("posts.show"));
});
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
                    class="fixed inset-0 bg-dark-900 bg-opacity-90 transition-opacity"
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
                    class="mx-auto w-full max-w-lg transform overflow-hidden rounded-xl bg-dark-400 text-left align-middle shadow-xl transition-all lg:max-w-xl"
                >
                    <Combobox @update:modelValue="onSelect">
                        <SearchIcon
                            aria-hidden="true"
                            class="pointer-events-none absolute top-[1.4rem] left-4 h-5 w-5 text-gray-200"
                        />
                        <RefreshIcon
                            v-show="loading"
                            aria-hidden="true"
                            class="pointer-events-none absolute top-[1.4rem] right-4 h-5 w-5 animate-spin text-gray-400"
                        />
                        <ComboboxInput
                            :autocomplete="`do-not-autofill-${Date.now()}`"
                            class="h-16 w-full border-0 bg-transparent pl-12 pr-4 text-gray-200 placeholder-gray-200 focus:ring-0 sm:text-sm"
                            placeholder="Search..."
                            @change="query = $event.target.value"
                        />

                        <ComboboxOptions
                            v-if="searchResult.length > 0"
                            class="max-h-72 scroll-py-2 overflow-y-auto border-t border-dark-200 p-2 text-sm text-gray-200"
                            static
                        >
                            <h2
                                class="subtitle py-2.5 px-4 text-xs text-gray-500"
                            >
                                Blog posts
                            </h2>

                            <ComboboxOption
                                v-for="item in searchResult"
                                :key="item.id"
                                v-slot="{ active }"
                                :value="item"
                                as="template"
                            >
                                <li
                                    :class="[
                                        'flex cursor-pointer select-none items-center justify-between rounded-md px-4 py-3',
                                        active && 'bg-dark-100 text-white',
                                    ]"
                                >
                                    <DocumentIcon class="mr-2.5 h-5 w-5" />
                                    <span class="mr-auto inline-flex">{{
                                        item.title
                                    }}</span>
                                    <Pill
                                        :title="item.category.title"
                                        as="span"
                                        light
                                        small
                                    />
                                </li>
                            </ComboboxOption>
                        </ComboboxOptions>
                        <p
                            v-if="
                                query !== '' &&
                                searchResult.length <= 1 &&
                                !loading
                            "
                            class="border-t border-dark-200 p-4 text-sm text-gray-500"
                        >
                            Nothing found.
                        </p>
                        <div
                            class="flex flex-wrap items-center border-t border-dark-200 bg-dark-400 py-2.5 px-4 text-xs text-gray-200"
                        >
                            Type something to start searching, or press
                            <kbd
                                class="mx-2 flex h-5 items-center justify-center rounded bg-dark-200 px-2 text-sm font-medium font-semibold text-gray-400"
                                >^ B</kbd
                            ><span class="hidden sm:inline"
                                >to see all posts</span
                            >
                        </div>
                    </Combobox>
                </DialogPanel>
            </TransitionChild>
        </Dialog>
    </TransitionRoot>
</template>
