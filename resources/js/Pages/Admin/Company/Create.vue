<script setup>
import AdminLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/Form/InputError.vue';
import InputLabel from '@/Components/Form/InputLabel.vue';
import TextInput from '@/Components/Form/TextInput.vue';
import PrimaryButton from '@/Components/Buttons/PrimaryButton.vue';
import NumberInput from "@/Components/Form/NumberInput.vue";
import SelectInput from "@/Components/Form/SelectInput.vue";
import {Head, useForm} from '@inertiajs/inertia-vue3';

const form = useForm({
    type: '',
    name: '',
    email: '',
    phone_country_code: '',
    phone_number: '',
    website: '',
    legal_owner: '',
    vat_number: '',
    coc_number: '',
    iban_number: '',
    bic_number: '',
    discount_percentage: '',
    discount_amount: '',
});

const submit = () => {
    form.post(route('admin.company.store'))
};
</script>

<template>
    <Head title="Create New Company"/>

    <AdminLayout>
        <template #header>
            <h2 class="admin_page_header">New Company</h2>
        </template>

        <div class="admin_form_container">
            <div class="content">
                <form @submit.prevent="submit">
                    <div>
                        <InputLabel for="name" value="Company name"/>

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
                        <InputLabel for="type" value="Company type"/>

                        <SelectInput
                            id="type"
                            v-model="form.type"
                            :options="{'supplier': 'supplier', 'client': 'client'}"
                            autocomplete="type"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.type" class="mt-2"/>
                    </div>

                    <div class="input_group">
                        <InputLabel for="email" value="Email"/>

                        <TextInput
                            id="email"
                            v-model="form.email"
                            autocomplete="email"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.email" class="mt-2"/>
                    </div>

                    <div class="input_group">
                        <InputLabel for="phone_number" value="Phone number"/>

                        <SelectInput
                            id="phone_country_code"
                            v-model="form.phone_country_code"
                            :options="{'+31': '+31', '+33': '+33', '+44': '+44'}"
                            autocomplete="phone_country_code"
                            class="align-left mr-2 w-1/4"
                        />

                        <TextInput
                            id="phone_number"
                            v-model="form.phone_number"
                            autocomplete="phone_number"
                            class="align-right w-2/4"
                        />

                        <InputError :message="form.errors.phone_country_code" class="mt-2"/>
                        <InputError :message="form.errors.phone_number" class="mt-2"/>
                    </div>

                    <div class="input_group">
                        <InputLabel for="website" value="Website"/>

                        <TextInput
                            id="website"
                            v-model="form.website"
                            autocomplete="website"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.website" class="mt-2"/>
                    </div>

                    <div class="input_group">
                        <InputLabel for="legal_owner" value="Legal owner"/>

                        <TextInput
                            id="legal_owner"
                            v-model="form.legal_owner"
                            autocomplete="website"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.legal_owner" class="mt-2"/>
                    </div>

                    <div class="input_group">
                        <InputLabel for="vat_number" value="VAT number"/>

                        <TextInput
                            id="vat_number"
                            v-model="form.vat_number"
                            autocomplete="vat_number"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.vat_number" class="mt-2"/>
                    </div>

                    <div class="input_group">
                        <InputLabel for="coc_number" value="COC number"/>

                        <TextInput
                            id="coc_number"
                            v-model="form.coc_number"
                            autocomplete="coc_number"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.coc_number" class="mt-2"/>
                    </div>

                    <div class="input_group">
                        <InputLabel for="iban_number" value="IBAN number"/>

                        <TextInput
                            id="iban_number"
                            v-model="form.iban_number"
                            autocomplete="iban_number"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.iban_number" class="mt-2"/>
                    </div>

                    <div class="input_group">
                        <InputLabel for="bic_number" value="BIC number"/>

                        <TextInput
                            id="bic_number"
                            v-model="form.bic_number"
                            autocomplete="bic_number"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.bic_number" class="mt-2"/>
                    </div>

                    <div class="input_group">
                        <InputLabel for="discount_percentage" value="Discount percentage"/>

                        <NumberInput
                            id="discount_percentage"
                            v-model="form.discount_percentage"
                            autocomplete="discount_percentage"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.discount_percentage" class="mt-2"/>
                    </div>

                    <div class="input_group">
                        <InputLabel for="discount_amount" value="Discount amount"/>

                        <NumberInput
                            id="discount_amount"
                            v-model="form.discount_amount"
                            autocomplete="discount_amount"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.discount_amount" class="mt-2"/>
                    </div>

                    <div class="flex items-left input_group">
                        <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Create New Company
                        </PrimaryButton>
                    </div>

                </form>
            </div>
        </div>
    </AdminLayout>
</template>
