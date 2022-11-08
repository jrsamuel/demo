<template>

    <Head title="Chirps" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl leading-tight text-gray-800">
                Chirps
            </h2>
        </template>
        <div class="mx-auto max-w-2xl p-4 sm:p-6 lg:p-8">
            <form @submit.prevent="form.post(route('chirps.store'), { onSuccess: () => form.reset() })">
                <textarea v-model="form.message"
                          rows="4"
                          placeholder="What's on your mind?"
                          class="rounded-lg shadow-md w-full block"></textarea>
                <InputError :message="form.errors.message"
                            class="mt-2" />
                <PrimaryButton class="mt-4"
                               :disabled="form.processing">
                    Chirp!
                </PrimaryButton>
            </form>
            <div class="space-y-3 mt-10">
                <Chirp v-for="chirp in chirps.data"
                       :key="chirp.id"
                       :chirp="chirp" />
            </div>
        </div>
    </AuthenticatedLayout>


</template>


<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm, Head } from '@inertiajs/inertia-vue3';
import Chirp from '@/Components/Chirp.vue';

defineProps(['chirps']);

const form = useForm({
    message: '',
});



</script>
