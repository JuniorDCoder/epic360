<template>
    <BaseLayout>
        <div class="relative flex items-center justify-center w-full h-screen">
            <img src="/public/storage/images/login.png" alt="Background" class="absolute inset-0 z-0 object-cover w-full h-full">
            <form @submit.prevent="handleSubmit" class="relative z-10 flex flex-col w-full p-6 mx-4 bg-white rounded-md md:px-24 md:w-1/2 bg-opacity-90 md:mx-0">
                <div class="flex flex-col items-center">
                    <h1 class="py-5 text-[32px] md:font-semibold md:text-3xl text-primary-text">Login</h1>
                    <p class="text-sm text-primary-text">Welcome back, you were missed</p>
                </div>
                <div class="flex flex-col gap-3 my-5">
                    <div class="flex flex-col gap-1">
                        <InputField label="Enter Email" placeholder="Enter your email" type="email" v-model="form.email" />
                        <span v-if="form.errors.email" class="text-sm text-red-500">
                            {{ form.errors.email }}
                        </span>
                    </div>
                    <div class="flex flex-col gap-4 my-5">
                        <InputField label="Enter Password" placeholder="Enter your password" type="password" v-model="form.password" />
                        <span v-if="form.errors.password" class="text-sm text-red-500">
                            {{ form.errors.password }}
                        </span>
                    </div>
                    <div class="flex flex-row gap-3">
                        <input type="checkbox" name="" id="">
                        <span class="text-sm text-primary-text">Remember me</span>
                    </div>
                    <button type="submit" class="w-full p-3 my-3 text-center text-white rounded-xl bg-primary-text">Log in</button>
                    <div class="flex flex-row items-center gap-3">
                        <span class="text-sm text-primary-text">Don't have an account? </span>
                        <Link :href="route('user.account')" class="flex items-center gap-1 text-sm text-secondary">
                          <p>Create Account</p>
                          <img class="w-3 h-4" src="/public/storage/icons/right-up.png" />
                        </Link>
                    </div>
                </div>
            </form>
        </div>
    </BaseLayout>
</template>

<script setup>
import BaseLayout from '@/Layouts/BaseLayout.vue'
import InputField from '@/Components/InputField.vue';
import { useForm, Link } from '@inertiajs/vue3';
import { toast } from 'vue3-toastify';

const form = useForm({
    email: '',
    password: '',
});

const handleSubmit = () => {
    form.post(route('user.login'), {
        onSuccess: () => {
            toast.success("Logged in successfully!");
        },
        onError: () => {
            toast.error("Failed to log in. Please check your credentials.");
        }
    });
};
</script>

<style scoped>
/* Add any additional styles here */
</style>
