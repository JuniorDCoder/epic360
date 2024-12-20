<template>
    <div class="flex h-full overflow-x-hidden">
        <Sidebar />
        <div class="flex-1 h-full md:ml-[250px] bg-primary">
            <Header />
            <slot />
        </div>
    </div>
</template>

<script setup>
import Sidebar from '../Components/Sections/Admin/Sidebar.vue';
import Header from '../Components/Sections/Admin/Header.vue';
</script>

<style scoped>

</style>
