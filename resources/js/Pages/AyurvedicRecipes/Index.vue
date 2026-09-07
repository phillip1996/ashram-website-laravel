<template>
  <div class="page-wrapper font-body">
    <!-- Hero -->
    <section class="relative min-h-[45vh] flex items-center overflow-hidden bg-[#2b4b58]">
      <img
        src="https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?w=1600&auto=format&fit=crop&q=80"
        alt="Ayurvedic Recipes"
        class="absolute inset-0 w-full h-full object-cover object-center"
      />
      <div class="absolute inset-0 bg-[#0d1e26]/60"></div>
      <div class="absolute inset-0 opacity-[0.04]"
        style="background-image: radial-gradient(circle, white 1px, transparent 1px); background-size: 28px 28px;">
      </div>
      <div class="relative max-w-6xl mx-auto px-6 md:px-12 w-full py-12 md:py-24 z-10">
        <div class="max-w-3xl">
          <div class="flex items-center gap-3 mb-4">
            <div class="w-8 md:w-10 h-px bg-[#E1B137]"></div>
            <span class="text-[#E1B137] text-[10px] md:text-[11px] font-bold uppercase tracking-[0.35em] font-display">Ayurveda</span>
          </div>
          <h1 class="font-display text-3xl sm:text-4xl md:text-5xl lg:text-6xl text-white leading-tight">
            Sacred <em class="not-italic text-[#E1B137]">Recipes</em>
          </h1>
          <p class="text-white/70 text-sm md:text-base lg:text-lg max-w-xl mt-3 md:mt-4 leading-relaxed">
            Ancient wisdom for modern wellness – nourish your body, mind, and spirit with these time‑honoured recipes
          </p>
        </div>
      </div>
    </section>

    <!-- Recipe Grid -->
    <section class="py-12 md:py-20 lg:py-28 bg-[#f8f7f4]">
      <div class="max-w-6xl mx-auto px-6 md:px-12">
        <div v-if="recipes.length === 0" class="text-center py-20">
          <div class="w-20 h-20 bg-[#E1B137]/10 rounded-full flex items-center justify-center mx-auto mb-5">
            <i class="fa-solid fa-mortar-pestle text-3xl text-[#E1B137]"></i>
          </div>
          <h3 class="text-2xl font-serif text-[#2b4b58] mb-2">No Recipes Yet</h3>
          <p class="text-slate-400 text-sm max-w-sm mx-auto">Check back soon for nourishing Ayurvedic recipes.</p>
        </div>

        <div v-else class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          <div v-for="recipe in recipes" :key="recipe.id"
            class="group bg-white border border-slate-100 overflow-hidden hover:shadow-xl hover:-translate-y-1 transition-all duration-400">
            <div class="relative h-52 overflow-hidden">
              <img :src="recipe.image_url || '/img/placeholder-recipe.jpg'" :alt="recipe.title"
                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
              <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent"></div>
              <div class="absolute bottom-3 left-3">
                <span class="bg-[#E1B137] text-[#0d1e26] text-[9px] font-bold px-3 py-1 uppercase tracking-widest">
                  {{ recipe.category_label }}
                </span>
              </div>
              <div v-if="recipe.has_video" class="absolute top-3 right-3 bg-black/60 backdrop-blur-sm text-white text-xs px-2 py-1 rounded flex items-center gap-1">
                <i class="fa-solid fa-play"></i> Video
              </div>
            </div>
            <div class="p-6">
              <h3 class="font-serif text-xl text-[#2b4b58] mb-2 group-hover:text-[#E1B137] transition-colors">
                {{ recipe.title }}
              </h3>
              <p class="text-slate-500 text-sm line-clamp-2">{{ recipe.short_description }}</p>
              <Link :href="'/ayurvedic-recipes/' + recipe.slug"
                class="mt-4 inline-flex items-center gap-2 text-[#2b4b58] hover:text-[#E1B137] text-xs font-bold uppercase tracking-wider transition-colors">
                View Recipe <i class="fa-solid fa-arrow-right text-[10px]"></i>
              </Link>
            </div>
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
  recipes: Array,
})
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Montserrat:wght@300;400;500;600;700&display=swap');

.font-display { font-family: 'Playfair Display', Georgia, serif; }
.font-body { font-family: 'Montserrat', sans-serif; }

.line-clamp-2 {
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}
</style>