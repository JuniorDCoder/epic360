<template>
    <div class="bg-[#333333] w-full p-7 lg:p-12 lg:flex text-[#F0F0F0] flex lg:flex-row gap-6 flex-col justify-between">
        <div class="flex flex-col gap-4">
            <img alt="Logo Footer" src="../../assets/logo-footer.png" class="w-12 h-12">
            <div class="flex flex-col gap-4">
                <h3 class="font-semibold text-xl">About</h3>
                <p class="text-sm lg:w-1/2 leading-6">At Epic360.online, we are bring innovative gadgets to your doorstep</p>
            </div>
            <div class="flex flex-col gap-4">
                <h3 class="font-semibold text-xl">More</h3>
                <Link>Privacy</Link>
                <Link>Return Policy</Link>
                <Link>Terms of Service</Link>
            </div>
        </div>
        <div class="flex flex-col gap-4">

            <div class="flex flex-col gap-4">
                <h3 class="font-semibold text-xl">Quick Links</h3>
                <div class="flex flex-col gap-4">
                    <Link>Support</Link>
                    <Link>Home</Link>
                    <Link>Shop</Link>
                    <Link>My Account</Link>
                </div>
            </div>

        </div>
        <div class="flex flex-col gap-4">
            <div class="flex flex-col gap-4">
                <h3 class="font-semibold text-xl">Join the community</h3>
                <p class="text-sm leading-6">Learn about new products and discounts</p>
            </div>
            <div class="flex flex-row gap-4">

                <Link>Privacy</Link>
                <Link>Return Policy</Link>
                <Link>Terms of Service</Link>
            </div>
        </div>

    </div>
    <p class="bg-[#333333] text-[#F0F0F0] text-center py-3 mt-[-3]">
        ©{{ new Date().getFullYear() }} Epic360.online. All Rights Reserved.
    </p>

</template>

<script setup>
import {Link} from "@inertiajs/vue3";
</script>

<style lang="scss" scoped>

</style>
