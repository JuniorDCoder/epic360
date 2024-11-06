<template>
    <Head title="Product Details"/>
    <BaseLayout>
        <div class="flex w-full gap-4 py-12 md:flex-row">
            <div class="flex flex-col items-center w-1/2 gap-5">
                <img :src="`/storage/` + product.image" alt="Product" class="w-[300px]">
                <div class="flex gap-5 mt-4">
                    <img v-for="image in product.images" :key="image.id" :src="`/storage/` + image.image_path" alt="Product Image" class="w-[100px] h-[100px] object-cover">
                </div>
            </div>
            <div class="flex flex-col w-1/2 gap-3">
                <h1 class="text-2xl font-semibold text-primary-text">{{product.name}}</h1>
                <div class="flex gap-6">
                    <p v-if="product.giveaway_price" class="text-sm font-semibold text-gray-700 line-through">€{{ product.price }}</p>
                    <p v-else class="text-sm font-semibold text-gray-700">€{{ product.price }}</p>
                    <p v-if="product.giveaway_price" class="text-sm font-semibold text-gray-700">€{{ product.giveaway_price }}</p>
                </div>
                <p class="w-4/5 text-gray-700 text-md">{{product.description}} </p>
                <div class="flex items-center justify-center w-1/6 gap-5 px-2 py-2.5 border border-gray-500 text-gray-700 rounded-sm">
                    <span class="text-2xl cursor-pointer">-</span>
                    <span class="text-2xl cursor-pointer">1</span>
                    <span class="text-2xl cursor-pointer">+</span>
                </div>
                <p class="text-gray-700">Category: <span>&nbsp;&nbsp;{{product.category.name}}</span> </p>
                <div class="flex w-2/3 gap-8">
                    <Button @click="addToCart" fill="white" textColor="secondary" class="w-1/2">Add to Cart</Button>
                    <Button :is-link="true" :url="{path: 'shop'}" fill="secondary" textColor="white" class="w-1/2">Pay Now</Button>
                </div>
                <hr class="w-full mb-4 border-gray-300" />
                <div class="flex items-center gap-2 text-sm">
                    <img src="/public/storage/icons/help.png" class="w-5 h-5" alt="Help" />
                    <p>Need some help? </p>
                    <Link href="/" class="text-secondary">Contact Us</Link>
                </div>
            </div>
        </div>
        <hr class="w-full my-4 border-gray-300" />
        <div class="mx-24 mt-4">
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
import { Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue';
import { toast } from 'vue3-toastify'

const props = defineProps({
    product: Object
})

const showDescription = ref(true);

const addToCart = () => {
    toast.success(props.product.name+` added to cart!`);
};
</script>

<style scoped>
/* Add your styles here */
</style>
