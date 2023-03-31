<script setup>
import AdminLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/Form/InputError.vue';
import InputLabel from '@/Components/Form/InputLabel.vue';
import PrimaryButton from '@/Components/Buttons/PrimaryButton.vue';
import SelectInput from "@/Components/Form/SelectInput.vue";
import {Head, useForm} from '@inertiajs/inertia-vue3';
import NumberInput from "@/Components/Form/NumberInput.vue";
import TextInput from "@/Components/Form/TextInput.vue";

defineProps({
    invoices: Object,
    companies: Object,
});

const form = useForm({
    receiver_id: '',
    number: '',
    status: '',
    vat_percentage: '',
    sender_vat_number: '',
    sender_coc_number: '',
    sender_name: '',
    sender_address: '',
    sender_zip_code: '',
    sender_city: '',
    sender_country: '',
    receiver_vat_number: '',
    receiver_coc_number: '',
    receiver_name: '',
    receiver_address: '',
    receiver_zip_code: '',
    receiver_city: '',
    receiver_country: '',
});

const submit = () => {
    form.post(route('admin.invoice.store'))
};
</script>
<template>
    <Head title="Create New Invoice"/>

    <AdminLayout>
        <template #header>
            <h2 class="admin_page_header">New Invoice</h2>
        </template>

        <div class="admin_form_container">
            <div class="content">
                <form @submit.prevent="submit">
                    <div>
                        <InputLabel for="receiver_id" value="Company"/>

                        <SelectInput
                            id="receiver_id"
                            v-model="form.receiver_id"
                            :options="companies"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.receiver_id" class="mt-2"/>
                    </div>

                    <div class="input_group">
                        <InputLabel for="status" value="Status"/>

                        <SelectInput
                            id="status"
                            v-model="form.status"
                            :options="{'open': 'open', 'paid': 'paid'}"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.status" class="mt-2"/>
                    </div>

                    <div class="input_group">
                        <InputLabel for="number" value="number"/>

                        <NumberInput
                            id="number"
                            v-model="form.number"
                            autocomplete="number"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.number" class="mt-2"/>
                    </div>

                    <div class="input_group">
                        <InputLabel for="vat_percentage" value="VAT percentage"/>

                        <NumberInput
                            id="vat_percentage"
                            v-model="form.vat_percentage"
                            autocomplete="vat_percentage"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.vat_percentage" class="mt-2"/>
                    </div>

                    <div class="input_group">
                        <InputLabel for="sender_name" value="Sender name"/>

                        <TextInput
                            id="sender_name"
                            v-model="form.sender_name"
                            autocomplete="sender_name"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.sender_name" class="mt-2"/>
                    </div>

                    <div class="input_group">
                        <InputLabel for="sender_vat_number" value="Sender VAT number"/>

                        <TextInput
                            id="sender_vat_number"
                            v-model="form.sender_vat_number"
                            autocomplete="sender_vat_number"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.sender_vat_number" class="mt-2"/>
                    </div>

                    <div class="input_group">
                        <InputLabel for="sender_coc_number" value="Sender COC number"/>

                        <TextInput
                            id="sender_coc_number"
                            v-model="form.sender_coc_number"
                            autocomplete="sender_coc_number"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.sender_coc_number" class="mt-2"/>
                    </div>

                    <div class="input_group">
                        <InputLabel for="sender_zip_code" value="Sender zip code"/>

                        <TextInput
                            id="sender_zip_code"
                            v-model="form.sender_zip_code"
                            autocomplete="sender_zip_code"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.sender_zip_code" class="mt-2"/>
                    </div>

                    <div class="input_group">
                        <InputLabel for="sender_address" value="Sender address"/>

                        <TextInput
                            id="sender_address"
                            v-model="form.sender_address"
                            autocomplete="sender_address"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.sender_address" class="mt-2"/>
                    </div>

                    <div class="input_group">
                        <InputLabel for="sender_city" value="Sender city"/>

                        <TextInput
                            id="sender_city"
                            v-model="form.sender_city"
                            autocomplete="sender_city"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.sender_city" class="mt-2"/>
                    </div>

                    <div class="input_group">
                        <InputLabel for="sender_country" value="Sender country"/>

                        <TextInput
                            id="sender_country"
                            v-model="form.sender_country"
                            autocomplete="sender_country"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.sender_country" class="mt-2"/>
                    </div>

                    <div class="input_group">
                        <InputLabel for="receiver_vat_number" value="Receiver VAT number"/>

                        <TextInput
                            id="receiver_vat_number"
                            v-model="form.receiver_vat_number"
                            autocomplete="receiver_vat_number"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.receiver_vat_number" class="mt-2"/>
                    </div>

                    <div class="input_group">
                        <InputLabel for="receiver_coc_number" value="Receiver COC number"/>

                        <TextInput
                            id="receiver_coc_number"
                            v-model="form.receiver_coc_number"
                            autocomplete="receiver_coc_number"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.receiver_coc_number" class="mt-2"/>
                    </div>

                    <div class="input_group">
                        <InputLabel for="receiver_name" value="Receiver name"/>

                        <TextInput
                            id="receiver_name"
                            v-model="form.receiver_name"
                            autocomplete="receiver_name"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.receiver_name" class="mt-2"/>
                    </div>

                    <div class="input_group">
                        <InputLabel for="receiver_address" value="Receiver address"/>

                        <TextInput
                            id="receiver_address"
                            v-model="form.receiver_address"
                            autocomplete="receiver_address"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.receiver_address" class="mt-2"/>
                    </div>

                    <div class="input_group">
                        <InputLabel for="receiver_zip_code" value="Receiver zip code"/>

                        <TextInput
                            id="receiver_zip_code"
                            v-model="form.receiver_zip_code"
                            autocomplete="receiver_zip_code"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.receiver_zip_code" class="mt-2"/>
                    </div>

                    <div class="input_group">
                        <InputLabel for="receiver_city" value="Receiver city"/>

                        <TextInput
                            id="receiver_city"
                            v-model="form.receiver_city"
                            autocomplete="receiver_city"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.receiver_city" class="mt-2"/>
                    </div>

                    <div class="input_group">
                        <InputLabel for="receiver_country" value="Receiver country"/>

                        <TextInput
                            id="receiver_country"
                            v-model="form.receiver_country"
                            autocomplete="receiver_country"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.receiver_country" class="mt-2"/>
                    </div>

                    <div class="flex items-left input_group">
                        <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Create New Invoice
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
    </AdminLayout>
</template>
