<template>
    <BaseLayout>
        <div class="flex flex-col w-full py-4">
            <h1 class="pb-5 text-4xl font-semibold md:ml-24 text-primary-text">Cart</h1>
            <div  v-if="count > 0">
                <div data-aos="fade-up" data-aos-delay=300 data-aos-duration=600 v-for="product in cartItems" class="flex flex-col items-center justify-between gap-4 md:flex-row md:px-24">
                    <img :src="`/storage/`+product.options.image" alt="Product" class="md:w-1/3">
                    <div class="flex flex-col md:gap-16 md:w-1/2">
                        <div class="flex flex-col items-end justify-between gap-6 md:items-center md:flex-row">
                            <span class="text-2xl font-semibold md:w-1/2 text-primary-text">{{product.name}}</span>
                            <div class="flex w-1/3 md:w-1/5 items-center justify-center md: gap-5 px-4 py-2.5 border border-gray-500 text-gray-700 rounded-sm">
                                <span   @click="decrementQty(product)" class="text-2xl cursor-pointer select-none">-</span>
                                <span class="text-2xl cursor-pointer">{{product.qty}}</span>
                                <span @click="incrementQty(product)" class="text-2xl cursor-pointer select-none" >+</span>
                            </div>
                            <div class="flex flex-col items-end gap-2">
                                <div class="flex gap-6">
                                    <p v-if="product.options.actual_price" class="font-semibold text-gray-700 line-through text-md md:text-sm">€{{ product.options.actual_price* product.qty }}</p>
                                    <p v-else class="text-gray-700 text-md md:text-smfont-semibold">€{{ product.price * product.qty }}</p>
                                    <p v-if="product.options.actual_price !== product.price" class="font-semibold text-gray-700 text-md md:text-sm">€{{ product.price * product.qty}}</p>
                                </div>
                                <span class="text-primary-text">Save €{{(product.options.actual_price - product.price)* product.qty }}</span>
                                <span @click="removeCartItem(product)" class="font-semibold cursor-pointer text-md md:text-sm text-secondary">Remove</span>
                            </div>

                        </div>
                        <div class="flex flex-col">
                            <hr class="w-full my-4 border-gray-300" />
                            <div class="flex items-center gap-2 text-sm">
                                <Link href="/" class="text-secondary">Find out how soon you can get this product</Link>
                                <img src="/public/storage/icons/help.png" class="w-5 h-5" alt="Help" />
                            </div>
                        </div>

                    </div>

                </div>
                <div class="my-12 md:mx-24">
                    <hr class="mb-4 border-gray-300" />
                </div>

                <div data-aos="fade-up" data-aos-delay="300" data-aos-duration="600" class="flex w-full md:justify-end">
                    <div class="flex flex-col w-full text-sm gap-7 md:items-end md:px-24 md:w-1/2 text-primary-text">
                        <div class="flex items-center justify-between w-full cursor-pointer" @click="toggleCouponInput">
                            <span>Add a coupon</span>
                            <p class="text-secondary" :class="{'rotate-180': showCouponInput}">&#9660;</p> <!-- Down arrow with rotation -->
                        </div>

                        <!-- Coupon Input Field -->
                        <transition name="slide-fade">
                            <input v-if="showCouponInput" type="text" placeholder="Enter coupon code" class="w-full px-4 py-2 mt-2 transition-all duration-300 border border-gray-300 rounded-sm" />
                        </transition>

                        <!-- Cart Totals -->
                        <div class="flex items-center justify-between w-full">
                            <span>Sub Total</span>
                            <p>€2340</p>
                        </div>
                        <div class="flex items-center justify-between w-full">
                            <span>Shipping</span>
                            <p>-€</p>
                        </div>
                        <hr class="w-full border-gray-300" />
                        <div class="flex items-center justify-between w-full">
                            <span class="text-2xl font-semibold">Total</span>
                            <p class="text-2xl font-semibold">€2340</p>
                        </div>
                        <Button class="w-full" fill="secondary" textColor="white" :rounded="true">Proceed to Check Out</Button>
                        <Link :href="route('shop')" class="flex gap-3 text-sm text-secondary"><p><</p> Return to Shop Page</Link>
                    </div>
                </div>
            </div>

            <div v-else>
                <div class="flex flex-col items-center justify-center gap-6">
                    <img src="/public/storage/icons/face.png" alt="">
                    <h1 class="pb-5 text-2xl font-semibold text-center text-primary-text"> Your cart is currently empty!</h1>
                    <Link :href="route('shop')" class="flex gap-3 text-sm text-secondary">
                        <p>&lt;</p> Shop
                    </Link>
                </div>
                <h1 class="pb-5 mt-6 text-4xl font-semibold text-center text-primary-text">New Arrivals</h1>
                <LatestProducts :products="latestProducts"/>
            </div>
        </div>

    </BaseLayout>
</template>

<script setup>
import BaseLayout from '@/Layouts/BaseLayout.vue'
import Button from '../../Components/Button.vue';
import { useForm, Link } from '@inertiajs/vue3';
import { toast } from 'vue3-toastify';
import { ref } from 'vue';
import { decrementCartCount } from '@/stores/cartStore';
import LatestProducts from '../../Components/Sections/LatestProducts.vue';

const props = defineProps({
    cartItems: Array,
    count: Number,
    latestProducts: Array
});


const showCouponInput = ref(false);

const toggleCouponInput = () => {
    showCouponInput.value = !showCouponInput.value;
};

const incrementQty = (item) => {
    if (item.qty >= 1) {
        item.qty++;
    }
};

const decrementQty = (item) => {
    if (item.qty > 1) {
        item.qty--;
    }
};

const form = useForm({});

const removeCartItem = (item) => {
    const productName = item.name;
    const productQty = item.qty;
    form.post(route('cart.remove', { id: item.rowId }), {
        onSuccess: () => {
            toast.warn(productName + ' removed from cart!');
            decrementCartCount(productQty);
        }
    });
};
</script>

<style scoped>
.slide-fade-enter-active, .slide-fade-leave-active {
    transition: all 0.5s ease;
}
.slide-fade-enter, .slide-fade-leave-to {
    transform: translateY(-10px);
    opacity: 0;
}
.rotate-180 {
    transform: rotate(180deg);
}
</style>
