<template>
    <Link :href="route" :class="linkClasses">
        <img :src="imgSrc" :alt="altText" class="w-7" />
        <span class="text-xl">{{ text }}</span>
        <span class="absolute right-2 bg-[#131523] rounded-full px-2 transition-colors duration-200 text-primary" v-if="newOrders">{{ newOrders }}</span>
    </Link>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import { computed } from 'vue';

const props = defineProps({
    route: String,
    imgSrc: String,
    altText: String,
    text: String,
    newOrders: {
        type: Number,
        default: 0
    },
    active: {
        type: Boolean,
        default: false
    }
});

const linkClasses = computed(() => {
    return [
        'relative flex items-center gap-4 p-3 transition-colors duration-200',
        props.active ? 'bg-primary rounded-md text-primary-text' : 'hover:bg-primary hover:rounded-md text-primary hover:text-primary-text'
    ];
});
</script>

<style scoped>
/* Add any additional styles here */
</style>
