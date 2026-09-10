<script setup>
import { computed } from 'vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthLayout from '@/Layouts/AuthLayout.vue'; 

defineOptions({ layout: AuthLayout })  

const props = defineProps({ status: String });

const form = useForm({});
const submit = () => form.post(route('verification.send'));
const verificationLinkSent = computed(() => props.status === 'verification-link-sent');
</script>

<template>
    <Head title="Verify Email - The Lekki Ashram" />

    <div class="w-full">
        <!-- Card -->
        <div class="bg-white/95 backdrop-blur-sm p-8 md:p-10 rounded-2xl shadow-2xl border border-white/20">

            <!-- Heading -->
            <div class="text-center mb-8">
                <h2 class="font-serif text-3xl md:text-4xl text-[#2b4b58] font-medium">
                    Verify Email
                </h2>
                <p class="text-slate-400 text-sm mt-2">
                    Confirm your email address
                </p>
            </div>

            <!-- Info -->
            <div class="mb-6 text-sm text-slate-600 leading-relaxed">
                Thanks for signing up! Before getting started, please verify your email address by clicking the link we just emailed to you. If you didn't receive it, we'll gladly send another.
            </div>

            <!-- Success message -->
            <div v-if="verificationLinkSent" class="mb-6 text-sm font-medium text-emerald-600 bg-emerald-50 p-3 rounded-lg border border-emerald-200">
                <i class="fa-solid fa-check-circle mr-2"></i>
                A new verification link has been sent to your email address.
            </div>

            <form @submit.prevent="submit" class="space-y-4">
                <!-- Resend button -->
                <PrimaryButton
                    class="w-full justify-center py-3 bg-[#E1B137] hover:bg-[#2b4b58] text-[#0d1e26] hover:text-white font-bold text-sm uppercase tracking-wider transition duration-300 rounded-md border-0"
                    :class="{ 'opacity-50 cursor-not-allowed': form.processing }"
                    :disabled="form.processing"
                >
                    {{ form.processing ? 'Sending...' : 'Resend Verification Email' }}
                </PrimaryButton>

                <!-- Logout -->
                <div class="text-center text-sm text-slate-500 pt-2 border-t border-slate-200">
                    <Link
                        :href="route('logout')"
                        method="post"
                        as="button"
                        class="text-[#E1B137] hover:text-[#d4a52e] font-medium transition"
                    >
                        <i class="fa-solid fa-arrow-right-from-bracket mr-1"></i>
                        Log Out
                    </Link>
                </div>
            </form>
        </div>

        <!-- Small footer note -->
        <p class="text-center text-white/50 text-xs mt-6">
            © {{ new Date().getFullYear() }} The Lekki Ashram. All rights reserved.
        </p>
    </div>
</template>