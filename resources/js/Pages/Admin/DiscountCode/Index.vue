<script setup>
import AdminLayout from '@/Layouts/AuthenticatedLayout.vue';
import Pagination from '@/Components/Pagination.vue';
import {Head} from '@inertiajs/inertia-vue3';
import moment from "moment";
import LinkButton from '@/Components/Buttons/LinkButton.vue';

defineProps({
    discountCodes: Object,
});
</script>

<template>
    <Head title="Discount Codes"/>

    <AdminLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Discount Codes</h2>
        </template>

        <link-button :href="route('admin.discount_code.create')" class="mb-4">
            Create discount code
        </link-button>

        <div class="admin_table_container">
            <table>
                <thead>
                <tr>
                    <th>Created at</th>
                    <th>Code</th>
                    <th>Percentage</th>
                    <th>Amount</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="discountCode in discountCodes.data">
                    <td>{{ moment(discountCode.created_at).format("DD-MM-YYYY") }}</td>
                    <td>{{ discountCode.discount_code }}</td>
                    <td>{{ discountCode.discount_amount }}</td>
                    <td>{{ discountCode.discount_percentage }}</td>
                    <td class="text-right">
                        <link-button :href="route('admin.discount_code.show', { id:  discountCode.id})">
                            VIEW
                        </link-button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="pagination_container">
            <pagination :links="discountCodes.links"/>
        </div>
    </AdminLayout>
</template>
