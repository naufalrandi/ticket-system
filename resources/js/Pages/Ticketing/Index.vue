<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import { Link, useForm } from "@inertiajs/vue3";
defineProps({
  ticket: {
    type: Array,
    default: () => [],
  },
});

const form = useForm({});

const deletePost = (id) => {
    form.delete(`ticket/${id}`);
};

const headers = ["ticket", "body"];
</script>

<template>
    <Head title="Ticketing" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200"
            >
                Ticketing
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800"
                >
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <Link :href="route('ticket.create')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-5">Add</Link>
                        <table
                            class="w-full text-sm text-left text-gray-500 dark:text-gray-400 mt-5"
                        >
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                            >
                                <tr>
                                    <th scope="col" class="px-6 py-3">Title</th>
                                    <th scope="col" class="px-6 py-3">Description</th>
                                    <th scope="col" class="px-6 py-3">Status</th>
                                    <th scope="col" class="px-6 py-3">Priority</th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                                    v-for="(tickets, index) in ticket" :key="index"
                                >
                                    <th
                                        scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                                    >
                                        {{ tickets.title }}
                                    </th>
                                    <td class="px-6 py-4">{{ tickets.description }}</td>
                                    <td class="px-6 py-4">
                                        <span v-if="tickets.status == 'open'" class="bg-green-500 text-white py-1 px-2 rounded">{{ tickets.status }}</span>
                                        <span v-else class="bg-red-500 text-white py-1 px-2 rounded">{{ tickets.status }}</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span v-if="tickets.priority == 'high'" class="bg-red-500 text-white py-1 px-2 rounded">{{ tickets.priority }}</span>
                                        <span v-else-if="tickets.priority == 'medium'" class="bg-yellow-500 text-white py-1 px-2 rounded">{{ tickets.priority }}</span>
                                        <span v-else-if="tickets.priority == 'critical'" class="bg-blue-500 text-white py-1 px-2 rounded">{{ tickets.priority }}</span>
                                        <span v-else class="bg-green-500 text-white py-1 px-2 rounded">{{ tickets.priority }}</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <Link :href="route('ticket.edit', tickets.id)" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</Link>
                                        <!-- Delete -->
                                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ms-2" @click="deletePost(tickets.id)">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
