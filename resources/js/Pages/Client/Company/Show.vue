<script setup>
import {Head} from '@inertiajs/inertia-vue3';
import LinkButton from '@/Components/Buttons/LinkButton.vue';
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

defineProps({
    company: Object,
});
</script>

<template>
    <Head :title="company.name"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="admin_page_header">{{ company.name }}</h2>
        </template>

        <link-button :href="route('client.company.edit')" class="mb-4">
            Edit
        </link-button>

        <div class="admin_info_table_container">
            <table>
                <tbody>
                <tr>
                    <th>Name</th>
                    <td>{{ company.name }}</td>
                </tr>
                <tr>
                    <th>Phone number</th>
                    <td>{{ company.phone_country_code + ' ' + company.phone_number }}</td>
                </tr>
                <tr>
                    <th>Website</th>
                    <td>{{ company.email }}</td>
                </tr>
                <tr>
                    <th>Legal owner</th>
                    <td>{{ company.legal_owner }}</td>
                </tr>
                <tr>
                    <th>COC number</th>
                    <td>{{ company.coc_number }}</td>
                </tr>
                <tr>
                    <th>VAT number</th>
                    <td>{{ company.vat_number }}</td>
                </tr>
                <tr>
                    <th>IBAN number</th>
                    <td>{{ company.iban_number }}</td>
                </tr>
                <tr>
                    <th>BIC number</th>
                    <td>{{ company.bic_number }}</td>
                </tr>
                </tbody>
            </table>
        </div>

        <link-button :href="route('client.location.create')" class="my-4">
            Create location
        </link-button>

        <div class="admin_table_container">
            <table>
                <thead>
                <tr>
                    <th>Address</th>
                    <th>Zipcode</th>
                    <th>City</th>
                    <th>Country</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="location in company.locations">
                    <td>{{ location.address_line_1 }}</td>
                    <td>{{ location.zip_code }}</td>
                    <td>{{ location.city }}</td>
                    <td>{{ location.country }}</td>
                    <td class="text-right">
                        <link-button :href="route('client.location.edit',{ id:  location.id })">
                            EDIT
                        </link-button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

    </AuthenticatedLayout>
</template>
