<template>
    <div class="flex flex-col justify-between w-full gap-4 px-1 lg:flex-row lg:px-20 mt-7">
       <LatestProduct v-for="product in products" :product="product" :key="product.id"/>
    </div>
</template>

<script setup>

defineProps({
    products: Array
})

import LatestProduct from "../LatestProduct.vue";
</script>

<style scoped>

</style>
