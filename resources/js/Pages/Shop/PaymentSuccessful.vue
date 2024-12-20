<template>
    <BaseLayout>
        <div class="flex flex-col w-full py-4">
            <h1 class="text-4xl font-semibold text-center pb-9 text-primary-text">Cart</h1>
            <div class="flex gap-[-2px] items-center justify-center">
                <div class="border flex items-center justify-center border-[#32CD32] rounded-full p-2">
                    <div class="bg-[#32CD32] h-2 w-2 rounded-full"></div>
                </div>
                <div class="h-[0.5px] bg-gray-500 w-[300px]"></div>
                <div class="flex items-center justify-center p-2 border border-[#32CD32] rounded-full">
                    <div class="w-2 h-2 bg-[#32CD32] rounded-full"></div>
                </div>
                <div class="h-[0.5px] bg-[#32CD32] w-[300px]"></div>
                <div class="flex items-center justify-center p-2 border border-[#32CD32] rounded-full">
                    <div class="w-2 h-2 bg-[#32CD32] rounded-full"></div>
                </div>
            </div>
            <div class="flex items-center justify-between w-full mx-auto mt-4 font-semibold md:w-1/2 ">
                <h3 class="text-primary-text">Shipping</h3>
                <h3 class="text-primary-text">Payment</h3>
                <h3 class="text-primary-text">Confirmation</h3>
            </div>

            <div class="flex flex-col gap-3 p-5 mx-auto mt-12 bg-white md:w-1/2">
                <h3 class="text-[#007AFF] text-2xl">Thank you!</h3>
                <p class="text-primary-dark">Order #WB56440019 has been received!</p>
                <p class="text-primary-dark">You will receive an email confirmation shortly</p>
            </div>

            <div class="flex flex-col w-full gap-5 p-5 mx-auto my-8 bg-white md:w-1/2">
                <h3 class="text-xl font-semibold text-primary-text">Order details</h3>
                <div class="flex justify-between w-full text-primary-text">
                    <span>Subtotal</span>
                    <span class="font-semibold">€560.00</span>
                </div>
                <div class="flex justify-between w-full text-primary-text">
                    <span>Delivery charge</span>
                    <span class="font-semibold">€</span>
                </div>
                <hr class="h-2">
                <div class="flex justify-between w-full text-primary-text">
                    <span>Total</span>
                    <span class="font-semibold">€560.00</span>
                </div>
                <div class="flex justify-between w-full text-primary-text">
                    <span>Name</span>
                    <span class="font-semibold">{{userInfo?.name}}</span>
                </div>
                <div class="flex justify-between w-full text-primary-text">
                    <span>Address</span>
                    <span class="font-semibold">Allen avenue</span>
                </div>
            </div>

            <Button class="mx-auto md:w-1/6" :rounded="true" :is-link="true">Track your order</Button>

        </div>
    </BaseLayout>
</template>

<script setup>
import BaseLayout from '../../Layouts/BaseLayout.vue';
import { computed } from 'vue';
import { usePage } from '@inertiajs/vue3';
import Button from '../../Components/Button.vue';

const { props } = usePage();
const userInfo = computed(() => props.auth?.user ? { ...props.auth.user } : null);
</script>

<style lang="scss" scoped>

</style>
