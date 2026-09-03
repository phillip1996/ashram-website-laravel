<template>
  <section class="bg-white">

    <!-- HERO HEADER -->
    <div class="relative h-[60vh] flex items-center justify-center text-center overflow-hidden">
      <!-- Dark overlay -->

       <!-- Hero Image (direct working URL) -->
      <img
          src=" https://images.unsplash.com/photo-1576091160550-2173dba999ef?w=1600&auto=format&fit=crop&q=80"
          alt="Root-Cause Healing"
          class="absolute inset-0 w-full h-full object-cover"
      />
      <div class="absolute inset-0 bg-black/50"></div>
      
      <div class="relative z-10 px-6 max-w-4xl">
        <h1 class="text-4xl md:text-6xl font-serif text-white mb-6">
          Root-Cause Healing
        </h1>

        <p class="text-white/80 text-lg md:text-xl italic">
          Integrating science-based medicine with holistic wellness.
        </p>
      </div>
    </div>

    <!-- PAGE CONTENT -->
    <div class="max-w-4xl mx-auto px-6 py-20 space-y-10">

      <h2 class="text-3xl font-serif text-[#2b4b58]">
        Healing Beyond Symptoms
      </h2>

      <p class="text-slate-600 leading-relaxed">
        Functional Medicine focuses on identifying and addressing the root causes 
        of illness rather than just managing symptoms. It combines evidence-based 
        science with a holistic view of wellness.
      </p>

      <p class="text-slate-600 leading-relaxed">
        At the Ashram, our programs integrate nutrition, lifestyle, and mindfulness 
        to create long-term health and vitality for every individual.
      </p>

      <!-- Quote -->
      <div class="border-l-4 border-[#E1B137] pl-6 italic text-slate-500 my-10">
        “True healing begins when we understand the root, not just the branch.”
      </div>

      <!-- CTA BUTTONS -->
      <div class="flex flex-col sm:flex-row gap-6 mt-10">
        <Link
          href="/support/wellness"
          class="px-8 py-4 bg-[#E1B137] text-white uppercase text-[11px] tracking-[0.2em] font-bold hover:bg-[#2b4b58] transition text-center"
        >
          Support Wellness
        </Link>

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