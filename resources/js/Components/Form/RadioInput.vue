<script setup xmlns="http://www.w3.org/1999/html">
import {ref} from 'vue';

defineProps([
    'modelValue',
    'options',
    'name',
]);

defineEmits(['update:modelValue']);

const input = ref(null);

defineExpose({focus: () => input.value.focus()});
</script>

<template>
    <div class="radio-button-group">
        <label :for="value" v-for="(label, value) in options">
            <input
                :checked="modelValue === value"
                type="radio"
                :name="name"
                :value="value"
                :id="value"
                @change="$emit('update:modelValue', $event.target.value)"
            />
            {{ label }}
        </label>
    </div>
</template>
