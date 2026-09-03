<template>
  <div class="page-wrapper font-body">

    <!-- Hero -->
    <section class="relative min-h-[60vh] flex items-center overflow-hidden bg-[#2b4b58]">
      <div class="absolute inset-0 opacity-[0.04]"
        style="background-image: radial-gradient(circle, white 1px, transparent 1px); background-size: 28px 28px;">
      </div>
      <div class="relative max-w-6xl mx-auto px-6 md:px-12 w-full py-20">
        <div class="max-w-2xl">
          <div class="flex items-center gap-4 mb-6">
            <div class="w-12 h-px bg-[#E1B137]"></div>
            <span class="text-[#E1B137] font-display font-bold uppercase tracking-[0.45em] text-[10px]">Our Programs</span>
          </div>
          <h1 class="font-display text-4xl md:text-6xl text-white leading-[0.93] mb-6">
            Pathways to<br>
            <em class="not-italic text-[#E1B137]">Higher Living</em>
          </h1>
          <p class="text-white/70 text-lg font-light leading-relaxed max-w-lg">
            Explore our curated offerings designed to deepen your practice, expand your awareness, and connect you with community.
          </p>
        </div>
      </div>
    </section>

    <!-- Programs Grid -->
    <section class="py-20 md:py-28 bg-[#f8f7f4]">
      <div class="max-w-6xl mx-auto px-6 md:px-12">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
          <div v-for="program in programs" :key="program.title"
            class="group bg-white border border-slate-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-400 overflow-hidden">
            <div class="relative h-56 overflow-hidden">
              <img :src="program.image" :alt="program.title"
                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" />
              <div class="absolute inset-0 bg-gradient-to-t from-[#0d1e26]/60 via-transparent to-transparent"></div>
              <div class="absolute bottom-4 left-4">
                <span class="bg-[#E1B137] text-[#0d1e26] text-[10px] font-bold px-3 py-1.5 uppercase tracking-widest">
                  {{ program.category }}
                </span>
              </div>
            </div>
            <div class="p-6">
              <h3 class="font-display text-xl text-[#2b4b58] mb-2 group-hover:text-[#E1B137] transition-colors">
                {{ program.title }}
              </h3>
              <p class="text-slate-500 text-sm leading-relaxed mb-4">{{ program.description }}</p>
              <div class="flex items-center justify-between pt-4 border-t border-slate-100">
                <span class="text-xs text-slate-400 flex items-center gap-1">
                  <i class="fa-regular fa-clock"></i>
                  {{ program.duration }}
                </span>
                <Link :href="program.link"
                  class="text-[#2b4b58] text-xs font-bold uppercase tracking-wider hover:text-[#E1B137] transition-colors inline-flex items-center gap-1.5">
                  Learn More <i class="fa-solid fa-chevron-right text-[9px]"></i>
                </Link>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- CTA -->
    <section class="py-20 bg-[#2b4b58] relative overflow-hidden">
      <div class="absolute inset-0 opacity-[0.04]"
        style="background-image: radial-gradient(circle, white 1px, transparent 1px); background-size: 28px 28px;">
      </div>
      <div class="relative max-w-4xl mx-auto px-6 md:px-12 text-center">
        <h2 class="font-display text-3xl md:text-5xl text-white mb-6">
          Not sure where to <em class="not-italic text-[#E1B137]">begin</em>?
        </h2>
        <p class="text-white/60 text-base leading-relaxed mb-8 max-w-xl mx-auto">
          Our team will help you find the right program for your journey.
        </p>
        <Link href="/contact"
          class="inline-flex items-center gap-3 bg-[#E1B137] text-[#0d1e26] px-8 py-4 font-display font-bold text-[11px] uppercase tracking-[0.2em] hover:bg-white transition-all duration-300">
          <i class="fa-solid fa-compass"></i>
          Find Your Path
        </Link>
      </div>
    </section>

  </div>
</template>

<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue'
import { Link } from '@inertiajs/vue3'

defineOptions({ layout: GuestLayout })

const programs = [
  {
    title: 'Meditation Retreats',
    category: 'Retreat',
    description: 'Immersive weekend retreats combining guided meditation, silence, and self-inquiry.',
    duration: '3-7 days',
    image: '/img/programs/meditation-retreat.jpg',
    link: '/programs/meditation-retreats'
  },
  {
    title: 'Advaita Study Groups',
    category: 'Philosophy',
    description: 'Deep exploration of non-dual philosophy through weekly study, dialogue, and contemplation.',
    duration: '12 weeks',
    image: '/img/programs/advaita-study.jpg',
    link: '/programs/advaita-study'
  },
  {
    title: 'Eco-Conservation Initiatives',
    category: 'Ecology',
    description: 'Hands-on conservation work combining ecological restoration with spiritual practice.',
    duration: 'Ongoing',
    image: '/img/programs/eco-conservation.jpg',
    link: '/programs/eco-conservation'
  },
  {
    title: 'Satsang Gatherings',
    category: 'Community',
    description: 'Monthly community gatherings featuring teachings, bhajans, and shared meditation.',
    duration: 'Monthly',
    image: '/img/programs/satsang.jpg',
    link: '/programs/satsang'
  },
  {
    title: 'Wellness & Therapy',
    category: 'Wellness',
    description: 'Integrative wellness programs combining therapy, breathwork, and mindful movement.',
    duration: 'Ongoing',
    image: '/img/programs/wellness.jpg',
    link: '/programs/wellness'
  },
  {
    title: 'Philosophy Lectures',
    category: 'Education',
    description: 'Public lectures exploring the intersection of Advaita, science, and modern life.',
    duration: 'Weekly',
    image: '/img/programs/lectures.jpg',
    link: '/programs/lectures'
  }
]
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Montserrat:wght@300;400;500;600;700&display=swap');

.font-display { font-family: 'Playfair Display', Georgia, serif; }
.font-body { font-family: 'Montserrat', sans-serif; }
</style>