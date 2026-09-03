<template>
  <div v-if="articles && articles.length > 0" class="relative">

    <!-- Single featured article -->
    <div v-if="articles.length === 1" class="bg-white border border-slate-100 overflow-hidden shadow-md hover:shadow-xl transition-all duration-400">
      <div class="flex flex-col lg:flex-row">
        <div class="lg:w-5/12 relative overflow-hidden h-64 lg:h-auto">
          <img :src="articles[0].image" :alt="articles[0].title"
            class="w-full h-full object-cover transition-transform duration-700 hover:scale-105" />
          <div class="absolute top-4 left-4">
            <span class="bg-[#E1B137] text-white text-[10px] font-bold px-3 py-1.5 uppercase tracking-widest">Featured</span>
          </div>
        </div>
        <div class="lg:w-7/12 p-8 md:p-10 lg:p-12 flex flex-col justify-start">
          <div class="flex items-center gap-3 text-slate-400 text-xs mb-4">
            <span><i class="fa-regular fa-calendar mr-1"></i>{{ formatDate(articles[0].date) }}</span>
            <span class="w-1 h-1 rounded-full bg-slate-200"></span>
            <span class="text-[#E1B137] font-semibold">{{ articles[0].category }}</span>
          </div>
          <h3 class="font-serif text-[#2b4b58] text-2xl md:text-3xl font-medium mb-4 leading-tight line-clamp-2">
            {{ articles[0].title }}
          </h3>
          <div class="article-content text-slate-500 text-sm leading-relaxed mb-6 line-clamp-4" v-html="articles[0].description"></div>
          <Link :href="'/article/' + articles[0].id"
            class="inline-flex items-center gap-3 bg-[#2b4b58] text-white px-7 py-3.5 text-[11px] font-bold uppercase tracking-[0.2em] hover:bg-[#E1B137] transition-all duration-300 self-start group">
            Read Full Article
            <i class="fa-solid fa-arrow-right text-xs group-hover:translate-x-1 transition-transform"></i>
          </Link>
        </div>
      </div>
    </div>

    <!-- Carousel for multiple -->
    <template v-else>
      <swiper
        v-if="!useFallback"
        :modules="modules"
        :loop="true"
        :autoplay="{ delay: 6000, disableOnInteraction: false }"
        :pagination="{ clickable: true, el: '.featured-pagination' }"
        class="featured-swiper"
        @swiper="onSwiper"
        @error="handleSwiperError"
      >
        <swiper-slide v-for="article in articles" :key="article.id">
          <div class="bg-white border border-slate-100 overflow-hidden shadow-md hover:shadow-xl transition-all duration-400 h-full">
            <div class="flex flex-col lg:flex-row h-full">
              <div class="lg:w-5/12 relative overflow-hidden h-64 md:h-72 lg:h-auto">
                <img :src="article.image" :alt="article.title"
                  class="w-full h-full object-cover transition-transform duration-700 hover:scale-105" />
                <div class="absolute top-4 left-4">
                  <span class="bg-[#E1B137] text-white text-[10px] font-bold px-3 py-1.5 uppercase tracking-widest">Featured</span>
                </div>
              </div>
              <div class="lg:w-7/12 p-8 md:p-10 lg:p-12 flex flex-col justify-start">
                <div class="flex items-center gap-3 text-slate-400 text-xs mb-4">
                  <span><i class="fa-regular fa-calendar mr-1"></i>{{ formatDate(article.date) }}</span>
                  <span class="w-1 h-1 rounded-full bg-slate-200"></span>
                  <span class="text-[#E1B137] font-semibold">{{ article.category }}</span>
                </div>
                <h3 class="font-serif text-[#2b4b58] text-2xl md:text-3xl font-medium mb-4 leading-tight line-clamp-2">
                  {{ article.title }}
                </h3>
                <div class="article-content text-slate-500 text-sm leading-relaxed mb-6 line-clamp-4" v-html="article.description"></div>
                <Link :href="'/article/' + article.id"
                  class="inline-flex items-center gap-3 bg-[#2b4b58] text-white px-7 py-3.5 text-[11px] font-bold uppercase tracking-[0.2em] hover:bg-[#E1B137] transition-all duration-300 self-start group">
                  Read Full Article
                  <i class="fa-solid fa-arrow-right text-xs group-hover:translate-x-1 transition-transform"></i>
                </Link>
              </div>
            </div>
          </div>
        </swiper-slide>

        <!-- Pagination dots -->
        <div class="featured-pagination absolute bottom-4 left-1/2 -translate-x-1/2 z-20 flex gap-2"></div>
      </swiper>

      <!-- Fallback grid -->
      <div v-else class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div v-for="article in articles" :key="article.id"
          class="bg-white border border-slate-100 overflow-hidden shadow-md hover:shadow-xl transition-all duration-400">
          <div class="relative h-48 overflow-hidden">
            <img :src="article.image" :alt="article.title"
              class="w-full h-full object-cover transition-transform duration-700 hover:scale-105" />
            <div class="absolute top-4 left-4">
              <span class="bg-[#E1B137] text-white text-[10px] font-bold px-3 py-1.5 uppercase tracking-widest">Featured</span>
            </div>
          </div>
          <div class="p-6">
            <div class="flex items-center gap-3 text-slate-400 text-xs mb-4">
              <span><i class="fa-regular fa-calendar mr-1"></i>{{ formatDate(article.date) }}</span>
              <span class="w-1 h-1 rounded-full bg-slate-200"></span>
              <span class="text-[#E1B137] font-semibold">{{ article.category }}</span>
            </div>
            <h3 class="font-serif text-[#2b4b58] text-lg font-medium mb-2 group-hover:text-[#E1B137] transition-colors line-clamp-2">
              {{ article.title }}
            </h3>
            <div class="article-content text-slate-500 text-sm leading-relaxed mb-4 line-clamp-4" v-html="article.description"></div>
            <Link :href="'/article/' + article.id"
              class="inline-flex items-center gap-3 bg-[#2b4b58] text-white px-5 py-2.5 text-[11px] font-bold uppercase tracking-[0.2em] hover:bg-[#E1B137] transition-all duration-300 self-start group">
              Read Full Article
              <i class="fa-solid fa-arrow-right text-xs group-hover:translate-x-1 transition-transform"></i>
            </Link>
          </div>
        </div>
      </div>
    </template>

  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { Swiper, SwiperSlide } from 'swiper/vue'
