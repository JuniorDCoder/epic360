<template>
    <div class="fixed top-0 left-0 z-30 flex-col hidden h-full gap-4 p-3 bg-primary-text md:flex rounded-b-md">
        <Link :href="route('welcome')">
            <img src="/public/storage/icons/logo.png" alt="Logo" class="w-[52px] h-[52px]" />
        </Link>
        <div class="flex flex-col gap-3">
            <SideBarItem :active="route().current('admin.dashboard')" :route="route('admin.dashboard')" :imgSrc="Home" altText="Dashboard" text="Dashboard" />
            <SideBarItem :active="route().current('admin.orders')" :route="route('admin.orders')" route="orders" :imgSrc="Orders" altText="Orders" text="Orders" :newOrders="18"/>
            <SideBarItem :active="route().current('admin.customers')" :route="route('admin.customers')" :imgSrc="Customers" altText="Customers" text="Customers" />
            <SideBarItem :route="route('admin.support')" :active="route().current('admin.support')"  :imgSrc="Support" altText="Support" text="Support" />
            <SideBarItem :route="route('admin.settings')" :active="route().current('admin.settings')" :imgSrc="Settings" altText="Settings" text="Settings" />
        </div>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import SideBarItem from './SideBarItem.vue';

import Orders from '/public/storage/admin/orders.png'
import Customers from '/public/storage/admin/user.png'
import Home from '/public/storage/admin/home.png';
import Support from '/public/storage/admin/support.png'
import Settings from '/public/storage/admin/settings.png'
</script>

<style scoped>
/* Add any additional styles here */
</style>
