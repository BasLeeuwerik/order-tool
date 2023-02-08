<script setup>
import AdminLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/inertia-vue3';
import moment from "moment";

defineProps({
    user: Object,
});
</script>

<template>
    <Head :title="user.full_name"/>

    <AdminLayout>
        <template #header>
            <h2 class="admin_page_header">{{ user.full_name }}</h2>
        </template>

        <div class="admin_info_table_container">
            <table>
                <tbody>
                <tr>
                    <th>Name</th>
                    <td>{{ user.full_name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ user.email }}</td>
                </tr>
                <tr>
                    <th>Created at</th>
                    <td>{{ moment(user.created_at).format("DD-MM-YYYY") }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </AdminLayout>
</template>
