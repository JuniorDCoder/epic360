<template>
    <Link :href="route('shop.item', {id: product.id})" data-aos="fade-up" data-aos-delay=300 data-aos-duration=600 class="bg-white rounded-2xl flex flex-col justify-between p-7 lg:w-1/3 shadow-custom-light shadow-custom-dark h-[600px]">
        <div class="flex flex-col gap-1">
            <span class="text-[#FF4500] text-sm font-semibold">New</span>
            <span class="text-2xl font-semibold text-primary-text">{{product.name}}</span>
            <div class="flex gap-6">
                <p v-if="product.giveaway_price" class="text-sm font-semibold line-through text-primary-dark">€{{ product.price }}</p>
                <p v-else class="text-sm font-semibold text-primary-dark">€{{ product.price }}</p>
                <p v-if="product.giveaway_price" class="text-sm font-semibold text-primary-dark">€{{ product.giveaway_price }}</p>
            </div>
        </div>
        <img :src="`/storage/`+product.image" alt="Product" class="w-[300px]">
        <div class="h-9"></div>
    </Link>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    product: Object
})
</script>

<style lang="scss" scoped>
</style>
