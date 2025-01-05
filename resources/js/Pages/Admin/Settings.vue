<template>
    <AuthLayout>
        <div class="flex flex-col w-full h-full gap-6 p-4 mt-20 md:p-9 ">
            <div class="flex justify-between">
                <h1 class="text-4xl font-bold text-primary-text">Settings</h1>
                <div class="flex gap-3">
                    <Button fill="primary" class="border border-gray-300">Cancel</Button>
                    <Button fill="secondary" textColor="white">Save Changes</Button>
                </div>
            </div>
        </div>
    </AuthLayout>
</template>

<script setup>
import AuthLayout from '@/Layouts/AuthLayout.vue';
import Button from '@/Components/Button.vue';

</script>

<style scoped>

</style>
