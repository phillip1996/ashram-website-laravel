<template>
  <main class="page-wrapper font-body">
       <Head>
        <title>Contact | The Lekki Ashram</title>
        <meta name="description" content="Get in touch with The Lekki Ashram. Reach out to explore retreats, workshops, or mindful programs." />
        <meta property="og:title" content="Contact | The Lekki Ashram" />
        <meta property="og:description" content="Get in touch with The Lekki Ashram. Reach out to explore retreats, workshops, or mindful programs." />
    </Head>

    <!-- =====================================================
         HERO — Parallax
    ===================================================== -->
    <section class="relative h-[70vh] min-h-[480px] overflow-hidden bg-[#0d1e26]" ref="heroRef">

      <!-- Parallax image layer -->
      <div
        class="absolute inset-0 will-change-transform parallax-layer"
        :style="{ transform: `translateY(${heroParallax}px)`, top: '-15%', height: '130%' }"
      >
        <img
          src="https://plus.unsplash.com/premium_photo-1661763911173-f2f7becc70b0?w=1600&auto=format&fit=crop&q=80"
          alt="Contact The Lekki Ashram"
          class="w-full h-full object-cover"
        />
        <!-- Overlay stack -->
        <div class="absolute inset-0 bg-[#0d1e26]/50"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-[#0d1e26]/70 via-[#0d1e26]/30 to-transparent"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-[#0d1e26]/60 via-transparent to-transparent"></div>
      </div>

      <!-- Decorative vertical text -->
      <div class="absolute right-8 top-1/2 -translate-y-1/2 hidden lg:flex flex-col items-center gap-3 z-10">
        <div class="w-px h-14 bg-white/20"></div>
        <span class="text-white/20 text-[9px] uppercase tracking-[0.5em] font-display"
          style="writing-mode: vertical-rl; transform: rotate(180deg);">
          The Art of Living
        </span>
        <div class="w-px h-14 bg-white/20"></div>
      </div>

      <!-- Hero Content -->
      <div class="relative h-full flex items-center">
        <div class="max-w-6xl mx-auto px-6 md:px-12 w-full">
          <div class="max-w-2xl">

            <div class="flex items-center gap-4 mb-6 hero-item" style="animation-delay:.1s">
              <div class="w-12 h-px bg-[#E1B137]"></div>
              <span class="text-[#E1B137] font-display font-bold uppercase tracking-[0.45em] text-[10px]">
                Get In Touch
              </span>
            </div>

            <h1 class="font-display text-5xl sm:text-6xl md:text-7xl text-white leading-[0.93] mb-6 hero-item" style="animation-delay:.25s">
              Contact <br>
              <em class="not-italic text-[#E1B137]">The Ashram</em>
            </h1>

            <div class="flex items-center gap-4 mb-6 hero-item" style="animation-delay:.38s">
              <div class="w-16 h-px bg-white/20"></div>
              <div class="w-2 h-2 border border-[#E1B137] rotate-45"></div>
              <div class="w-16 h-px bg-white/20"></div>
            </div>

            <p class="text-white/70 text-lg font-light leading-relaxed hero-item" style="animation-delay:.48s">
              Reach out to explore retreats, workshops, or mindful programs tailored for your growth.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- =====================================================
         MAIN CONTENT — Form + Info
    ===================================================== -->
    <section class="py-24 md:py-36 bg-[#f8f7f4]">
      <div class="max-w-6xl mx-auto px-6 md:px-12">
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-20 items-start">

          <!-- ── Contact Form ── -->
          <div>
            <div class="mb-10">
              <div class="flex items-center gap-3 mb-5">
                <div class="w-8 h-px bg-[#E1B137]"></div>
                <span class="text-[#E1B137] text-[10px] font-bold uppercase tracking-[0.35em] font-display">Send a Message</span>
              </div>
              <h2 class="font-display text-4xl md:text-5xl text-[#2b4b58] leading-tight">
                We'd Love to <em class="not-italic text-[#E1B137]">Hear</em> From You
              </h2>
            </div>

            <form @submit.prevent="submitForm" class="space-y-5 bg-white border border-slate-100 p-8 md:p-10 shadow-sm">

              <!-- Name & Email row -->
              <div class="grid sm:grid-cols-2 gap-5">
                <div>
                  <label class="block text-[11px] font-bold uppercase tracking-widest text-slate-600 mb-2 font-display">Full Name *</label>
                  <input
                    type="text"
                    v-model="form.name"
                    required
                    placeholder="John Doe"
                    class="w-full px-4 py-3 border border-slate-200 text-sm text-slate-700 bg-white focus:outline-none focus:border-[#2b4b58] transition-colors placeholder:text-slate-300"
                  />
                  <div v-if="errors.name" class="text-red-500 text-xs mt-1">{{ errors.name }}</div>
                </div>
                <div>
                  <label class="block text-[11px] font-bold uppercase tracking-widest text-slate-600 mb-2 font-display">Email Address *</label>
                  <input
                    type="email"
                    v-model="form.email"
                    required
                    placeholder="john@example.com"
                    class="w-full px-4 py-3 border border-slate-200 text-sm text-slate-700 bg-white focus:outline-none focus:border-[#2b4b58] transition-colors placeholder:text-slate-300"
                  />
                  <div v-if="errors.email" class="text-red-500 text-xs mt-1">{{ errors.email }}</div>
                </div>
              </div>

              <!-- Phone -->
              <div>
                <label class="block text-[11px] font-bold uppercase tracking-widest text-slate-600 mb-2 font-display">Phone Number</label>
                <input
                  type="tel"
                  v-model="form.phone"
                  placeholder="+234 XXX XXX XXXX"
                  class="w-full px-4 py-3 border border-slate-200 text-sm text-slate-700 bg-white focus:outline-none focus:border-[#2b4b58] transition-colors placeholder:text-slate-300"
                />
              </div>

              <!-- Subject -->
              <div>
                <label class="block text-[11px] font-bold uppercase tracking-widest text-slate-600 mb-2 font-display">Subject</label>
                <select
                  v-model="form.subject"
                  class="w-full px-4 py-3 border border-slate-200 text-sm text-slate-700 bg-white focus:outline-none focus:border-[#2b4b58] transition-colors"
                >
                  <option value="">Select a subject</option>
                  <option value="retreat">Retreat Enquiry</option>
                  <option value="meditation">Meditation Sessions</option>
                  <option value="philosophy">Philosophy Programs</option>
                  <option value="conservation">Ecological Initiatives</option>
                  <option value="partnership">Partnership</option>
                  <option value="other">Other</option>
                </select>
              </div>

              <!-- Message -->
              <div>
                <label class="block text-[11px] font-bold uppercase tracking-widest text-slate-600 mb-2 font-display">Message *</label>
                <textarea
                  v-model="form.message"
                  required
                  rows="5"
                  placeholder="Tell us how we can help you..."
                  class="w-full px-4 py-3 border border-slate-200 text-sm text-slate-700 bg-white focus:outline-none focus:border-[#2b4b58] transition-colors resize-none placeholder:text-slate-300"
                ></textarea>
                <div v-if="errors.message" class="text-red-500 text-xs mt-1">{{ errors.message }}</div>
              </div>

              <!-- Submit -->
              <button
                type="submit"
                :disabled="isSubmitting"
                class="w-full py-4 bg-[#E1B137] text-[#0d1e26] font-display font-bold text-[11px] uppercase tracking-[0.2em] hover:bg-[#2b4b58] hover:text-white transition-all duration-300 flex items-center justify-center gap-3 disabled:opacity-50"
              >
                <i class="fa-solid" :class="isSubmitting ? 'fa-spinner fa-spin' : 'fa-paper-plane'"></i>
                {{ isSubmitting ? 'Sending...' : 'Send Message' }}
              </button>

              <!-- Success / Error messages -->
              <Transition name="fade-in">
                <div v-if="successMessage"
                  class="flex items-center gap-3 p-4 bg-emerald-50 border border-emerald-200">
                  <i class="fa-solid fa-circle-check text-emerald-500"></i>
                  <p class="text-emerald-700 text-sm font-medium">{{ successMessage }}</p>
                </div>
              </Transition>
              <Transition name="fade-in">
                <div v-if="errorMessage"
                  class="flex items-center gap-3 p-4 bg-red-50 border border-red-200">
                  <i class="fa-solid fa-circle-exclamation text-red-500"></i>
                  <p class="text-red-700 text-sm font-medium">{{ errorMessage }}</p>
                </div>
              </Transition>
            </form>
          </div>

          <!-- ── Contact Info ── -->
          <div class="space-y-6">
            <div class="mb-10">
              <div class="flex items-center gap-3 mb-5">
                <div class="w-8 h-px bg-[#E1B137]"></div>
                <span class="text-[#E1B137] text-[10px] font-bold uppercase tracking-[0.35em] font-display">Find Us</span>
              </div>
              <h2 class="font-display text-4xl md:text-5xl text-[#2b4b58] leading-tight">
                Visit Our <em class="not-italic text-[#E1B137]">Sanctuary</em>
              </h2>
            </div>

            <!-- Info cards -->
            <div v-for="card in infoCards" :key="card.label"
              class="group flex items-start gap-5 p-6 bg-white border border-slate-100 hover:border-[#E1B137]/40 hover:shadow-md transition-all duration-300">
              <div class="w-12 h-12 flex items-center justify-center shrink-0 transition-colors duration-300"
                :class="card.accent === 'gold' ? 'bg-[#E1B137]/10 group-hover:bg-[#E1B137]' : 'bg-[#2b4b58]/10 group-hover:bg-[#2b4b58]'">
                <i :class="[card.icon, 'text-lg transition-colors duration-300',
                  card.accent === 'gold' ? 'text-[#E1B137] group-hover:text-white' : 'text-[#2b4b58] group-hover:text-white']"></i>
              </div>
              <div>
                <p class="text-[10px] font-bold uppercase tracking-widest text-slate-400 mb-1 font-display">{{ card.label }}</p>
                <div class="text-[#2b4b58] text-sm leading-relaxed font-medium" v-html="card.value"></div>
              </div>
            </div>

            <!-- About blurb -->
            <div class="p-6 bg-[#2b4b58] border border-[#2b4b58]">
              <div class="flex items-center gap-3 mb-3">
                <span class="text-[#E1B137] text-[10px] font-bold uppercase tracking-[0.35em] font-display">About Us</span>
              </div>
              <p class="text-white/65 text-sm leading-relaxed">
                An apolitical civil society group dedicated to resolving the mysteries of life through nature conservation, Advaita philosophy, and human evolution.
              </p>
            </div>

            <!-- WhatsApp CTA -->
            <a
              href="https://wa.me/2349069258377?text=Hello%2C%20I%27m%20interested%20in%20learning%20more%20about%20The%20Lekki%20Ashram."
              target="_blank"
              class="flex items-center justify-center gap-3 w-full py-4 bg-[#25D366] text-white font-display font-bold text-[11px] uppercase tracking-[0.2em] hover:bg-[#128C7E] transition-all duration-300"
            >
              <i class="fa-brands fa-whatsapp text-base"></i>
              Chat With Us on WhatsApp
            </a>
          </div>
        </div>
      </div>
    </section>

  </main>
