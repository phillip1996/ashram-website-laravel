<template>
  <div class="relative">
    <!-- Top Bar: View More + Navigation -->
    <div class="flex items-center justify-between gap-4 mb-6 flex-wrap">
      <!-- Left side - Optional stats -->
      <div v-if="showStats" class="flex items-center gap-2 text-slate-400 text-sm">
        <i class="fa-regular fa-file-lines"></i>
        <span>{{ newsItems.length }} article{{ newsItems.length !== 1 ? 's' : '' }}</span>
      </div>

      <!-- Right side: View More + Navigation -->
      <div class="flex items-center gap-3 ml-auto">
        <!-- ✅ View More Button - Shows when there are MORE than 3 items -->
        <Link
          v-if="newsItems.length > 3"
          href="/news"
          class="inline-flex items-center gap-2 bg-[#2b4b58] text-white px-5 py-2.5 text-[11px] font-bold uppercase tracking-[0.2em] hover:bg-[#E1B137] transition-all duration-300 group"
        >
          View More
          <i class="fa-solid fa-arrow-right text-xs group-hover:translate-x-1 transition-transform"></i>
        </Link>

        <!-- Navigation Buttons -->
        <div class="flex items-center gap-2">
          <button
            @click="prevSlide"
            :disabled="currentSlide === 0"
            class="w-10 h-10 flex items-center justify-center border border-slate-300 text-slate-600 hover:bg-[#2b4b58] hover:text-white hover:border-[#2b4b58] transition-all disabled:opacity-30 disabled:pointer-events-none"
            aria-label="Previous slide"
          >
            <i class="fa-solid fa-chevron-left text-xs"></i>
          </button>
          <button
            @click="nextSlide"
            :disabled="currentSlide >= totalSlides - 1"
            class="w-10 h-10 flex items-center justify-center border border-slate-300 text-slate-600 hover:bg-[#2b4b58] hover:text-white hover:border-[#2b4b58] transition-all disabled:opacity-30 disabled:pointer-events-none"
            aria-label="Next slide"
          >
            <i class="fa-solid fa-chevron-right text-xs"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Slides Container -->
    <div class="overflow-hidden">
      <div 
        class="flex transition-transform duration-500 ease-out"
        :style="{ transform: `translateX(-${currentSlide * 100}%)` }"
      >
        <div 
          v-for="(page, index) in slides" 
          :key="index"
          class="grid grid-cols-1 md:grid-cols-3 gap-6 shrink-0 w-full"
        >
          <div 
            v-for="item in page" 
            :key="item.id"
            class="group relative bg-white border border-slate-100 overflow-hidden hover:shadow-xl hover:-translate-y-1 transition-all duration-400"
          >
            <div class="absolute bottom-0 left-0 h-0.5 w-0 bg-[#E1B137] group-hover:w-full transition-all duration-500 z-10"></div>
            <div class="relative h-48 overflow-hidden">
              <img 
                :src="item.image" 
                :alt="item.title"
                loading="lazy"
                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" 
              />
              <div class="absolute inset-0 bg-gradient-to-t from-[#2b4b58]/20 to-transparent"></div>
              <div class="absolute top-3 left-3">
                <span class="bg-white/90 text-[#2b4b58] text-[9px] font-bold px-2.5 py-1 uppercase tracking-widest shadow-sm">
                  {{ item.category }}
                </span>
              </div>
            </div>
            <div class="p-6">
              <div class="flex gap-2 text-slate-400 text-xs mb-3">
                <span><i class="fa-regular fa-calendar mr-1"></i>{{ formatDate(item.date) }}</span>
                <span>·</span>
                <span><i class="fa-regular fa-clock mr-1"></i>{{ item.read_time || item.readTime }}</span>
              </div>
              <h3 class="font-serif text-[#2b4b58] text-lg font-medium mb-2 group-hover:text-[#E1B137] transition-colors line-clamp-2">
                {{ item.title }}
              </h3>
              <!-- ✅ Clean excerpt: HTML stripped, no raw tags shown -->
              <p class="text-slate-400 text-sm mb-4 line-clamp-2">{{ stripHtml(item.description) }}</p>
              <div class="flex items-center justify-between pt-3 border-t border-slate-100">
                <Link 
                  :href="item.link || `/news/${item.id}`"
                  class="text-[#2b4b58] text-xs font-bold uppercase tracking-wider hover:text-[#E1B137] transition-colors inline-flex items-center gap-1.5"
                >
                  Read More <i class="fa-solid fa-chevron-right text-[9px]"></i>
                </Link>
                <span class="text-slate-400 text-xs">
                  <i class="fa-regular fa-eye mr-1"></i>{{ item.views || 0 }}
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Dot Indicators -->
    <div v-if="totalSlides > 1" class="flex items-center justify-center gap-2 mt-6">
      <button
        v-for="index in totalSlides"
        :key="index - 1"
        @click="goToSlide(index - 1)"
        class="w-2.5 h-2.5 rounded-full transition-all duration-300"
        :class="currentSlide === index - 1 ? 'bg-[#E1B137] w-6' : 'bg-slate-300 hover:bg-slate-400'"
        :aria-label="`Go to slide ${index}`"
      ></button>
    </div>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue'
import { Link } from '@inertiajs/vue3'

const props = defineProps({
  newsItems: {
    type: Array,
    required: true,
    default: () => []
  },
  itemsPerPage: {
    type: Number,
    default: 3
  },
  showStats: {
    type: Boolean,
    default: true
  }
})

const currentSlide = ref(0)

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

/**
 * Strip HTML tags from a string for use in card excerpts.
 * Decodes common HTML entities so they display cleanly.
 */
const stripHtml = (html) => {
  if (!html) return ''
  return String(html)
    .replace(/<[^>]*>/g, ' ')       // replace tags with a space
    .replace(/&nbsp;/g, ' ')
    .replace(/&amp;/g, '&')
    .replace(/&lt;/g, '<')
    .replace(/&gt;/g, '>')
    .replace(/&quot;/g, '"')
    .replace(/&#39;/g, "'")
    .replace(/\s+/g, ' ')           // collapse whitespace
    .trim()
}

const slides = computed(() => {
  if (!props.newsItems || props.newsItems.length === 0) return []
  
  const items = [...props.newsItems]
  const pages = []
  
  for (let i = 0; i < items.length; i += props.itemsPerPage) {
    pages.push(items.slice(i, i + props.itemsPerPage))
  }
  
  return pages
})

const totalSlides = computed(() => slides.value.length)

const nextSlide = () => {
  if (currentSlide.value < totalSlides.value - 1) {
    currentSlide.value++
  }
}

const prevSlide = () => {
  if (currentSlide.value > 0) {
    currentSlide.value--
  }
}

const goToSlide = (index) => {
  currentSlide.value = index
}
</script>

<style scoped>
.line-clamp-2 {
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}
</style>