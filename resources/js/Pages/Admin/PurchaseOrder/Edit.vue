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
        purchaseOrder: Object,
    },
    setup(props) {
        const form = useForm({
            reference: props.purchaseOrder.reference,
            status: props.purchaseOrder.status,
            paid_at: props.purchaseOrder.paid_at,
            shipped_at: props.purchaseOrder.shipped_at,
            target_delivery_date_at: props.purchaseOrder.target_delivery_date_at,
            shipping_email_sent_at: props.purchaseOrder.shipping_email_sent_at,
            vat_percentage: props.purchaseOrder.vat_percentage,
            discount_percentage: props.purchaseOrder.discount_percentage,
            discount_amount: props.purchaseOrder.discount_amount,
            shipping_address_line_1: props.purchaseOrder.shipping_address_line_1,
            shipping_address_line_2: props.purchaseOrder.shipping_address_line_2,
            shipping_zip_code: props.purchaseOrder.shipping_zip_code,
            shipping_city: props.purchaseOrder.shipping_city,
            shipping_region: props.purchaseOrder.shipping_region,
            shipping_country: props.purchaseOrder.shipping_country,
            billing_address_line_1: props.purchaseOrder.billing_address_line_1,
            billing_address_line_2: props.purchaseOrder.billing_address_line_2,
            billing_zip_code: props.purchaseOrder.billing_zip_code,
            billing_city: props.purchaseOrder.billing_city,
            billing_region: props.purchaseOrder.billing_region,
            billing_country: props.purchaseOrder.billing_country,
        })

        function submit(purchaseOrder) {
            form.patch(route('admin.purchase_order.update', purchaseOrder.id))
        }

        return {form, submit}
    },
}
</script>

<template>
    <Head :title="'Edit Order'"/>

    <AdminLayout>
        <template #header>
            <h2 class="admin_page_header">Edit Order</h2>
        </template>

        <div class="admin_form_container">
            <div class="content">
                <form @submit.prevent="submit(purchaseOrder)">
                    <div>
                        <InputLabel for="reference" value="Reference"/>

                        <TextInput
                            id="reference"
                            v-model="form.reference"
                            autocomplete="reference"
                            autofocus
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.reference" class="mt-2"/>
                    </div>

                    <div class="mt-4">
                        <InputLabel for="status" value="Status"/>

                        <SelectInput
                            id="status"
                            v-model="form.status"
                            :modelValue="form.status"
                            :options="{'open': 'open', 'completed': 'completed', 'paid': 'paid'}"
                            autocomplete="status"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.type" class="mt-2"/>
                    </div>

                    <div class="mt-4">
                        <InputLabel for="paid_at" value="Paid at"/>

                        <TextInput
                            id="paid_at"
                            v-model="form.paid_at"
                            autocomplete="paid_at"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.paid_at" class="mt-2"/>
                    </div>

                    <div class="mt-4">
                        <InputLabel for="shipped_at" value="Shipped at"/>

                        <TextInput
                            id="shipped_at"
                            v-model="form.shipped_at"
                            autocomplete="shipped_at"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.shipped_at" class="mt-2"/>
                    </div>

                    <div class="mt-4">
                        <InputLabel for="target_delivery_date_at" value="Target delivery date at"/>

                        <TextInput
                            id="target_delivery_date_at"
                            v-model="form.target_delivery_date_at"
                            autocomplete="target_delivery_date_at"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.target_delivery_date_at" class="mt-2"/>
                    </div>

                    <div class="mt-4">
                        <InputLabel for="shipping_email_sent_at" value="Shipping email sent at"/>

                        <TextInput
                            id="shipping_email_sent_at"
                            v-model="form.shipping_email_sent_at"
                            autocomplete="shipping_email_sent_at"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.shipping_email_sent_at" class="mt-2"/>
                    </div>

                    <div class="mt-4">
                        <InputLabel for="vat_percentage" value="VAT percentage"/>

                        <NumberInput
                            id="vat_percentage"
                            v-model="form.vat_percentage"
                            autocomplete="vat_percentage"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.vat_percentage" class="mt-2"/>
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
                            step="0.01"
                        />

                        <InputError :message="form.errors.discount_amount" class="mt-2"/>
                    </div>

                    <div class="mt-4">
                        <InputLabel for="shipping_address_line_1" value="Shipping address line 1"/>

                        <TextInput
                            id="shipping_address_line_1"
                            v-model="form.shipping_address_line_1"
                            autocomplete="shipping_address_line_1"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.shipping_address_line_1" class="mt-2"/>
                    </div>

                    <div class="mt-4">
                        <InputLabel for="shipping_address_line_2" value="Shipping address line 2"/>

                        <TextInput
                            id="shipping_address_line_2"
                            v-model="form.shipping_address_line_2"
                            autocomplete="shipping_address_line_2"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.shipping_address_line_2" class="mt-2"/>
                    </div>

                    <div class="mt-4">
                        <InputLabel for="shipping_zip_code" value="Shipping zip code"/>

                        <TextInput
                            id="shipping_zip_code"
                            v-model="form.shipping_zip_code"
                            autocomplete="shipping_zip_code"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.shipping_zip_code" class="mt-2"/>
                    </div>

                    <div class="mt-4">
                        <InputLabel for="shipping_city" value="Shipping city"/>

                        <TextInput
                            id="shipping_city"
                            v-model="form.shipping_city"
                            autocomplete="shipping_city"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.shipping_city" class="mt-2"/>
                    </div>

                    <div class="mt-4">
                        <InputLabel for="shipping_country" value="Shipping country"/>

                        <TextInput
                            id="shipping_country"
                            v-model="form.shipping_country"
                            autocomplete="shipping_country"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.shipping_country" class="mt-2"/>
                    </div>

                    <div class="mt-4">
                        <InputLabel for="billing_address_line_1" value="Billing address line 1"/>

                        <TextInput
                            id="billing_address_line_1"
                            v-model="form.billing_address_line_1"
                            autocomplete="billing_address_line_1"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.billing_address_line_1" class="mt-2"/>
                    </div>

                    <div class="mt-4">
                        <InputLabel for="billing_address_line_2" value="Billing address line 2"/>

                        <TextInput
                            id="billing_address_line_2"
                            v-model="form.billing_address_line_2"
                            autocomplete="billing_address_line_2"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.billing_address_line_2" class="mt-2"/>
                    </div>

                    <div class="mt-4">
                        <InputLabel for="billing_zip_code" value="Billing zip code"/>

                        <TextInput
                            id="billing_zip_code"
                            v-model="form.billing_zip_code"
                            autocomplete="billing_zip_code"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.billing_zip_code" class="mt-2"/>
                    </div>

                    <div class="mt-4">
                        <InputLabel for="billing_city" value="Billing city"/>

                        <TextInput
                            id="billing_city"
                            v-model="form.billing_city"
                            autocomplete="billing_city"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.billing_city" class="mt-2"/>
                    </div>

                    <div class="mt-4">
                        <InputLabel for="billing_country" value="Billing country"/>

                        <TextInput
                            id="billing_country"
                            v-model="form.billing_country"
                            autocomplete="billing_country"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.billing_country" class="mt-2"/>
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


