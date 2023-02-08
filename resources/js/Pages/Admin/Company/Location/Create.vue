<script setup>
import AdminLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/Form/InputError.vue';
import InputLabel from '@/Components/Form/InputLabel.vue';
import TextInput from '@/Components/Form/TextInput.vue';
import PrimaryButton from '@/Components/Buttons/PrimaryButton.vue';
import SelectInput from "@/Components/Form/SelectInput.vue";
import {Head, useForm} from '@inertiajs/inertia-vue3';

defineProps({
    company: Object,
});

const form = useForm({
    name: '',
    address_line_1: '',
    address_line_2: '',
    zip_code: '',
    city: '',
    region: '',
    country: '',
});

const submit = (company) => {
    form.post(route('admin.location.store', company.id))
};
</script>

<template>
    <Head title="Create New Location"/>

    <AdminLayout>
        <template #header>
            <h2 class="admin_page_header">New Location</h2>
        </template>

        <div class="admin_form_container">
            <div class="content">
                <form @submit.prevent="submit(company)">
                    <div>
                        <InputLabel for="name" value="Location name"/>

                        <TextInput
                            id="name"
                            v-model="form.name"
                            autocomplete="name"
                            autofocus
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.name" class="mt-2"/>
                    </div>

                    <div class="input_group">
                        <InputLabel for="address_line_1" value="Address line 1"/>

                        <TextInput
                            id="address_line_1"
                            v-model="form.address_line_1"
                            autocomplete="address_line_1"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.address_line_1" class="mt-2"/>
                    </div>

                    <div class="input_group">
                        <InputLabel for="address_line_2" value="Address line 2"/>

                        <TextInput
                            id="address_line_2"
                            v-model="form.address_line_2"
                            autocomplete="address_line_2"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.address_line_2" class="mt-2"/>
                    </div>

                    <div class="input_group">
                        <InputLabel for="zip_code" value="Zip code"/>

                        <TextInput
                            id="zip_code"
                            v-model="form.zip_code"
                            autocomplete="zip_code"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.zip_code" class="mt-2"/>
                    </div>

                    <div class="input_group">
                        <InputLabel for="city" value="City"/>

                        <TextInput
                            id="city"
                            v-model="form.city"
                            autocomplete="city"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.city" class="mt-2"/>
                    </div>

                    <div class="input_group">
                        <InputLabel for="region" value="Region"/>

                        <TextInput
                            id="region"
                            v-model="form.region"
                            autocomplete="region"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.region" class="mt-2"/>
                    </div>

                    <div class="input_group">
                        <InputLabel for="country" value="Country"/>

                        <SelectInput
                            id="country"
                            v-model="form.country"
                            :options="{'Netherlands': 'nl', 'Belgium': 'be', 'Germany': 'de'}"
                            autocomplete="country"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.country" class="mt-2"/>
                    </div>

                    <div class="flex items-left input_group">
                        <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Create New Location
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
    </AdminLayout>
</template>
