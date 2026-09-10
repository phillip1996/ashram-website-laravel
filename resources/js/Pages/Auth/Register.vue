<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthLayout from '@/Layouts/AuthLayout.vue';
import { ref } from 'vue';  

defineOptions({ layout: AuthLayout })

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

// ── Password visibility toggles ──
const showPassword = ref(false)              
const showPasswordConfirmation = ref(false)   

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <Head title="Register - The Lekki Ashram" />

    <div class="w-full">
        <!-- Card -->
        <div class="bg-white/95 backdrop-blur-sm p-8 md:p-10 rounded-2xl shadow-2xl border border-white/20">

            <!-- Heading -->
            <div class="text-center mb-8">
                <h2 class="font-serif text-3xl md:text-4xl text-[#2b4b58] font-medium">
                    Create Account
                </h2>
                <p class="text-slate-400 text-sm mt-2">Join our community of seekers</p>
            </div>

            <form @submit.prevent="submit" class="space-y-5">
                <!-- Name -->
                <div>
                    <InputLabel for="name" value="Full Name" class="text-[#2b4b58] text-xs font-bold uppercase tracking-widest" />
                    <TextInput
                        id="name"
                        type="text"
                        class="mt-1 block w-full border-slate-200 focus:border-[#E1B137] focus:ring-[#E1B137] rounded-md"
                        v-model="form.name"
                        required
                        autofocus
                        autocomplete="name"
                    />
                    <InputError class="mt-2" :message="form.errors.name" />
                </div>

                <!-- Email -->
                <div>
                    <InputLabel for="email" value="Email Address" class="text-[#2b4b58] text-xs font-bold uppercase tracking-widest" />
                    <TextInput
                        id="email"
                        type="email"
                        class="mt-1 block w-full border-slate-200 focus:border-[#E1B137] focus:ring-[#E1B137] rounded-md"
                        v-model="form.email"
                        required
                        autocomplete="username"
                    />
                    <InputError class="mt-2" :message="form.errors.email" />
                </div>

                <!-- Password with Eye Toggle -->
                <div>
                    <InputLabel for="password" value="Password" class="text-[#2b4b58] text-xs font-bold uppercase tracking-widest" />
                    <div class="relative mt-1">
                        <TextInput
                            id="password"
                            :type="showPassword ? 'text' : 'password'"
                            class="block w-full border-slate-200 focus:border-[#E1B137] focus:ring-[#E1B137] rounded-md pr-12"
                            v-model="form.password"
                            required
                            autocomplete="new-password"
                        />
                        <button
                            type="button"
                            @click="showPassword = !showPassword"
                            :aria-label="showPassword ? 'Hide password' : 'Show password'"
                            class="absolute inset-y-0 right-0 flex items-center pr-4 text-slate-400 hover:text-[#E1B137] transition-colors focus:outline-none"
                        >
                            <svg v-if="!showPassword" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <svg v-else xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                            </svg>
                        </button>
                    </div>
                    <InputError class="mt-2" :message="form.errors.password" />
                </div>

                <!-- Confirm Password with Eye Toggle -->
                <div>
                    <InputLabel for="password_confirmation" value="Confirm Password" class="text-[#2b4b58] text-xs font-bold uppercase tracking-widest" />
                    <div class="relative mt-1">
                        <TextInput
                            id="password_confirmation"
                            :type="showPasswordConfirmation ? 'text' : 'password'"
                            class="block w-full border-slate-200 focus:border-[#E1B137] focus:ring-[#E1B137] rounded-md pr-12"
                            v-model="form.password_confirmation"
                            required
                            autocomplete="new-password"
                        />
                        <button
                            type="button"
                            @click="showPasswordConfirmation = !showPasswordConfirmation"
                            :aria-label="showPasswordConfirmation ? 'Hide password' : 'Show password'"
                            class="absolute inset-y-0 right-0 flex items-center pr-4 text-slate-400 hover:text-[#E1B137] transition-colors focus:outline-none"
                        >
                            <svg v-if="!showPasswordConfirmation" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <svg v-else xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                            </svg>
                        </button>
                    </div>
                    <InputError class="mt-2" :message="form.errors.password_confirmation" />
                </div>

                <!-- Submit -->
                <PrimaryButton
                    class="w-full justify-center py-3 bg-[#E1B137] hover:bg-[#2b4b58] text-[#0d1e26] hover:text-white font-bold text-sm uppercase tracking-wider transition duration-300 rounded-md border-0"
                    :class="{ 'opacity-50 cursor-not-allowed': form.processing }"
                    :disabled="form.processing"
                >
                    {{ form.processing ? 'Creating account...' : 'Create Account' }}
                </PrimaryButton>

                <!-- Sign in link -->
                <div class="text-center text-sm text-slate-500">
                    Already have an account?
                    <Link :href="route('login')" class="text-[#E1B137] hover:text-[#d4a52e] font-medium transition">
                        Sign in
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