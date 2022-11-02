
<template>

    <Head title="Users" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl leading-tight text-gray-800">
                Users
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="flex justify-end">
                    <TextInput v-model="search"
                               class="h-10 mb-6 p-3 w-1/5"
                               placeholder="Search..." />
                </div>
                <div class="bg-white shadow-sm overflow-hidden sm:rounded-lg">
                    <div class="bg-white border-b border-gray-200 p-6">
                        <ul class="space-y-2">
                            <li v-for="user in users.data"
                                :key="user.id">
                                <div class="border rounded-lg flex border-gray-200 p-4 justify-between">

                                    {{ user.name }}
                                    <button class="text-blue-500">Edit</button>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <Pagination :links="users.links"
                            class="mt-6" />
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Pagination from '@/Components/Pagination.vue';
import TextInput from '@/Components/TextInput.vue';
import { Inertia } from '@inertiajs/inertia';
import { Head } from '@inertiajs/inertia-vue3';
import { ref, watch } from 'vue';
import { debounce } from 'lodash';


const search = ref(Inertia.page.props.filters.search);

// console.log($page.query.search);

defineProps({
    users: {
        type: Object,
        required: true,
    },
});

watch(search, (value = null) => {
    debounce(() => {
        Inertia.get('/users', { search: value }, {
            preserveState: true,
            preserveScroll: true,
            replace: true,
        });
    }, 500)();
})

</script>
