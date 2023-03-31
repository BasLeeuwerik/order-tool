<script setup>
import AdminLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/Form/InputError.vue';
import InputLabel from '@/Components/Form/InputLabel.vue';
import TextInput from '@/Components/Form/TextInput.vue';
import PrimaryButton from '@/Components/Buttons/PrimaryButton.vue';
import {Head, useForm} from '@inertiajs/inertia-vue3';
import NumberInput from "@/Components/Form/NumberInput.vue";
import SelectInput from "@/Components/Form/SelectInput.vue";

defineProps({
    discountCode: Object,
});

const form = useForm({
    discount_code: '',
    discount_amount: '',
    discount_percentage: '',
    end_date: '',
    max_usage: '',
    status: '',
});

const submit = () => {
    form.post(route('admin.discount_code.store'))
};
</script>

<template>
    <Head title="Create New Discount Code"/>

    <AdminLayout>
        <template #header>
            <h2 class="admin_page_header">New Discount Code</h2>
        </template>

        <div class="admin_form_container">
            <div class="content">
                <form @submit.prevent="submit">

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
                            :step="0.01"
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
                            :step="0.01"
                            autocomplete="discount_amount"
                            class="mt-1 block w-full"
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
                        <InputLabel for="max_usage" value="Max usage"/>

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

                    <div class="flex items-left input_group">
                        <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Create New Discount Code
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
    </AdminLayout>
</template>
