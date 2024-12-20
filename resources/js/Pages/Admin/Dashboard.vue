<template>
    <Head title="Admin Dashboard" />
    <AuthLayout>
        <div class="flex flex-col w-full h-full gap-6 p-4 mt-20 md:p-9 ">
            <h1 class="text-4xl font-bold text-primary-text">Dashboard</h1>
            <div class="flex flex-col items-center justify-between w-full gap-3 my-6 md:flex-row">
                <AnalyticsCard title="Total Revenue" :value="300000" :image="Euro" imgStyle="w-9"/>
                <AnalyticsCard title="Orders" :value="1080" :image="Orders" imgStyle="w-9"/>
                <AnalyticsCard title="Total Visitors" :value="5420" :image="Chart"/>
                <AnalyticsCard title="New Users" :value="1660" :image="NewUsers"/>
                <AnalyticsCard title="Existing Users" :value="1660" :image="ExistingUsers"/>
            </div>
            <div class="flex flex-col justify-between w-full gap-4 md:flex-row">
               <div class="flex flex-col p-4 bg-white rounded-md">
                    <h3 class="m-4 font-bold">Orders Over time</h3>
                    <apexchart width="700" type="line" :options="options" :series="series"></apexchart>
               </div>
                <div class="flex flex-col gap-5 p-6 bg-white rounded-md md:w-1/3">
                    <h3 class="text-3xl font-bold">Last 7 Days Sales</h3>
                    <div class="flex flex-col gap-0.5">
                        <p class="text-3xl font-bold text-primary-text">1,138</p>
                        <span class="text-xl text-primary-dark">Items Sold</span>
                    </div>
                    <div class="flex flex-col gap-0.5">
                        <p class="text-3xl font-bold text-primary-text">€203,546</p>
                        <span class="text-xl text-primary-dark">Revenue</span>
                    </div>
                    <hr class="my-3">
                    <div>
                        <apexchart width="300" type="donut" :options="pieOptions" :series="pieSeries"></apexchart>
                      </div>
                </div>
            </div>
            <div class="flex flex-col justify-between w-full gap-4 md:flex-row">
                <div class="w-1/2 p-6 bg-white rounded-md">
                    <h3 class="font-bold">Recent Transactions</h3>
                </div>

             </div>
        </div>

    </AuthLayout>
</template>

<script setup>
import AnalyticsCard from '../../Components/Sections/Admin/AnalyticsCard.vue';
import AuthLayout from '../../Layouts/AuthLayout.vue';
import { Head } from '@inertiajs/vue3';

import Euro from '/public/storage/admin/euro.png'
import Orders from '/public/storage/admin/card-order.png'
import Chart from '/public/storage/admin/chart.png'
import NewUsers from '/public/storage/admin/new-users.png'
import ExistingUsers from '/public/storage/admin/existing-users.png'

const options = {
    chat: {
        id: 'vuechart-example'
    },
    xaxis: {
        categories: [1991, 1992, 1993, 1994, 1995, 1996, 1997, 1998]
    },
}

const series = [{
        name: 'Orders',
        data: [30, 40, 45, 50, 49, 60, 70, 91]
    },
    {
        name: 'Orders',
        data: [20, 30, 95, 50, 29, 80, 70, 61]
    },
]

const pieOptions = {}
const pieSeries = [44, 55, 41, 17, 15]

</script>

<style scoped>

</style>
