<template>
    <BaseLayout>
        <img data-aos="fade-up" data-aos-delay=300 src="../assets/hero.png" alt="Hero" class="py-12">
        <div data-aos="fade-up" data-aos-delay=300 class="flex flex-col items-center justify-center gap-4">
            <h1 class="md:text-4xl text-3xl font-bold text-primary-text">Optimized Elegance</h1>
            <p class="text-primary-text">Experience gadgets in a whole new way.</p>
            <Button :is-link="true" :url="{path: 'shop'}">Shop Now</Button>
        </div>
        <div data-aos="fade-up" data-aos-delay=300 data-aos-duration=600 class="flex my-12 flex-col items-center gap-4 w-full">
            <h3 class="md:text-4xl text-3xl text-center text-primary-text font-semibold">Every <span class="text-blue-500">Tech</span> category just a click away</h3>
            <Carousel autoplay="3000" :items-to-show="6" :breakpoints="breakpoints">
                <Slide v-for="slide in categories" class="" :key="slide">
                    <Link :href="route('welcome')" class="flex flex-col gap-2">
                        <img :src="slide.image" alt="Product" />
                        <span class="text-primary-text text-xl">{{slide.name}}</span>
                    </Link>
                </Slide>

                <template #addons>
                    <Navigation />

                </template>
            </Carousel>
        </div>
        <div class="flex my-12 flex-col items-center gap-4 w-full lg:px-16">
            <h3 data-aos="fade-up" data-aos-delay=300 data-aos-duration=600 class="text-4xl text-primary-text font-semibold mb-3">Our Products</h3>
            <Carousel autoplay="2500" :items-to-show="4" :breakpoints="breakpoints">
                <Slide v-for="slide in categories" :key="slide" class="">
                    <Link :href="route('welcome')" class="flex bg-white shadow-md items-start rounded-md p-6 flex-col gap-2">
                        <div class="flex flex-col items-start">
                            <span class="text-primary-text text-2xl font-semibold">{{slide.name}}</span>
                            <span class="text-primary-text text-lg">Starting from €160.00</span>
                        </div>
                        <img :src="slide.image" class="lg:p-8 p-16" alt="Product" />
                    </Link>
                </Slide>

                <template #addons>
                    <Navigation />
                    <Pagination />
                </template>
            </Carousel>
        </div>
        <div data-aos="fade-up" data-aos-delay=300 data-aos-duration=600 class="flex my-12 flex-col items-center gap-4 w-full">
            <h3 class="md:text-4xl text-3xl text-center text-primary-text font-semibold">Our <span class="text-blue-500">Latest</span> and <span class="text-blue-500">Greatest</span></h3>
            <p class="text-primary-text text-center text-2xl">Advanced ecosystems at your disposal</p>
           <LatestProducts :products="[
               {name: 'JBL Charge 5 Portable Bluetooth speaker', price: '€160.00', image: RedJbl},
                {name: 'Sony WH-1000XM4 Wireless Headphones', price: '€160.00', image: Sony},
                {name: 'Apple MacBook Pro 13-inch', price: '€160.00', image: Laptop}
           ]"/>
        </div>

        <div class="flex my-12 flex-col items-center gap-4 w-full lg:px-16" data-aos="fade-up" data-aos-delay=300 data-aos-duration=600 >
            <h3 class="lg::text-4xl text-3xl text-primary-text font-semibold mb-3">Reasons to shop with us</h3>
            <ShopWithUs :shop-with-us="shopWithUs"/>
        </div>
    </BaseLayout>
</template>

<script setup>
import {Link} from "@inertiajs/vue3";
import BaseLayout from '../Layouts/BaseLayout.vue'
import Button from '../Components/Button.vue';
import 'vue3-carousel/dist/carousel.css'
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel'

import Headphone from '../assets/products/headphone.png'
import Computer from '../assets/categories/computer.png'
import Drone from '../assets/categories/drone.png'
import Earpod from '../assets/categories/earpod.png'
import Mic from '../assets/categories/mic.png'
import Speaker from '../assets/categories/speaker.png'
import Watch from '../assets/categories/watch.png'
import LatestProducts from "../Components/Sections/LatestProducts.vue";

import RedJbl from '../assets/latest/red_jbl.png'
import Sony from '../assets/latest/sony.png'
import Laptop from '../assets/latest/laptop.png'
import ShopWithUs from "../Components/Sections/ShopWithUs.vue";

import Support from '../assets/icons/support.png'
import Car from '../assets/icons/car.png'
import Security from '../assets/icons/security.png'

const shopWithUs = [
    { image: Support, description: '<span class="text-[#32CD32]"">24/7 responsive customer support</span>, ensuring your <span class="text-[#32CD32]">questions</span> and <span class="text-[#32CD32]">concerns</span> are <span class="text-[#32CD32]">resolved swiftly</span>.' },
    { image: Car, description: '<span class="text-[#FF4500]">Fast delivery</span> within <span class="text-[#FF4500]">Europe</span> with <span class="text-[#FF4500]">reliable and prompt shipping options tailored</span> to <span class="text-[#FF4500]">your needs</span>.' },
    { image: Security, description: '<span class="text-[#007AFF]">Our secure</span> and <span class="text-[#007AFF]">encrypted payment systems, ensures worry-free transactions every time</span>.' }
];

const categories = [
    {name : "Headphones", image: Headphone},
    {name : "Computers", image: Computer},
    {name : "Drones", image: Drone},
    {name : "EarPods", image: Earpod},
    {name : "Microphones", image: Mic},
    {name : "Speakers", image: Speaker},
    {name : "Watches", image: Watch},

];

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
