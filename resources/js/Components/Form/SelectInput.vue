<script setup xmlns="http://www.w3.org/1999/html">
import {onMounted, ref} from 'vue';

defineProps([
    'modelValue',
    'placeholderValue',
    'options',
]);

defineEmits(['update:modelValue']);

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

defineExpose({focus: () => input.value.focus()});
</script>

<template>
    <select
        ref="input"
        :value="modelValue"
        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
        @input="$emit('update:modelValue', $event.target.value)"
    >
        <option v-if="placeholderValue" disabled value="">{{ placeholderValue }}</option>
        <option v-for="(label, value) in options" :value="value">{{ label }}</option>
    </select>
</template>
