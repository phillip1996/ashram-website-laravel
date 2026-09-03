<template>
  <section class="bg-white">

    <!-- HERO HEADER -->
    <div class="relative h-[60vh] flex items-center justify-center text-center overflow-hidden">
         <!-- Hero Image from a working online link -->
      <img
          src="https://images.unsplash.com/photo-1506126613408-eca07ce68773?w=1600&auto=format&fit=crop&q=80"
          alt="Satsangs, Meditation & Consciousness"
          class="absolute inset-0 w-full h-full object-cover"
      />
      <div class="absolute inset-0 bg-black/50"></div>

      <div class="relative z-10 px-6 max-w-4xl">
        <h1 class="text-4xl md:text-6xl font-serif text-white mb-6">
          Satsangs, Meditation & Consciousness
        </h1>

        <p class="text-white/80 text-lg md:text-xl italic">
          Practices focused on awareness, discipline and inner stillness.
        </p>
      </div>
    </div>

    <!-- PAGE CONTENT -->
    <div class="max-w-4xl mx-auto px-6 py-20 space-y-10">

      <h2 class="text-3xl font-serif text-[#2b4b58]">
        The Path of Awareness
      </h2>

      <p class="text-slate-600 leading-relaxed">
        Yoga is more than physical movement. It is a discipline that harmonizes 
        body, mind, and awareness. Through meditation, breath practices, and 
        contemplation, practitioners cultivate clarity and inner stillness.
      </p>

      <p class="text-slate-600 leading-relaxed">
        At the Ashram, yoga teachings emphasize awareness as the foundation 
        of transformation. Satsangs and guided meditation sessions provide 
        a supportive environment for seekers to deepen their practice.
      </p>

      <!-- Quote -->
      <div class="border-l-4 border-[#E1B137] pl-6 italic text-slate-500 my-10">
        “Yoga is the journey of the self, through the self, to the Self.”
      </div>

      <!-- CTA BUTTONS -->
      <div class="flex flex-col sm:flex-row gap-6 mt-10">
        <Link
          href="/support/satsang"
          class="px-8 py-4 bg-[#E1B137] text-white uppercase text-[11px] tracking-[0.2em] font-bold hover:bg-[#2b4b58] transition text-center"
        >
          Join Satsang
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