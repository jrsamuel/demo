
<template>

    <Head title="Hygraph" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl leading-tight text-gray-800">
                Hygraph
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="bg-white shadow-sm overflow-hidden sm:rounded-lg">
                    <div class="bg-white border-b border-gray-200 p-6">

                        <div v-for="part in bodyParts"
                             :key="part.name">
                            {{ part.name }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import { useHygraph } from '@/Composables/useHygraph';
import { onBeforeMount, ref } from 'vue';

const bodyParts = ref(null);
const { client, gql } = useHygraph();

onBeforeMount(async () => {
    try {
        const data = await client.request(
            gql`
             {
                bodyParts {
                    id
                    name

                }
            }
        `

        )
        bodyParts.value = data.bodyParts;
    } catch (error) {
        console.log(error);
    }
});




</script>
