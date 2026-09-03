<template>
  <div class="page-wrapper font-montserrat">

    <!-- =========================================================
         PAGE HEADER — with background image, shifted to show more top
    ========================================================= -->
    <section class="relative overflow-hidden py-24 md:py-32">
      <!-- Image with custom object-position: 50% 15% moves image down, revealing top -->
      <img
        src="/img/news.jpg"
        alt="News background"
        class="absolute inset-0 w-full h-full object-cover object-[90%_25%]"
      />
      <!-- Dark overlay -->
      <div class="absolute inset-0 bg-[#2b4b58]/70"></div>
      <!-- Subtle dot pattern -->
      <div class="absolute inset-0 opacity-[0.04]"
        style="background-image: radial-gradient(circle, white 1px, transparent 1px); background-size: 28px 28px;"></div>

      <div class="relative max-w-6xl mx-auto px-6 md:px-12 text-center z-10">
        <div class="flex items-center justify-center gap-3 mb-4">
          <div class="w-8 h-0.5 bg-[#E1B137]"></div>
          <span class="text-[#E1B137] text-[10px] font-bold uppercase tracking-[0.35em]">Latest Information</span>
          <div class="w-8 h-0.5 bg-[#E1B137]"></div>
        </div>
        <h1 class="text-4xl md:text-6xl font-serif font-medium text-white leading-tight">
          News & <em class="not-italic text-[#E1B137]">Updates</em>
        </h1>
        <p class="text-white/70 mt-4 max-w-xl mx-auto text-sm leading-relaxed">
          Stay informed on everything happening across the Ashram community.
        </p>
      </div>
    </section>

    <!-- =========================================================
         FULL NEWS GRID
    ========================================================= -->
    <section class="py-20 md:py-28 bg-[#f8f7f4]">
      <div class="max-w-6xl mx-auto px-6 md:px-12">

        <div v-if="newsItems && newsItems.length > 0">
          <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div v-for="news in newsItems" :key="news.id"
              class="group relative bg-white border border-slate-100 overflow-hidden hover:shadow-xl hover:-translate-y-1 transition-all duration-400">
              <div class="absolute bottom-0 left-0 h-0.5 w-0 bg-[#E1B137] group-hover:w-full transition-all duration-500 z-10"></div>
              <div class="relative h-48 overflow-hidden">
                <img :src="news.image" :alt="news.title"
                  class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
                <div class="absolute top-3 left-3">
                  <span class="bg-white/90 text-[#2b4b58] text-[9px] font-bold px-2.5 py-1 uppercase tracking-widest shadow-sm">
                    {{ news.category }}
                  </span>
                </div>
              </div>
              <div class="p-6">
                <div class="flex gap-2 text-slate-400 text-xs mb-3">
                  <span>{{ formatDate(news.date) }}</span>
                  <span>·</span>
                  <span>{{ news.read_time }}</span>
                </div>
                <h3 class="font-serif text-[#2b4b58] text-lg font-medium mb-2 group-hover:text-[#E1B137] transition-colors">
                  {{ news.title }}
                </h3>
                <p class="text-slate-400 text-sm mb-4 line-clamp-2">{{ news.description }}</p>
                <Link :href="news.link || '#'"
                  class="text-[#2b4b58] text-xs font-bold uppercase tracking-wider hover:text-[#E1B137] transition-colors inline-flex items-center gap-1.5">
                  Read More <i class="fa-solid fa-chevron-right text-[9px]"></i>
                </Link>
              </div>
            </div>
          </div>
          <p class="text-center text-slate-400 text-xs mt-10">
            Showing all {{ newsItems.length }} updates
          </p>
        </div>

        <div v-else class="text-center py-20">
          <p class="text-slate-400 text-sm">No news items available yet. Check back soon!</p>
        </div>

      </div>
    </section>

  </div>
</template>

<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue'
import { Link } from '@inertiajs/vue3'

defineOptions({ layout: GuestLayout })

defineProps({
  newsItems: Array,
})

const formatDate = (date) => {
  if (!date) return ''
  try {
    const d = new Date(date)
    return d.toLocaleDateString('en-US', {
      year: 'numeric',
      month: 'short',
      day: 'numeric',
    })
  } catch (e) {
    return date
  }
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700;800&display=swap');

.font-montserrat { font-family: 'Montserrat', sans-serif; }

.line-clamp-2 {
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}
</style>