<script setup>
import {ref} from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import {Link} from '@inertiajs/inertia-vue3';
import PrimaryButton from '@/Components/Buttons/PrimaryButton.vue';

const showingNavigationDropdown = ref(false);
</script>

<template>
    <div>
        <div class="min-h-screen bg-gray-100">
            <nav class="bg-white border-b border-gray-100">
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="shrink-0 flex items-center">
                                <Link :href="route('dashboard')">
                                    <ApplicationLogo
                                        class="block h-9 w-auto fill-current text-gray-800"
                                    />
                                </Link>
                            </div>

                            <!-- Navigation Links -->
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <NavLink
                                    v-if="hasPermission($page.props.auth.permissions, 'admin_purchase_order_list')"
                                    :active="route().current('admin.purchase_order.index')"
                                    :href="route('admin.purchase_order.index')"
                                >
                                    Orders
                                </NavLink>

                                <NavLink
                                    v-if="hasPermission($page.props.auth.permissions, 'admin_company_list')"
                                    :active="route().current('admin.company.index')"
                                    :href="route('admin.company.index')"
                                >
                                    Companies
                                </NavLink>

                                <NavLink
                                    v-if="hasPermission($page.props.auth.permissions, 'admin_user_list')"
                                    :active="route().current('admin.user.index')"
                                    :href="route('admin.user.index')"
                                >
                                    Users
                                </NavLink>

                                <NavLink
                                    v-if="hasPermission($page.props.auth.permissions, 'admin_quotation_list')"
                                    :active="route().current('admin.quotation.index')"
                                    :href="route('admin.quotation.index')"
                                >
                                    Quotations
                                </NavLink>

                                <NavLink
                                    v-if="hasPermission($page.props.auth.permissions, 'admin_invoice_list')"
                                    :active="route().current('admin.invoice.index')"
                                    :href="route('admin.invoice.index')"
                                >
                                    Invoices
                                </NavLink>

                                <NavLink
                                    v-if="hasPermission($page.props.auth.permissions, 'admin_discount_code_list')"
                                    :active="route().current('admin.discount_code.index')"
                                    :href="route('admin.discount_code.index')"
                                >
                                    Discount Codes
                                </NavLink>

                                <NavLink
                                    v-if="hasPermission($page.props.auth.permissions, 'client_purchase_order_list')"
                                    :active="route().current('client.purchase_order.index')"
                                    :href="route('client.purchase_order.index')"
                                >
                                    Orders
                                </NavLink>

                                <NavLink
                                    v-if="hasPermission($page.props.auth.permissions, 'client_quotation_list')"
                                    :active="route().current('client.quotation.index')"
                                    :href="route('client.quotation.index')"
                                >
                                    Quotations
                                </NavLink>

                                <NavLink
                                    v-if="hasPermission($page.props.auth.permissions, 'client_company_read')"
                                    :active="route().current('client.company.show')"
                                    :href="route('client.company.show')"
                                >
                                    My company
                                </NavLink>
                            </div>
                        </div>

                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                            <!-- Settings Dropdown -->
                            <div v-if="$page.props.auth.user" class="ml-3 relative">
                                <Dropdown align="right" width="48">
                                    <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button
                                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                                                type="button"
                                            >
                                                {{ $page.props.auth.user.first_name }}
                                                {{ $page.props.auth.user.last_name }}

                                                <svg
                                                    class="ml-2 -mr-0.5 h-4 w-4"
                                                    fill="currentColor"
                                                    viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                >
                                                    <path
                                                        clip-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        fill-rule="evenodd"
                                                    />
                                                </svg>
                                            </button>
                                        </span>
                                    </template>

                                    <template #content>
                                        <DropdownLink :href="route('profile.edit')"> Profile</DropdownLink>
                                        <DropdownLink :href="route('logout')" as="button" method="post">
                                            Log Out
                                        </DropdownLink>
                                    </template>
                                </Dropdown>
                            </div>

                            <div v-if="!$page.props.auth.user" class="ml-3 relative">
                                <PrimaryButton
                                    class="mr-2"
                                    onclick="window.location.href='register'"
                                    type="button"
                                >
                                    Register
                                </PrimaryButton>

                                <PrimaryButton
                                    onclick="window.location.href='login'"
                                    type="button"
                                >
                                    Login
                                </PrimaryButton>
                            </div>
                        </div>

                        <!-- Hamburger -->
                        <div class="-mr-2 flex items-center sm:hidden">
                            <button
                                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"
                                @click="showingNavigationDropdown = !showingNavigationDropdown"
                            >
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path
                                        :class="{
                                            hidden: showingNavigationDropdown,
                                            'inline-flex': !showingNavigationDropdown,
                                        }"
                                        d="M4 6h16M4 12h16M4 18h16"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                    />
                                    <path
                                        :class="{
                                            hidden: !showingNavigationDropdown,
                                            'inline-flex': showingNavigationDropdown,
                                        }"
                                        d="M6 18L18 6M6 6l12 12"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Responsive Navigation Menu -->
                <div
                    :class="{ block: showingNavigationDropdown, hidden: !showingNavigationDropdown }"
                    class="sm:hidden"
                >
                    <div class="pt-2 pb-3 space-y-1">
                        <ResponsiveNavLink :active="route().current('dashboard')" :href="route('dashboard')">
                            Dashboard
                        </ResponsiveNavLink>

                        <ResponsiveNavLink
                            v-if="hasPermission($page.props.auth.permissions, 'admin_purchase_order_list')"
                            :active="route().current('admin.purchase_order.index')"
                            :href="route('admin.purchase_order.index')"
                        >
                            Orders
                        </ResponsiveNavLink>

                        <ResponsiveNavLink
                            v-if="hasPermission($page.props.auth.permissions, 'admin_company_list')"
                            :active="route().current('admin.company.index')"
                            :href="route('admin.company.index')"
                        >
                            Companies
                        </ResponsiveNavLink>

                        <ResponsiveNavLink
                            v-if="hasPermission($page.props.auth.permissions, 'admin_user_list')"
                            :active="route().current('admin.user.index')"
                            :href="route('admin.user.index')"
                        >
                            Users
                        </ResponsiveNavLink>

                        <ResponsiveNavLink
                            v-if="hasPermission($page.props.auth.permissions, 'admin_quotation_list')"
                            :active="route().current('admin.quotation.index')"
                            :href="route('admin.quotation.index')"
                        >
                            Quotations
                        </ResponsiveNavLink>

                        <ResponsiveNavLink
                            v-if="hasPermission($page.props.auth.permissions, 'admin_invoice_list')"
                            :active="route().current('admin.invoice.index')"
                            :href="route('admin.invoice.index')"
                        >
                            Invoices
                        </ResponsiveNavLink>

                        <ResponsiveNavLink
                            v-if="hasPermission($page.props.auth.permissions, 'admin_discount_code_list')"
                            :active="route().current('admin.discount_code.index')"
                            :href="route('admin.discount_code.index')"
                        >
                            Discount Codes
                        </ResponsiveNavLink>

                        <ResponsiveNavLink
                            v-if="hasPermission($page.props.auth.permissions, 'client_purchase_order_list')"
                            :active="route().current('client.purchase_order.index')"
                            :href="route('client.purchase_order.index')"
                        >
                            Orders
                        </ResponsiveNavLink>

                        <ResponsiveNavLink
                            v-if="hasPermission($page.props.auth.permissions, 'client_quotation_list')"
                            :active="route().current('client.quotation.index')"
                            :href="route('client.quotation.index')"
                        >
                            Quotations
                        </ResponsiveNavLink>

                        <ResponsiveNavLink
                            v-if="hasPermission($page.props.auth.permissions, 'client_company_read')"
                            :active="route().current('client.company.show')"
                            :href="route('client.company.show')"
                        >
                            My company
                        </ResponsiveNavLink>
                    </div>

                    <!-- Responsive Settings Options -->
                    <div v-if="$page.props.auth.user" class="pt-4 pb-1 border-t border-gray-200">
                        <div class="px-4">
                            <div class="font-medium text-base text-gray-800">
                                {{ $page.props.auth.user.name }}
                            </div>
                            <div class="font-medium text-sm text-gray-500">{{ $page.props.auth.user.email }}</div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <ResponsiveNavLink :href="route('profile.edit')"> Profile</ResponsiveNavLink>
                            <ResponsiveNavLink :href="route('logout')" as="button" method="post">
                                Log Out
                            </ResponsiveNavLink>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Heading -->
            <header v-if="$slots.header" class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header"/>
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <div class="admin_page_container">
                    <div class="content">
                        <div v-if="$page.props.flash.message" class="alert mb-4">
                            {{ $page.props.flash.message }}
                        </div>

                        <slot/>
                    </div>
                </div>
            </main>
        </div>
    </div>
</template>
