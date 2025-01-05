<template>
    <AuthLayout>
        <div class="flex flex-col w-full h-full gap-6 p-4 mt-20 md:p-9 ">
            <h1 class="text-4xl font-bold text-primary-text">Customers</h1>
            <div>
                <vue3-datatable :rows="rows" :columns="cols" :loading="loading" :sortable="true" :columnFilter="true"> </vue3-datatable>
            </div>
        </div>
    </AuthLayout>
</template>

<script setup>
import AuthLayout from '@/Layouts/AuthLayout.vue';
import { ref, computed } from 'vue';
import Vue3Datatable from '@bhplugin/vue3-datatable';
import '@bhplugin/vue3-datatable/dist/style.css';

const props = defineProps({
    users: [Array, Object],
})

const cols = ref([
    { field: 'user_id', title: 'Customer Id.', isUnique: true },
    { field: 'name', title: 'Customer Name' },
    { field: 'email', title: 'Email' },
    { field: 'status', title: 'Status' },
]);

const rows = computed(() => {
    return (props.users ?? []).map(user => ({
        user_id: user.id,
        name: user.name,
        email: user.email,
        status: "Active",
    }));
});



</script>

<style scoped>

</style>
