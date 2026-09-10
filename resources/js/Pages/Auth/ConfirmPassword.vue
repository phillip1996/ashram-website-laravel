<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/vue3';
import AuthLayout from '@/Layouts/AuthLayout.vue'; 

defineOptions({ layout: AuthLayout }) 

const form = useForm({ password: '' });

const submit = () => {
    form.post(route('password.confirm'), {
        onFinish: () => form.reset(),
    });
};
</script>

<template>
    <Head title="Confirm Password - The Lekki Ashram" />

    <div class="w-full">
        <!-- Card -->
        <div class="bg-white/95 backdrop-blur-sm p-8 md:p-10 rounded-2xl shadow-2xl border border-white/20">

            <!-- Heading -->
            <div class="text-center mb-8">
                <h2 class="font-serif text-3xl md:text-4xl text-[#2b4b58] font-medium">
                    Confirm Password
                </h2>
                <p class="text-slate-400 text-sm mt-2">
                    Secure area. Please confirm your password to continue.
                </p>
            </div>

            <form @submit.prevent="submit" class="space-y-6">
                <!-- Password -->
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

                <!-- Submit -->
                <PrimaryButton
                    class="w-full justify-center py-3 bg-[#E1B137] hover:bg-[#2b4b58] text-[#0d1e26] hover:text-white font-bold text-sm uppercase tracking-wider transition duration-300 rounded-md border-0"
                    :class="{ 'opacity-50 cursor-not-allowed': form.processing }"
                    :disabled="form.processing"
                >
                    {{ form.processing ? 'Confirming...' : 'Confirm' }}
                </PrimaryButton>
            </form>
        </div>

        <!-- Small footer note -->
        <p class="text-center text-white/50 text-xs mt-6">
            © {{ new Date().getFullYear() }} The Lekki Ashram. All rights reserved.
        </p>
    </div>
</template>