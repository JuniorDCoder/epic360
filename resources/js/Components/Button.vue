<template>
    <component :is="isLink ? Link : 'button'" :href="isLink ? url.path : null" class="bg-blue-500 text-md text-white py-2 px-4 rounded-xl text-center no-underline inline-block cursor-pointer">
        <slot></slot>
    </component>
</template>

<script setup>
import {Link} from "@inertiajs/vue3";
import {defineProps} from 'vue';

const props = defineProps({
    isLink: {
        type: Boolean,
        default: false
    },
    url: {
        type: [Object, String],
        default: '#'
    }
});
</script>