</template>

<script setup>
import { ref, reactive, onMounted, onUnmounted } from 'vue'
import { router } from '@inertiajs/vue3'
import GuestLayout from '@/Layouts/GuestLayout.vue'
import AOS from 'aos'
import 'aos/dist/aos.css'

// ── Apply Layout ──
defineOptions({ layout: GuestLayout })

// ── Parallax ──
const heroRef      = ref(null)
const heroParallax = ref(0)

const onScroll = () => {
  if (!heroRef.value) return
  const scrolled   = window.scrollY
  const heroHeight = heroRef.value.offsetHeight
  if (scrolled <= heroHeight)
    heroParallax.value = scrolled * 0.35
}

// ── Form ──
const form = reactive({
  name: '',
  email: '',
  phone: '',
  subject: '',
  message: ''
})

const errors = ref({})
const isSubmitting = ref(false)
const successMessage = ref('')
const errorMessage = ref('')

const submitForm = () => {
  errors.value = {}
  successMessage.value = ''
  errorMessage.value = ''
  isSubmitting.value = true

  router.post('/contact', form, {
    preserveState: true,
    preserveScroll: true,
    onSuccess: (page) => {
      isSubmitting.value = false
      if (page.props.flash?.success) {
        successMessage.value = page.props.flash.success
      } else {
        successMessage.value = 'Your message has been sent. We will get back to you soon.'
      }
      // Reset form
      Object.assign(form, { name: '', email: '', phone: '', subject: '', message: '' })
    },
    onError: (err) => {
      isSubmitting.value = false
      errors.value = err
      errorMessage.value = 'Please correct the errors and try again.'
    }
  })
}

