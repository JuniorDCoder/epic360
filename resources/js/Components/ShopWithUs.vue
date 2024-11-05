<template>
    <div data-aos="fade-up" data-aos-delay=300 data-aos-duration=600 class="p-6 flex flex-col gap-12 lg:w-1/3 bg-white rounded-2xl shadow-custom-light shadow-custom-dark">
        <img :src="reason.image" class="w-16" alt="Shop with Us">
        <div class="text-gray-900" v-html="reason.description"></div>
    </div>
</template>

<script setup>
import ShopWithUs from "./Sections/ShopWithUs.vue";

defineProps({
    reason: Object
})
</script>

<style scoped>
</style>
