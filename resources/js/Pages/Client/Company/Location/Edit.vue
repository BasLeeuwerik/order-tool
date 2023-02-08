<script>
import {Head, useForm} from '@inertiajs/inertia-vue3';
import TextInput from "@/Components/Form/TextInput.vue";
import PrimaryButton from '@/Components/Buttons/PrimaryButton.vue';
import InputError from '@/Components/Form/InputError.vue';
import InputLabel from '@/Components/Form/InputLabel.vue';
import SelectInput from '@/Components/Form/SelectInput.vue';
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import NumberInput from "@/Components/Form/NumberInput.vue";

export default {
    components: {
        Head, TextInput, SelectInput, PrimaryButton, InputError, InputLabel, NumberInput, AuthenticatedLayout,
    },
    props: {
        companyLocation: Object,
    },
    setup(props) {
        const form = useForm({
            name: props.companyLocation.name,
            address_line_1: props.companyLocation.address_line_1,
            address_line_2: props.companyLocation.address_line_2,
            zip_code: props.companyLocation.zip_code,
            city: props.companyLocation.city,
            region: props.companyLocation.region,
            country: props.companyLocation.country,
        })

        function submit(companyLocation) {
            form.patch(route('client.location.update', companyLocation.id))
        }

        return {form, submit}
    },
}
</script>

<template>
    <Head :title="companyLocation.name"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="admin_page_header">Edit Location</h2>
        </template>

        <div class="admin_form_container">
            <div class="content">
                <form @submit.prevent="submit(companyLocation)">
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
                        <InputLabel for="address_line_1" value="Address line 1"/>

                        <TextInput
                            id="name"
                            v-model="form.address_line_1"
                            autocomplete="address_line_1"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.address_line_1" class="mt-2"/>
                    </div>


                    <div class="mt-4">
                        <InputLabel for="address_line_2" value="Address line 2"/>

                        <TextInput
                            id="name"
                            v-model="form.address_line_2"
                            autocomplete="address_line_2"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.address_line_2" class="mt-2"/>
                    </div>

                    <div class="mt-4">
                        <InputLabel for="zip_code" value="Zip code"/>

                        <TextInput
                            id="name"
                            v-model="form.zip_code"
                            autocomplete="zip_code"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.zip_code" class="mt-2"/>
                    </div>

                    <div class="mt-4">
                        <InputLabel for="city" value="City"/>

                        <TextInput
                            id="name"
                            v-model="form.city"
                            autocomplete="city"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.city" class="mt-2"/>
                    </div>

                    <div class="mt-4">
                        <InputLabel for="region" value="Region"/>

                        <TextInput
                            id="name"
                            v-model="form.region"
                            autocomplete="region"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.region" class="mt-2"/>
                    </div>


                    <div class="mt-4">
                        <InputLabel for="country" value="Country"/>

                        <TextInput
                            id="name"
                            v-model="form.country"
                            autocomplete="country"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.country" class="mt-2"/>
                    </div>

                    <div class="flex items-left mt-4">
                        <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Save
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

