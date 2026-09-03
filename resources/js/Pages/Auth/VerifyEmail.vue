<script setup>
import { computed } from 'vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({ status: String });

const form = useForm({});
const submit = () => form.post(route('verification.send'));
const verificationLinkSent = computed(() => props.status === 'verification-link-sent');
</script>

<template>
        <Head title="Verify Email" />

        <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-[#f8f7f4] relative overflow-hidden">
            <div class="absolute inset-0 opacity-[0.04] pointer-events-none"
                style="background-image: radial-gradient(circle, #2b4b58 1px, transparent 1px); background-size: 28px 28px;">
            </div>

            <div class="max-w-md w-full space-y-8 bg-white p-8 md:p-10 rounded-xl shadow-lg border border-slate-100 relative z-10">
                <div class="text-center">
                    <img src="/img/logo.png" alt="The Lekki Ashram" class="h-12 mx-auto mb-6" />
                    <h2 class="font-serif text-3xl md:text-4xl text-[#2b4b58] font-medium">Verify Email</h2>
                    <p class="text-slate-400 text-sm mt-2">Confirm your email address</p>
                </div>

                <div class="mb-4 text-sm text-slate-600">
                    Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.
                </div>

                <div v-if="verificationLinkSent" class="mb-4 text-sm font-medium text-emerald-600 bg-emerald-50 p-3 rounded-lg border border-emerald-200">
                    A new verification link has been sent to your email address.
                </div>

                <form @submit.prevent="submit" class="space-y-4">
                    <PrimaryButton
                        class="w-full justify-center py-3 bg-[#E1B137] hover:bg-[#2b4b58] text-[#0d1e26] hover:text-white font-bold text-sm uppercase tracking-wider transition duration-300 rounded-md border-0"
                        :class="{ 'opacity-50 cursor-not-allowed': form.processing }"
                        :disabled="form.processing"
                    >
                        {{ form.processing ? 'Sending...' : 'Resend Verification Email' }}
                    </PrimaryButton>

                    <div class="text-center text-sm text-slate-500">
                        <Link :href="route('logout')" method="post" as="button" class="text-[#E1B137] hover:text-[#d4a52e] font-medium transition">Log Out</Link>
                    </div>
                </form>
            </div>
        </div>
</template>