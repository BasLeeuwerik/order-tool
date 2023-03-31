<script setup>
import AdminLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/inertia-vue3';
import LinkButton from "@/Components/Buttons/LinkButton.vue";

defineProps({
    invoice: Object,
});
</script>

<template>
    <Head :title="'Invoice #' + invoice.number"/>

    <AdminLayout>
        <template #header>
            <h2 class="admin_page_header">Invoice #{{ invoice.number }}</h2>
        </template>

        <link-button :href="route('admin.invoice.edit',{ id:  invoice.id })" class="mb-4">
            Edit invoice
        </link-button>

        <div class="admin_info_table_container">
            <table>
                <tbody>
                <tr>
                    <th>Receiver</th>
                    <td>{{ (invoice.receiver_name) }}</td>
                </tr>
                <tr>
                    <th>Delivery address</th>
                    <td>{{ invoice.receiver_address }}</td>
                </tr>
                <tr>
                    <th>Zipcode</th>
                    <td>{{ invoice.receiver_zip_code }}</td>
                </tr>
                <tr>
                    <th>City</th>
                    <td>{{ invoice.receiver_city }}</td>
                </tr>
                <tr>
                    <th>Country</th>
                    <td>{{ invoice.receiver_country }}</td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="admin_table_container mt-4">
            <table>
                <thead>
                <tr>
                    <th>Description</th>
                    <th>Unit price</th>
                    <th>Quantity</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="line in invoice.lines">
                    <td>{{ line.description }}</td>
                    <td>{{ line.unit_price }}</td>
                    <td>{{ line.quantity }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </AdminLayout>
</template>
