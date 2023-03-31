<script setup>
import InputError from '@/Components/Form/InputError.vue';
import InputLabel from '@/Components/Form/InputLabel.vue';
import PrimaryButton from '@/Components/Buttons/PrimaryButton.vue';
import TextInput from '@/Components/Form/TextInput.vue';
import {Link, useForm, usePage} from '@inertiajs/inertia-vue3';

const props = defineProps({
    mustVerifyEmail: Boolean,
    status: String,
});

const user = usePage().props.value.auth.user;

const form = useForm({
    first_name: user.first_name,
    last_name: user.last_name,
    email: user.email,
});
</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">Profile Information</h2>

            <p class="mt-1 text-sm text-gray-600">
                Update your account's profile information and email address.
            </p>
        </header>

        <form class="mt-6 space-y-6" @submit.prevent="form.patch(route('profile.update'))">
            <div>
                <InputLabel for="email" value="Email"/>

                <TextInput
                    id="email"
                    v-model="form.email"
                    autocomplete="email"
                    class="mt-1 block w-full"
                    required
                    type="email"
                />

                <InputError :message="form.errors.email" class="mt-2"/>
            </div>

            <div>
                <InputLabel for="name" value="First name"/>

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

            <div>
                <InputLabel for="name" value="Last name"/>

                <TextInput
                    id="last_name"
                    v-model="form.last_name"
                    autocomplete="last_name"
                    autofocus
                    class="mt-1 block w-full"
                    required
                    type="text"
                />

                <InputError :message="form.errors.last_name" class="mt-2"/>
            </div>

            <div v-if="props.mustVerifyEmail && user.email_verified_at === null">
                <p class="text-sm mt-2 text-gray-800">
                    Your email address is unverified.
                    <Link
                        :href="route('verification.send')"
                        as="button"
                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        method="post"
                    >
                        Click here to re-send the verification email.
                    </Link>
                </p>

                <div
                    v-show="props.status === 'verification-link-sent'"
                    class="mt-2 font-medium text-sm text-green-600"
                >
                    A new verification link has been sent to your email address.
                </div>
            </div>

            <div class="flex items-center gap-4">
                <PrimaryButton :disabled="form.processing">Save</PrimaryButton>

                <Transition class="transition ease-in-out" enter-from-class="opacity-0" leave-to-class="opacity-0">
                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Saved.</p>
                </Transition>
            </div>
        </form>
    </section>
</template>
