<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/inertia-vue3';
import moment from "moment";
import Pagination from '@/Components/Pagination.vue';

defineProps({
    invoices: Object,
});
</script>

<template>
    <Head title="Invoices"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="admin_page_header">Invoices</h2>
        </template>

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
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="pagination_container">
            <pagination :links="invoices.links"/>
        </div>
    </AuthenticatedLayout>
</template>
