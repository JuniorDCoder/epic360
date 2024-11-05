<template>
    <Link :href="route">
        <span class="text-primary-text" :class="isActive ? 'underline' : ''">{{ text }}</span>
    </Link>
</template>

<script setup>

import {Link} from "@inertiajs/vue3";
defineProps({
    text: String,
    route: String,
    isActive: Boolean
})
</script>

<style lang="scss" scoped>

</style>
