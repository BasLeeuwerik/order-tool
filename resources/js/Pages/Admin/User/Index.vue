<script setup>
import AdminLayout from '@/Layouts/AuthenticatedLayout.vue';
import Pagination from '@/Components/Pagination.vue';
import {Head} from '@inertiajs/inertia-vue3';
import moment from "moment";
import LinkButton from '@/Components/Buttons/LinkButton.vue';

defineProps({
    users: Object,
});
</script>

<template>
    <Head title="Users"/>

    <AdminLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Users</h2>
        </template>

        <div class="admin_table_container">
            <table>
                <thead>
                <tr>
                    <th>Created at</th>
                    <th>Email</th>
                    <th>Name</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="user in users.data">
                    <td>{{ moment(user.created_at).format("DD-MM-YYYY") }}</td>
                    <td>{{ user.email }}</td>
                    <td>{{ user.full_name }}</td>
                    <td class="text-right">
                        <link-button :href="route('admin.user.show', { id:  user.id})">
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
    </AdminLayout>
</template>
