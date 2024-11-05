<template>
    <div class="overflow-x-hidden">
        <Header />
        <main class="flex flex-col items-center bg-primary lg:px-0 px-4">
            <slot />
        </main>

        <Footer />
    </div>
</template>

<script setup>

import Header from "../Components/Sections/Header.vue";
import Footer from "../Components/Sections/Footer.vue";
</script>

<style scoped>

</style>
