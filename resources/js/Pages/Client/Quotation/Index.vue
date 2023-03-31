<script setup>
import {Head} from '@inertiajs/inertia-vue3';
import moment from "moment";
import Pagination from '@/Components/Pagination.vue';
import LinkButton from '@/Components/Buttons/LinkButton.vue';
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

defineProps({
    quotations: Object,
});
</script>

<template>
    <Head title="Quotations"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="admin_page_header">Quotations</h2>
        </template>

        <link-button :href="route('quotation.create')" class="mb-4">
            Create quotation
        </link-button>

        <div class="admin_table_container">
            <table>
                <thead>
                <tr>
                    <th>Created at</th>
                    <th>Status</th>
                    <th>Accepted at</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="quotation in quotations.data">
                    <td>{{ moment(quotation.created_at).format("DD-MM-YYYY") }}</td>
                    <td>{{ quotation.status }}</td>
                    <td>{{ moment(quotation.accepted_at).format("DD-MM-YY") }}</td>
                    <td class="text-right">
                        <link-button :href="route('client.quotation.show', { id:  quotation.id})">
                            VIEW
                        </link-button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="pagination_container">
            <pagination :links="quotations.links"/>
        </div>
    </AuthenticatedLayout>
</template>
