<script setup>
import ToastContainer from '@/Components/ToastContainer.vue'
</script>

<template>
  <div class="min-h-screen relative overflow-x-hidden w-full max-w-full flex items-center justify-center">

    <!-- Background Image -->
    <div class="absolute inset-0 z-0">
      <img
        src="/img/og-image.png"
        alt="The Lekki Ashram"
        class="w-full h-full object-cover"
      />
      <!-- Dark overlay for readability -->
      <div class="absolute inset-0 bg-[#0d1e26]/70"></div>
      <!-- Subtle gradient -->
      <div class="absolute inset-0 bg-gradient-to-br from-[#0d1e26]/60 via-[#0d1e26]/40 to-[#2b4b58]/60"></div>
    </div>

    <!-- Dot pattern overlay -->
    <div class="absolute inset-0 z-0 opacity-[0.03] pointer-events-none"
      style="background-image: radial-gradient(circle, white 1px, transparent 1px); background-size: 32px 32px;">
    </div>

    <!-- Toast Container -->
    <ToastContainer />

    <!-- Logo top-left -->
    <div class="absolute top-6 left-6 md:top-8 md:left-12 z-20">
      <a href="/" class="flex items-center gap-3 group">
        <img
          src="/img/logo.png"
          alt="The Lekki Ashram"
          class="h-10 w-auto object-contain"
        />
      </a>
    </div>

    <!-- Content -->
    <div class="relative z-10 w-full max-w-md mx-auto px-4 py-16">
      <slot />
    </div>

  </div>
</template>

<style scoped>
.font-display {
  font-family: 'Playfair Display', Georgia, serif;
}
</style>