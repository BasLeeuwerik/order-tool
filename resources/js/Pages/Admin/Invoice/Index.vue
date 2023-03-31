<script setup>
import AdminLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/inertia-vue3';
import moment from "moment";
import Pagination from '@/Components/Pagination.vue';
import LinkButton from '@/Components/Buttons/LinkButton.vue';

defineProps({
    invoices: Object,
});
</script>

<template>
    <Head title="Invoices"/>

    <AdminLayout>
        <template #header>
            <h2 class="admin_page_header">Invoices</h2>
        </template>

        <link-button :href="route('admin.invoice.create')" class="mb-4">
            Create Invoice
        </link-button>

        <div class="admin_table_container">
            <table>
                <thead>
                <tr>
                    <th>Created at</th>
                    <th>Status</th>
                    <th>Number</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="invoice in invoices.data">
                    <td>{{ moment(invoice.created_at).format("DD-MM-YYYY") }}</td>
                    <td>{{ invoice.status }}</td>
                    <td>{{ invoice.number }}</td>
                    <td class="text-right">
                        <link-button :href="route('admin.invoice.show', { id:  invoice.id})">
                            VIEW
                        </link-button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="pagination_container">
            <pagination :links="invoices.links"/>
        </div>
    </AdminLayout>
</template>
