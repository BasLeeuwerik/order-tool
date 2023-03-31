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
        discountCode: Object,
    },
    setup(props) {
        const form = useForm({
            discount_code: props.discountCode.discount_code,
            discount_percentage: props.discountCode.discount_percentage,
            discount_amount: props.discountCode.discount_amount,
            end_date: props.discountCode.end_date,
            max_usage: props.discountCode.max_usage,
            status: props.discountCode.status,
        })

        function submit(discountCode) {
            form.patch(route('admin.discount_code.update', discountCode.id))
        }

        return {form, submit}
    },
}
</script>

<template>
    <Head :title="discountCode.discount_code"/>

    <AdminLayout>
        <template #header>
            <h2 class="admin_page_header">Edit Discount Code</h2>
        </template>

        <div class="admin_form_container">
            <div class="content">
                <form @submit.prevent="submit(discountCode)">

                    <div>
                        <InputLabel for="discount_code" value="Discount code"/>

                        <TextInput
                            id="name"
                            v-model="form.discount_code"
                            autocomplete="discount_code"
                            autofocus
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.discount_code" class="mt-2"/>
                    </div>

                    <div class="input_group">
                        <InputLabel for="discount_percentage" value="Discount percentage"/>

                        <NumberInput
                            id="discount_percentage"
                            v-model="form.discount_percentage"
                            autocomplete="discount_percentage"
                            class="mt-1 block w-full"
                            step="0.01"
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
                            step="0.01"
                        />

                        <InputError :message="form.errors.discount_amount" class="mt-2"/>
                    </div>

                    <div class="input_group">
                        <InputLabel for="end_date" value="End date"/>

                        <TextInput
                            id="name"
                            v-model="form.end_date"
                            autocomplete="end_date"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.end_date" class="mt-2"/>
                    </div>

                    <div class="input_group">
                        <InputLabel for="max_usage" value="Max usage amount"/>

                        <NumberInput
                            id="max_usage"
                            v-model="form.max_usage"
                            autocomplete="max_usage"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.max_usage" class="mt-2"/>
                    </div>

                    <div class="input_group">
                        <InputLabel for="status" value="Status"/>

                        <SelectInput
                            id="type"
                            v-model="form.status"
                            :options="{'open': 'open', 'closed': 'closed'}"
                            autocomplete="status"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.status" class="mt-2"/>
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


