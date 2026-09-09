<template>
  <section class="bg-white">

    <!-- ===== HEAD ===== -->
    <Head>
      <title>Consultancy & Therapy | The Lekki Ashram</title>
      <meta name="description" content="Empathy-driven consultancy and therapy sessions for personal growth and professional clarity." />
      <meta property="og:title" content="Consultancy & Therapy | The Lekki Ashram" />
      <meta property="og:description" content="Empathy-driven consultancy and therapy sessions for personal growth and professional clarity." />
    </Head>

    <!-- HERO HEADER with background image -->
    <div class="relative h-[60vh] flex items-center justify-center text-center overflow-hidden">
      <!-- Background Image - Using local image -->
      <img 
        src="/img/consultant.jpg"
        alt="Consultancy & Therapy"
        class="absolute inset-0 w-full h-full object-cover object-[center_20%] md:object-[center_30%]"
      />
      
      <!-- Dark overlay for text readability -->
      <div class="absolute inset-0 bg-black/50"></div>
      
      <!-- Gradient overlay for depth -->
      <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>

      <div class="relative z-10 px-6 max-w-4xl">
        <span class="inline-block px-6 py-2 border border-white/40 bg-black/20 backdrop-blur-md text-white text-[10px] font-bold uppercase tracking-[0.4em] mb-6">
          CONSULTANCY & THERAPY
        </span>
        
        <h1 class="text-4xl md:text-6xl font-serif text-white mb-6 leading-tight">
          Professional <span class="text-[#E1B137]">Guidance</span>
        </h1>

        <p class="text-white/80 text-lg md:text-xl italic max-w-2xl mx-auto">
          Empathy-driven consultancy and therapy sessions tailored to your growth.
        </p>
      </div>
    </div>

    <!-- PAGE CONTENT -->
    <div class="max-w-4xl mx-auto px-6 py-20 space-y-10">

      <!-- Introduction -->
      <div class="space-y-6">
        <h2 class="text-3xl font-serif text-[#2b4b58]">
          Expert Support for Your Journey
        </h2>
        <p class="text-slate-600 leading-relaxed">
          Our consultancy services provide empathetic guidance to individuals seeking 
          clarity, personal growth, and professional support. Through tailored sessions, 
          we help uncover solutions and navigate life's challenges.
        </p>
        <p class="text-slate-600 leading-relaxed">
          At the Ashram, therapy and guidance integrate mindfulness and holistic approaches 
          to ensure every session is meaningful and transformative.
        </p>
      </div>

      <!-- Quote -->
      <div class="border-l-4 border-[#E1B137] pl-6 italic text-slate-500 my-10">
        "Clarity comes when guidance meets understanding and empathy."
      </div>

      <!-- What We Offer -->
      <div>
        <h3 class="text-2xl font-serif text-[#2b4b58] mb-4">
          Our Services
        </h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div class="bg-[#f8f7f4] p-6 rounded-lg border border-slate-100">
            <div class="w-12 h-12 bg-[#E1B137]/10 rounded-full flex items-center justify-center mb-4">
              <i class="fa-solid fa-briefcase text-[#E1B137] text-xl"></i>
            </div>
            <h4 class="font-serif text-lg text-[#2b4b58] mb-2">Consultancy</h4>
            <p class="text-slate-500 text-sm leading-relaxed">
              Professional guidance for personal growth, career clarity, and life transitions. 
              Our consultants provide practical strategies and deep listening to help you 
              navigate challenges with confidence.
            </p>
          </div>
          <div class="bg-[#f8f7f4] p-6 rounded-lg border border-slate-100">
            <div class="w-12 h-12 bg-[#E1B137]/10 rounded-full flex items-center justify-center mb-4">
              <i class="fa-solid fa-heart-pulse text-[#E1B137] text-xl"></i>
            </div>
            <h4 class="font-serif text-lg text-[#2b4b58] mb-2">Therapy</h4>
            <p class="text-slate-500 text-sm leading-relaxed">
              Empathetic therapy sessions focused on emotional well-being, healing, and 
              self-discovery. Our therapists create a safe space for you to explore your 
              thoughts and feelings.
            </p>
          </div>
        </div>
      </div>

      <!-- Benefits -->
      <div>
        <h3 class="text-2xl font-serif text-[#2b4b58] mb-4">
          Why Choose Our Sessions
        </h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
          <div class="flex items-start gap-3">
            <i class="fa-solid fa-check-circle text-[#E1B137] mt-1"></i>
            <span class="text-slate-600 text-sm">Tailored to your unique needs</span>
          </div>
          <div class="flex items-start gap-3">
            <i class="fa-solid fa-check-circle text-[#E1B137] mt-1"></i>
            <span class="text-slate-600 text-sm">Integrates mindfulness and reflective inquiry</span>
          </div>
          <div class="flex items-start gap-3">
            <i class="fa-solid fa-check-circle text-[#E1B137] mt-1"></i>
            <span class="text-slate-600 text-sm">Practical strategies for personal growth</span>
          </div>
          <div class="flex items-start gap-3">
            <i class="fa-solid fa-check-circle text-[#E1B137] mt-1"></i>
            <span class="text-slate-600 text-sm">Safe, non-judgmental space</span>
          </div>
          <div class="flex items-start gap-3">
            <i class="fa-solid fa-check-circle text-[#E1B137] mt-1"></i>
            <span class="text-slate-600 text-sm">Experienced and compassionate practitioners</span>
          </div>
          <div class="flex items-start gap-3">
            <i class="fa-solid fa-check-circle text-[#E1B137] mt-1"></i>
            <span class="text-slate-600 text-sm">Flexible scheduling to suit your lifestyle</span>
          </div>
        </div>
      </div>

      <!-- Buttons -->
      <div class="flex flex-col sm:flex-row gap-6 mt-10 pt-8 border-t border-slate-200">
        <button
          @click="openModal"
          class="px-8 py-4 bg-[#E1B137] text-white uppercase text-[11px] tracking-[0.2em] font-bold hover:bg-[#2b4b58] transition text-center"
        >
          Book a Session
        </button>
        <Link
          href="/"
          class="px-8 py-4 border border-[#2b4b58] text-[#2b4b58] uppercase text-[11px] tracking-[0.2em] font-bold hover:bg-[#2b4b58] hover:text-white transition text-center"
        >
          Back to Home
        </Link>
      </div>

    </div>

    <!-- ===== MODAL ===== -->
    <Teleport to="body">
      <Transition name="modal">
        <div v-if="showModal"
          class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-[#0d1e26]/75 backdrop-blur-md"
          @click.self="closeModal">
          <div class="bg-white max-w-2xl w-full max-h-[90vh] overflow-hidden shadow-2xl">
            <div class="flex items-center justify-between px-6 md:px-7 py-4 md:py-5 border-b border-slate-100">
              <div class="flex items-center gap-4">
                <div class="w-9 h-9 bg-[#E1B137]/15 flex items-center justify-center">
                  <i class="fa-solid fa-calendar-check text-[#E1B137]"></i>
                </div>
                <div>
                  <h3 class="font-display text-base md:text-lg text-[#2b4b58]">Book a Session</h3>
                  <p class="text-xs text-slate-400">Schedule your consultancy or therapy session</p>
                </div>
              </div>
              <button @click="closeModal"
                class="w-9 h-9 flex items-center justify-center text-slate-400 hover:text-slate-600 hover:bg-slate-100 transition-colors">
                <i class="fa-solid fa-xmark"></i>
              </button>
            </div>

            <div class="p-6 md:p-7 overflow-y-auto max-h-[calc(90vh-80px)]">
              <form @submit.prevent="submitForm" class="space-y-5">
                <!-- Type of Visit -->
                <div>
                  <label class="block text-[11px] font-bold uppercase tracking-widest text-slate-600 mb-3 font-display">Type of Session *</label>
                  <div class="grid grid-cols-2 gap-3">
                    <button type="button" @click="form.visitType = 'consultancy'"
                      class="p-4 border text-left transition-all duration-200"
                      :class="form.visitType === 'consultancy' ? 'border-[#2b4b58] bg-[#2b4b58]/5' : 'border-slate-200 hover:border-slate-300'">
                      <i class="fa-solid fa-briefcase block text-lg mb-2" :class="form.visitType === 'consultancy' ? 'text-[#2b4b58]' : 'text-slate-300'"></i>
                      <h4 class="font-display text-sm text-[#2b4b58]">Consultancy</h4>
                      <p class="text-xs text-slate-400 mt-0.5">Professional guidance & advice</p>
                    </button>
                    <button type="button" @click="form.visitType = 'therapy'"
                      class="p-4 border text-left transition-all duration-200"
                      :class="form.visitType === 'therapy' ? 'border-[#E1B137] bg-[#E1B137]/5' : 'border-slate-200 hover:border-slate-300'">
                      <i class="fa-solid fa-heart-pulse block text-lg mb-2" :class="form.visitType === 'therapy' ? 'text-[#E1B137]' : 'text-slate-300'"></i>
                      <h4 class="font-display text-sm text-[#2b4b58]">Therapy Session</h4>
                      <p class="text-xs text-slate-400 mt-0.5">Emotional & mental well-being</p>
                    </button>
                  </div>
                  <p v-if="errors.visitType" class="text-red-500 text-xs mt-1">{{ errors.visitType }}</p>
                </div>

                <!-- Date & Time -->
                <div class="grid md:grid-cols-2 gap-4">
                  <div>
                    <label class="block text-[11px] font-bold uppercase tracking-widest text-slate-600 mb-2 font-display">Preferred Date *</label>
                    <input type="date" v-model="form.date" :min="minDate" required
                      class="w-full px-4 py-3 border border-slate-200 text-sm focus:outline-none focus:border-[#2b4b58] transition-colors"
                      :class="errors.date ? 'border-red-400' : ''" />
                    <p v-if="errors.date" class="text-red-500 text-xs mt-1">{{ errors.date }}</p>
                  </div>
                  <div>
                    <label class="block text-[11px] font-bold uppercase tracking-widest text-slate-600 mb-2 font-display">Preferred Time *</label>
                    <select v-model="form.time" required
                      class="w-full px-4 py-3 border border-slate-200 text-sm focus:outline-none focus:border-[#2b4b58] transition-colors bg-white"
                      :class="errors.time ? 'border-red-400' : ''">
                      <option value="">Select a time</option>
                      <option value="09:00">9:00 AM – Morning</option>
                      <option value="11:00">11:00 AM – Midday</option>
                      <option value="14:00">2:00 PM – Afternoon</option>
                      <option value="16:00">4:00 PM – Evening</option>
                    </select>
                    <p v-if="errors.time" class="text-red-500 text-xs mt-1">{{ errors.time }}</p>
                  </div>
                </div>

                <!-- Name & Email -->
                <div class="grid md:grid-cols-2 gap-4">
                  <div>
                    <label class="block text-[11px] font-bold uppercase tracking-widest text-slate-600 mb-2 font-display">Full Name *</label>
                    <input type="text" v-model="form.name" placeholder="John Doe" required
                      class="w-full px-4 py-3 border border-slate-200 text-sm focus:outline-none focus:border-[#2b4b58] transition-colors"
                      :class="errors.name ? 'border-red-400' : ''" />
                    <p v-if="errors.name" class="text-red-500 text-xs mt-1">{{ errors.name }}</p>
                  </div>
                  <div>
                    <label class="block text-[11px] font-bold uppercase tracking-widest text-slate-600 mb-2 font-display">Email *</label>
                    <input type="email" v-model="form.email" placeholder="john@example.com" required
                      class="w-full px-4 py-3 border border-slate-200 text-sm focus:outline-none focus:border-[#2b4b58] transition-colors"
                      :class="errors.email ? 'border-red-400' : ''" />
                    <p v-if="errors.email" class="text-red-500 text-xs mt-1">{{ errors.email }}</p>
                  </div>
                </div>

                <!-- Phone & Guests -->
                <div class="grid md:grid-cols-2 gap-4">
                  <div>
                    <label class="block text-[11px] font-bold uppercase tracking-widest text-slate-600 mb-2 font-display">Phone</label>
                    <input type="tel" v-model="form.phone" placeholder="+234 XXX XXX XXXX"
                      class="w-full px-4 py-3 border border-slate-200 text-sm focus:outline-none focus:border-[#2b4b58] transition-colors" />
                  </div>
                  <div>
                    <label class="block text-[11px] font-bold uppercase tracking-widest text-slate-600 mb-2 font-display">Guests</label>
                    <select v-model="form.guests"
                      class="w-full px-4 py-3 border border-slate-200 text-sm focus:outline-none focus:border-[#2b4b58] transition-colors bg-white">
                      <option value="1">Just myself</option>
                      <option value="2">2 people</option>
                      <option value="3">3 people</option>
                      <option value="4">4 people</option>
                      <option value="5">5+ people</option>
                    </select>
                  </div>
                </div>

                <!-- Special Requests -->
                <div>
                  <label class="block text-[11px] font-bold uppercase tracking-widest text-slate-600 mb-2 font-display">Special Requests</label>
                  <textarea v-model="form.requests" rows="3" placeholder="Any specific requirements..."
                    class="w-full px-4 py-3 border border-slate-200 text-sm focus:outline-none focus:border-[#2b4b58] transition-colors resize-none"></textarea>
                </div>

                <button type="submit" :disabled="isSubmitting"
                  class="w-full py-4 bg-[#E1B137] text-[#0d1e26] font-display font-bold text-[11px] uppercase tracking-[0.2em] hover:bg-[#2b4b58] hover:text-white transition-all duration-300 flex items-center justify-center gap-3 disabled:opacity-50 disabled:cursor-not-allowed">
                  <i class="fa-solid" :class="isSubmitting ? 'fa-spinner fa-spin' : 'fa-paper-plane'"></i>
                  {{ isSubmitting ? 'Sending...' : 'Request Session' }}
                </button>

                <p class="text-xs text-slate-400 text-center">
                  We'll confirm within 24 hours · 
                  <a href="tel:+2349069258377" class="text-[#2b4b58] hover:underline whitespace-nowrap">
                    +234 906 925 8377
                  </a>
                </p>
              </form>
            </div>
          </div>
        </div>
      </Transition>
    </Teleport>

  </section>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import GuestLayout from '@/Layouts/GuestLayout.vue'
import { Head } from '@inertiajs/vue3'
import { ref, reactive, computed } from 'vue'
import { router } from '@inertiajs/vue3'
import { useToast } from '@/Composables/useToast'

defineOptions({ layout: GuestLayout })

const { showToast } = useToast()

// ── Modal ──
const showModal = ref(false)
const isSubmitting = ref(false)
const errors = ref({})

const form = reactive({
  visitType: 'consultancy',
  date: '',
  time: '',
  name: '',
  email: '',
  phone: '',
  guests: '1',
  requests: ''
})

const minDate = computed(() => {
  const d = new Date()
  return `${d.getFullYear()}-${String(d.getMonth()+1).padStart(2,'0')}-${String(d.getDate()).padStart(2,'0')}`
})

const openModal = () => {
  showModal.value = true
  document.body.style.overflow = 'hidden'
}

const closeModal = () => {
  showModal.value = false
  document.body.style.overflow = ''
}

const submitForm = () => {
  const requiredFields = ['visitType', 'date', 'time', 'name', 'email']
  const newErrors = {}
  
  requiredFields.forEach(field => {
    if (!form[field]) {
      newErrors[field] = `${field.charAt(0).toUpperCase() + field.slice(1)} is required`
    }
  })
  
  if (Object.keys(newErrors).length > 0) {
    errors.value = newErrors
    showToast('Please fill in all required fields.', 'error')
    return
  }
  
  errors.value = {}
  isSubmitting.value = true

  const timeoutId = setTimeout(() => {
    if (isSubmitting.value) {
      isSubmitting.value = false
      showToast('Request timed out. Please try again.', 'error')
    }
  }, 30000)

  router.post('/visit-requests', form, {
    preserveState: true,
    preserveScroll: true,
    onSuccess: (page) => {
      clearTimeout(timeoutId)
      isSubmitting.value = false
      
      if (page.props.flash?.success) {
        showToast(page.props.flash.success, 'success')
      } else {
        showToast('Your session request has been sent. We\'ll confirm within 24 hours.', 'success')
      }
      
      setTimeout(() => {
        closeModal()
        Object.assign(form, {
          visitType: 'consultancy',
          date: '',
          time: '',
          name: '',
          email: '',
          phone: '',
          guests: '1',
          requests: ''
        })
      }, 2000)
    },
    onError: (err) => {
      clearTimeout(timeoutId)
      isSubmitting.value = false
      errors.value = err
      
      if (err.email) {
        showToast(err.email, 'error')
      } else if (err.name) {
        showToast(err.name, 'error')
      } else if (err.date) {
        showToast(err.date, 'error')
      } else if (err.time) {
        showToast(err.time, 'error')
      } else {
        showToast('Please check your form and try again.', 'error')
      }
    },
    onFinish: () => {
      clearTimeout(timeoutId)
      isSubmitting.value = false
    }
  })
}
</script>