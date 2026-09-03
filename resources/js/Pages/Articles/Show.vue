<template>
  <div class="page-wrapper font-body">

    <!-- Hero -->
    <section class="relative min-h-[50vh] flex items-center overflow-hidden bg-[#2b4b58]">
      <div class="absolute inset-0 opacity-[0.04]"
        style="background-image: radial-gradient(circle, white 1px, transparent 1px); background-size: 28px 28px;">
      </div>
      <div class="relative max-w-4xl mx-auto px-6 md:px-12 w-full py-16 md:py-24">
        <div class="flex items-center gap-3 mb-4">
          <div class="w-8 h-px bg-[#E1B137]"></div>
          <span class="text-[#E1B137] text-[10px] font-bold uppercase tracking-[0.35em]">{{ article.category }}</span>
        </div>
        <h1 class="font-display text-3xl md:text-5xl text-white leading-tight mb-4">
          {{ article.title }}
        </h1>
        <div class="flex items-center gap-4 text-white/50 text-sm">
          <span>{{ formatDate(article.date) }}</span>
          <span>·</span>
          <span>{{ article.read_time }}</span>
        </div>
      </div>
    </section>

    <!-- Content -->
    <section class="py-16 md:py-20 bg-[#f8f7f4]">
      <div class="max-w-3xl mx-auto px-6 md:px-12">
        <div class="bg-white rounded-xl shadow-sm border border-slate-100 p-6 md:p-10">
          <!-- Featured Image -->
          <div class="rounded-lg overflow-hidden mb-8">
            <img :src="article.image" :alt="article.title"
              class="w-full h-auto object-cover" />
          </div>

          <!-- Description -->
          <div class="prose prose-lg prose-slate max-w-none"
            v-html="article.content || article.description">
          </div>

          <!-- Back link -->
          <div class="mt-10 pt-6 border-t border-slate-100">
            <Link href="/#recent-articles"
              class="inline-flex items-center gap-2 text-[#2b4b58] hover:text-[#E1B137] transition-colors text-sm font-medium">
              <i class="fa-solid fa-arrow-left"></i>
              Back to Insights
            </Link>
          </div>
        </div>
      </div>
    </section>

  </div>
</template>

<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue'
import { Link } from '@inertiajs/vue3'

defineOptions({ layout: GuestLayout })

const props = defineProps({
  article: Object
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
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Montserrat:wght@300;400;500;600;700&display=swap');

.font-display { font-family: 'Playfair Display', Georgia, serif; }
.font-body { font-family: 'Montserrat', sans-serif; }
</style>