<template>
    <component :is="isLink ? Link : 'button'" :href="isLink ? url.path : null" :class="buttonClasses">
        <slot></slot>
    </component>
</template>

<script setup>
import {Link} from "@inertiajs/vue3";
import {defineProps, computed} from 'vue';

const props = defineProps({
    isLink: {
        type: Boolean,
        default: false
    },
    url: {
        type: [Object, String],
        default: '#'
    },
    rounded: {
        type: Boolean,
        default: false
    },
    fill: {
        type: String,
        default: 'white' // 'white' or 'secondary'
    },
    textColor: {
        type: String,
        default: 'secondary' // 'secondary' or 'white'
    }
});

const buttonClasses = computed(() => {
    let classes = 'text-md py-2 px-4 text-center no-underline inline-block cursor-pointer';

    if (props.rounded) {
        classes += ' rounded-full';
    } else {
        classes += ' rounded';
    }

    if (props.fill === 'white') {
        classes += ' bg-white border border-secondary';
    } else if (props.fill === 'secondary') {
        classes += ' bg-secondary';
    }

    if (props.textColor === 'secondary') {
        classes += ' text-secondary';
    } else if (props.textColor === 'white') {
        classes += ' text-white';
    }

    return classes;
});
</script>

<style scoped>
/* Add any additional styles here */
</style>
