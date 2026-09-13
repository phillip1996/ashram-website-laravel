<template>
  <section class="bg-white">

    <!-- HERO HEADER -->
    <div class="relative h-[60vh] flex items-center justify-center text-center overflow-hidden">

      <!-- Hero Image (local) -->
      <img
        src="/img/consultant.jpg"
        alt="Professional Consultancy"
        class="absolute inset-0 w-full h-full object-cover object-[center_20%] md:object-[center_30%]"
      />

      <!-- Dark overlay for text readability -->
      <div class="absolute inset-0 bg-black/50"></div>
      
      <!-- Gradient overlay for depth -->
      <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>

      <div class="relative z-10 px-6 max-w-4xl">
        <h1 class="text-4xl md:text-6xl font-serif text-white mb-6">
          Consultancy — Clarity for Life's Decisions
        </h1>

        <p class="text-white/80 text-lg md:text-xl italic">
          Professional guidance for personal growth, career clarity, and life transitions.
        </p>
      </div>

    </div>

    <!-- PAGE CONTENT -->
    <div class="max-w-4xl mx-auto px-6 py-20 space-y-10">

      <h2 class="text-3xl font-serif text-[#2b4b58]">
        Guidance with Depth and Practicality
      </h2>

      <p class="text-slate-600 leading-relaxed">
        Our consultancy sessions offer thoughtful, practical guidance for
        individuals navigating important decisions — whether in career,
        relationships, purpose, or personal direction. We listen deeply
        and help you find clarity amid complexity.
      </p>

      <p class="text-slate-600 leading-relaxed">
        Drawing on principles of self-inquiry and conscious living, our
        consultants help you align your choices with your deeper values,
        so that every step forward feels grounded and true.
      </p>

      <!-- Quote -->
      <div class="border-l-4 border-[#E1B137] pl-6 italic text-slate-500 my-10">
        "Clarity comes when guidance meets understanding and empathy."
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