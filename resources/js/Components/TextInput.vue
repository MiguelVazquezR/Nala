<script setup>
import { onMounted, ref } from 'vue';

defineProps({
    modelValue: String,
});

defineEmits(['update:modelValue']);

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <input
        ref="input"
        class="h-9 w-full bg-transparent border placeholder:text-gray-400 border-secondary text-gray-600 text-sm rounded-md focus:ring-0 focus:border-2 focus:border-secondary block p-2.5"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
    >
</template>
