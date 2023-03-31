<script setup>
import AdminLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/inertia-vue3';
import LinkButton from "@/Components/Buttons/LinkButton.vue";

defineProps({
    quotation: Object,
});
</script>

<template>
    <Head title="Quotation"/>

    <AdminLayout>
        <template #header>
            <h2 class="admin_page_header">Quotation</h2>
        </template>

        <link-button :href="route('admin.quotation.edit', quotation.id)" class="mb-4">
            Edit Quotation
        </link-button>

        <div class="admin_info_table_container">
            <table class="table-auto text-left">
                <tbody>
                <tr>
                    <th>For company</th>
                    <td>{{ quotation.company.name }}</td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="admin_table_container mt-4">
            <table>
                <thead>
                <tr>
                    <th>First Option</th>
                    <th>Second Option</th>
                    <th>Third Option</th>
                    <th>Quantity</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="line in quotation.lines">
                    <td>{{ line.first_option }}</td>
                    <td>{{ line.second_option }}</td>
                    <td>{{ line.third_option }}</td>
                    <td>{{ line.quantity }}</td>
                </tr>
                </tbody>
            </table>
        </div>

    </AdminLayout>
</template>
