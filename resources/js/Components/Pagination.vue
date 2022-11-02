<template>
    <div class="flex gap-3">
        <Link v-for="link in links"
              :href="link.url"
              :key="link.label"
              :class="{ 'font-bold': link.active }"
              v-html="link.label">

        </Link>
    </div>
</template>


<script setup>
import { Link } from '@inertiajs/inertia-vue3';


defineProps({
    links: {
        type: Array,
        required: true,
    },
});

</script>
