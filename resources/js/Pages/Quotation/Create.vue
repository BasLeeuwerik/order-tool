<script>
import InputError from '@/Components/Form/InputError.vue';
import InputLabel from '@/Components/Form/InputLabel.vue';
import NumberInput from '@/Components/Form/NumberInput.vue';
import SelectInput from "@/Components/Form/SelectInput.vue";
import {Head, useForm} from '@inertiajs/inertia-vue3';
import AppLayout from "@/Layouts/AppLayout.vue";
import {Inertia} from '@inertiajs/inertia'
import PrimaryButton from '@/Components/Buttons/PrimaryButton.vue';
import RadioInput from "@/Components/Form/RadioInput.vue";

export default {
    components: {
        Head,
        AppLayout,
        SelectInput,
        InputError,
        InputLabel,
        NumberInput,
        Inertia,
        PrimaryButton,
        RadioInput,
    },
    props: {
        firstOptions: Object,
        secondFirstOptions: Object,
        secondSecondOptions: Object,
        thirdOptions: Object,
        totalPrice: Number,
        unitPrice: Number,
    },
    computed: {
        quantity() {
            return this.form.quantity;
        }
    },
    setup(props) {
        const urlParameters = (new URL(document.location)).searchParams;

        const pages = {
            first_option: 0,
            second_option: 1,
            third_option: 2,
            quantity: 3,
            has_speed: 3,
            has_extra: 3,
        };

        const form = useForm({
            first_option: getParameterValue('first_option'),
            second_option: getParameterValue('second_option'),
            third_option: getParameterValue('third_option'),
            quantity: getParameterValue('quantity'),
            has_speed: getParameterValue('has_speed'),
            has_extra: getParameterValue('has_extra'),
        })

        function submit() {
            form.post(route('quotation.store'))
        }

        function getParameterValue(key) {
            return urlParameters.get(key) ?? null;
        }

        function updateParameter(key, value) {
            let queryString = '?';

            let page = pages[key];
            for (let i = 0; i <= page; i++) {
                switch (i) {
                    case 0:
                        let firstOptionValue = urlParameters.get('first_option');
                        if (key === 'first_option') {
                            firstOptionValue = value;
                        }

                        queryString += 'first_option=' + firstOptionValue;
                        break;
                    case 1:
                        let secondOptionValue = urlParameters.get('second_option');
                        if (key === 'second_option') {
                            secondOptionValue = value;
                        }

                        queryString += '&second_option=' + secondOptionValue;
                        break;
                    case 2:
                        let thirdOptionValue = urlParameters.get('third_option');
                        if (key === 'third_option') {
                            thirdOptionValue = value;
                        }

                        queryString += '&third_option=' + thirdOptionValue;
                        break;
                    case 3:
                        let quantityValue = key === 'quantity' ? value : urlParameters.get('quantity');
                        let hasSpeedValue = key === 'has_speed' ? value : urlParameters.get('has_speed');
                        let hasExtraValue = key === 'has_extra' ? value : urlParameters.get('has_extra');

                        if (quantityValue != null) {
                            queryString += '&quantity=' + quantityValue;
                        }

                        if (hasSpeedValue != null) {
                            queryString += '&has_speed=' + hasSpeedValue;
                        }

                        if (hasExtraValue != null) {
                            queryString += '&has_extra=' + hasExtraValue;
                        }

                        break;
                }
            }

            Inertia.visit(route(route().current()) + queryString);
        }

        return {form, submit, updateParameter}
    },
    watch: {
        quantity: {
            handler(value, oldValue) {
                if (!this.awaitingSearch) {
                    setTimeout(() => {
                        this.updateParameter('quantity', this.form.quantity)

                        this.awaitingSearch = false;
                    }, 1700);
                }
                this.awaitingSearch = true;
            },
        }
    }
}

</script>

