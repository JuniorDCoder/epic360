<template>
    <div data-aos="fade-up" data-aos-delay=300 data-aos-duration=600 class="bg-white rounded-2xl flex flex-col justify-between p-7 lg:w-1/3 shadow-custom-light shadow-custom-dark h-[600px]">
        <div class="flex flex-col">
            <span class="text-[#FF4500] text-sm font-semibold">New</span>
            <span class="text-2xl font-semibold text-primary-text">{{product.name}}</span>
            <p class="text-sm font-bold text-primary-dark">{{product.price}}</p>
        </div>
        <img :src="product.image" alt="Product" class="w-[300px]">
        <div class="h-9"></div>
    </div>
</template>

<script setup>
defineProps({
    product: Object
})
</script>

<style lang="scss" scoped>
</style>
