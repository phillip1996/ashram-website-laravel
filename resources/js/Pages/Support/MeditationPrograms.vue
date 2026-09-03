<template>
  <section class="bg-white">

    <div class="relative h-[60vh] flex items-center justify-center text-center overflow-hidden">
         <img
          src="https://images.unsplash.com/photo-1506126613408-eca07ce68773?w=1600&auto=format&fit=crop&q=80"
          alt="Meditation Programs"
          class="absolute inset-0 w-full h-full object-cover"
      />
      <div class="absolute inset-0 bg-black/50"></div>
      <div class="relative z-10 px-6 max-w-4xl">
        <h1 class="text-4xl md:text-6xl font-serif text-white mb-6">
          Meditation Programs
        </h1>
        <p class="text-white/80 text-lg md:text-xl italic">
          Structured practices to cultivate awareness, stillness, and inner peace.
        </p>
      </div>
    </div>

    <div class="max-w-4xl mx-auto px-6 py-20 space-y-10">

      <h2 class="text-3xl font-serif text-[#2b4b58]">
        Deepen Your Practice
      </h2>

      <p class="text-slate-600 leading-relaxed">
        Our meditation programs are designed for beginners and experienced practitioners alike. 
        Through guided sessions, breathwork, and mindfulness exercises, you can develop clarity 
        and inner balance.
      </p>

      <p class="text-slate-600 leading-relaxed">
        At the Ashram, we emphasize integrating meditation into daily life to cultivate sustained 
        awareness and harmony.
      </p>

      <div class="border-l-4 border-[#E1B137] pl-6 italic text-slate-500 my-10">
        “Stillness is not just the absence of noise, but the presence of clarity.”
      </div>

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