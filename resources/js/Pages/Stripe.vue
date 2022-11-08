<template>

    <Head title="Stripe" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl leading-tight text-gray-800">
                Stripe
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="bg-white shadow-sm p-8 overflow-hidden sm:rounded-lg">
                    <div>Subscribe</div>
                    <form id="payment-form">
                        <div id="payment-element">
                            <!--Stripe.js injects the Payment Element-->
                        </div>
                        <button id="submit"
                                class="rounded bg-gray-900 mt-6 text-white py-2 px-4"
                                :data-secret="intent.client_secret">
                            >
                            <div class="spinner hidden"
                                 id="spinner"></div>
                            <span id="button-text">Pay now</span>
                        </button>
                        <div id="payment-message"
                             class="hidden"></div>
                    </form>

                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { loadStripe } from '@stripe/stripe-js';
import { onBeforeMount, onMounted } from 'vue';

const props = defineProps({
    intent: {
        type: Object,
        required: true,
    },
});

let elements = 'test'

const { client_secret } = props.intent;

onMounted(async () => {
    const stripe = await loadStripe('pk_test_51JUvfMKLemxRakZvyqGvrur4SYw1XoXSrQBTyLhkFhXXqhMtnulHeA6mhzFhUafujo3sdh4eiMEFiyDdb5Le4Vbq00WSiUgb58')

    console.log(client_secret)

    elements = stripe.elements({
        clientSecret: client_secret,
    });

    const paymentElement = elements.create("payment");
    paymentElement.mount("#payment-element");


})





</script>
