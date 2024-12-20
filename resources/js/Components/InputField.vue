<template>
    <div class="flex flex-col gap-3 md:gap-2">
      <label v-if="label" class="text-sm" :for="inputId">{{ label }}</label>
      <input
        :id="inputId"
        v-model="model"
        :type="type"
        :placeholder="placeholder"
        class="p-3 border border-gray-400 rounded-md md:p-2"
      />
    </div>
  </template>

  <script setup>
  import { computed } from 'vue';
  import { defineProps } from 'vue';

  const model = defineModel({
    type: String,
    required: true,
});

  const props = defineProps({
    label: { type: String, required: true },
    placeholder: { type: String, required: true },
    type: { type: String, default: 'text' }
  });

  const inputId = computed(() => props.label.replace(/\s+/g, '-').toLowerCase());
  </script>

  <style scoped>
  /* Optional: add styles for this component */
  </style>
