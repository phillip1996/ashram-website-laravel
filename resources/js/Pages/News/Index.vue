<template>
  <div class="page-wrapper font-body">

    <!-- Hero -->
    <section class="relative min-h-[40vh] flex items-center overflow-hidden bg-[#2b4b58]">
      <div class="absolute inset-0 opacity-[0.04]"
        style="background-image: radial-gradient(circle, white 1px, transparent 1px); background-size: 28px 28px;">
      </div>
      <div class="relative max-w-6xl mx-auto px-6 md:px-12 w-full py-16 md:py-20">
        <div class="flex items-center gap-3 mb-4">
          <div class="w-8 h-px bg-[#E1B137]"></div>
          <span class="text-[#E1B137] text-[10px] font-bold uppercase tracking-[0.35em]">
            <i class="fa-solid fa-newspaper mr-2"></i>Latest Information
          </span>
        </div>
        <h1 class="font-display text-3xl md:text-5xl text-white leading-tight">
          News & <em class="not-italic text-[#E1B137]">Updates</em>
        </h1>
        <p class="text-white/50 text-sm mt-3 max-w-md">
          Stay informed with the latest news and updates from The Lekki Ashram.
        </p>
      </div>
    </section>

    <!-- News Grid / Carousel -->
    <section class="py-16 md:py-24 bg-[#f8f7f4]">
      <div class="max-w-6xl mx-auto px-6 md:px-12">

        <div v-if="newsItems && newsItems.length > 0">
          <!-- Stats -->
          <div class="flex items-center gap-2 text-slate-400 text-sm mb-6">
            <i class="fa-regular fa-file-lines"></i>
            <span>{{ newsItems.length }} article{{ newsItems.length !== 1 ? 's' : '' }}</span>
          </div>

          <!-- ✅ News Carousel -->
          <NewsCarousel :news-items="newsItems" />
        </div>

        <div v-else class="text-center py-16">
          <div class="w-16 h-16 bg-[#E1B137]/10 rounded-full flex items-center justify-center mx-auto mb-4">
            <i class="fa-solid fa-newspaper text-2xl text-[#E1B137]"></i>
          </div>
          <p class="text-slate-400 text-sm">No news items available yet. Check back soon!</p>
        </div>

      </div>
    </section>

  </div>
</template>

<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue'
import NewsCarousel from '@/Components/NewsCarousel.vue'

defineOptions({ layout: GuestLayout })

defineProps({
  newsItems: Array
})
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Montserrat:wght@300;400;500;600;700&display=swap');

.font-display { font-family: 'Playfair Display', Georgia, serif; }
.font-body { font-family: 'Montserrat', sans-serif; }
</style>