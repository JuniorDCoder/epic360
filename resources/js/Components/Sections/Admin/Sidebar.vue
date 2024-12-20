<template>
    <div class="fixed top-0 z-30 left-0 flex-col w-[255px] h-full gap-4 p-4 bg-primary-text md:flex hidden rounded-b-md">
        <Link :href="route('welcome')">
            <img src="/public/storage/icons/logo.png" alt="Logo" class="w-[52px] h-[52px]" />
        </Link>
        <div class="flex flex-col gap-3">
            <SideBarItem :route="route('admin.dashboard')" :imgSrc="Home" altText="Dashboard" text="Dashboard" />
            <SideBarItem route="orders" :imgSrc="Orders" altText="Orders" text="Orders" :newOrders="18"/>
            <SideBarItem route="" :imgSrc="Customers" altText="Customers" text="Customers" />
            <SideBarItem route="" :imgSrc="Support" altText="Support" text="Support" />
            <SideBarItem route="" :imgSrc="Settings" altText="Settings" text="Settings" />
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
