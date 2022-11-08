

<template>

    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl leading-tight text-gray-800">
                Dashboard
            </h2>
        </template>

        <div class="mx-auto mt-12 max-w-7xl sm:px-6 lg:px-8">
            <div class="grid gap-6 grid-cols-3 justify-center">
                <Link v-for="topic in navItems"
                      :href="topic.href">
                <TopicCard :key="topic.id"
                           :topic="topic" />
                </Link>

            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import TopicCard from '@/Components/Dashboard/TopicCard.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

const navItems = [

    {
        name: 'Chirps',
        href: route('chirps.index'),
        current: route().current('chirps.index'),
        description: 'Very simple crud services all on one page.',
    },
    {
        name: 'Hygraph',
        href: route('hygraph'),
        current: route().current('hygraph'),
        description: 'Access the Hygraph graph database.',
    },
    {
        name: 'Stripe',
        href: route('stripe'),
        current: route().current('stripe'),
        description: 'Utilize Cashier to access Stripe.',
    },
];

</script>
