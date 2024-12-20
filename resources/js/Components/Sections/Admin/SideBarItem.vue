<template>
    <Link :href="route" class="relative flex items-center gap-4 p-3 transition-colors duration-200 hover:bg-primary hover:rounded-md text-primary hover:text-primary-text">
        <img :src="imgSrc" :alt="altText" class="w-7" />
        <span class="text-xl">{{ text }}</span>
        <span class="absolute right-2 bg-[#131523] rounded-full px-2 transition-colors duration-200 text-primary" v-if="newOrders">{{ newOrders }}</span>
    </Link>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    route: String,
    imgSrc: String,
    altText: String,
    text: String,
    newOrders: {
        type: Number,
        default: 0
    }
});
</script>

<style scoped>
/* Add any additional styles here */
</style>
