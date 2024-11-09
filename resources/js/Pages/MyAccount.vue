<template>
    <BaseLayout>
        <div class="flex flex-col w-full py-4">
            <h1 class="py-5 text-[16px] md:font-semibold md:text-3xl md:ml-24 text-primary-text">Sign up for faster checkout</h1>
            <div class="flex flex-col items-center justify-between w-full gap-6 md:flex-row md:my-12 my-9 md:px-24">

                <!-- Form Section -->
                <form class="flex flex-col w-full gap-6 md:gap-2 md:w-1/3">
                    <InputField label="Enter Name" placeholder="Enter your name" />
                    <InputField label="Enter Email" placeholder="Enter your email" type="email" />
                    <InputField label="Enter Password" placeholder="Enter your password" type="password" />

                    <button class="w-full p-3 my-3 text-center text-white rounded-xl bg-primary-text">Sign Up</button>

                    <div class="flex flex-row gap-3">
                        <input type="checkbox" name="" id="">
                        <span class="text-sm text-primary-text">Remember me</span>
                    </div>

                    <p class="text-sm text-primary-text">
                      By signing up, you agree to our
                      <Link class="text-secondary">privacy policy</Link>
                    </p>

                    <div class="flex flex-row items-center gap-3">
                        <span class="text-sm text-primary-text">Already have an account? </span>
                        <Link class="flex items-center gap-1 text-sm text-secondary">
                          <p>Log in</p>
                          <img class="w-3 h-4" src="/public/storage/icons/right-up.png" />
                        </Link>
                    </div>
                </form>

               <img src="/public/storage/icons/line.png"  class="h-[350px] hidden md:block"/>
               <hr class="w-full my-4 border-gray-400 md:hidden" />

                <!-- Continue as Guest Section -->
                <div class="flex flex-col items-center w-full md:w-1/3">
                    <p class="text-sm text-primary-text">Proceed and create an account later</p>
                    <Link :href="route('shop')" class="w-full p-3 my-3 text-center text-white rounded-xl bg-primary-text">Continue as Guest</Link>
                </div>
            </div>
        </div>
    </BaseLayout>
</template>

<script setup>
import BaseLayout from '@/Layouts/BaseLayout.vue';
import { Link } from '@inertiajs/vue3';
import InputField from '../Components/InputField.vue';
</script>

<style scoped>
/* Scoped styling for your main component */
</style>
