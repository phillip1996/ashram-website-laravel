<template>
  <div class="page-wrapper font-body">

    <!-- =========================================================
         HERO
    ========================================================= -->
    <section class="relative min-h-[40vh] md:min-h-[50vh] flex items-center overflow-hidden bg-[#2b4b58]">
      <img
        :src="recipe.image_url || '/img/placeholder-recipe.jpg'"
        :alt="recipe.title"
        class="absolute inset-0 w-full h-full object-cover object-center"
      />
      <div class="absolute inset-0 bg-[#0d1e26]/60"></div>
      <div class="absolute inset-0 opacity-[0.04]"
        style="background-image: radial-gradient(circle, white 1px, transparent 1px); background-size: 28px 28px;">
      </div>
      <div class="relative max-w-6xl mx-auto px-6 md:px-12 w-full py-16 md:py-24 z-10">
        <div class="max-w-3xl">
          <div class="flex items-center gap-3 mb-4">
            <span class="text-[#E1B137] text-[10px] md:text-[11px] font-bold uppercase tracking-[0.35em] font-display">
              {{ recipe.category_label }}
            </span>
            <span class="text-white/40">•</span>
            <Link href="/#ayurvedic-recipes" class="text-white/40 hover:text-white text-xs uppercase tracking-wider transition-colors">
              ← Back
            </Link>
          </div>
          <h1 class="font-display text-3xl sm:text-4xl md:text-5xl lg:text-6xl text-white leading-tight">
            {{ recipe.title }}
          </h1>
          <p class="text-white/70 text-base md:text-lg mt-4 max-w-2xl leading-relaxed">
            {{ recipe.description }}
          </p>
        </div>
      </div>
    </section>

    <!-- =========================================================
         CONTENT
    ========================================================= -->
    <section class="py-16 md:py-24 bg-[#f8f7f4]">
      <div class="max-w-5xl mx-auto px-6 md:px-12">

        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 md:p-10 lg:p-14">

          <!-- VIDEO / IMAGE -->
          <div v-if="recipe.has_video" class="mb-12 rounded-xl overflow-hidden shadow-lg">
            <video v-if="recipe.video_file_url" controls class="w-full aspect-video">
              <source :src="recipe.video_file_url" type="video/mp4" />
              <source :src="recipe.video_file_url" type="video/webm" />
              <source :src="recipe.video_file_url" type="video/ogg" />
              Your browser does not support the video tag.
            </video>
            <iframe
              v-else-if="recipe.embed_video_url"
              :src="recipe.embed_video_url"
              class="w-full aspect-video"
              frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
              allowfullscreen
            ></iframe>
          </div>

          <div v-else-if="recipe.image_url" class="mb-12 rounded-xl overflow-hidden shadow-lg">
            <img :src="recipe.image_url" :alt="recipe.title" class="w-full h-auto" />
          </div>

          <!-- INGREDIENTS (only if not empty) -->
          <div v-if="recipe.ingredients && recipe.ingredients.trim() !== ''" class="mb-12">
            <div class="flex items-center gap-4 mb-6">
              <div class="w-1 h-8 bg-[#E1B137] rounded-full"></div>
              <h2 class="text-2xl md:text-3xl font-serif text-[#2b4b58] font-medium">Ingredients</h2>
            </div>
            <div class="pl-6 space-y-2 text-slate-700 leading-relaxed whitespace-pre-wrap text-base md:text-lg">
              {{ recipe.ingredients }}
            </div>
          </div>

          <!-- INSTRUCTIONS (only if not empty) -->
          <div v-if="recipe.instructions && recipe.instructions.trim() !== ''" class="mb-12">
            <div class="flex items-center gap-4 mb-6">
              <div class="w-1 h-8 bg-[#E1B137] rounded-full"></div>
              <h2 class="text-2xl md:text-3xl font-serif text-[#2b4b58] font-medium">Instructions</h2>
            </div>
            <div class="pl-6 space-y-2 text-slate-700 leading-relaxed whitespace-pre-wrap text-base md:text-lg">
              {{ recipe.instructions }}
            </div>
          </div>

          <!-- GALLERY -->
          <div v-if="recipe.gallery_images && recipe.gallery_images.length > 0" class="mb-12">
            <div class="flex items-center gap-4 mb-6">
              <div class="w-1 h-8 bg-[#E1B137] rounded-full"></div>
              <h2 class="text-2xl md:text-3xl font-serif text-[#2b4b58] font-medium">Recipe Gallery</h2>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
              <div v-for="(item, index) in recipe.gallery_images" :key="item.id"
                class="relative overflow-hidden rounded-lg group cursor-pointer aspect-square"
                @click="openLightbox(index)">
                <img :src="item.image_url" :alt="item.caption || 'Gallery image'"
                  class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
                <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <div v-if="item.caption" class="absolute bottom-0 left-0 right-0 p-3 bg-black/60 text-white text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300 truncate">
                  {{ item.caption }}
                </div>
                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                  <div class="w-12 h-12 bg-black/50 rounded-full flex items-center justify-center text-white">
                    <i class="fa-solid fa-expand text-lg"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- SHARE & BACK -->
          <div class="pt-8 border-t border-slate-200 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <Link href="/#ayurvedic-recipes" class="text-[#2b4b58] hover:text-[#E1B137] transition-colors inline-flex items-center gap-2 font-medium text-sm">
              <i class="fa-solid fa-arrow-left"></i> Back
            </Link>

            <div class="flex items-center gap-2">
              <span class="text-xs text-slate-400 font-medium uppercase tracking-wider mr-1">Share:</span>

              <a
                :href="`https://wa.me/?text=${encodeURIComponent(recipe.title + ' — ' + shareUrl)}`"
                target="_blank"
                rel="noopener noreferrer"
                class="w-9 h-9 rounded-full bg-[#25D366] text-white flex items-center justify-center hover:scale-110 transition-transform duration-200"
                title="Share on WhatsApp"
              >
                <i class="fa-brands fa-whatsapp text-sm"></i>
              </a>

              <a
                :href="`https://twitter.com/intent/tweet?url=${encodeURIComponent(shareUrl)}&text=${encodeURIComponent('Check out this Ayurvedic recipe: ' + recipe.title)}`"
                target="_blank"
                rel="noopener noreferrer"
                class="w-9 h-9 rounded-full bg-[#000000] text-white flex items-center justify-center hover:scale-110 transition-transform duration-200"
                title="Share on X"
              >
                <i class="fa-brands fa-x-twitter text-sm"></i>
              </a>

              <button
                @click="copyLink"
                class="w-9 h-9 rounded-full bg-[#2b4b58] text-white flex items-center justify-center hover:scale-110 transition-transform duration-200"
                title="Copy link"
              >
                <i class="fa-regular fa-copy text-sm"></i>
              </button>

              <button
                @click="shareInstagram"
                class="w-9 h-9 rounded-full bg-gradient-to-r from-[#f09433] to-[#e6683c] text-white flex items-center justify-center hover:scale-110 transition-transform duration-200"
                title="Share on Instagram"
              >
                <i class="fa-brands fa-instagram text-sm"></i>
              </button>
            </div>
          </div>

        </div>
      </div>
    </section>

    <!-- LIGHTBOX MODAL -->
    <Teleport to="body">
      <Transition name="modal">
        <div v-if="lightboxIndex !== null && recipe.gallery_images && recipe.gallery_images.length > 0"
          class="fixed inset-0 z-[100] bg-black/95 flex items-center justify-center p-4"
          @click="closeLightbox">
          <div class="relative max-w-5xl w-full" @click.stop>
            <button @click="closeLightbox"
              class="absolute -top-12 right-0 text-white/60 hover:text-white text-3xl transition-colors">
              <i class="fa-solid fa-xmark"></i>
            </button>

            <img :src="recipe.gallery_images[lightboxIndex]?.image_url"
              :alt="recipe.gallery_images[lightboxIndex]?.caption || 'Gallery image'"
              class="w-full h-auto max-h-[80vh] object-contain rounded-lg" />

            <div v-if="recipe.gallery_images[lightboxIndex]?.caption"
              class="text-center text-white/60 text-sm mt-3">
              {{ recipe.gallery_images[lightboxIndex].caption }}
            </div>

            <div class="flex items-center justify-center gap-6 mt-5">
              <button @click="prevLightbox"
                class="text-white/50 hover:text-white text-2xl transition-colors p-2">
                <i class="fa-solid fa-chevron-left"></i>
              </button>
              <span class="text-white/40 text-sm font-medium">
                {{ lightboxIndex + 1 }} / {{ recipe.gallery_images.length }}
              </span>
              <button @click="nextLightbox"
                class="text-white/50 hover:text-white text-2xl transition-colors p-2">
                <i class="fa-solid fa-chevron-right"></i>
              </button>
            </div>
          </div>
        </div>
      </Transition>
    </Teleport>

  </div>
