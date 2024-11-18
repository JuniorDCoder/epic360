<template>
    <BaseLayout>
        <div class="flex flex-col w-full py-4">
            <h1 v-if="$page.props.auth.user" class="py-5 text-[16px] md:font-semibold md:text-3xl md:ml-24 text-primary-text">Manage Account</h1>
            <h1  v-if="!$page.props.auth.user" class="py-5 text-[16px] md:font-semibold md:text-3xl md:ml-24 text-primary-text">Sign up for faster checkout</h1>
            <div  v-else class="flex items-center gap-2 md:ml-24">
                <span class="text-[#292929] font-semibold">Personal Info</span>
                <img src="/public/storage/icons/pencil.png" class="w-6 h-6 cursor-pointer" alt="">
            </div>

            <div v-if="$page.props.auth.user" class="flex w-full flex-col md:px-6 pt-2 pb-20 items-center justify-between md:w-[85.5%] mx-auto border border-gray-500 md:flex-row md:my-3 my-9">
               <div class="flex flex-col gap-3">
                    <h3 class="font-semibold text-primary-text text-md">Name</h3>
                    <p class="text-sm text-primary-text">{{$page.props.auth.user.name}}</p>
               </div>
               <div class="flex flex-col gap-3">
                    <h3 class="font-semibold text-primary-text text-md">Email</h3>
                    <p class="text-sm text-primary-text">{{$page.props.auth.user.email}}</p>
                </div>
                <div class="flex flex-col gap-3">
                    <h3 class="font-semibold text-primary-text text-md">Phone</h3>
                    <p class="text-sm text-primary-text">{{$page.props.auth.user.phone?$page.props.auth.user.phone : 'Not Available'}}</p>
                </div>
                <div class="flex flex-col gap-3">
                    <h3 class="font-semibold text-primary-text text-md">Address</h3>
                    <p class="text-sm text-primary-text">{{$page.props.auth.user.phone?$page.props.auth.user.address : 'No shipping address set!'}}</p>
                </div>
            </div>


            <div v-else class="flex flex-col items-center justify-between w-full gap-6 md:flex-row md:my-12 my-9 md:px-24">

                <!-- Form Section -->
                <form @submit.prevent="submit" class="flex flex-col w-full gap-6 md:gap-2 md:w-1/3">
                    <InputField label="Enter Name" placeholder="Enter your name" v-model="form.name" />
                    <span v-if=" form.errors.name " class="text-sm text-red-500">
                        {{ form.errors.name }}
                    </span>
                    <InputField label="Enter Email" placeholder="Enter your email" type="email" v-model="form.email" />
                    <span v-if=" form.errors.email " class="text-sm text-red-500">
                        {{ form.errors.email }}
                    </span>
                    <InputField label="Enter Password" placeholder="Enter your password" type="password" v-model="form.password" />
                    <span v-if=" form.errors.password " class="text-sm text-red-500">
                        {{ form.errors.password }}
                    </span>
                    <InputField label="Confirm Password" placeholder="Confirm your password" type="password" v-model="form.password_confirmation" />

                    <button type="submit" class="w-full p-3 my-3 text-center text-white rounded-xl bg-primary-text">Sign Up</button>

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
                        <Link :href="route('login')"class="flex items-center gap-1 text-sm text-secondary">
                          <p>Log in</p>
                          <img class="w-3 h-4" src="/public/storage/icons/right-up.png" />
                        </Link>
                    </div>
                </form>

                <img src="/public/storage/icons/line.png" class="h-[350px] hidden md:block"/>
                <hr class="w-full my-4 border-gray-400 md:hidden" />

                <!-- Continue as Guest Section -->
                <div class="flex flex-col items-center w-full md:w-1/3">
                    <p class="text-sm text-primary-text">Proceed and create an account later</p>
                    <Link :href="route('shop')" class="w-full p-3 my-3 text-center text-white rounded-xl bg-primary-text">Continue as Guest</Link>
                </div>
            </div>
            <div @click="logout" class="cursor-pointer md:ml-24" v-if="$page.props.auth.user">
                <img src="/public/storage/icons/logout.png" class="w-8 h-8" alt="">
            </div>
        </div>
    </BaseLayout>
</template>

<script setup>
import BaseLayout from '@/Layouts/BaseLayout.vue';
import { Link, useForm } from '@inertiajs/vue3';
import InputField from '@/Components/InputField.vue';
import { toast } from 'vue3-toastify';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: ''
});

const submit = () => {
    form.post(route('user.register'), {
        onSuccess: () => {
            form.reset();
            toast.success('Registered successfully!');
        },
        onError: () => {
            toast.error('Failed to register. Please check your credentials.');
        }
    });
};

const logout = () => {
    form.post(route('logout'), {
        onSuccess: () => {
            toast.success('Logged out successfully!');
        },
        onError: () => {
            toast.error('Failed to log out. Please try again.');
        }
    });
};
</script>

<style scoped>
/* Scoped styling for your main component */
</style>
