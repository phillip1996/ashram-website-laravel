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
          <span class="text-[#E1B137] text-[10px] font-bold uppercase tracking-[0.35em]">{{ newsItem.category }}</span>
        </div>
        <h1 class="font-display text-3xl md:text-5xl text-white leading-tight mb-4">
          {{ newsItem.title }}
        </h1>
        <div class="flex items-center gap-4 text-white/50 text-sm">
          <span>{{ formatDate(newsItem.date) }}</span>
          <span>·</span>
          <span>{{ newsItem.read_time }}</span>
        </div>
      </div>
    </section>

    <!-- Content -->
    <section class="py-16 md:py-20 bg-[#f8f7f4]">
      <div class="max-w-3xl mx-auto px-6 md:px-12">
        <div class="bg-white rounded-xl shadow-sm border border-slate-100 p-6 md:p-10">
          <!-- Featured Image -->
          <div v-if="newsItem.image" class="rounded-lg overflow-hidden mb-8">
            <img :src="newsItem.image" :alt="newsItem.title"
              class="w-full h-auto object-cover" />
          </div>

          <!-- Description -->
          <div class="news-content" v-html="newsItem.description"></div>

          <!-- Back link -->
          <div class="mt-10 pt-6 border-t border-slate-100">
            <Link href="/#news-updates"
              class="inline-flex items-center gap-2 text-[#2b4b58] hover:text-[#E1B137] transition-colors text-sm font-medium">
              <i class="fa-solid fa-arrow-left"></i>
              Back to News & Updates
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
  newsItem: Object
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

/* ============================================
   CONTENT STYLING
   ============================================ */

/* Paragraphs */
.news-content :deep(p) {
  margin-bottom: 1rem;
  line-height: 1.75;
  color: #475569;
}

/* Headings */
.news-content :deep(h1),
.news-content :deep(h2),
.news-content :deep(h3),
.news-content :deep(h4) {
  font-family: 'Playfair Display', Georgia, serif;
  color: #2b4b58;
  margin-top: 1.5rem;
  margin-bottom: 0.75rem;
  line-height: 1.3;
}

/* Links */
.news-content :deep(a) {
  color: #E1B137;
  text-decoration: underline;
}

/* Bold */
.news-content :deep(strong),
.news-content :deep(b) {
  color: #1d3b44;
  font-weight: 700;
}

/* ============================================
   LISTS — FIX FOR BULLETS AND NUMBERS
   ============================================ */

/* Unordered lists (bullets) */
.news-content :deep(ul) {
  list-style-type: disc !important;
  list-style-position: outside !important;
  padding-left: 1.75rem !important;
  margin: 1rem 0 1.25rem 0 !important;
}

.news-content :deep(ul > li) {
  list-style-type: disc !important;
  list-style-position: outside !important;
  display: list-item !important;
  margin-bottom: 0.5rem !important;
  padding-left: 0.25rem !important;
  line-height: 1.75 !important;
}

/* Ordered lists (numbers) */
.news-content :deep(ol) {
  list-style-type: decimal !important;
  list-style-position: outside !important;
  padding-left: 1.75rem !important;
  margin: 1rem 0 1.25rem 0 !important;
}

.news-content :deep(ol > li) {
  list-style-type: decimal !important;
  list-style-position: outside !important;
  display: list-item !important;
  margin-bottom: 0.5rem !important;
  padding-left: 0.25rem !important;
  line-height: 1.75 !important;
}

/* Nested lists */
.news-content :deep(ul ul) {
  list-style-type: circle !important;
  margin-top: 0.5rem !important;
  margin-bottom: 0.5rem !important;
}

.news-content :deep(ul ul ul) {
  list-style-type: square !important;
}

.news-content :deep(ol ol) {
  list-style-type: lower-alpha !important;
}

/* Blockquotes */
.news-content :deep(blockquote) {
  border-left: 4px solid #E1B137;
  font-style: italic;
  color: #64748b;
  background: #f8f7f4;
  padding: 1rem 1.5rem;
  border-radius: 0 8px 8px 0;
  margin: 1.5rem 0;
}
</style>