</template>

<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue'
import { Link } from '@inertiajs/vue3'
import { useToast } from '@/Composables/useToast'
import { computed, ref } from 'vue'

defineOptions({ layout: GuestLayout })

const props = defineProps({
  recipe: Object,
})

const { showToast } = useToast()

const shareUrl = computed(() => window.location.href)

// ─── Lightbox ───
const lightboxIndex = ref(null)

const hasGallery = computed(() => {
  return props.recipe.gallery_images && props.recipe.gallery_images.length > 0
})

const openLightbox = (index) => {
  if (!hasGallery.value) return
  lightboxIndex.value = index
  document.body.style.overflow = 'hidden'
}

const closeLightbox = () => {
  lightboxIndex.value = null
  document.body.style.overflow = ''
}

const nextLightbox = () => {
  if (!hasGallery.value) return
  if (lightboxIndex.value < props.recipe.gallery_images.length - 1) {
    lightboxIndex.value++
  }
}

const prevLightbox = () => {
  if (!hasGallery.value) return
  if (lightboxIndex.value > 0) {
    lightboxIndex.value--
  }
}

// ─── Share functions ───
const copyLink = () => {
  if (navigator.clipboard && navigator.clipboard.writeText) {
    navigator.clipboard.writeText(shareUrl.value)
      .then(() => {
        showToast('Link copied to clipboard!', 'success')
      })
      .catch(() => {
        fallbackCopyLink()
      })
  } else {
    fallbackCopyLink()
  }
}

const fallbackCopyLink = () => {
  const textArea = document.createElement('textarea')
  textArea.value = shareUrl.value
  document.body.appendChild(textArea)
  textArea.select()
  try {
    document.execCommand('copy')
    showToast('Link copied to clipboard!', 'success')
  } catch (err) {
    showToast('Failed to copy link. Please copy manually.', 'error')
  }
  document.body.removeChild(textArea)
}

const shareInstagram = () => {
  const instagramUrl = 'https://www.instagram.com/';
  window.open(instagramUrl, '_blank');
  copyLink();
  setTimeout(() => {
    showToast('Open Instagram and paste the link in your bio, story, or post.', 'info');
  }, 500);
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Montserrat:wght@300;400;500;600;700&display=swap');

.font-display { font-family: 'Playfair Display', Georgia, serif; }
.font-body { font-family: 'Montserrat', sans-serif; }

.whitespace-pre-wrap {
  white-space: pre-wrap;
}

.modal-enter-active,
.modal-leave-active {
  transition: opacity 0.3s ease;
}
.modal-enter-from,
.modal-leave-to {
  opacity: 0;
}
</style>