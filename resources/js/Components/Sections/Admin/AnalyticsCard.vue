<template>
    <Link class="flex flex-row items-center justify-between w-full p-4 rounded-md bg-[#333333] transform transition-transform duration-200 hover:scale-105">
        <div class="flex flex-col gap-2">
            <h3 class="text-[#A8A9AD] text-md">{{ title }}</h3>
            <span class="text-2xl text-white">{{ value }}</span>
        </div>
        <img :src="image" :class="imgStyle" :alt="image">
    </Link>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    title: String,
    value: Number,
    image: String,
    imgStyle: {
        default: '',
        type: String
    }
})
</script>

<style scoped>

</style>
