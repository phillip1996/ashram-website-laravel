<template>
  <section class="bg-white">

    <!-- HERO HEADER -->
    <div class="relative h-[60vh] flex items-center justify-center text-center overflow-hidden">
       <img
          src=" https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=1600&auto=format&fit=crop&q=80"
          alt="Conservation Programs"
          class="absolute inset-0 w-full h-full object-cover"
      />
      <div class="absolute inset-0 bg-black/50"></div>
      <div class="relative z-10 px-6 max-w-4xl">
        <h1 class="text-4xl md:text-6xl font-serif text-white mb-6">
          Conservation Programs
        </h1>
        <p class="text-white/80 text-lg md:text-xl italic">
          Participate in protecting wildlife, nature, and our planet for future generations.
        </p>
      </div>
    </div>

    <!-- PAGE CONTENT -->
    <div class="max-w-4xl mx-auto px-6 py-20 space-y-10">

      <h2 class="text-3xl font-serif text-[#2b4b58]">
        Take Action for the Environment
      </h2>

      <p class="text-slate-600 leading-relaxed">
        Our conservation programs involve community-driven projects, wildlife protection, 
        and sustainable practices to maintain ecological balance.
      </p>

      <p class="text-slate-600 leading-relaxed">
        You can participate through volunteering, donations, or awareness campaigns to make 
        a meaningful impact.
      </p>

      <div class="border-l-4 border-[#E1B137] pl-6 italic text-slate-500 my-10">
        “Protecting nature today ensures life for generations tomorrow.”
      </div>

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