<template>
    <div class="bg-white h-36 p-6">
        <div class="text-2l">{{ topic.name }}</div>
        <div class="text-gray-500">{{ topic.description }}</div>
    </div>
</template>

<script setup>

defineProps(['topic'])

</script>
