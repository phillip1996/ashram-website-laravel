<template>
  <section class="bg-white">

    <!-- HERO HEADER -->
    <div class="relative h-[60vh] flex items-center justify-center text-center overflow-hidden">

      <!-- Hero Image (direct working URL) -->
      <img
        src="https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?w=1600&auto=format&fit=crop&q=80"
        alt="Environmental Sustainability"
        class="absolute inset-0 w-full h-full object-cover"
      />

      <!-- Dark overlay for readability -->
      <div class="absolute inset-0 bg-black/40"></div>

      <div class="relative z-10 px-6 max-w-4xl">
        <h1 class="text-4xl md:text-6xl font-serif text-white mb-6">
          Environmental Sustainability
        </h1>

        <p class="text-white/80 text-lg md:text-xl italic">
          Guarding nature and climate for future generations.
        </p>
      </div>
    </div>

    <!-- PAGE CONTENT -->
    <div class="max-w-4xl mx-auto px-6 py-20 space-y-10">

      <h2 class="text-3xl font-serif text-[#2b4b58]">
        Protecting Our Planet
      </h2>

      <p class="text-slate-600 leading-relaxed">
        At the Ashram, we believe environmental consciousness is essential 
        for spiritual and social wellbeing. Our wildlife conservation and 
        ecological programs educate and empower individuals to care for 
        the natural world.
      </p>

      <p class="text-slate-600 leading-relaxed">
        From habitat preservation to sustainable practices, we aim to 
        ensure that future generations inherit a thriving, balanced ecosystem.
      </p>

      <!-- Quote -->
      <div class="border-l-4 border-[#E1B137] pl-6 italic text-slate-500 my-10">
        “The Earth does not belong to us — we belong to the Earth.”
      </div>

      <!-- CTA BUTTONS -->
      <div class="flex flex-col sm:flex-row gap-6 mt-10">

        <Link
          href="/"
          class="px-8 py-4 border border-[#2b4b58] text-[#2b4b58] uppercase text-[11px] tracking-[0.2em] font-bold hover:bg-[#2b4b58] hover:text-white transition text-center"
        >
          Back to Home
        </Link>
      </div>

    </div>

  </section>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import GuestLayout from '@/Layouts/GuestLayout.vue'

defineOptions({ layout: GuestLayout })
</script>