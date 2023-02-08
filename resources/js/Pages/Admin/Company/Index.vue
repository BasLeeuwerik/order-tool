<script setup>
import AdminLayout from '@/Layouts/AuthenticatedLayout.vue';
import Pagination from '@/Components/Pagination.vue';
import {Head} from '@inertiajs/inertia-vue3';
import moment from "moment";
import LinkButton from '@/Components/Buttons/LinkButton.vue';

defineProps({
    companies: Object,
})
</script>

<template>
    <Head title="Companies"/>

    <AdminLayout>
        <template #header>
            <h2 class="admin_page_header">Companies</h2>
        </template>

        <link-button :href="route('admin.company.create')" class="mb-4">
            Create company
        </link-button>

        <div class="admin_table_container">
            <table>
                <thead>
                <tr>
                    <th>Created at</th>
                    <th>Name</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="company in companies.data">
                    <td>{{ moment(company.created_at).format("DD-MM-YYYY") }}</td>
                    <td>{{ company.name }}</td>
                    <td class="text-right">
                        <link-button :href="route('admin.company.show', { id:  company.id})">
                            VIEW
                        </link-button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="pagination_container">
            <pagination :links="companies.links"/>
        </div>
    </AdminLayout>
</template>
