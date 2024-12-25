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
               <div class="flex flex-col p-4 bg-white rounded-md md:w-[80%]">
                    <h3 class="m-4 font-bold">Orders Over time</h3>
                    <apexchart width="700" type="line" :options="options" :series="series"></apexchart>
               </div>
                <div class="flex flex-col gap-5 p-6 bg-white rounded-md md:w-1/3">
                    <h3 class="text-3xl font-bold">Last 7 Days Sales</h3>
                    <div class="flex flex-col gap-0.5">
                        <p class="text-3xl font-bold text-primary-text">{{totalOrders}}</p>
                        <span class="text-xl text-primary-dark">Items Sold</span>
                    </div>
                    <div class="flex flex-col gap-0.5">
                        <p class="text-3xl font-bold text-primary-text">€ {{totalRevenue}}</p>
                        <span class="text-xl text-primary-dark">Revenue</span>
                    </div>
                    <hr class="my-3">
                    <div>
                        <apexchart width="270" type="donut" :options="pieOptions" :series="pieSeries"></apexchart>
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
import { computed } from 'vue';
import Euro from '/public/storage/admin/euro.png'
import Orders from '/public/storage/admin/card-order.png'
import Chart from '/public/storage/admin/chart.png'
import NewUsers from '/public/storage/admin/new-users.png'
import ExistingUsers from '/public/storage/admin/existing-users.png'

const props = defineProps({
    orderCounts: Object,
    orderAmounts: Object,
});

console.log(props.orderAmounts)

const totalOrders = computed(() => {
    return Object.values(props.orderCounts).reduce((sum, count) => sum + count, 0);
});

const totalRevenue = computed(() => {
    return Object.values(props.orderAmounts).reduce((sum, amount) => sum + amount, 0);
});

const options = {
    chart: {
        id: 'vuechart-example'
    },
    xaxis: {
        categories: Object.keys(props.orderCounts)
    },
    responsive: [
        {
            breakpoint: 1000,
            options: {
                chart: {
                    width: '100%'
                }
            }
        },
        {
            breakpoint: 600,
            options: {
                chart: {
                    width: '100%'
                }
            }
        }
    ]
}

const series = [{
        name: 'Revenue',
        data: Object.values(props.orderAmounts)
    },
    {
        name: 'Number of Items Orderered',
        data: Object.values(props.orderCounts)
    },
]

const pieOptions = {
    labels: Object.keys(props.orderAmounts), // Add labels for the pie chart
    responsive: [
    ]
}
const pieSeries = Object.values(props.orderCounts);

</script>
<style scoped>

</style>
