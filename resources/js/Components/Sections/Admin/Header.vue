<template>
    <div class="fixed z-30 flex items-center justify-between w-full h-24 py-4 px-9 bg-primary-text">
        <input type="text" placeholder="Search.." class="p-3 rounded-2xl">
        <div class="flex md:pr-64 gap-4 h-[90%]">
            <div class="relative flex items-center p-3 border border-white rounded-full cursor-pointer">
                <img src="/public/storage/icons/bell.png"  class="w-10 h-10" alt="Notifications">
                <div  class="absolute flex items-center justify-center w-5 h-5 text-xs text-white bg-red-500 rounded-full bottom-9 left-9">
                   4
                </div>
            </div>
            <div class="relative">
                <div class="flex items-center py-2 pl-1 pr-3 bg-white rounded-l-full rounded-r-full cursor-pointer gap-9" @click="toggleDropdown">
                    <img src="/public/storage/icons/avatar.png" class="w-10 h-10" alt="">
                    <p class="text-primary-text" :class="{'rotate-180': isDropdownOpen}">&#9660;</p> <!-- Down arrow with rotation if dropdown is open-->
                </div>
                <transition name="fade">
                    <div v-if="isDropdownOpen" class="absolute right-0 z-10 w-48 mt-2 bg-white rounded-md shadow-lg">
                        <ul class="py-1">
                            <li>
                                <Link href="" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Profile</Link>
                            </li>
                            <li>
                                <form @submit.prevent="logout">
                                    <button type="submit" class="block w-full px-4 py-2 text-left text-gray-800 hover:bg-gray-100">
                                        Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </transition>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import { Link, useForm } from '@inertiajs/vue3';
import { toast } from 'vue3-toastify';

const isDropdownOpen = ref(false);

const toggleDropdown = () => {
    isDropdownOpen.value = !isDropdownOpen.value;
};

const form = useForm({})

const logout = () => {
    form.post(route('logout'), {
        onSuccess: () => {
            toast.info('Logged out successfully');
        },
        onError: () => {
            toast.error('An error occurred. Please try again');
        }
    });

}
</script>

<style scoped>
.fade-enter-active, .fade-leave-active {
  transition: opacity 0.5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active in <2.1.8 */ {
  opacity: 0;
}
</style>
