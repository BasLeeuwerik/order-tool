<script setup>
import AdminLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/inertia-vue3';
import moment from "moment";
import LinkButton from "@/Components/Buttons/LinkButton.vue";

defineProps({
    discountCode: Object,
});
</script>

<template>
    <Head :title="discountCode.discount_code"/>

    <AdminLayout>
        <template #header>
            <h2 class="admin_page_header">{{ discountCode.discount_code }}</h2>
        </template>

        <link-button :href="route('admin.discount_code.edit',{ id:  discountCode.id })" class="mb-4">
            Edit discount code
        </link-button>

        <div class="admin_info_table_container">
            <table>
                <tbody>
                <tr>
                    <th>Percentage</th>
                    <td>{{ discountCode.discount_percentage }}</td>
                </tr>
                <tr>
                    <th>Amount</th>
                    <td>{{ discountCode.discount_amount }}</td>
                </tr>
                <tr>
                    <th>Created at</th>
                    <td>{{ moment(discountCode.created_at).format("DD-MM-YYYY") }}</td>
                </tr>
                <tr>
                    <th>End date</th>
                    <td>{{ discountCode.end_date }}</td>
                </tr>
                <tr>
                    <th>Max usage</th>
                    <td>{{ discountCode.max_usage }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ discountCode.status }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </AdminLayout>
</template>
