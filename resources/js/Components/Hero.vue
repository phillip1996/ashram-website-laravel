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
        nextEl: '.swiper-button-next-custom',
        prevEl: '.swiper-button-prev-custom',
      }"
      class="ashram-hero-slider w-full h-full"
      @swiper="onSwiper"
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

      <!-- ─── Custom Navigation Buttons ─── -->
      <button
        class="swiper-button-prev-custom story-nav-prev"
        :class="{ 'is-active': activeNav === 'prev' }"
        aria-label="Previous slide"
        @click="handleNavClick('prev', $event)"
      >
        <span v-if="ripple.dir === 'prev'" :key="ripple.id" class="nav-ripple"></span>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
          <path stroke-linecap="round" stroke-linejoin="round" d="M15 18l-6-6 6-6" />
        </svg>
      </button>
      <button
        class="swiper-button-next-custom story-nav-next"
        :class="{ 'is-active': activeNav === 'next' }"
        aria-label="Next slide"
        @click="handleNavClick('next', $event)"
      >
        <span v-if="ripple.dir === 'next'" :key="ripple.id" class="nav-ripple"></span>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9 18l6-6-6-6" />
        </svg>
      </button>

      <!-- ─── Dot Indicators ─── -->
      <div
        v-if="slides.length > 1"
        class="absolute bottom-8 left-1/2 -translate-x-1/2 z-30 flex gap-2"
      >
        <button
          v-for="(_, idx) in slides"
          :key="idx"
          @click="goToSlide(idx)"
          class="w-2.5 h-2.5 rounded-full transition-all duration-300"
          :class="[
            idx === currentSlide ? 'bg-[#E1B137] w-8' : 'bg-white/40 hover:bg-white/70'
          ]"
        ></button>
      </div>

    </swiper>
  </section>
</template>

<script setup>
import { Swiper, SwiperSlide } from 'swiper/vue'
import { Navigation, Autoplay, EffectFade } from 'swiper/modules'
import { Link } from '@inertiajs/vue3'
import { ref, onMounted, onUnmounted } from 'vue'

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

// ── Swiper instance ──
let swiperInstance = null
const currentSlide = ref(0)

const onSwiper = (swiper) => {
  swiperInstance = swiper
  // Update current slide index on slide change
  swiper.on('slideChange', () => {
    currentSlide.value = swiper.realIndex
  })
}

// ── Go to specific slide (for dots) ──
const goToSlide = (index) => {
  if (swiperInstance) {
    swiperInstance.slideTo(index)
  }
}

// ── Nav button active + ripple state ──
const activeNav = ref(null)
const ripple = ref({ dir: null, id: 0 })
let rippleCounter = 0
let activeTimeout = null
let rippleTimeout = null

const handleNavClick = (dir) => {
  // Pressed/active visual feedback
  activeNav.value = dir
  clearTimeout(activeTimeout)
  activeTimeout = setTimeout(() => {
    if (activeNav.value === dir) activeNav.value = null
  }, 250)

  // Ripple animation, re-triggerable on rapid clicks
  rippleCounter += 1
  ripple.value = { dir, id: rippleCounter }
  clearTimeout(rippleTimeout)
  rippleTimeout = setTimeout(() => {
    ripple.value = { dir: null, id: rippleCounter }
  }, 500)
}

// ── Clean up ──
onUnmounted(() => {
  clearTimeout(activeTimeout)
  clearTimeout(rippleTimeout)
  if (swiperInstance) {
    swiperInstance.destroy(true, true)
    swiperInstance = null
  }
})
</script>

<style scoped>
.ashram-hero-slider {
  --swiper-navigation-color: #ffffff;
  --swiper-navigation-size: 0px; /* Hide default arrows */
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

/* ── Custom Navigation Buttons ── */
.story-nav-prev,
.story-nav-next {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  z-index: 30;
  width: 48px;
  height: 48px;
  border-radius: 50%;
  background: rgba(0, 0, 0, 0.35);
  backdrop-filter: blur(8px);
  border: 1px solid rgba(255, 255, 255, 0.25);
  color: #ffffff;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  overflow: hidden;
  transition: background 0.25s ease, border-color 0.25s ease, transform 0.2s ease, box-shadow 0.25s ease;
  outline: none;
}

.story-nav-prev {
  left: 20px;
}
.story-nav-next {
  right: 20px;
}

.story-nav-prev svg,
.story-nav-next svg {
  position: relative;
  z-index: 2;
}

.story-nav-prev:hover,
.story-nav-next:hover {
  background: rgba(0, 0, 0, 0.55);
  border-color: rgba(255, 255, 255, 0.5);
}

.story-nav-prev:focus-visible,
.story-nav-next:focus-visible {
  border-color: #E1B137;
  box-shadow: 0 0 0 3px rgba(225, 177, 55, 0.3);
}

/* Real "clicked" feedback, driven by JS state, not just :active */
.story-nav-prev.is-active,
.story-nav-next.is-active,
.story-nav-prev:active,
.story-nav-next:active {
  background: #E1B137;
  border-color: #E1B137;
  color: #000000;
  transform: translateY(-50%) scale(0.92);
  box-shadow: 0 0 0 4px rgba(225, 177, 55, 0.25);
}

/* ── Ripple/pulse on click ── */
.nav-ripple {
  position: absolute;
  inset: 0;
  z-index: 1;
  border-radius: 50%;
  background: rgba(225, 177, 55, 0.55);
  transform: scale(0);
  opacity: 1;
  animation: navRipple 0.5s ease-out forwards;
  pointer-events: none;
}

@keyframes navRipple {
  0% {
    transform: scale(0);
    opacity: 0.7;
  }
  100% {
    transform: scale(2.4);
    opacity: 0;
  }
}

/* ── Responsive ── */
@media (max-width: 768px) {
  .story-nav-prev,
  .story-nav-next {
    width: 40px;
    height: 40px;
    top: auto;
    bottom: 20px;
    transform: none;
    background: rgba(0, 0, 0, 0.5);
    backdrop-filter: blur(4px);
  }
  .story-nav-prev {
    left: 20px;
    bottom: 20px;
    top: auto;
    transform: none;
  }
  .story-nav-next {
    right: 20px;
    bottom: 20px;
    top: auto;
    transform: none;
  }
  .story-nav-prev:hover,
  .story-nav-next:hover {
    transform: scale(1.05);
  }
  .story-nav-prev.is-active,
  .story-nav-next.is-active,
  .story-nav-prev:active,
  .story-nav-next:active {
    transform: scale(0.92);
  }
  .story-nav-prev svg,
  .story-nav-next svg {
    width: 18px;
    height: 18px;
  }
}

/* ── Dot indicators ── */
@media (max-width: 768px) {
  .bottom-8 {
    bottom: 80px; /* Move dots up to avoid overlapping buttons */
  }
}
</style>