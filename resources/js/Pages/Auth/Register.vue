<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/Form/InputError.vue';
import InputLabel from '@/Components/Form/InputLabel.vue';
import PrimaryButton from '@/Components/Buttons/PrimaryButton.vue';
import TextInput from '@/Components/Form/TextInput.vue';
import SelectInput from "@/Components/Form/SelectInput.vue";
import {Head, Link, useForm} from '@inertiajs/inertia-vue3';

const form = useForm({
    first_name: '',
    last_name: '',
    email: '',
    locale: '',
    password: '',
    password_confirmation: '',
    company_name: '',
    phone_number: '',
    website: '',
    vat_number: '',
    coc_number: '',
    address_line_1: '',
    zip_code: '',
    city: '',
    region: '',
    country: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Register"/>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="first_name" value="First name"/>

                <TextInput
                    id="first_name"
                    v-model="form.first_name"
                    autocomplete="first_name"
                    autofocus
                    class="mt-1 block w-full"
                    required
                    type="text"
                />

                <InputError :message="form.errors.first_name" class="mt-2"/>
            </div>

            <div class="mt-4">
                <InputLabel for="last_name" value="Last name"/>

                <TextInput
                    id="last_name"
                    v-model="form.last_name"
                    autocomplete="last_name"
                    class="mt-1 block w-full"
                    required
                    type="text"
                />

                <InputError :message="form.errors.last_name" class="mt-2"/>
            </div>

            <div class="mt-4">
                <InputLabel for="email" value="Email"/>

                <TextInput
                    id="email"
                    v-model="form.email"
                    autocomplete="username"
                    class="mt-1 block w-full"
                    required
                    type="email"
                />

                <InputError :message="form.errors.email" class="mt-2"/>
            </div>

            <div class="mt-4">
                <InputLabel for="locale" value="Country"/>

                <SelectInput
                    id="locale"
                    v-model="form.locale"
                    :options="{'NL': 'nl', 'BE': 'be', 'DE': 'de'}"
                    autocomplete="locale"
                    class="mt-1 block w-full"
                    required
                />

                <InputError :message="form.errors.locale" class="mt-2"/>
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Password"/>

                <TextInput
                    id="password"
                    v-model="form.password"
                    autocomplete="new-password"
                    class="mt-1 block w-full"
                    required
                    type="password"
                />

                <InputError :message="form.errors.password" class="mt-2"/>
            </div>

            <div class="mt-4">
                <InputLabel for="password_confirmation" value="Confirm Password"/>

                <TextInput
                    id="password_confirmation"
                    v-model="form.password_confirmation"
                    autocomplete="new-password"
                    class="mt-1 block w-full"
                    required
                    type="password"
                />

                <InputError :message="form.errors.password_confirmation" class="mt-2"/>
            </div>

            <div class="mt-4">
                <InputLabel for="company_name" value="Company name"/>

                <TextInput
                    id="company_name"
                    v-model="form.company_name"
                    autocomplete="company_name"
                    class="mt-1 block w-full"
                    required
                    type="text"
                />

                <InputError :message="form.errors.company_name" class="mt-2"/>
            </div>

            <div class="mt-4">
                <InputLabel for="phone_number" value="Phone number"/>

                <TextInput
                    id="phone_number"
                    v-model="form.phone_number"
                    autocomplete="phone_number"
                    class="mt-1 block w-full"
                    type="text"
                />

                <InputError :message="form.errors.phone_number" class="mt-2"/>
            </div>

            <div class="mt-4">
                <InputLabel for="website" value="Website"/>

                <TextInput
                    id="website"
                    v-model="form.website"
                    autocomplete="website"
                    class="mt-1 block w-full"
                    type="text"
                />

                <InputError :message="form.errors.website" class="mt-2"/>
            </div>

            <div class="mt-4">
                <InputLabel for="vat_number" value="VAT number"/>

                <TextInput
                    id="vat_number"
                    v-model="form.vat_number"
                    autocomplete="vat_number"
                    class="mt-1 block w-full"
                    type="text"
                />

                <InputError :message="form.errors.vat_number" class="mt-2"/>
            </div>

            <div class="mt-4">
                <InputLabel for="coc_number" value="COC number"/>

                <TextInput
                    id="coc_number"
                    v-model="form.coc_number"
                    autocomplete="coc_number"
                    class="mt-1 block w-full"
                    type="text"
                />

                <InputError :message="form.errors.coc_number" class="mt-2"/>
            </div>

            <div class="mt-4">
                <InputLabel for="address_line_1" value="Street address"/>

                <TextInput
                    id="address_line_1"
                    v-model="form.address_line_1"
                    autocomplete="address_line_1"
                    class="mt-1 block w-full"
                    type="text"
                />

                <InputError :message="form.errors.address_line_1" class="mt-2"/>
            </div>

            <div class="mt-4">
                <InputLabel for="zip_code" value="Zip code"/>

                <TextInput
                    id="zip_code"
                    v-model="form.zip_code"
                    autocomplete="zip_code"
                    class="mt-1 block w-full"
                    type="text"
                />

                <InputError :message="form.errors.zip_code" class="mt-2"/>
            </div>

            <div class="mt-4">
                <InputLabel for="city" value="City"/>

                <TextInput
                    id="city"
                    v-model="form.city"
                    autocomplete="city"
                    class="mt-1 block w-full"
                    type="text"
                />

                <InputError :message="form.errors.city" class="mt-2"/>
            </div>

            <div class="mt-4">
                <InputLabel for="region" value="Region"/>

                <TextInput
                    id="region"
                    v-model="form.region"
                    autocomplete="region"
                    class="mt-1 block w-full"
                    type="text"
                />

                <InputError :message="form.errors.region" class="mt-2"/>
            </div>

            <div class="mt-4">
                <InputLabel for="country" value="Country"/>

                <TextInput
                    id="country"
                    v-model="form.country"
                    autocomplete="country"
                    class="mt-1 block w-full"
                    type="text"
                />

                <InputError :message="form.errors.country" class="mt-2"/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link
                    :href="route('login')"
                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    Already registered?
                </Link>

                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing" class="ml-4">
                    Register
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
