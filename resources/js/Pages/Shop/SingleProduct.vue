<template>
    <Head title="Product Details"/>
    <BaseLayout>
        <div class="flex flex-col w-full gap-4 py-12 md:flex-row">
            <div class="flex flex-col items-center w-full gap-5 md:w-1/2">
                <img :src="`/storage/` + product.image" alt="Product" class="w-[300px]">
                <div class="flex gap-3 mt-4 md:gap-5">
                    <img v-for="image in product.images" :key="image.id" :src="`/storage/` + image.image_path" alt="Product Image" class="md:w-[100px] w-[85px] md:h-[100px] object-cover">
                </div>
            </div>
            <div class="flex flex-col gap-3 md:w-1/2">
                <h1 class="text-2xl font-semibold text-primary-text">{{product.name}}</h1>
                <div class="flex gap-6">
                    <p v-if="product.giveaway_price" class="text-sm font-semibold text-gray-700 line-through">€{{ product.price }}</p>
                    <p v-else class="text-sm font-semibold text-gray-700">€{{ product.price }}</p>
                    <p v-if="product.giveaway_price" class="text-sm font-semibold text-gray-700">€{{ product.giveaway_price }}</p>
                </div>
                <p class="text-gray-700 md:w-4/5 text-md">{{product.description}} </p>
                <div class="flex w-1/3 md:w-1/5 items-center justify-center md: gap-5 px-2 py-2.5 border border-gray-500 text-gray-700 rounded-sm">
                    <span @click="decrementQuantity" class="text-2xl cursor-pointer select-none">-</span>
                    <span class="text-2xl cursor-pointer">{{quantity}}</span>
                    <span @click="incrementQuantity" class="text-2xl cursor-pointer select-none">+</span>
                </div>
                <p class="text-gray-700">Category: <span>&nbsp;&nbsp;{{product.category.name}}</span> </p>
                <div class="flex items-center justify-between gap-8 md:w-2/3">
                    <Button @click="addToCart" fill="white" textColor="secondary" class="w-full md:w-1/2">Add to Cart</Button>
                    <Button :is-link="true" :url="{path: 'shop'}" fill="secondary" textColor="white" class="w-full md:w-1/2">Pay Now</Button>
                </div>
                <hr class="w-full my-4 border-gray-300" />
                <div class="flex items-center gap-2 text-lg md:text-sm">
                    <img src="/public/storage/icons/help.png" class="w-5 h-5" alt="Help" />
                    <p>Need some help? </p>
                    <Link href="/" class="text-secondary">Contact Us</Link>
                </div>
            </div>
        </div>
        <hr class="w-full mb-4 border-gray-300" />
        <div class="mt-4 md:mx-24">
            <div class="flex gap-4 py-6">
                <button @click="showDescription = true" :class="{'font-bold underline': showDescription}">Description</button>
                <button @click="showDescription = false" :class="{'font-bold underline': !showDescription}">Reviews ({{ product.reviews.length }})</button>
            </div>
            <div v-if="showDescription" v-html="product.details" class="mt-2"></div>
            <div v-else class="mt-2">
                <div v-if="product.reviews.length === 0" class="text-gray-500">There are no reviews for this product.</div>
                <div v-else>
                    <div v-for="review in product.reviews" :key="review.id" class="mb-4">
                        <p class="font-semibold">{{ review.user.name }}</p>
                        <p class="text-sm text-gray-600">{{ review.comment }}</p>
                        <p class="text-sm text-yellow-500">Rating: {{ review.rating }}/5</p>
                    </div>
                </div>
            </div>
        </div>
    </BaseLayout>
</template>

<script setup>
import BaseLayout from '@//Layouts/BaseLayout.vue'
import Button from '@/Components/Button.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import { toast } from 'vue3-toastify'
import { incrementCartCount } from '@/stores/cartStore';
import { addProductToCart } from '../../helpers/globalHelper';

const quantity = ref(1)

const incrementQuantity = () => {
    quantity.value++
}

const decrementQuantity = () => {
    if (quantity.value > 1) {
        quantity.value--
    }
}
const props = defineProps({
    product: Object
})

const form = useForm({
    product: props.product
});

const showDescription = ref(true);

const addToCart = () => {
    addProductToCart(form, props.product, quantity.value)
};

const updateProduct = (item, operation) => {
    updateProductQuantity(item, operation)
}
</script>

<style scoped>
/* Add your styles here */
</style>