// ── Static Data ──
const infoCards = [
  {
    label: 'Our Location',
    icon: 'fa-solid fa-location-dot',
    accent: 'gold',
    value: 'The Lekki Ashram<br>07, Kayode I. Micah Street, <br> Off Abraham Adesanya-Ogombo Rd. <br> Lekki Scheme 2, Eti-Osa, Nigeria.'
  },
  {
    label: 'Phone & Email',
    icon: 'fa-solid fa-phone',
    accent: 'teal',
    value: '+234 906 925 8377<br>info@lekkiashram.com'
  },
  {
    label: 'Opening Hours',
    icon: 'fa-solid fa-clock',
    accent: 'gold',
    value: 'Monday – Thursday: 10AM – 3PM<br>Sunday: By appointment only'
  }
]

// ── Lifecycle ──
onMounted(() => {
  AOS.init({ duration: 800, once: true, offset: 50, easing: 'ease-out' })
  window.addEventListener('scroll', onScroll, { passive: true })
  onScroll()
})

onUnmounted(() => {
  window.removeEventListener('scroll', onScroll)
})
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Montserrat:wght@300;400;500;600;700&display=swap');

.font-display { font-family: 'Playfair Display', Georgia, serif; }
.font-body    { font-family: 'Montserrat', sans-serif; }

@keyframes heroUp {
  from { opacity: 0; transform: translateY(24px); }
  to   { opacity: 1; transform: translateY(0); }
}
.hero-item {
  opacity: 0;
  animation: heroUp 0.9s cubic-bezier(0.22, 1, 0.36, 1) forwards;
}

.will-change-transform { will-change: transform; }
.parallax-layer        { transition: transform 0.1s ease-out; }

.fade-in-enter-active { transition: opacity 0.4s ease, transform 0.4s ease; }
.fade-in-enter-from   { opacity: 0; transform: translateY(6px); }
</style>