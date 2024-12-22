<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
defineProps({
  open: {
    type: Number,
    default: 0,
  },
  closed: {
    type: Number,
    default: 0,
  },
  low: {
    type: Number,
    default: 0,
  },
  medium: {
    type: Number,
    default: 0,
  },
  high: {
    type: Number,
    default: 0,
  },
  critical: {
    type: Number,
    default: 0,
  },
});

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200"
            >
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800"
                >
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        Hello, {{ $page.props.auth.user.name }}
                    </div>
                </div>
                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800 mt-5"
                >
                    <!-- Dashboard Content -->
                    <!-- Card to info total status ticket -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div class="bg-white p-4 shadow sm:rounded-lg sm:p-8 dark:bg-gray-800">
                            <h2 class="text-2xl font-semibold leading-tight text-gray-800 dark:text-gray-200">Total Ticket</h2>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ open + closed }}
                            </p>
                        </div>
                        <div class="bg-white p-4 shadow sm:rounded-lg sm:p-8 dark:bg-gray-800">
                            <h2 class="text-2xl font-semibold leading-tight text-gray-800 dark:text-gray-200">Open Ticket</h2>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ open }}
                            </p>
                        </div>
                        <div class="bg-white p-4 shadow sm:rounded-lg sm:p-8 dark:bg-gray-800">
                            <h2 class="text-2xl font-semibold leading-tight text-gray-800 dark:text-gray-200">Closed Ticket</h2>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ closed }}
                            </p>
                        </div>
                    </div>
                </div>

                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800 mt-5"
                >
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h2 class="text-2xl font-semibold leading-tight text-gray-800 dark:text-gray-200">Ticket Status</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-5">
                            <div class="bg-white p-4 shadow sm:rounded-lg sm:p-8 dark:bg-gray-800">
                                <h2 class="text-2xl font-semibold leading-tight text-gray-800 dark:text-gray-200">Low</h2>
                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    {{ low }}
                                </p>
                            </div>
                            <div class="bg-white p-4 shadow sm:rounded-lg sm:p-8 dark:bg-gray-800">
                                <h2 class="text-2xl font-semibold leading-tight text-gray-800 dark:text-gray-200">Medium</h2>
                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    {{ medium }}
                                </p>
                            </div>
                            <div class="bg-white p-4 shadow sm:rounded-lg sm:p-8 dark:bg-gray-800">
                                <h2 class="text-2xl font-semibold leading-tight text-gray-800 dark:text-gray-200">High</h2>
                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    {{ high }}
                                </p>
                            </div>
                            <div class="bg-white p-4 shadow sm:rounded-lg sm:p-8 dark:bg-gray-800">
                                <h2 class="text-2xl font-semibold leading-tight text-gray-800 dark:text-gray-200">Critical</h2>
                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    {{ critical }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
