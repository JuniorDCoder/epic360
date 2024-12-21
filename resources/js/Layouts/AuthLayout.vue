<template>
    <div class="flex w-full h-full gap-0 overflow-x-hidden">
        <Sidebar class="w-[15%]" />
        <div class="flex-1 h-full bg-primary w-[85%] md:ml-[15%]">
            <Header />
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
