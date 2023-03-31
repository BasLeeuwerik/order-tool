`
<script setup>
import {Head} from '@inertiajs/inertia-vue3';
import moment from "moment";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

defineProps({
    quotation: Object,
});
</script>

<template>
    <Head :title="'Quotation'"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="admin_page_header">Quotation</h2>
        </template>

        <div class="admin_info_table_container">
            <table>
                <tbody>
                <tr>
                    <th>Target delivery at</th>
                    <td>{{ moment(quotation.target_delivery_date_at).format("DD-MM-YYYY") }}</td>
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
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Speed</th>
                    <th>Extra</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="line in quotation.lines">
                    <td>{{ line.first_option }}</td>
                    <td>{{ line.second_option }}</td>
                    <td>{{ line.third_option }}</td>
                    <td>{{ line.description }}</td>
                    <td>{{ line.quantity }}</td>
                    <td>{{ line.has_speed }}</td>
                    <td>{{ line.has_extra }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </AuthenticatedLayout>
</template>
