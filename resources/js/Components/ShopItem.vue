<template>
    <div data-aos="fade-up" data-aos-delay=300 data-aos-duration=600 class="relative flex flex-col justify-between w-full bg-white rounded-2xl p-7 shadow-custom-light shadow-custom-dark">
        <div v-if="percentageOff > 0" class="absolute flex items-center justify-center w-8 h-8 p-6 text-white rounded-full right-4 top-4 bg-secondary">
            <span class="text-sm text-center">-{{ percentageOff }}%</span>
        </div>
        <Link :href="route('shop.item', {id: product.id})">
            <img :src="`/storage/`+product.image" alt="Product" class="w-[300px]">
        </Link>
        <div class="flex flex-col gap-3">
            <span class="text-2xl font-semibold text-primary-text">{{product.name}}</span>
            <div class="flex items-center gap-4">
                <p v-if="product.giveaway_price" class="text-sm font-semibold text-gray-700 line-through">€{{ product.price }}</p>
                <p v-else class="text-sm font-semibold text-gray-700">€{{ product.price }}</p>
                <p v-if="product.giveaway_price">|</p>
                <p v-if="product.giveaway_price" class="text-sm font-semibold text-secondary">€{{ product.giveaway_price }}</p>
                <Button @click="addToCart" fill="secondary" textColor="white" class="w-full md:w-1/2">Add to Cart</Button>
            </div>
        </div>
    </div>
</template>

<script setup>
import Button from './Button.vue';
import { Link , useForm} from '@inertiajs/vue3';
import { toast } from 'vue3-toastify'
import { computed } from 'vue';
import { incrementCartCount } from '@/stores/cartStore';
import { addProductToCart } from '../helpers/globalHelper';

const props = defineProps({
    product: Object
})

const form = useForm({
    product: props.product
});

const percentageOff = computed(() => {
    if (props.product.giveaway_price && props.product.price) {
        return Math.round(((props.product.price - props.product.giveaway_price) / props.product.price) * 100);
    }
    return 0;
});

const addToCart = () => {
    addProductToCart(form, props.product)
};
</script>

<style lang="scss" scoped>
</style>
