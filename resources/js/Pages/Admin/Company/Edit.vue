<script>
import {Head, useForm} from '@inertiajs/inertia-vue3';
import AdminLayout from '@/Layouts/AuthenticatedLayout.vue';
import TextInput from "@/Components/Form/TextInput.vue";
import PrimaryButton from '@/Components/Buttons/PrimaryButton.vue';
import InputError from '@/Components/Form/InputError.vue';
import InputLabel from '@/Components/Form/InputLabel.vue';
import SelectInput from '@/Components/Form/SelectInput.vue';
import NumberInput from '@/Components/Form/NumberInput.vue';

export default {
    components: {
        Head, AdminLayout, TextInput, SelectInput, PrimaryButton, InputError, InputLabel, NumberInput
    },
    props: {
        company: Object,
    },
    setup(props) {
        const form = useForm({
            name: props.company.name,
            email: props.company.email,
            type: props.company.type,
            phone_country_code: props.company.phone_country_code,
            phone_number: props.company.phone_number,
            website: props.company.website,
            legal_owner: props.company.legal_owner,
            vat_number: props.company.vat_number,
            coc_number: props.company.coc_number,
            iban_number: props.company.iban_number,
            bic_number: props.company.bic_number,
            discount_percentage: props.company.discount_percentage,
            discount_amount: props.company.discount_amount,
        })

        function submit(company) {
            form.patch(route('admin.company.update', company.id))
        }

        return {form, submit}
    },
}
</script>

<template>
    <Head :title="company.name"/>

    <AdminLayout>
        <template #header>
            <h2 class="admin_page_header">Edit Company</h2>
        </template>

        <div class="admin_form_container">
            <div class="content">
                <form @submit.prevent="submit(company)">
                    <div>
                        <InputLabel for="name" value="Name"/>

                        <TextInput
                            id="name"
                            v-model="form.name"
                            autocomplete="name"
                            autofocus
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.name" class="mt-2"/>
                    </div>

                    <div class="mt-4">
                        <InputLabel for="email" value="Email"/>

                        <TextInput
                            id="name"
                            v-model="form.email"
                            autocomplete="email"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.email" class="mt-2"/>
                    </div>

                    <div class="mt-4">
                        <InputLabel for="type" value="Type"/>

                        <SelectInput
                            id="type"
                            v-model="form.type"
                            :modelValue="form.type"
                            :options="{'supplier': 'supplier', 'client': 'client'}"
                            autocomplete="type"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.type" class="mt-2"/>
                    </div>

                    <div class="mt-4">
                        <InputLabel for="phone_number" value="Phone number"/>

                        <SelectInput
                            id="phone_country_code"
                            v-model="form.phone_country_code"
                            :options="{'+31': 'NL', '+33': 'ES', '+44': 'UK'}"
                            autocomplete="phone_country_code"
                            class="align-left mr-3"
                        />

                        <TextInput
                            id="phone_number"
                            v-model="form.phone_number"
                            autocomplete="phone_number"
                            class="align-right"
                        />

                        <InputError :message="form.errors.phone_country_code" class="mt-2"/>
                        <InputError :message="form.errors.phone_number" class="mt-2"/>
                    </div>

                    <div class="mt-4">
                        <InputLabel for="website" value="Website"/>

                        <TextInput
                            id="name"
                            v-model="form.website"
                            autocomplete="website"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.website" class="mt-2"/>
                    </div>

                    <div class="mt-4">
                        <InputLabel for="legal_owner" value="Legal owner"/>

                        <TextInput
                            id="name"
                            v-model="form.legal_owner"
                            autocomplete="legal_owner"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.legal_owner" class="mt-2"/>
                    </div>

                    <div class="mt-4">
                        <InputLabel for="vat_number" value="VAT number"/>

                        <TextInput
                            id="name"
                            v-model="form.vat_number"
                            autocomplete="vat_number"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.vat_number" class="mt-2"/>
                    </div>


                    <div class="mt-4">
                        <InputLabel for="coc_number" value="COC number"/>

                        <TextInput
                            id="name"
                            v-model="form.coc_number"
                            autocomplete="coc_number"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.coc_number" class="mt-2"/>
                    </div>


                    <div class="mt-4">
                        <InputLabel for="iban_number" value="IBAN number"/>

                        <TextInput
                            id="name"
                            v-model="form.iban_number"
                            autocomplete="iban_number"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.iban_number" class="mt-2"/>
                    </div>

                    <div class="mt-4">
                        <InputLabel for="discount_percentage" value="Discount percentage"/>

                        <NumberInput
                            id="discount_percentage"
                            v-model="form.discount_percentage"
                            autocomplete="discount_percentage"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.discount_percentage" class="mt-2"/>
                    </div>

                    <div class="mt-4">
                        <InputLabel for="discount_amount" value="Discount amount"/>

                        <NumberInput
                            id="discount_amount"
                            v-model="form.discount_amount"
                            autocomplete="discount_amount"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.discount_amount" class="mt-2"/>
                    </div>

                    <div class="flex items-left mt-4">
                        <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Save
                        </PrimaryButton>
                    </div>

                </form>
            </div>
        </div>
    </AdminLayout>
</template>


