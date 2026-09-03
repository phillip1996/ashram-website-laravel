<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/vue3';

defineProps({
    status: {
        type: String,
    },
});

const form = useForm({ email: '' });

const submit = () => form.post(route('password.email'));
</script>

<template>
        <Head title="Forgot Password" />

        <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-[#f8f7f4] relative overflow-hidden">
            <div class="absolute inset-0 opacity-[0.04] pointer-events-none"
                style="background-image: radial-gradient(circle, #2b4b58 1px, transparent 1px); background-size: 28px 28px;">
            </div>

            <div class="max-w-md w-full space-y-8 bg-white p-8 md:p-10 rounded-xl shadow-lg border border-slate-100 relative z-10">
                <div class="text-center">
                    <img src="/img/logo.png" alt="The Lekki Ashram" class="h-12 mx-auto mb-6" />
                    <h2 class="font-serif text-3xl md:text-4xl text-[#2b4b58] font-medium">Forgot Password</h2>
                    <p class="text-slate-400 text-sm mt-2">We'll send you a reset link</p>
                </div>

                <div v-if="status" class="mb-4 text-sm font-medium text-emerald-600 bg-emerald-50 p-3 rounded-lg border border-emerald-200">
                    {{ status }}
                </div>

                <form @submit.prevent="submit" class="space-y-5">
                    <div>
                        <InputLabel for="email" value="Email Address" class="text-[#2b4b58] text-xs font-bold uppercase tracking-widest" />
                        <TextInput
                            id="email"
                            type="email"
                            class="mt-1 block w-full border-slate-200 focus:border-[#E1B137] focus:ring-[#E1B137] rounded-md"
                            v-model="form.email"
                            required
                            autofocus
                        />
                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>

                    <PrimaryButton
                        class="w-full justify-center py-3 bg-[#E1B137] hover:bg-[#2b4b58] text-[#0d1e26] hover:text-white font-bold text-sm uppercase tracking-wider transition duration-300 rounded-md border-0"
                        :class="{ 'opacity-50 cursor-not-allowed': form.processing }"
                        :disabled="form.processing"
                    >
                        {{ form.processing ? 'Sending...' : 'Send Reset Link' }}
                    </PrimaryButton>

                    <div class="text-center text-sm text-slate-500">
                        <Link :href="route('login')" class="text-[#E1B137] hover:text-[#d4a52e] font-medium transition">Back to Sign In</Link>
                    </div>
                </form>
            </div>
        </div>
</template>