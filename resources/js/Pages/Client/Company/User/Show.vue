<script setup>
import {Head} from '@inertiajs/inertia-vue3';
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

defineProps({
    user: Object,
});
</script>

<template>
    <Head :title="user.full_name"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="admin_page_header">{{ user.full_name }}</h2>
        </template>

        <div class="admin_info_table_container">
            <table>
                <tbody>
                <tr>
                    <th>First name</th>
                    <td>{{ user.first_name }}</td>
                </tr>
                <tr>
                    <th>Last name</th>
                    <td>{{ user.last_name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ user.email }}</td>
                </tr>
                <tr>
                    <th>Country</th>
                    <td>{{ user.locale }}</td>
                </tr>
                </tbody>
            </table>
        </div>

    </AuthenticatedLayout>
</template>