import { Autoplay, Pagination } from 'swiper/modules'
import { Link } from '@inertiajs/vue3'
import 'swiper/css'
import 'swiper/css/pagination'

const props = defineProps({
  articles: Array,
})

const modules = [Autoplay, Pagination]
const useFallback = ref(false)

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

const onSwiper = (swiper) => {
  // Swiper initialized successfully
}

const handleSwiperError = () => {
  useFallback.value = true
}

onMounted(() => {
  try {
    // Swiper is available
  } catch (e) {
    useFallback.value = true
  }
})
</script>

<style scoped>
.featured-swiper {
  --swiper-pagination-bullet-active: #E1B137;
}
.featured-pagination {
  position: absolute;
  bottom: 1rem;
  left: 50%;
  transform: translateX(-50%);
  z-index: 20;
  display: flex;
  gap: 0.5rem;
}
.featured-pagination .swiper-pagination-bullet {
  width: 0.625rem;
  height: 0.625rem;
  border-radius: 50%;
  background: #cbd5e1;
  opacity: 1;
  transition: all 0.3s ease;
}
.featured-pagination .swiper-pagination-bullet-active {
  background: #E1B137;
  width: 1.5rem;
  border-radius: 0.25rem;
}

.line-clamp-2 {
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}
.line-clamp-6 {
  display: -webkit-box;
  -webkit-line-clamp: 4;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

.swiper-slide {
  height: auto !important;
}
.featured-swiper .swiper-wrapper {
  align-items: stretch;
}
</style>