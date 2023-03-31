<script setup>
import AdminLayout from '@/Layouts/AuthenticatedLayout.vue';
import Pagination from '@/Components/Pagination.vue';
import {Head} from '@inertiajs/inertia-vue3';
import moment from "moment";
import LinkButton from '@/Components/Buttons/LinkButton.vue';

defineProps({
    quotations: Object,
});
</script>

<template>
    <Head title="Quotations"/>

    <AdminLayout>
        <template #header>
            <h2 class="admin_page_header">Quotations</h2>
        </template>

        <link-button :href="route('admin.quotation.create')" class="mb-4">
            Create Quotation
        </link-button>

        <div class="admin_table_container">
            <table>
                <thead>
                <tr>
                    <th>Created at</th>
                    <th>Status</th>
                    <th>Company</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="quotation in quotations.data">
                    <td>{{ moment(quotation.created_at).format("DD-MM-YYYY") }}</td>
                    <td>{{ quotation.status }}</td>
                    <td>{{ quotation.company.name }}</td>
                    <td class="text-right">
                        <link-button :href="route('admin.quotation.show', { id:  quotation.id})">
                            VIEW
                        </link-button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <div>
            <pagination :links="quotations.links"/>
        </div>
    </AdminLayout>
</template>