<template>
    <AppLayout>
        <template #header>
            <h2 class="admin_page_header">New quotation</h2>
        </template>

        <div class="admin_info_table_container p-6">

            <form @submit.prevent="submit">
                <div class="mb-3">
                    <InputLabel for="first_option" value="First option"/>

                    <SelectInput
                        id="first_option"
                        v-model="form.first_option"
                        :options="firstOptions"
                        :placeholderValue="''"
                        class="mt-1 block w-full"
                        @change="updateParameter('first_option', form.first_option)"
                    />

                    <InputError :message="form.errors.first_option" class="mt-2"/>
                </div>

                <div v-if="form.first_option === 'Option 1.1'" class="mb-3">
                    <InputLabel for="second_option" value="Second option"/>

                    <SelectInput
                        id="second_option"
                        v-model="form.second_option"
                        :options="secondFirstOptions"
                        :placeholderValue="''"
                        class="mt-1 block w-full"
                        @change="updateParameter('second_option', form.second_option)"
                    />

                    <InputError :message="form.errors.second_option" class="mt-2"/>
                </div>

                <div v-if="form.first_option === 'Option 1.2'" class="mb-3">
                    <InputLabel for="second_option" value="Second option"/>

                    <SelectInput
                        id="second_option"
                        v-model="form.second_option"
                        :options="secondSecondOptions"
                        :placeholderValue="''"
                        class="mt-1 block w-full"
                        @change="updateParameter('second_option', form.second_option)"
                    />

                    <InputError :message="form.errors.second_option" class="mt-2"/>
                </div>

                <div v-if="form.second_option" class="mb-3">
                    <InputLabel for="third_option" value="Third option"/>

                    <SelectInput
                        id="third_option"
                        v-model="form.third_option"
                        :options="thirdOptions"
                        :placeholderValue="''"
                        class="mt-1 block w-full"
                        @change="updateParameter('third_option', form.third_option)"
                    />

                    <InputError :message="form.errors.third_option" class="mt-2"/>
                </div>

                <template v-if="form.third_option">
                    <hr class="border-b-1 my-5">

                    <div class="mb-3">
                        <InputLabel for="quantity" value="Quantity"/>

                        <NumberInput
                            id="quantity"
                            v-model="form.quantity"
                            autocomplete="quantity"
                            class="mt-1 block w-full"
                        />

                        <InputError :message="form.errors.quantity" class="mt-2"/>
                    </div>

                    <div class="mb-3">
                        <InputLabel for="has_speed" value="Select delivery speed"/>

                        <RadioInput
                            id="has_speed"
                            v-model="form.has_speed"
                            :options="{0: 'normal', 1: 'speed'}"
                            class="mt-1 block w-full"
                            name="has_speed"
                            @change="updateParameter('has_speed', form.has_speed)"
                        />

                        <InputError :message="form.errors.has_speed" class="mt-2"/>
                    </div>

                    <div class="mb-3">
                        <InputLabel for="has_extra" value="Select extra option"/>

                        <RadioInput
                            id="has_extra"
                            v-model="form.has_extra"
                            :options="{1: 'yes', 0: 'no'}"
                            class="mt-1 block w-full"
                            name="has_extra"
                            @change="updateParameter('has_extra', form.has_extra)"
                        />

                        <InputError :message="form.errors.has_extra" class="mt-2"/>
                    </div>
                </template>

                <template v-if="totalPrice">
                    <hr class="border-b-1 my-5">

                    <table>
                        <tr>
                            <th>PRICE PER PRODUCT</th>
                            <td class="text-right">€ {{ unitPrice }}</td>
                        </tr>
                        <tr>
                            <th>TOTAL ORDER PRICE</th>
                            <td class="text-right">€ {{ totalPrice }}</td>
                        </tr>
                        <tr>
                            <th>SHIPPING</th>
                            <td class="text-right">TBD</td>
                        </tr>
                        <tr>
                            <th>TOTAL</th>
                            <td class="text-right">TBD</td>
                        </tr>
                    </table>

                    <hr class="border-b-1 my-5">

                    <div
                        v-if="hasPermission($page.props.auth.permissions, 'client_quotation_create')"
                        class="flex"
                    >
                        <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Create
                        </PrimaryButton>
                    </div>

                    <div
                        v-if="!$page.props.auth.user"
                    >
                        <PrimaryButton
                            :class="'mr-2 ' + { 'opacity-25': form.processing }"
                            :disabled="form.processing"
                            onclick="window.location.href='register'"
                            type="button"
                        >
                            Register
                        </PrimaryButton>

                        <PrimaryButton
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            Login
                        </PrimaryButton>
                    </div>
                </template>
            </form>
        </div>
    </AppLayout>
</template>
