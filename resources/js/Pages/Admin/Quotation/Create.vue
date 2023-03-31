<script setup>
import AdminLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/Form/InputError.vue';
import InputLabel from '@/Components/Form/InputLabel.vue';
import PrimaryButton from '@/Components/Buttons/PrimaryButton.vue';
import SelectInput from "@/Components/Form/SelectInput.vue";
import {Head, useForm} from '@inertiajs/inertia-vue3';

defineProps({
    companies: Object,
});

const form = useForm({
    company_id: '',
    user_id: '',
});

const submit = () => {
    form.post(route('admin.quotation.store'))
};
</script>
<template>
    <Head title="Create New Quotation"/>

    <AdminLayout>
        <template #header>
            <h2 class="admin_page_header">New Quotation</h2>
        </template>

        <div class="admin_form_container">
            <div class="content">
                <form @submit.prevent="submit">
                    <div>
                        <InputLabel for="company_id" value="Company"/>

                        <SelectInput
                            id="company_id"
                            v-model="form.company_id"
                            :options="companies"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.company_id" class="mt-2"/>
                    </div>

                    <div class="flex items-left input_group">
                        <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Create New Quotation
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
    </AdminLayout>
</template>
