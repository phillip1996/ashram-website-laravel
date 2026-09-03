<template>
  <section class="relative w-full overflow-hidden bg-black">
    <swiper
      :modules="modules"
      :loop="true"
      effect="fade"
      :fade-effect="{ crossFade: true }"
      :speed="1800"
      :autoplay="{ delay: 7000, disableOnInteraction: false }"
      :navigation="{
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      }"
      class="ashram-hero-slider w-full h-full"
    >
      <swiper-slide v-for="(slide, index) in slides" :key="index">
        <div class="relative w-full h-[80vh] md:h-[95vh] flex items-center justify-center overflow-hidden">

          <!-- VIDEO BACKGROUND -->
          <video
            v-if="slide.type === 'video'"
            autoplay
            muted
            loop
            playsinline
            preload="auto"
            class="hero-video"
            :poster="slide.poster"
          >
            <source :src="slide.src" type="video/mp4" />
            Your browser does not support the video tag.
          </video>

          <!-- IMAGE BACKGROUND (fallback) -->
          <img
            v-else
            :src="slide.src"
            :alt="slide.title"
            class="absolute inset-0 w-full h-full object-cover"
          />

          <!-- Dark Overlay -->
          <div class="absolute inset-0 bg-black/30 z-10"></div>
          <div class="absolute inset-0 bg-gradient-to-b from-black/40 via-transparent to-black/50 z-10"></div>

          <!-- CONTENT -->
          <div class="relative z-20 container mx-auto px-6 text-center">
            <span class="inline-block px-6 py-2 border border-white/40 bg-black/20 backdrop-blur-md text-white text-[10px] font-bold uppercase tracking-[0.4em] mb-6">
              {{ slide.category }}
            </span>

            <h1 class="text-3xl md:text-5xl lg:text-7xl font-serif font-medium text-white mb-6 max-w-5xl mx-auto leading-tight">
              {{ slide.title }}
            </h1>

            <p class="text-white/80 text-lg md:text-xl max-w-3xl mx-auto mb-12 font-light italic leading-relaxed">
              {{ slide.subtitle }}
            </p>

            <div class="flex flex-col sm:flex-row items-center justify-center gap-6">
              <!-- Philosophy Button -->
              <Link
                :href="slide.philosophyLink || '#'"
                class="w-full sm:w-auto px-10 py-4 bg-[#E1B137] text-white font-bold uppercase text-[11px] tracking-[0.2em] hover:bg-white hover:text-black transition-all duration-300 text-center"
              >
                {{ slide.philosophyText || 'Learn More' }}
              </Link>

              <!-- Support Button -->
              <Link
                :href="slide.supportLink || '#'"
                class="w-full sm:w-auto px-10 py-4 border border-white text-white font-bold uppercase text-[11px] tracking-[0.2em] hover:bg-white hover:text-black transition-all duration-300 text-center"
              >
                {{ slide.supportText || 'Get Involved' }}
              </Link>
            </div>
          </div>
        </div>
      </swiper-slide>

      <!-- Navigation Arrows -->
      <div class="swiper-button-prev story-nav"></div>
      <div class="swiper-button-next story-nav"></div>
    </swiper>
  </section>
</template>

<script setup>
import { Swiper, SwiperSlide } from 'swiper/vue'
import { Navigation, Autoplay, EffectFade } from 'swiper/modules'
import { Link } from '@inertiajs/vue3'

import 'swiper/css'
import 'swiper/css/navigation'
import 'swiper/css/effect-fade'

const props = defineProps({
  slides: {
    type: Array,
    required: true,
    default: () => [],
  },
})

const modules = [Navigation, Autoplay, EffectFade]
</script>

<style scoped>
.ashram-hero-slider {
  --swiper-navigation-color: #ffffff;
}

/* Cinematic slow zoom */
.hero-video {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  animation: slowZoom 20s ease-in-out infinite alternate;
  filter: brightness(1);
  z-index: 0;
}

@keyframes slowZoom {
  from { transform: scale(1); }
  to { transform: scale(1.08); }
}

/* ── Standard, professional, static nav buttons — no animation ── */
:deep(.story-nav) {
  width: 48px !important;
  height: 48px !important;
  margin-top: -24px !important;
  z-index: 50 !important;
}

:deep(.story-nav::after) {
  font-size: 22px !important;
  font-weight: 700;
  color: #ffffff !important;
}

:deep(.story-nav:hover::after) {
  color: #E1B137 !important;
}

@media (max-width: 768px) {
  :deep(.story-nav) {
    display: none !important;
  }
}
</style>