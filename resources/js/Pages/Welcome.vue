<template>
    <Head title="Welcome" />
    <BaseLayout>
        <img data-aos="fade-up" data-aos-delay=300 src="../assets/hero.png" alt="Hero" class="py-12">
        <div data-aos="fade-up" data-aos-delay=300 class="flex flex-col items-center justify-center gap-4">
            <h1 class="text-3xl font-bold md:text-4xl text-primary-text">Optimized Elegance</h1>
            <p class="text-primary-text">Experience gadgets in a whole new way.</p>
            <Button :is-link="true" :url="{path: 'shop'}" :rounded="true" fill="secondary" textColor="white">Shop Now</Button>
        </div>
        <div data-aos="fade-up" data-aos-delay=300 data-aos-duration=600 class="flex flex-col items-center w-full gap-4 my-12">
            <h3 class="text-3xl font-semibold text-center md:text-4xl text-primary-text">Every <span class="text-blue-500">Tech</span> category just a click away</h3>
            <Carousel autoplay="3000" :items-to-show="6" :breakpoints="breakpoints">
                <Slide v-for="slide in categories" class="" :key="slide">
                    <Link :href="route('shop')" class="flex flex-col gap-2">
                        <img :src="`/storage/`+slide.image" alt="Product" />
                        <span class="text-xl text-primary-text">{{slide.name}}</span>
                    </Link>
                </Slide>

                <template #addons>
                    <Navigation />

                </template>
            </Carousel>
        </div>
        <div class="flex flex-col items-center w-full gap-4 my-12 lg:px-16">
            <h3 data-aos="fade-up" data-aos-delay=300 data-aos-duration=600 class="mb-3 text-4xl font-semibold text-primary-text">Our Products</h3>
            <Carousel autoplay="2500" :items-to-show="4" :breakpoints="breakpoints">
                <Slide v-for="slide in categories" :key="slide" class="">
                    <Link :href="route('shop')" class="flex flex-col items-start gap-2 p-6 bg-white rounded-md shadow-md">
                        <div class="flex flex-col items-start">
                            <span class="text-2xl font-semibold text-primary-text">{{slide.name}}</span>
                            <span class="text-lg text-primary-text">Starting from €{{slide.starting_price}}</span>
                        </div>
                        <img :src="`/storage/`+slide.image" class="p-16 lg:p-8" alt="Product" />
                    </Link>
                </Slide>

                <template #addons>
                    <Navigation />
                    <Pagination />
                </template>
            </Carousel>
        </div>
        <div data-aos="fade-up" data-aos-delay=300 data-aos-duration=600 class="flex flex-col items-center w-full gap-4 my-12">
            <h3 class="text-3xl font-semibold text-center md:text-4xl text-primary-text">Our <span class="text-blue-500">Latest</span> and <span class="text-blue-500">Greatest</span></h3>
            <p class="text-2xl text-center text-primary-text">Advanced ecosystems at your disposal</p>
           <LatestProducts :products="latestProducts"/>
        </div>

        <div class="flex flex-col items-center w-full gap-4 my-12 lg:px-16" data-aos="fade-up" data-aos-delay=300 data-aos-duration=600 >
            <h3 class="mb-3 text-3xl font-semibold lg::text-4xl text-primary-text">Reasons to shop with us</h3>
            <ShopWithUs :shop-with-us="shopWithUs"/>
        </div>
    </BaseLayout>
</template>

<script setup>
import {Link, Head} from "@inertiajs/vue3";
import BaseLayout from '../Layouts/BaseLayout.vue'
import Button from '../Components/Button.vue';
import 'vue3-carousel/dist/carousel.css'
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel'


import LatestProducts from "../Components/Sections/LatestProducts.vue";

import ShopWithUs from "../Components/Sections/ShopWithUs.vue";

import Support from '../assets/icons/support.png'
import Car from '../assets/icons/car.png'
import Security from '../assets/icons/security.png'

const shopWithUs = [
    { image: Support, description: '<span class="text-[#32CD32]"">24/7 responsive customer support</span>, ensuring your <span class="text-[#32CD32]">questions</span> and <span class="text-[#32CD32]">concerns</span> are <span class="text-[#32CD32]">resolved swiftly</span>.' },
    { image: Car, description: '<span class="text-[#FF4500]">Fast delivery</span> within <span class="text-[#FF4500]">Europe</span> with <span class="text-[#FF4500]">reliable and prompt shipping options tailored</span> to <span class="text-[#FF4500]">your needs</span>.' },
    { image: Security, description: '<span class="text-[#007AFF]">Our secure</span> and <span class="text-[#007AFF]">encrypted payment systems, ensures worry-free transactions every time</span>.' }
];

defineProps({
    categories: [Array, Object],
    latestProducts: [Array, Object]
})

const breakpoints = {
    320: { itemsToShow: 1, snapAlign: 'center' },  // Mobile portrait
    480: { itemsToShow: 2, snapAlign: 'center' },  // Mobile landscape
    768: { itemsToShow: 3, snapAlign: 'center' },  // Tablet portrait
    1024: { itemsToShow: 4, snapAlign: 'center' }, // Tablet landscape
    1280: { itemsToShow: 4, snapAlign: 'center' }, // Desktop small
    1440: { itemsToShow: 4, snapAlign: 'center' }, // Desktop medium
    1600: { itemsToShow: 7, snapAlign: 'center' }, // Desktop large
};
</script>

<style  scoped>

</style>
