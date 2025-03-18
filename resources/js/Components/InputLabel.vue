<script setup>
defineProps({
    value: {
        type: String,
    },
});
</script>

<template>
    <label class="bg-gradient-to-r from-gray-100 to-indigo-100 block text-sm font-medium text-gray-700">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>
