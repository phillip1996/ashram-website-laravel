<template>
  <section class="bg-white">

    <div class="relative h-[60vh] flex items-center justify-center text-center overflow-hidden">
        <img
          src="https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?w=1600&auto=format&fit=crop&q=80"
          alt=" Wellness Programs"
          class="absolute inset-0 w-full h-full object-cover"
      />
      <div class="absolute inset-0 bg-black/50"></div>
      <div class="relative z-10 px-6 max-w-4xl">
        <h1 class="text-4xl md:text-6xl font-serif text-white mb-6">
          Wellness Programs
        </h1>
        <p class="text-white/80 text-lg md:text-xl italic">
          Programs designed to restore balance, vitality, and holistic well-being.
        </p>
      </div>
    </div>

    <div class="max-w-4xl mx-auto px-6 py-20 space-y-10">

      <h2 class="text-3xl font-serif text-[#2b4b58]">
        Heal and Thrive
      </h2>

      <p class="text-slate-600 leading-relaxed">
        Our wellness programs integrate functional medicine, nutrition, and mindful practices 
        to address the root causes of imbalance and promote long-term health.
      </p>

      <p class="text-slate-600 leading-relaxed">
        Participants can join guided workshops, holistic sessions, and lifestyle consultations 
        to improve overall well-being.
      </p>

      <div class="border-l-4 border-[#E1B137] pl-6 italic text-slate-500 my-10">
        “Wellness is not a destination, but a journey of conscious living.”
      </div>

      <div class="flex flex-col sm:flex-row gap-6 mt-10">
        <Link
          href="/support/consultancy"
          class="px-8 py-4 bg-[#E1B137] text-white uppercase text-[11px] tracking-[0.2em] font-bold hover:bg-[#2b4b58] transition text-center"
        >
          Book Therapy
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