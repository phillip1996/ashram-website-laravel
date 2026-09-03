<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/vue3';

const form = useForm({ password: '' });

const submit = () => {
    form.post(route('password.confirm'), {
        onFinish: () => form.reset(),
    });
};
</script>

<template>
        <Head title="Confirm Password" />

        <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-[#f8f7f4] relative overflow-hidden">
            <div class="absolute inset-0 opacity-[0.04] pointer-events-none"
                style="background-image: radial-gradient(circle, #2b4b58 1px, transparent 1px); background-size: 28px 28px;">
            </div>

            <div class="max-w-md w-full space-y-8 bg-white p-8 md:p-10 rounded-xl shadow-lg border border-slate-100 relative z-10">
                <div class="text-center">
                    <img src="/img/logo.png" alt="The Lekki Ashram" class="h-12 mx-auto mb-6" />
                    <h2 class="font-serif text-3xl md:text-4xl text-[#2b4b58] font-medium">Confirm Password</h2>
                    <p class="text-slate-400 text-sm mt-2">Secure area – please confirm your password</p>
                </div>

                <form @submit.prevent="submit" class="space-y-5">
                    <div>
                        <InputLabel for="password" value="Password" class="text-[#2b4b58] text-xs font-bold uppercase tracking-widest" />
                        <TextInput
                            id="password"
                            type="password"
                            class="mt-1 block w-full border-slate-200 focus:border-[#E1B137] focus:ring-[#E1B137] rounded-md"
                            v-model="form.password"
                            required
                            autofocus
                            autocomplete="current-password"
                        />
                        <InputError class="mt-2" :message="form.errors.password" />
                    </div>

                    <PrimaryButton
                        class="w-full justify-center py-3 bg-[#E1B137] hover:bg-[#2b4b58] text-[#0d1e26] hover:text-white font-bold text-sm uppercase tracking-wider transition duration-300 rounded-md border-0"
                        :class="{ 'opacity-50 cursor-not-allowed': form.processing }"
                        :disabled="form.processing"
                    >
                        {{ form.processing ? 'Confirming...' : 'Confirm' }}
                    </PrimaryButton>
                </form>
            </div>
        </div>
   
</template>