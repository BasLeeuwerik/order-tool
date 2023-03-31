<script setup>
import AdminLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/inertia-vue3';
import Pagination from '@/Components/Pagination.vue';
import LinkButton from '@/Components/Buttons/LinkButton.vue';

defineProps({
    products: Object,
});
</script>

<template>
    <Head title="Products"/>

    <AdminLayout>
        <template #header>
            <h2 class="admin_page_header">Products</h2>
        </template>

        <div class="admin_table_container">
            <table>
                <thead>
                <tr>
                    <th>Slug</th>
                    <th>Base price</th>
                    <th>Multiplier</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="product in products.data">
                    <td>{{ product.slug }}</td>
                    <td>{{ product.base_price }}</td>
                    <td>{{ product.multiplier }}</td>
                    <td class="text-right">
                        <link-button :href="route('admin.product.show', { id:  product.id})">
                            VIEW
                        </link-button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="pagination_container">
            <pagination :links="products.links"/>
        </div>
    </AdminLayout>
</template>
