<script>
import {InertiaLink} from "@inertiajs/inertia-vue3";

export default {
    props: {
        links: Array,
    },
    components: {
        InertiaLink
    }
}
</script>

<template>
    <div v-if="links.length > 3" class="my-4">
        <div class="flex flex-wrap -mb-1">
            <template v-for="(link, key) in links" :key="key">
                <div v-if="link.url === null" class="mr-1 px-4 py-3 text-sm leading-4 text-gray-400 border rounded" v-html="link.label"/>
                <inertia-link
                    v-else
                    :class="'bg-white', { 'bg-indigo-200': link.active }"
                    :href="link.url"
                    class="mr-1 px-4 py-3 text-sm leading-4 border rounded hover:bg-indigo-100 focus:border-indigo-500 focus:text-indigo-500"
                    v-html="link.label"
                />
            </template>
        </div>
    </div>
</template>
