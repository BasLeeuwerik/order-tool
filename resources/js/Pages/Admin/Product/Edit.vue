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
        product: Object,
    },
    setup(props) {
        const form = useForm({
            base_price: props.product.base_price,
            multiplier: props.product.multiplier,
        })

        function submit(product) {
            form.patch(route('admin.product.update', product.id))
        }

        return {form, submit}
    },
}
</script>

<template>
    <Head :title="'Product'"/>

    <AdminLayout>
        <template #header>
            <h2 class="admin_page_header">Edit Product</h2>
        </template>

        <div class="admin_form_container">
            <div class="content">
                <form @submit.prevent="submit(product)">
                    <div>
                        <InputLabel for="base_price" value="base_price"/>

                        <NumberInput
                            step="0.00000001"
                            id="base_price"
                            v-model="form.base_price"
                            autocomplete="base_price"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.base_price" class="mt-2"/>
                    </div>

                    <div class="mt-4">
                        <InputLabel for="multiplier" value="multiplier"/>

                        <NumberInput
                            step="0.00000001"
                            id="multiplier"
                            v-model="form.multiplier"
                            autocomplete="multiplier"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.multiplier" class="mt-2"/>
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
