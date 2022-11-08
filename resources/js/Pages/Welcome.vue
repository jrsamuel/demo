<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
    name: String,
})
</script>

<template>

    <Head title="Welcome" />

    <div
         class="flex min-h-screen bg-gray-100 relative items-top justify-center sm:pt-0 sm:items-center dark:bg-gray-900">
        <div v-if="canLogin"
             class="py-4 px-6 top-0 right-0 hidden fixed sm:block">
            <Link v-if="$page.props.auth.user"
                  :href="route('dashboard')"
                  class="text-sm text-gray-700 underline dark:text-gray-500">Dashboard</Link>

            <template v-else>
                <Link :href="route('login')"
                      class="text-sm text-gray-700 underline dark:text-gray-500">Log in</Link>

                <Link v-if="canRegister"
                      :href="route('register')"
                      class="text-sm ml-4 text-gray-700 underline dark:text-gray-500">Register</Link>
            </template>
        </div>

        <div class="font-thin tracking-wider text-4xl text-green-700">Laravel Learnings</div>


    </div>
</template>
