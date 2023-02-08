<script setup>
import Pagination from '@/Components/Pagination.vue';
import {Head} from '@inertiajs/inertia-vue3';
import LinkButton from '@/Components/Buttons/LinkButton.vue';
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

defineProps({
    users: Object,
})
</script>

<template>
    <Head title="Users"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="admin_page_header">Users</h2>
        </template>

        <div class="admin_table_container">
            <table>
                <thead>
                <tr>
                    <th>Name</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="user in users.data">
                    <td>{{ user.full_name }}</td>
                    <td class="text-right">
                        <link-button :href="route('client.user.show', { id:  user.id})">
                            VIEW
                        </link-button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="pagination_container">
            <pagination :links="users.links"/>
        </div>
    </AuthenticatedLayout>
</template>
