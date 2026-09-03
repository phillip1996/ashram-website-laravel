<template>
  <section class="bg-white">

    <!-- HERO HEADER with background image -->
    <div class="relative h-[60vh] flex items-center justify-center text-center overflow-hidden">
      <!-- Background Image - Using different reliable Unsplash images -->
      <img 
        src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?w=1600&auto=format&fit=crop&q=80"
        alt="Professional Guidance"
        class="absolute inset-0 w-full h-full object-cover"
      />
      
      <!-- Dark overlay for text readability -->
      <div class="absolute inset-0 bg-black/40"></div>
      
      <!-- Gradient overlay for depth -->
      <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>

      <div class="relative z-10 px-6 max-w-4xl">
        <span class="inline-block px-6 py-2 border border-white/40 bg-black/20 backdrop-blur-md text-white text-[10px] font-bold uppercase tracking-[0.4em] mb-6">
          CONSULTANCY
        </span>
        
        <h1 class="text-4xl md:text-6xl font-serif text-white mb-6 leading-tight">
          Professional <span class="text-[#E1B137]">Guidance</span>
        </h1>

        <p class="text-white/80 text-lg md:text-xl italic max-w-2xl mx-auto">
          Empathy-driven consultancy for growth and clarity.
        </p>
      </div>
    </div>

    <!-- PAGE CONTENT -->
    <div class="max-w-4xl mx-auto px-6 py-20 space-y-10">

      <h2 class="text-3xl font-serif text-[#2b4b58]">
        Expert Support for Your Journey
      </h2>

      <p class="text-slate-600 leading-relaxed">
        Our consultancy services provide empathetic guidance to individuals seeking 
        clarity, personal growth, and professional support. Through tailored sessions, 
        we help uncover solutions and navigate life's challenges.
      </p>

      <p class="text-slate-600 leading-relaxed">
        At the Ashram, therapy and guidance integrate mindfulness and holistic approaches 
        to ensure every session is meaningful and transformative.
      </p>

      <!-- Quote -->
      <div class="border-l-4 border-[#E1B137] pl-6 italic text-slate-500 my-10">
        "Clarity comes when guidance meets understanding and empathy."
      </div>

      <!-- CTA BUTTONS -->
      <div class="flex flex-col sm:flex-row gap-6 mt-10">
        <Link
          href="/support/therapy"
          class="px-8 py-4 bg-[#E1B137] text-white uppercase text-[11px] tracking-[0.2em] font-bold hover:bg-[#2b4b58] transition text-center"
        >
          Book Session
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