<template>

    <form class="mt-6 flex flex-col sm:flex-row lg:mt-0 lg:justify-end">
        <div>
            <label class="sr-only" for="email-address">Email address</label>
            <input
                id="email-address"
                autocomplete="email"
                class="focus:ring-indigo-500 focus:border-indigo-500 w-full appearance-none rounded-md border border-gray-300 bg-white px-4 py-2 text-base text-gray-900 placeholder-gray-500 focus:outline-none lg:max-w-xs"
                name="email-address"
                placeholder="Enter your email"
                required=""
                type="email"
            />
        </div>
        <div
            class="mt-2 flex w-full flex-shrink-0 rounded-md shadow-sm sm:mt-0 sm:ml-3 sm:inline-flex sm:w-auto"
        >
            <button
                class="flex w-full items-center justify-center rounded-md border border-transparent bg-secondary-600 px-4 py-2 text-base font-medium text-white hover:bg-secondary-700 focus:outline-none focus:ring-2 focus:ring-secondary-500 focus:ring-offset-2 sm:inline-flex sm:w-auto"
                type="button"
            >
                Notify me
            </button>
        </div>
    </form>

</template>
