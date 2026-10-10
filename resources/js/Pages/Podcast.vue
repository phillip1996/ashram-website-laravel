<template>
  <div class="page-wrapper font-montserrat" v-cloak>

    <Head :title="`${podcast.title} - The Lekki Ashram`">
      <meta name="description" :content="metaDescription" />

      <!-- Open Graph Tags -->
      <meta property="og:title" :content="`${podcast.title} - The Lekki Ashram`" />
      <meta property="og:description" :content="metaDescription" />
      <meta property="og:type" content="article" />
      <meta property="og:url" :content="currentUrl" />
      <meta property="og:image" :content="podcast.thumbnail" />
      <meta property="og:site_name" content="The Lekki Ashram" />

      <!-- Twitter Card -->
      <meta name="twitter:card" content="summary_large_image" />
      <meta name="twitter:title" :content="`${podcast.title} - The Lekki Ashram`" />
      <meta name="twitter:description" :content="metaDescription" />
      <meta name="twitter:image" :content="podcast.thumbnail" />

      <link rel="canonical" :href="currentUrl" />
    </Head>

    <!-- =========================================================
         HERO / EPISODE HEADER
    ========================================================= -->
    <section class="pt-32 pb-16 md:pt-40 md:pb-20 bg-[#2b4b58] relative overflow-hidden">
      <div class="absolute inset-0 opacity-[0.04]"
        style="background-image: radial-gradient(circle, white 1px, transparent 1px); background-size: 28px 28px;"></div>

      <div class="relative max-w-5xl mx-auto px-6 md:px-12">
        <!-- Breadcrumb -->
        <nav class="flex items-center gap-2 text-white/40 text-xs mb-8">
          <Link href="/" class="hover:text-[#E1B137] transition-colors">Home</Link>
          <i class="fa-solid fa-chevron-right text-[8px]"></i>
          <a href="/#wisdom-series" class="hover:text-[#E1B137] transition-colors">The Ashram Dialogues</a>
          <i class="fa-solid fa-chevron-right text-[8px]"></i>
          <span class="text-white/70 truncate max-w-[200px]">Ep. {{ podcast.episode }}</span>
        </nav>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 items-start">
          <!-- Thumbnail -->
          <div class="md:col-span-1">
            <div class="relative overflow-hidden shadow-2xl">
              <img :src="podcast.thumbnail" :alt="podcast.title"
                class="w-full h-auto object-cover" />
              <div class="absolute top-3 left-3">
                <span class="bg-[#E1B137] text-white text-[10px] font-bold px-3 py-1.5 uppercase tracking-widest">
                  Ep. {{ podcast.episode }}
                </span>
              </div>
            </div>
          </div>

          <!-- Meta + Play -->
          <div class="md:col-span-2 text-white">
            <div class="flex items-center gap-3 mb-4">
              <div class="w-8 h-0.5 bg-[#E1B137]"></div>
              <span class="text-[#E1B137] text-[10px] font-bold uppercase tracking-[0.35em]">{{ podcast.category }}</span>
            </div>

            <h1 class="text-3xl md:text-4xl lg:text-5xl font-serif font-medium leading-tight mb-5">
              {{ podcast.title }}
            </h1>

            <div class="flex flex-wrap items-center gap-x-6 gap-y-2 text-sm text-white/60 mb-8">
              <span class="flex items-center gap-2">
                <i class="fa-regular fa-calendar text-[#E1B137]"></i>
                {{ formatDate(podcast.date) }}
              </span>
              <span class="flex items-center gap-2">
                <i class="fa-regular fa-clock text-[#E1B137]"></i>
                {{ podcast.duration }}
              </span>
              <span class="flex items-center gap-2">
                <i class="fa-solid fa-headphones text-[#E1B137]"></i>
                {{ podcast.listens }} listens
              </span>
            </div>

            <!-- Speaker -->
            <div class="flex items-center gap-3 mb-8">
              <div class="w-12 h-12 rounded-full overflow-hidden border-2 border-[#E1B137]/40 shadow-sm shrink-0">
                <img :src="podcast.speaker_avatar" :alt="podcast.speaker_name" class="w-full h-full object-cover" />
              </div>
              <div>
                <p class="text-white text-sm font-semibold">{{ podcast.speaker_name }}</p>
                <p class="text-white/50 text-xs">{{ podcast.speaker_role }}</p>
              </div>
            </div>

            <!-- Play button -->
            <button v-if="podcast.audio" @click="togglePlay"
              :aria-label="isPlaying ? 'Pause episode' : 'Play episode'"
              class="inline-flex items-center gap-3 bg-[#E1B137] hover:bg-white text-white hover:text-[#2b4b58] px-7 py-4 text-[11px] font-bold uppercase tracking-[0.2em] transition-all duration-300 group">
              <i :class="isPlaying ? 'fa-solid fa-pause' : 'fa-solid fa-play'"></i>
              {{ isPlaying ? 'Pause Episode' : 'Play Episode' }}
              <i class="fa-solid fa-headphones text-xs group-hover:translate-x-1 transition-transform"></i>
            </button>
          </div>
        </div>
      </div>
    </section>

    <!-- =========================================================
         FULL DESCRIPTION / SHOW NOTES
    ========================================================= -->
    <section class="py-16 md:py-24 bg-[#f8f7f4]">
      <div class="max-w-3xl mx-auto px-6 md:px-12">

        <div class="flex items-center gap-3 mb-8">
          <div class="w-8 h-0.5 bg-[#E1B137]"></div>
          <span class="text-[#E1B137] text-[10px] font-bold uppercase tracking-[0.35em]">Episode Notes</span>
        </div>

        <!-- Full description, preserving newlines from the admin textarea -->
        <div class="prose-episode text-slate-600 text-base leading-relaxed" v-html="podcast.description"></div>

        <!-- Back link -->
        <div class="mt-14 pt-8 border-t border-slate-200">
          <Link href="/#wisdom-series"
            class="inline-flex items-center gap-2 text-[#2b4b58] hover:text-[#E1B137] text-xs font-bold uppercase tracking-wider transition-colors">
            <i class="fa-solid fa-arrow-left text-[10px]"></i>
            Back to All Episodes
          </Link>
        </div>

      </div>
    </section>

    <!-- =========================================================
         RELATED EPISODES
    ========================================================= -->
    <section v-if="related && related.length > 0" class="py-16 md:py-24 bg-white">
      <div class="max-w-6xl mx-auto px-6 md:px-12">

        <div class="text-center mb-14">
          <div class="flex items-center justify-center gap-3 mb-4">
            <div class="w-8 h-0.5 bg-[#E1B137]"></div>
            <span class="text-[#E1B137] text-[10px] font-bold uppercase tracking-[0.35em]">Continue Listening</span>
            <div class="w-8 h-0.5 bg-[#E1B137]"></div>
          </div>
          <h2 class="text-3xl md:text-4xl font-serif font-medium text-[#2b4b58]">
            More <em class="not-italic text-[#E1B137]">Episodes</em>
          </h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 items-stretch">
          <Link v-for="ep in related" :key="ep.id"
            :href="'/podcasts/' + ep.id"
            class="group flex flex-col h-full bg-white border border-slate-100 overflow-hidden hover:shadow-xl hover:-translate-y-1 transition-all duration-400">
            <div class="relative h-44 overflow-hidden shrink-0">
              <img :src="ep.thumbnail" :alt="ep.title"
                loading="lazy"
                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" />
              <div class="absolute inset-0 bg-gradient-to-t from-[#2b4b58]/70 to-transparent"></div>
              <div class="absolute top-3 left-3">
                <span class="bg-[#E1B137] text-white text-[9px] font-bold px-2.5 py-1 uppercase tracking-widest">Ep. {{ ep.episode }}</span>
              </div>
              <div class="absolute top-3 right-3 bg-black/50 text-white text-[10px] px-2 py-1 backdrop-blur-sm">
                {{ ep.duration }}
              </div>
            </div>
            <div class="p-6 flex flex-col flex-1">
              <div class="flex justify-between items-center gap-2 mb-2">
                <span class="text-[#E1B137] text-[9px] font-bold uppercase tracking-[0.25em]">{{ ep.category }}</span>
                <span class="text-slate-400 text-xs text-nowrap">{{ formatDate(ep.date) }}</span>
              </div>
              <h3 class="font-serif text-[#2b4b58] text-lg font-medium mb-2 leading-snug group-hover:text-[#E1B137] transition-colors">
                {{ ep.title }}
              </h3>
              <p class="text-slate-400 text-sm leading-relaxed line-clamp-2 min-h-[2.5rem] sm:min-h-[2.75rem]">{{ stripHtml(ep.description) }}</p>
              <div class="flex items-center gap-2.5 mt-auto pt-4 border-t border-slate-100">
                <div class="w-8 h-8 rounded-full overflow-hidden border-2 border-white shadow-sm shrink-0">
                  <img :src="ep.speaker_avatar" :alt="ep.speaker_name" loading="lazy" class="w-full h-full object-cover" />
                </div>
                <div class="min-w-0">
                  <p class="text-[#2b4b58] text-xs font-semibold truncate">{{ ep.speaker_name }}</p>
                  <p class="text-slate-400 text-[10px] truncate">{{ ep.speaker_role }}</p>
                </div>
              </div>
            </div>
          </Link>
        </div>

      </div>
    </section>

    <!-- =========================================================
         AUDIO PLAYER (same as homepage)
    ========================================================= -->
    <Teleport to="body">
      <div v-if="currentPodcast" class="fixed bottom-0 left-0 right-0 z-50 bg-white border-t border-slate-200 shadow-2xl">
        <div class="max-w-4xl mx-auto px-4 md:px-6 py-3 md:py-4">
          <div class="flex items-center gap-3 md:gap-4">
            <img :src="currentPodcast.thumbnail" :alt="currentPodcast.title"
              loading="lazy"
              class="w-12 h-12 md:w-14 md:h-14 object-cover rounded-md shrink-0" />
            <div class="flex-1 min-w-0">
              <p class="text-xs text-slate-400 font-semibold uppercase tracking-wider">Now Playing</p>
              <p class="text-sm font-medium text-[#2b4b58] truncate">{{ currentPodcast.title }}</p>
              <p class="text-xs text-slate-400 truncate">{{ currentPodcast.speaker_name }}</p>
            </div>

            <div class="relative flex items-center gap-1 md:gap-2">
              <transition name="fade">
                <span v-if="skipFeedback"
                  class="absolute -top-8 left-1/2 -translate-x-1/2 bg-[#2b4b58] text-white text-[11px] font-bold px-2.5 py-1 rounded-full shadow-lg pointer-events-none whitespace-nowrap">
                  {{ skipFeedback }}
                </span>
              </transition>

              <button @click="skipBackward"
                aria-label="Rewind 15 seconds"
                class="relative w-11 h-11 shrink-0 flex items-center justify-center rounded-full text-slate-500 hover:text-[#2b4b58] hover:bg-slate-100 active:scale-90 active:bg-slate-200 transition-all touch-manipulation">
                <i class="fa-solid fa-rotate-left text-lg"></i>
                <span class="absolute text-[8px] font-bold mt-0.5 leading-none">15</span>
              </button>

              <button @click="togglePlay"
                :aria-label="isPlaying ? 'Pause' : 'Play'"
                class="w-10 h-10 md:w-12 md:h-12 rounded-full bg-[#E1B137] hover:bg-[#2b4b58] active:scale-95 transition flex items-center justify-center text-white text-lg shrink-0 touch-manipulation">
                <i :class="isPlaying ? 'fa-solid fa-pause' : 'fa-solid fa-play'"></i>
              </button>

              <button @click="skipForward"
                aria-label="Fast forward 30 seconds"
                class="relative w-11 h-11 shrink-0 flex items-center justify-center rounded-full text-slate-500 hover:text-[#2b4b58] hover:bg-slate-100 active:scale-90 active:bg-slate-200 transition-all touch-manipulation">
                <i class="fa-solid fa-rotate-right text-lg"></i>
                <span class="absolute text-[8px] font-bold mt-0.5 leading-none">30</span>
              </button>

              <button @click="closePlayer"
                aria-label="Close player"
                class="w-9 h-9 shrink-0 flex items-center justify-center rounded-full text-slate-400 hover:text-red-500 hover:bg-slate-100 active:scale-90 transition-all touch-manipulation ml-1">
                <i class="fa-solid fa-xmark"></i>
              </button>
            </div>
          </div>

          <div class="mt-2 flex items-center gap-3">
            <span class="text-xs text-slate-400 font-mono tabular-nums min-w-[40px]">{{ formatTime(currentTime) }}</span>
            <div
              class="flex-1 relative py-2.5 -my-2.5 select-none touch-none"
              :class="isDragging ? 'cursor-grabbing' : 'cursor-grab'"
              role="slider"
              :aria-valuenow="Math.round(safePlaybackProgress)"
              :aria-valuemin="0"
              :aria-valuemax="100"
              aria-label="Audio progress"
              @mousedown="onMouseDown"
              @touchstart="onTouchStart"
              @click="seekAudio"
            >
              <div class="relative h-1.5 group-hover:h-2 bg-slate-200 rounded-full overflow-visible transition-all duration-150">
                <div class="absolute inset-y-0 left-0 bg-slate-300/60 rounded-full"
                  :style="{ width: safeBufferedProgress + '%' }"></div>
                <div class="absolute inset-y-0 left-0 bg-[#E1B137] rounded-full"
                  :class="isDragging ? '' : 'transition-all duration-100'"
                  :style="{ width: safePlaybackProgress + '%' }"></div>
                <div
                  class="absolute top-1/2 -translate-y-1/2 -translate-x-1/2 w-3.5 h-3.5 bg-[#E1B137] border-2 border-white rounded-full shadow transition-opacity duration-150"
                  :class="isDragging ? 'opacity-100 scale-125' : 'opacity-0 hover:opacity-100'"
                  :style="{ left: safePlaybackProgress + '%' }"
                ></div>
              </div>
            </div>
            <span class="text-xs text-slate-400 font-mono tabular-nums min-w-[40px]">{{ formatTime(currentDuration) }}</span>
          </div>
          <div v-if="isLoading" class="absolute bottom-full left-0 right-0 h-0.5 bg-[#E1B137]/30 overflow-hidden">
            <div class="h-full bg-[#E1B137] animate-loading-bar"></div>
          </div>
        </div>
      </div>
    </Teleport>

  </div>
