<script setup>
import AdminLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/inertia-vue3';
import moment from "moment";
import Pagination from '@/Components/Pagination.vue';
import LinkButton from '@/Components/Buttons/LinkButton.vue';

defineProps({
    purchaseOrders: Object,
});
</script>

<template>
    <Head title="Purchase Orders"/>

    <AdminLayout>
        <template #header>
            <h2 class="admin_page_header">Purchase Orders</h2>
        </template>

        <div class="admin_table_container">
            <table>
                <thead>
                <tr>
                    <th>Created at</th>
                    <th>Status</th>
                    <th>Reference</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="purchaseOrder in purchaseOrders.data">
                    <td>{{ moment(purchaseOrder.created_at).format("DD-MM-YYYY") }}</td>
                    <td>{{ purchaseOrder.status }}</td>
                    <td>{{ purchaseOrder.reference }}</td>
                    <td class="text-right">
                        <link-button :href="route('client.purchase_order.show', { id:  purchaseOrder.id})">
                            VIEW
                        </link-button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="pagination_container">
            <pagination :links="purchaseOrders.links"/>
        </div>
    </AdminLayout>
</template>
