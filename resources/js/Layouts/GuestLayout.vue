<script setup>
import Navbar from '@/Components/Navbar.vue'
import Footer from '@/Components/Footer.vue'
import ToastContainer from '@/Components/ToastContainer.vue'
</script>

<template>
    <div class="min-h-screen bg-white overflow-x-hidden w-full max-w-full">
        <Navbar />

        <!-- ─── Global Toast Container ─── -->
        <ToastContainer />

        <main class="pt-20">
            <slot />
        </main>

        <Footer />
    </div>
</template>