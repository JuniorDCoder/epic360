<template>
    <AuthLayout>
        <div class="flex flex-col w-full h-full gap-6 p-4 mt-20 md:p-9 ">
            <h1 class="text-4xl font-bold text-primary-text">Orders</h1>
            <div>
                <vue3-datatable :rows="rows" :columns="cols" :loading="loading" :sortable="true" :columnFilter="true"> </vue3-datatable>
            </div>
        </div>
    </AuthLayout>
</template>

<script setup>
import AuthLayout from '../../Layouts/AuthLayout.vue';
import { ref, computed } from 'vue';
import Vue3Datatable from '@bhplugin/vue3-datatable';
import '@bhplugin/vue3-datatable/dist/style.css';

const props = defineProps({
    orders: { type: Array },
});

console.log(props.orders);

const cols = ref([
    { field: 'order_id', title: 'Order Id.', isUnique: true },
    { field: 'date', title: 'Date', type: 'date' },
    { field: 'customerName', title: 'Customer Name' },
    { field: 'email', title: 'Email' },
    { field: 'amount', title: 'Amount' },
    { field: 'status', title: 'Status' },
]);

const rows = computed(() => {
    return (props.orders ?? []).map(order => ({
        order_id: order.id,
        date: new Date(order.created_at).toLocaleDateString(),
        customerName: order.user.name,
        email: order.user.email,
        amount: "€" + order.total,
        status: order.status,
    }));
});

const loading = ref(false);
</script>
