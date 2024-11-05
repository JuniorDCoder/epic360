<template>
    <div class="flex lg:flex-row flex-col w-full lg:px-20 px-1 gap-4 lg:mt-2 justify-between">
        <ShopWithUs v-for="reason in shopWithUs" :reason="reason"/>
    </div>
</template>

<script setup>
defineProps({
    shopWithUs: Array
})

import ShopWithUs from "../ShopWithUs.vue";
</script>

<style lang="scss" scoped>

</style>
