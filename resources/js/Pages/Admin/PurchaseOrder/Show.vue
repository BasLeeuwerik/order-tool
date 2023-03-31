<script setup>
import AdminLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/inertia-vue3';
import moment from "moment";
import LinkButton from "@/Components/Buttons/LinkButton.vue";

defineProps({
    purchaseOrder: Object,
});
</script>

<template>
    <Head :title="'Purchase Order #' + purchaseOrder.reference"/>

    <AdminLayout>
        <template #header>
            <h2 class="admin_page_header">Purchase Order #{{ purchaseOrder.reference }}</h2>
        </template>

        <link-button :href="route('admin.purchase_order.edit',{ id:  purchaseOrder.id })" class="mb-4">
            Edit order
        </link-button>

        <div class="admin_info_table_container">
            <table>
                <tbody>
                <tr>
                    <th>Order reference</th>
                    <td>{{ purchaseOrder.reference }}</td>
                </tr>
                <tr>
                    <th>Target delivery at</th>
                    <td>{{ moment(purchaseOrder.target_delivery_date_at).format("DD-MM-YYYY") }}</td>
                </tr>
                <tr>
                    <th>Delivery address</th>
                    <td>{{ purchaseOrder.shipping_address_line_1 + ' ' + purchaseOrder.shipping_address_line_2 }}</td>
                </tr>
                <tr>
                    <th>Zipcode</th>
                    <td>{{ purchaseOrder.shipping_zip_code }}</td>
                </tr>
                <tr>
                    <th>City</th>
                    <td>{{ purchaseOrder.shipping_city }}</td>
                </tr>
                </tbody>
            </table>
        </div>


        <div class="admin_table_container mt-4">
            <table>
                <thead>
                <tr>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Unit price</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="line in purchaseOrder.lines">
                    <td>{{ line.description }}</td>
                    <td>{{ line.quantity }}</td>
                    <td>{{ line.unit_price }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </AdminLayout>
</template>
