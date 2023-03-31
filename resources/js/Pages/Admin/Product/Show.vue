<script setup>
import AdminLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/inertia-vue3';
import LinkButton from '@/Components/Buttons/LinkButton.vue';

defineProps({
    product: Object,
});
</script>

<template>
    <Head :title="'Product'"/>

    <AdminLayout>
        <template #header>
            <h2 class="admin_page_header">Product</h2>
        </template>

        <link-button :href="route('admin.product.edit',{ id:  product.id })" class="mb-4">
            Edit product
        </link-button>

        <div class="admin_info_table_container">
            <table>
                <tbody>
                <tr>
                    <th>Slug</th>
                    <td>{{ product.slug }}</td>
                </tr>
                <tr>
                    <th>Base price</th>
                    <td>{{ product.base_price }}</td>
                </tr>
                <tr>
                    <th>Multiplier</th>
                    <td>{{ product.multiplier }}</td>
                </tr>
                </tbody>
            </table>
        </div>

    </AdminLayout>
</template>
