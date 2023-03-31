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
        quotation: Object,
    },
    setup(props) {
        const form = useForm({
            status: props.quotation.status,
            accepted_at: props.quotation.accepted_at,
        })

        function submit(quotation) {
            form.patch(route('admin.quotation.update', quotation.id))
        }

        return {form, submit}
    },
}
</script>

<template>
    <Head :title="'Edit Quotation'"/>

    <AdminLayout>
        <template #header>
            <h2 class="admin_page_header">Edit Quotation</h2>
        </template>

        <div class="admin_form_container">
            <div class="content">
                <form @submit.prevent="submit(quotation)">

                    <div>
                        <InputLabel for="status" value="Status"/>

                        <SelectInput
                            id="status"
                            v-model="form.status"
                            :options="{'open': 'open', 'closed': 'closed'}"
                            autocomplete="status"
                            autofocus
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.status" class="mt-2"/>
                    </div>

                    <div class="input_group">
                        <InputLabel for="accepted_at" value="Accepted at"/>

                        <TextInput
                            id="accepted_at"
                            v-model="form.accepted_at"
                            autocomplete="accepted_at"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.accepted_at" class="mt-2"/>
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

