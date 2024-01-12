<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button :type="type" class="inline-flex items-center px-4 py-2 bg-primary border border-transparent rounded-full text-xs text-black tracking-widest active:scale-90 disabled:bg-gray-200 disabled:active:scale-100 disabled:cursor-not-allowed transition ease-linear duration-100">
        <slot />
    </button>
</template>