</template>

<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue'
import { Head, Link } from '@inertiajs/vue3'
import { ref, computed, onMounted, onUnmounted, watch, shallowRef } from 'vue'
import axios from 'axios'

defineOptions({ layout: GuestLayout })

const props = defineProps({
  podcast: { type: Object, required: true },
  related: { type: Array, default: () => [] },
})

// ── SEO helpers ──
const currentUrl = computed(() => {
  if (typeof window !== 'undefined') return window.location.href
  return ''
})

const metaDescription = computed(() => {
  return stripHtml(props.podcast?.description || '').slice(0, 155)
})

// ── Helper functions ──
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

const stripHtml = (html) => {
  if (!html) return ''
  let s = String(html)
  s = s
    .replace(/&lt;/g, '<')
    .replace(/&gt;/g, '>')
    .replace(/&quot;/g, '"')
    .replace(/&#39;/g, "'")
    .replace(/&#x27;/g, "'")
    .replace(/&apos;/g, "'")
    .replace(/&nbsp;/g, ' ')
    .replace(/&amp;/g, '&')
  s = s.replace(/<[^>]*>/g, ' ')
  return s.replace(/\s+/g, ' ').trim()
}

// ── Audio Player (mirrors homepage behavior) ──
const currentPodcast = ref(null)
const isPlaying = ref(false)
const volume = ref(0.7)
const currentTime = ref(0)
const playbackProgress = ref(0)
const audioElement = shallowRef(null)
const isLoading = ref(false)
const bufferedProgress = ref(0)
const currentDuration = ref(0)
const isDragging = ref(false)

const SKIP_BACKWARD_SECONDS = 15
const SKIP_FORWARD_SECONDS = 30
const skipFeedback = ref(null)
let skipFeedbackTimeout = null

const showSkipFeedback = (label) => {
  skipFeedback.value = label
  clearTimeout(skipFeedbackTimeout)
  skipFeedbackTimeout = setTimeout(() => { skipFeedback.value = null }, 700)
}

const safePlaybackProgress = computed(() => {
  const p = playbackProgress.value
  if (!isFinite(p) || isNaN(p)) return 0
  return Math.min(100, Math.max(0, p))
})

const safeBufferedProgress = computed(() => {
  const p = bufferedProgress.value
  if (!isFinite(p) || isNaN(p)) return 0
  return Math.min(100, Math.max(0, p))
})

const togglePlay = async () => {
  // First play — set up the player with this page's podcast
  if (!currentPodcast.value) {
    if (!props.podcast?.audio) return

    // Increment listens
    try {
      const response = await axios.post(`/podcasts/${props.podcast.id}/listen`)
      if (response.data.success) {
        props.podcast.listens = response.data.podcast.listens
      }
    } catch (error) {
      console.error('Failed to increment listens:', error)
    }

    currentPodcast.value = props.podcast
    currentDuration.value = 0
    playbackProgress.value = 0
    bufferedProgress.value = 0

    if (audioElement.value) {
      audioElement.value.src = props.podcast.audio
      try {
        await audioElement.value.play()
        isPlaying.value = true
      } catch (e) {
        console.error('Playback failed:', e)
        isLoading.value = false
      }
    }
    return
  }

  // Subsequent toggles
  if (!audioElement.value) return
  if (isPlaying.value) {
    audioElement.value.pause()
    isPlaying.value = false
  } else {
    try {
      await audioElement.value.play()
      isPlaying.value = true
    } catch (e) {
      console.error('Playback failed:', e)
      isLoading.value = false
    }
  }
}

const closePlayer = () => {
  if (audioElement.value) {
    audioElement.value.pause()
    audioElement.value.src = ''
  }
  isPlaying.value = false
  currentPodcast.value = null
  currentTime.value = 0
  playbackProgress.value = 0
  bufferedProgress.value = 0
  isDragging.value = false
  skipFeedback.value = null
  clearTimeout(skipFeedbackTimeout)
}

const skipBackward = () => {
  if (!audioElement.value) return
  audioElement.value.currentTime = Math.max(0, audioElement.value.currentTime - SKIP_BACKWARD_SECONDS)
  showSkipFeedback(`-${SKIP_BACKWARD_SECONDS}s`)
}

const skipForward = () => {
  if (!audioElement.value) return
  const duration = audioElement.value.duration
  const hasValidDuration = duration && isFinite(duration) && duration > 0
  const target = audioElement.value.currentTime + SKIP_FORWARD_SECONDS
  audioElement.value.currentTime = hasValidDuration ? Math.min(duration, target) : target
  showSkipFeedback(`+${SKIP_FORWARD_SECONDS}s`)
}

const updateProgress = () => {
  if (!audioElement.value || !currentPodcast.value || isDragging.value) return
  currentTime.value = audioElement.value.currentTime
  const duration = audioElement.value.duration
  if (duration && isFinite(duration) && duration > 0) {
    playbackProgress.value = (currentTime.value / duration) * 100
  }
}

const updateBuffered = () => {
  if (audioElement.value && audioElement.value.buffered.length > 0) {
    const buffered = audioElement.value.buffered
    const duration = audioElement.value.duration
    if (duration && isFinite(duration) && duration > 0) {
      bufferedProgress.value = (buffered.end(buffered.length - 1) / duration) * 100
    }
  }
}

const getSeekTime = (event) => {
  if (!audioElement.value) return NaN
  const duration = audioElement.value.duration
  if (!duration || !isFinite(duration) || duration <= 0) return NaN
  const rect = event.currentTarget.getBoundingClientRect()
  const clientX = event.touches ? event.touches[0].clientX : event.clientX
  const x = Math.min(Math.max((clientX - rect.left) / rect.width, 0), 1)
  return x * duration
}

const seekAudio = (event) => {
  if (!audioElement.value) return
  const duration = audioElement.value.duration
  if (!duration || !isFinite(duration) || duration <= 0) return
  const seekTime = getSeekTime(event)
  if (!isNaN(seekTime)) {
    audioElement.value.currentTime = seekTime
    currentTime.value = seekTime
    playbackProgress.value = (seekTime / duration) * 100
  }
}

const onMouseDown = (event) => {
  if (!audioElement.value || !audioElement.value.duration || !isFinite(audioElement.value.duration)) return
  isDragging.value = true
  seekAudio(event)
  document.addEventListener('mousemove', onMouseMove)
  document.addEventListener('mouseup', onMouseUp)
}

const onMouseMove = (event) => {
  if (!isDragging.value) return
  seekAudio(event)
}

const onMouseUp = () => {
  isDragging.value = false
  document.removeEventListener('mousemove', onMouseMove)
  document.removeEventListener('mouseup', onMouseUp)
}

const onTouchStart = (event) => {
  if (!audioElement.value || !audioElement.value.duration || !isFinite(audioElement.value.duration)) return
  event.preventDefault()
  isDragging.value = true
  seekAudio(event)
  document.addEventListener('touchmove', onTouchMove, { passive: false })
  document.addEventListener('touchend', onTouchEnd)
}

const onTouchMove = (event) => {
  event.preventDefault()
  if (!isDragging.value) return
  seekAudio(event)
}

const onTouchEnd = () => {
  isDragging.value = false
  document.removeEventListener('touchmove', onTouchMove)
  document.removeEventListener('touchend', onTouchEnd)
}

const formatTime = (s) => {
  if (!s && s !== 0) return '0:00'
  const minutes = Math.floor(s / 60)
  const seconds = Math.floor(s % 60)
  return `${minutes}:${seconds.toString().padStart(2, '0')}`
}

watch(volume, (v) => {
  if (audioElement.value) audioElement.value.volume = v
})

const handleKeydown = (e) => {
  if (!currentPodcast.value) return
  if (e.target.tagName === 'INPUT' || e.target.tagName === 'TEXTAREA' || e.target.tagName === 'SELECT') return
  if (e.repeat) return

  if (e.key === 'ArrowLeft') {
    e.preventDefault()
    skipBackward()
  } else if (e.key === 'ArrowRight') {
    e.preventDefault()
    skipForward()
  } else if (e.key === ' ' || e.key === 'Space') {
    e.preventDefault()
    togglePlay()
  }
}

// ── Lifecycle ──
const initAudio = () => {
  if (!audioElement.value) {
    const audio = new Audio()
    audio.volume = volume.value
    audio.addEventListener('timeupdate', updateProgress)
    audio.addEventListener('loadedmetadata', () => {
      currentDuration.value = audio.duration
    })
    audio.addEventListener('waiting', () => { isLoading.value = true })
    audio.addEventListener('canplay', () => { isLoading.value = false })
    audio.addEventListener('progress', updateBuffered)
    audio.addEventListener('error', (e) => {
      console.error('Audio error:', e)
      isLoading.value = false
    })
    audio.addEventListener('ended', () => {
      isPlaying.value = false
      playbackProgress.value = 0
      currentTime.value = 0
      setTimeout(() => {
        if (!isPlaying.value) closePlayer()
      }, 3000)
    })
    audioElement.value = audio
  }
}

onMounted(() => {
  initAudio()
  document.addEventListener('keydown', handleKeydown)
})

onUnmounted(() => {
  if (audioElement.value) {
    audioElement.value.pause()
    audioElement.value.src = ''
    audioElement.value = null
  }
  document.removeEventListener('keydown', handleKeydown)
  document.removeEventListener('mousemove', onMouseMove)
  document.removeEventListener('mouseup', onMouseUp)
  document.removeEventListener('touchmove', onTouchMove)
  document.removeEventListener('touchend', onTouchEnd)
  clearTimeout(skipFeedbackTimeout)
})
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700;800&display=swap');

/* ── Styles for the v-html rendered episode description ── */
.prose-episode {
  word-break: break-word;
}

.prose-episode :deep(p) {
  margin-bottom: 1.25rem;
  line-height: 1.75;
}

.prose-episode :deep(p:last-child) {
  margin-bottom: 0;
}

.prose-episode :deep(strong),
.prose-episode :deep(b) {
  font-weight: 600;
  color: #2b4b58;
}

.prose-episode :deep(em),
.prose-episode :deep(i) {
  font-style: italic;
}

.prose-episode :deep(u) {
  text-decoration: underline;
}

.prose-episode :deep(h1),
.prose-episode :deep(h2),
.prose-episode :deep(h3) {
  font-family: 'Montserrat', serif;
  color: #2b4b58;
  font-weight: 500;
  margin-top: 2rem;
  margin-bottom: 1rem;
  line-height: 1.3;
}

.prose-episode :deep(h1) { font-size: 1.75rem; }
.prose-episode :deep(h2) { font-size: 1.5rem; }
.prose-episode :deep(h3) { font-size: 1.25rem; }

.prose-episode :deep(ul),
.prose-episode :deep(ol) {
  margin-bottom: 1.25rem;
  padding-left: 1.5rem;
}

.prose-episode :deep(ul) { list-style: disc; }
.prose-episode :deep(ol) { list-style: decimal; }

.prose-episode :deep(li) {
  margin-bottom: 0.5rem;
  line-height: 1.75;
}

.prose-episode :deep(a) {
  color: #E1B137;
  text-decoration: underline;
}

.prose-episode :deep(a:hover) {
  color: #2b4b58;
}

.prose-episode :deep(blockquote) {
  border-left: 3px solid #E1B137;
  padding-left: 1rem;
  margin: 1.5rem 0;
  font-style: italic;
  color: #64748b;
}

.prose-episode :deep(br) {
  display: block;
  content: "";
  margin-top: 0.5rem;
}


.font-montserrat { font-family: 'Montserrat', sans-serif; }

[v-cloak] {
  display: none;
}

.line-clamp-2 {
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.25s ease;
}
.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}

@keyframes loadingBar {
  0% { transform: translateX(-100%); }
  100% { transform: translateX(100%); }
}
.animate-loading-bar {
  animation: loadingBar 1.5s ease-in-out infinite;
}

/* Make long descriptions easy to read */
.prose-episode {
  word-break: break-word;
}
</style>