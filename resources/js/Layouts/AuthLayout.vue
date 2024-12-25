<template>
    <div class="flex w-full h-full gap-0 overflow-x-hidden">
        <Sidebar class="w-[17%]" />
        <div class="flex-1 h-full bg-primary w-[83%] md:ml-[16%]">
            <Header class="md:ml-[1%]" />
            <div class="">
                <slot />
            </div>

        </div>
    </div>
</template>

<script setup>
import Sidebar from '../Components/Sections/Admin/Sidebar.vue';
import Header from '../Components/Sections/Admin/Header.vue';
</script>

<style scoped>

</style>
