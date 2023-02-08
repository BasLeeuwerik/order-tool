<script setup>
defineProps({
    type: {
        type: String,
        default: 'button',
    },
    href: String,
    disabled: {
        disabled: Boolean,
        default: false,
    },
});
</script>

<template>
    <a
        :href="href"
        class="link_button"
    >
        <slot/>
    </a>
</template>
