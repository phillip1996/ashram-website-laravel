<template>
  <div class="page-wrapper font-body">

    <!-- =========================================================
         MAIN PROGRAMS LIST
    ========================================================= -->
    <div v-show="!selectedProgram">

      <!-- Hero with Background Image -->
      <section class="relative min-h-[60vh] flex items-center overflow-hidden">
        <!-- Background Image -->
        <img
          src="/img/programme-hero.jpg"
          alt="Our Programs"
          class="absolute inset-0 w-full h-full object-cover"
        />
        
        <!-- Dark overlay -->
        <div class="absolute inset-0 bg-[#2b4b58]/75"></div>
        
        <!-- Dot pattern overlay -->
        <div class="absolute inset-0 opacity-[0.04]"
          style="background-image: radial-gradient(circle, white 1px, transparent 1px); background-size: 28px 28px;">
        </div>

        <div class="relative max-w-6xl mx-auto px-6 md:px-12 w-full py-20">
          <div class="max-w-2xl">
            <div class="flex items-center gap-4 mb-6">
              <div class="w-12 h-px bg-[#E1B137]"></div>
              <span class="text-[#E1B137] font-display font-bold uppercase tracking-[0.45em] text-[10px]">Our Programs</span>
            </div>
            <h1 class="font-display text-4xl md:text-6xl text-white leading-[0.93] mb-6">
              Pathways to<br>
              <em class="not-italic text-[#E1B137]">Higher Living</em>
            </h1>
            <p class="text-white/70 text-lg font-light leading-relaxed max-w-lg">
              Explore our curated offerings designed to deepen your practice, expand your awareness, and connect you with community.
            </p>
          </div>
        </div>
      </section>

      <!-- Programs Grid -->
      <section class="py-20 md:py-28 bg-[#f8f7f4]">
        <div class="max-w-6xl mx-auto px-6 md:px-12">
          <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div v-for="program in programs" :key="program.id"
              class="group bg-white border border-slate-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-400 overflow-hidden cursor-pointer"
              @click="openProgram(program)">
              <div class="relative h-56 overflow-hidden">
                <img :src="program.image" :alt="program.title"
                  class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" />
                <div class="absolute inset-0 bg-gradient-to-t from-[#0d1e26]/60 via-transparent to-transparent"></div>
                <div class="absolute bottom-4 left-4">
                  <span class="bg-[#E1B137] text-[#0d1e26] text-[10px] font-bold px-3 py-1.5 uppercase tracking-widest">
                    {{ program.category }}
                  </span>
                </div>
              </div>
              <div class="p-6">
                <h3 class="font-display text-xl text-[#2b4b58] mb-2 group-hover:text-[#E1B137] transition-colors">
                  {{ program.title }}
                </h3>
                <p class="text-slate-500 text-sm leading-relaxed mb-4 line-clamp-2">{{ program.shortDescription }}</p>
                <div class="flex items-center justify-between pt-4 border-t border-slate-100">
                  <span class="text-xs text-slate-400 flex items-center gap-1">
                    <i class="fa-regular fa-clock"></i>
                    {{ program.duration }}
                  </span>
                  <button
                    class="text-[#2b4b58] text-xs font-bold uppercase tracking-wider hover:text-[#E1B137] transition-colors inline-flex items-center gap-1.5">
                    Learn More <i class="fa-solid fa-chevron-right text-[9px]"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- CTA -->
      <section class="py-20 bg-[#2b4b58] relative overflow-hidden">
        <div class="absolute inset-0 opacity-[0.04]"
          style="background-image: radial-gradient(circle, white 1px, transparent 1px); background-size: 28px 28px;">
        </div>
        <div class="relative max-w-4xl mx-auto px-6 md:px-12 text-center">
          <h2 class="font-display text-3xl md:text-5xl text-white mb-6">
            Not sure where to <em class="not-italic text-[#E1B137]">begin</em>?
          </h2>
          <p class="text-white/60 text-base leading-relaxed mb-8 max-w-xl mx-auto">
            Our team will help you find the right program for your journey.
          </p>
          <Link href="/contact"
            class="inline-flex items-center gap-3 bg-[#E1B137] text-[#0d1e26] px-8 py-4 font-display font-bold text-[11px] uppercase tracking-[0.2em] hover:bg-white transition-all duration-300">
            <i class="fa-solid fa-compass"></i>
            Find Your Path
          </Link>
        </div>
      </section>

    </div>

    <!-- =========================================================
         PROGRAM DETAIL VIEW (University Style)
    ========================================================= -->
    <div v-if="selectedProgram" class="bg-white">

      <!-- Breadcrumb -->
      <div class="bg-[#f8f7f4] border-b border-slate-200">
        <div class="max-w-6xl mx-auto px-6 md:px-12 py-4">
          <div class="flex items-center gap-3 text-xs text-slate-500">
            <button @click="closeProgram" class="hover:text-[#E1B137] transition-colors flex items-center gap-2">
              <i class="fa-solid fa-arrow-left-long"></i>
              All Programs
            </button>
            <span class="text-slate-300">/</span>
            <span class="text-[#2b4b58] font-medium">{{ selectedProgram.category }}</span>
          </div>
        </div>
      </div>

      <!-- Hero Banner -->
      <div class="relative h-[50vh] md:h-[60vh] overflow-hidden">
        <img
          :src="selectedProgram.image"
          :alt="selectedProgram.title"
          class="w-full h-full object-cover"
        />
        <div class="absolute inset-0 bg-gradient-to-t from-[#0d1e26] via-[#0d1e26]/50 to-transparent"></div>
        <div class="absolute bottom-0 left-0 right-0">
          <div class="max-w-6xl mx-auto px-6 md:px-12 pb-12 md:pb-16">
            <div class="flex items-center gap-3 mb-4">
              <span class="bg-[#E1B137] text-[#0d1e26] text-[10px] font-bold px-3 py-1.5 uppercase tracking-widest">
                {{ selectedProgram.category }}
              </span>
              <span class="text-white/60 text-xs">
                <i class="fa-regular fa-clock mr-1"></i>{{ selectedProgram.duration }}
              </span>
            </div>
            <h1 class="font-display text-4xl md:text-6xl text-white leading-tight max-w-3xl">
              {{ selectedProgram.title }}
            </h1>
          </div>
        </div>
      </div>

      <!-- Content -->
      <div class="max-w-6xl mx-auto px-6 md:px-12 py-12 md:py-20">
        <div class="grid lg:grid-cols-3 gap-12">

          <!-- Left: Main Content -->
          <div class="lg:col-span-2 space-y-10">

            <!-- Overview -->
            <div>
              <div class="flex items-center gap-3 mb-5">
                <div class="w-8 h-px bg-[#E1B137]"></div>
                <span class="text-[#E1B137] text-[10px] font-bold uppercase tracking-[0.35em] font-display">Overview</span>
              </div>
              <p class="text-slate-600 text-base leading-relaxed">
                {{ selectedProgram.fullDescription }}
              </p>
            </div>

            <!-- What You'll Learn -->
            <div v-if="selectedProgram.learnings && selectedProgram.learnings.length">
              <div class="flex items-center gap-3 mb-5">
                <div class="w-8 h-px bg-[#E1B137]"></div>
                <span class="text-[#E1B137] text-[10px] font-bold uppercase tracking-[0.35em] font-display">What You'll Learn</span>
              </div>
              <div class="grid sm:grid-cols-2 gap-4">
                <div v-for="(item, i) in selectedProgram.learnings" :key="i"
                  class="flex items-start gap-3 p-4 bg-[#f8f7f4] border border-slate-100">
                  <div class="w-5 h-5 bg-[#E1B137]/15 flex items-center justify-center shrink-0 mt-0.5">
                    <i class="fa-solid fa-check text-[#E1B137] text-[10px]"></i>
                  </div>
                  <p class="text-slate-600 text-sm">{{ item }}</p>
                </div>
              </div>
            </div>

            <!-- Curriculum / Structure -->
            <div v-if="selectedProgram.curriculum && selectedProgram.curriculum.length">
              <div class="flex items-center gap-3 mb-5">
                <div class="w-8 h-px bg-[#E1B137]"></div>
                <span class="text-[#E1B137] text-[10px] font-bold uppercase tracking-[0.35em] font-display">Program Structure</span>
              </div>
              <div class="space-y-4">
                <div v-for="(module, i) in selectedProgram.curriculum" :key="i"
                  class="border-l-2 border-[#E1B137]/30 pl-6 py-2">
                  <div class="flex items-center gap-3 mb-2">
                    <span class="text-[#E1B137] font-display font-bold text-sm">{{ String(i + 1).padStart(2, '0') }}</span>
                    <h4 class="font-display text-[#2b4b58] text-lg">{{ module.title }}</h4>
                  </div>
                  <p class="text-slate-500 text-sm leading-relaxed">{{ module.description }}</p>
                </div>
              </div>
            </div>

            <!-- Requirements -->
            <div v-if="selectedProgram.requirements && selectedProgram.requirements.length">
              <div class="flex items-center gap-3 mb-5">
                <div class="w-8 h-px bg-[#E1B137]"></div>
                <span class="text-[#E1B137] text-[10px] font-bold uppercase tracking-[0.35em] font-display">Requirements</span>
              </div>
              <ul class="space-y-3">
                <li v-for="(req, i) in selectedProgram.requirements" :key="i"
                  class="flex items-start gap-3 text-slate-600 text-sm">
                  <i class="fa-solid fa-circle text-[#E1B137] text-[6px] mt-2"></i>
                  {{ req }}
                </li>
              </ul>
            </div>

            <!-- Quote -->
            <div v-if="selectedProgram.quote"
              class="border-l-4 border-[#E1B137] pl-6 italic text-slate-500 my-10">
              "{{ selectedProgram.quote }}"
            </div>

          </div>

          <!-- Right: Sidebar -->
          <div class="lg:col-span-1">
            <div class="sticky top-24 space-y-6">

              <!-- Details Card -->
              <div class="bg-[#f8f7f4] border border-slate-200 p-6">
                <h3 class="font-display text-lg text-[#2b4b58] mb-5">Program Details</h3>
                <div class="space-y-4 text-sm">
                  <div class="flex items-center justify-between pb-3 border-b border-slate-200">
                    <span class="text-slate-500">Duration</span>
                    <span class="font-semibold text-[#2b4b58]">{{ selectedProgram.duration }}</span>
                  </div>
                  <div class="flex items-center justify-between pb-3 border-b border-slate-200">
                    <span class="text-slate-500">Format</span>
                    <span class="font-semibold text-[#2b4b58]">{{ selectedProgram.format }}</span>
                  </div>
                  <div class="flex items-center justify-between">
                    <span class="text-slate-500">Level</span>
                    <span class="font-semibold text-[#2b4b58]">{{ selectedProgram.level }}</span>
                  </div>
                </div>
              </div>

              <!-- Contact Card (NEW) -->
              <div class="bg-white border border-slate-200 p-6">
                <div class="flex items-center gap-3 mb-5">
                  <div class="w-8 h-px bg-[#E1B137]"></div>
                  <h3 class="font-display text-sm text-[#2b4b58] uppercase tracking-wider">Have Questions?</h3>
                </div>
                <p class="text-slate-500 text-xs leading-relaxed mb-4">
                  Reach out to our team for more information about this program.
                </p>
                <div class="space-y-3">
                  <a href="tel:+2349069258377" 
                    class="flex items-center gap-3 p-3 bg-[#f8f7f4] border border-slate-100 hover:border-[#E1B137]/40 hover:bg-[#E1B137]/5 transition-all group">
                    <div class="w-8 h-8 bg-[#E1B137]/15 flex items-center justify-center shrink-0 group-hover:bg-[#E1B137] transition-colors">
                      <i class="fa-solid fa-phone text-[#E1B137] text-xs group-hover:text-white transition-colors"></i>
                    </div>
                    <div>
                      <p class="text-[10px] uppercase tracking-widest text-slate-400 font-bold">Call Us</p>
                      <p class="text-sm font-semibold text-[#2b4b58]">+234 906 925 8377</p>
                    </div>
                  </a>
                  <a href="tel:+2348129050431" 
                    class="flex items-center gap-3 p-3 bg-[#f8f7f4] border border-slate-100 hover:border-[#E1B137]/40 hover:bg-[#E1B137]/5 transition-all group">
                    <div class="w-8 h-8 bg-[#E1B137]/15 flex items-center justify-center shrink-0 group-hover:bg-[#E1B137] transition-colors">
                      <i class="fa-solid fa-phone text-[#E1B137] text-xs group-hover:text-white transition-colors"></i>
                    </div>
                    <div>
                      <p class="text-[10px] uppercase tracking-widest text-slate-400 font-bold">Call Us</p>
                      <p class="text-sm font-semibold text-[#2b4b58]">+234 812 905 0431</p>
                    </div>
                  </a>
                  <a href="mailto:info@lekkiashram.com" 
                    class="flex items-center gap-3 p-3 bg-[#f8f7f4] border border-slate-100 hover:border-[#E1B137]/40 hover:bg-[#E1B137]/5 transition-all group">
                    <div class="w-8 h-8 bg-[#E1B137]/15 flex items-center justify-center shrink-0 group-hover:bg-[#E1B137] transition-colors">
                      <i class="fa-solid fa-envelope text-[#E1B137] text-xs group-hover:text-white transition-colors"></i>
                    </div>
                    <div>
                      <p class="text-[10px] uppercase tracking-widest text-slate-400 font-bold">Email Us</p>
                      <p class="text-sm font-semibold text-[#2b4b58]">info@lekkiashram.com</p>
                    </div>
                  </a>
                </div>
              </div>

              <!-- CTA Card -->
              <div class="bg-[#2b4b58] p-6 text-center">
                <div class="w-12 h-12 bg-[#E1B137]/20 flex items-center justify-center mx-auto mb-4">
                  <i class="fa-solid fa-calendar-check text-[#E1B137] text-xl"></i>
                </div>
                <h3 class="font-display text-lg text-white mb-2">Ready to Begin?</h3>
                <p class="text-white/50 text-xs mb-5 leading-relaxed">
                  Reserve your place in this program and start your journey.
                </p>
                <button
                  @click="openEnrollModal"
                  class="w-full py-3 bg-[#E1B137] text-[#0d1e26] font-display font-bold text-[11px] uppercase tracking-[0.2em] hover:bg-white transition-all duration-300">
                  Enroll Now
                </button>
              </div>

              <!-- Share -->
              <div class="bg-white border border-slate-200 p-6">
                <h3 class="font-display text-sm text-[#2b4b58] mb-4">Share This Program</h3>
                <div class="flex gap-3">
                  <button @click="shareOn('twitter')"
                    class="w-10 h-10 border border-slate-200 flex items-center justify-center text-slate-400 hover:bg-[#1DA1F2] hover:border-[#1DA1F2] hover:text-white transition-all">
                    <i class="fa-brands fa-twitter"></i>
                  </button>
                  <button @click="shareOn('facebook')"
                    class="w-10 h-10 border border-slate-200 flex items-center justify-center text-slate-400 hover:bg-[#1877F2] hover:border-[#1877F2] hover:text-white transition-all">
                    <i class="fa-brands fa-facebook"></i>
                  </button>
                  <button @click="shareOn('whatsapp')"
                    class="w-10 h-10 border border-slate-200 flex items-center justify-center text-slate-400 hover:bg-[#25D366] hover:border-[#25D366] hover:text-white transition-all">
                    <i class="fa-brands fa-whatsapp"></i>
                  </button>
                  <button @click="copyLink"
                    class="w-10 h-10 border border-slate-200 flex items-center justify-center text-slate-400 hover:bg-[#2b4b58] hover:border-[#2b4b58] hover:text-white transition-all">
                    <i class="fa-solid fa-link"></i>
                  </button>
                </div>
              </div>

            </div>
          </div>

        </div>
      </div>

      <!-- Related Programs -->
      <div v-if="relatedPrograms.length" class="bg-[#f8f7f4] py-16 md:py-20">
        <div class="max-w-6xl mx-auto px-6 md:px-12">
          <div class="flex items-center gap-3 mb-8">
            <div class="w-8 h-px bg-[#E1B137]"></div>
            <span class="text-[#E1B137] text-[10px] font-bold uppercase tracking-[0.35em] font-display">Other Programs</span>
          </div>
          <div class="grid md:grid-cols-3 gap-6">
            <div v-for="program in relatedPrograms" :key="program.id"
              class="group bg-white border border-slate-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-400 overflow-hidden cursor-pointer"
              @click="openProgram(program)">
              <div class="relative h-40 overflow-hidden">
                <img :src="program.image" :alt="program.title"
                  class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" />
                <div class="absolute inset-0 bg-gradient-to-t from-[#0d1e26]/60 via-transparent to-transparent"></div>
              </div>
              <div class="p-5">
                <span class="text-[#E1B137] text-[9px] font-bold uppercase tracking-[0.25em]">{{ program.category }}</span>
                <h4 class="font-display text-[#2b4b58] text-base mt-1 group-hover:text-[#E1B137] transition-colors">
                  {{ program.title }}
                </h4>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <!-- ===== ENROLL MODAL ===== -->
    <Teleport to="body">
      <Transition name="modal">
        <div v-if="showEnrollModal"
          class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-[#0d1e26]/75 backdrop-blur-md"
          @click.self="closeEnrollModal">
          <div class="bg-white max-w-2xl w-full max-h-[90vh] overflow-hidden shadow-2xl">
            <div class="flex items-center justify-between px-6 md:px-7 py-4 md:py-5 border-b border-slate-100">
              <div class="flex items-center gap-4">
                <div class="w-9 h-9 bg-[#E1B137]/15 flex items-center justify-center">
                  <i class="fa-solid fa-calendar-check text-[#E1B137]"></i>
                </div>
                <div>
                  <h3 class="font-display text-base md:text-lg text-[#2b4b58]">Enroll in Program</h3>
                  <p class="text-xs text-slate-400">{{ selectedProgram?.title }}</p>
                </div>
              </div>
              <button @click="closeEnrollModal"
                class="w-9 h-9 flex items-center justify-center text-slate-400 hover:text-slate-600 hover:bg-slate-100 transition-colors">
                <i class="fa-solid fa-xmark"></i>
              </button>
            </div>

            <div class="p-6 md:p-7 overflow-y-auto max-h-[calc(90vh-80px)]">
              <form @submit.prevent="submitEnrollForm" class="space-y-5">
                <!-- Date & Time -->
                <div class="grid md:grid-cols-2 gap-4">
                  <div>
                    <label class="block text-[11px] font-bold uppercase tracking-widest text-slate-600 mb-2 font-display">Preferred Start Date *</label>
                    <input type="date" v-model="enrollForm.date" :min="minDate" required
                      class="w-full px-4 py-3 border border-slate-200 text-sm focus:outline-none focus:border-[#2b4b58] transition-colors" />
                  </div>
                  <div>
                    <label class="block text-[11px] font-bold uppercase tracking-widest text-slate-600 mb-2 font-display">Preferred Time *</label>
                    <select v-model="enrollForm.time" required
                      class="w-full px-4 py-3 border border-slate-200 text-sm focus:outline-none focus:border-[#2b4b58] transition-colors bg-white">
                      <option value="">Select a time</option>
                      <option value="09:00">9:00 AM – Morning</option>
                      <option value="11:00">11:00 AM – Midday</option>
                      <option value="14:00">2:00 PM – Afternoon</option>
                      <option value="16:00">4:00 PM – Evening</option>
                    </select>
                  </div>
                </div>

                <!-- Name & Email -->
                <div class="grid md:grid-cols-2 gap-4">
                  <div>
                    <label class="block text-[11px] font-bold uppercase tracking-widest text-slate-600 mb-2 font-display">Full Name *</label>
                    <input type="text" v-model="enrollForm.name" placeholder="John Doe" required
                      class="w-full px-4 py-3 border border-slate-200 text-sm focus:outline-none focus:border-[#2b4b58] transition-colors" />
                  </div>
                  <div>
                    <label class="block text-[11px] font-bold uppercase tracking-widest text-slate-600 mb-2 font-display">Email *</label>
                    <input type="email" v-model="enrollForm.email" placeholder="john@example.com" required
                      class="w-full px-4 py-3 border border-slate-200 text-sm focus:outline-none focus:border-[#2b4b58] transition-colors" />
                  </div>
                </div>

                <!-- Phone & Guests -->
                <div class="grid md:grid-cols-2 gap-4">
                  <div>
                    <label class="block text-[11px] font-bold uppercase tracking-widest text-slate-600 mb-2 font-display">Phone</label>
                    <input type="tel" v-model="enrollForm.phone" placeholder="+234 XXX XXX XXXX"
                      class="w-full px-4 py-3 border border-slate-200 text-sm focus:outline-none focus:border-[#2b4b58] transition-colors" />
                  </div>
                  <div>
                    <label class="block text-[11px] font-bold uppercase tracking-widest text-slate-600 mb-2 font-display">Guests</label>
                    <select v-model="enrollForm.guests"
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
                  <textarea v-model="enrollForm.requests" rows="3" placeholder="Any specific requirements..."
                    class="w-full px-4 py-3 border border-slate-200 text-sm focus:outline-none focus:border-[#2b4b58] transition-colors resize-none"></textarea>
                </div>

                <button type="submit" :disabled="isSubmitting"
                  class="w-full py-4 bg-[#E1B137] text-[#0d1e26] font-display font-bold text-[11px] uppercase tracking-[0.2em] hover:bg-[#2b4b58] hover:text-white transition-all duration-300 flex items-center justify-center gap-3 disabled:opacity-50 disabled:cursor-not-allowed">
                  <i class="fa-solid" :class="isSubmitting ? 'fa-spinner fa-spin' : 'fa-paper-plane'"></i>
                  {{ isSubmitting ? 'Sending...' : 'Submit Enrollment' }}
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

  </div>
</template>

<script setup>
import { ref, reactive, computed } from 'vue'
import { Link, router } from '@inertiajs/vue3'
import GuestLayout from '@/Layouts/GuestLayout.vue'
import { useToast } from '@/Composables/useToast'

defineOptions({ layout: GuestLayout })

const { showToast } = useToast()

// ── Program Data ──
const programs = [
  {
    id: 'meditation-retreats',
    title: 'Meditation Retreats',
    category: 'Retreat',
    shortDescription: 'Immersive weekend retreats combining guided meditation, silence, and self-inquiry.',
    fullDescription: 'Our meditation retreats offer a rare opportunity to step away from the noise of daily life and enter into deep stillness. Set within the tranquil grounds of The Lekki Ashram, each retreat is carefully structured to guide participants through progressive stages of meditation, from basic breath awareness to advanced self-inquiry. Whether you are new to meditation or have been practicing for years, you will find space here to deepen your practice and reconnect with your inner self.',
    duration: '3-7 days',
    format: 'Residential',
    level: 'All Levels',
    image: 'https://plus.unsplash.com/premium_photo-1722686468510-50697b1a9f38?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OXx8bWVkaXRhdGlvbiUyMHJldHJlYXR8ZW58MHx8MHx8fDA%3D',
    quote: 'Silence is not the absence of sound, but the presence of deep listening.',
    learnings: [
      'Establish a consistent daily meditation practice',
      'Learn to work with the breath as an anchor',
      'Develop awareness of thought patterns and habits',
      'Practice self-inquiry in a supportive community',
      'Integrate mindfulness into everyday life',
      'Experience the profound stillness of extended silence'
    ],
    curriculum: [
      { title: 'Arrival & Grounding', description: 'Settle into the Ashram, meet fellow practitioners, and set your intention for the retreat.' },
      { title: 'Foundations of Meditation', description: 'Learn foundational techniques for calming the mind and cultivating sustained attention.' },
      { title: 'Deepening Practice', description: 'Extend your meditation sessions and explore contemplative inquiry into the nature of self.' },
      { title: 'Silent Immersion', description: 'Enter into a period of noble silence, allowing the mind to settle naturally into stillness.' },
      { title: 'Integration', description: 'Reflect on your experience and receive guidance on carrying your practice forward into daily life.' }
    ],
    requirements: [
      'A sincere willingness to engage in silent practice',
      'Comfortable loose-fitting clothing',
      'An open mind and heart',
      'No prior meditation experience required'
    ]
  },
  {
    id: 'advaita-study',
    title: 'Advaita Study Groups',
    category: 'Philosophy',
    shortDescription: 'Deep exploration of non-dual philosophy through weekly study, dialogue, and contemplation.',
    fullDescription: 'Advaita Vedanta is one of the world\'s oldest and most profound philosophical traditions. This study group offers a rigorous yet accessible exploration of non-dual philosophy through classical texts, dialogue, and direct inquiry. Meeting weekly, we engage with foundational scriptures and contemporary interpretations, always grounding our study in personal experience and contemplative practice.',
    duration: '12 weeks',
    format: 'In-Person & Online',
    level: 'Beginner',
    image: 'https://images.unsplash.com/photo-1643050079091-1d4a51e07ba0?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8cGhpbG9zb3BoeXxlbnwwfHwwfHx8MA%3D%3D',
    quote: 'The self is not something to be attained, but something to be recognized.',
    learnings: [
      'Understand core concepts of Advaita Vedanta',
      'Read and interpret classical Sanskrit texts',
      'Engage in rigorous philosophical dialogue',
      'Apply non-dual understanding to daily experience',
      'Develop a personal contemplative practice',
      'Distinguish between intellectual understanding and direct recognition'
    ],
    curriculum: [
      { title: 'Introduction to Advaita', description: 'Overview of non-dual philosophy, its history, and core terminology.' },
      { title: 'The Nature of the Self', description: 'Study of the Upanishads and inquiry into the nature of consciousness.' },
      { title: 'Maya & Reality', description: 'Examination of the concept of maya and the relationship between the absolute and the relative.' },
      { title: 'The Path of Knowledge', description: 'Exploration of self-inquiry (atma-vichara) as a means of realization.' },
      { title: 'Integration & Living', description: 'How non-dual understanding transforms daily life and relationships.' }
    ],
    requirements: [
      'Some familiarity with philosophical inquiry',
      'Willingness to engage with primary texts',
      'Regular attendance and participation',
      'A notebook for reflection and notes'
    ]
  },
  {
    id: 'eco-conservation',
    title: 'Eco-Conservation Initiatives',
    category: 'Ecology',
    shortDescription: 'Hands-on conservation work combining ecological restoration with spiritual practice.',
    fullDescription: 'At The Lekki Ashram, we understand that true well-being is inseparable from the well-being of the natural world. Our conservation initiatives offer participants the opportunity to engage in meaningful ecological work while deepening their connection to nature. From mangrove restoration along the Lagos coastline to community gardens and wildlife monitoring, every activity is designed to cultivate ecological awareness and practical skills.',
    duration: 'Ongoing',
    format: 'Field Work',
    level: 'Beginner',
    image: 'https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?w=800&auto=format&fit=crop&q=80',
    quote: 'To care for the earth is to care for ourselves, for we are not separate from it.',
    learnings: [
      'Understand local ecosystems and biodiversity',
      'Learn practical conservation techniques',
      'Develop ecological awareness through direct observation',
      'Participate in community restoration projects',
      'Connect spiritual practice with environmental action',
      'Build skills in sustainable living'
    ],
    curriculum: [
      { title: 'Ecology Fundamentals', description: 'Introduction to ecological principles and the specific ecosystems of the Lekki region.' },
      { title: 'Mangrove Restoration', description: 'Hands-on work in mangrove planting and coastal ecosystem rehabilitation.' },
      { title: 'Wildlife Monitoring', description: 'Learn techniques for observing and documenting local wildlife populations.' },
      { title: 'Sustainable Agriculture', description: 'Participate in the Ashram\'s gardens and learn principles of regenerative farming.' },
      { title: 'Community Engagement', description: 'Work with local communities on conservation and education initiatives.' }
    ],
    requirements: [
      'Willingness to work outdoors in various conditions',
      'Comfortable clothing and closed-toe shoes',
      'No prior experience necessary',
      'A commitment to at least one volunteer session per month'
    ]
  },
  {
    id: 'satsang',
    title: 'Satsang Gatherings',
    category: 'Community',
    shortDescription: 'Monthly community gatherings featuring teachings, bhajans, and shared meditation.',
    fullDescription: 'Satsang, meaning "association with truth," is a cherished tradition in which seekers gather to share in spiritual practice and inquiry. Our monthly satsangs bring together the Ashram community for an evening of meditation, devotional singing (bhajan), and philosophical discussion. These gatherings are open to all, whether you are a long-time practitioner or simply curious about the spiritual life.',
    duration: 'Monthly',
    format: 'In-Person & Online',
    level: 'Beginner',
    image: 'https://images.unsplash.com/photo-1661507912324-7f2b93f2ec1c?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8U2F0c2FuZ3xlbnwwfHwwfHx8MA%3D%3D',
    quote: 'Where two or more are gathered in truth, the presence of the divine is felt.',
    learnings: [
      'Experience the power of collective meditation',
      'Learn traditional bhajans and devotional songs',
      'Engage in philosophical dialogue with fellow seekers',
      'Build meaningful connections within a spiritual community',
      'Deepen your understanding through shared inquiry',
      'Find support for your spiritual journey'
    ],
    curriculum: [
      { title: 'Opening Meditation', description: 'We begin each satsang with a period of silent meditation to settle the mind and open the heart.' },
      { title: 'Bhajan & Kirtan', description: 'Devotional singing, led by experienced practitioners, creates a joyful and unifying atmosphere.' },
      { title: 'Teaching & Discourse', description: 'A short talk on a spiritual theme, drawing from Advaita, yoga, and universal wisdom traditions.' },
      { title: 'Dialogue & Inquiry', description: 'Open discussion where participants can ask questions and share their insights.' },
      { title: 'Closing & Prasad', description: 'We close with a blessing and share a simple meal, continuing our connection in a relaxed setting.' }
    ],
    requirements: [
      'An open mind and heart',
      'No prior experience required',
      'A willingness to participate in group practice',
      'Comfortable seating (chairs provided)'
    ]
  },
  {
    id: 'wellness',
    title: 'Wellness & Therapy',
    category: 'Wellness',
    shortDescription: 'Integrative wellness programs combining therapy, breathwork, and mindful movement.',
    fullDescription: 'True wellness is not merely the absence of illness, but a state of vibrant health in body, mind, and spirit. Our wellness programs draw on functional medicine, therapeutic bodywork, breathwork, and mindful movement to support you in restoring balance and vitality. Each program is tailored to your individual needs, whether you are seeking relief from specific concerns or simply wish to optimize your well-being.',
    duration: 'Ongoing',
    format: 'One-on-One & Group',
    level: 'Beginner',
    image: 'https://plus.unsplash.com/premium_photo-1723867490491-10519f8ed969?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8d2VsbG5lc3MlMjBhbmQlMjB0aGVyYXB5fGVufDB8fDB8fHww',
    quote: 'The greatest wealth is health.',
    learnings: [
      'Understand your body\'s unique constitution and needs',
      'Learn breathing techniques for stress reduction',
      'Develop a personalized wellness routine',
      'Explore the connection between emotion and physical health',
      'Learn about nutrition and lifestyle factors',
      'Practice mindful movement and body awareness'
    ],
    curriculum: [
      { title: 'Assessment & Intake', description: 'A comprehensive review of your health history, goals, and current challenges.' },
      { title: 'Functional Medicine Consultation', description: 'Evaluation of underlying factors affecting your health, including nutrition, stress, and lifestyle.' },
      { title: 'Breathwork & Movement', description: 'Sessions designed to release tension and restore vitality through breath and gentle movement.' },
      { title: 'Nutritional Guidance', description: 'Personalized recommendations for dietary changes that support your wellness goals.' },
      { title: 'Ongoing Support', description: 'Regular check-ins to track progress and adjust your program as needed.' }
    ],
    requirements: [
      'A commitment to your own well-being',
      'Honesty about your health history and lifestyle',
      'Willingness to make sustainable changes',
      'Comfortable clothing for movement sessions'
    ]
  },
  {
    id: 'lectures',
    title: 'Lectures',
    category: 'Education',
    shortDescription: 'Public lectures exploring the intersection of Advaita, science, and modern life.',
    fullDescription: 'Our public lecture series brings together scholars, practitioners, and seekers to explore the timeless wisdom of Advaita in dialogue with contemporary science, psychology, and culture. Each lecture is followed by an open discussion, providing an opportunity to engage directly with the ideas and their practical implications for modern life. Lectures are free and open to all.',
    duration: 'Weekly',
    format: 'In-Person & Online',
    level: 'Beginner',
    image: 'https://images.unsplash.com/photo-1497633762265-9d179a990aa6?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8ZWR1Y2F0aW9ufGVufDB8fDB8fHww',
    quote: 'Philosophy is not a theory but an activity.',
    learnings: [
      'Engage with classical and contemporary philosophical ideas',
      'Understand the relationship between Advaita and modern science',
      'Develop critical thinking and discernment',
      'Participate in rigorous but accessible intellectual inquiry',
      'See how philosophy applies to everyday life',
      'Connect with a community of fellow thinkers'
    ],
    curriculum: [
      { title: 'Consciousness & the Brain', description: 'What can neuroscience tell us about consciousness, and what can Advaita contribute to the conversation?' },
      { title: 'Time, Causality & Freedom', description: 'An exploration of determinism, free will, and the nature of time from both Eastern and Western perspectives.' },
      { title: 'Ecology & Ethics', description: 'How does non-dual philosophy inform our relationship with the natural world and our ethical obligations?' },
      { title: 'The Nature of the Self', description: 'Who are we? Philosophical inquiry into identity, memory, and the sense of self.' },
      { title: 'Science & Spirituality', description: 'Can science and spirituality be reconciled? A dialogue between two ways of knowing.' }
    ],
    requirements: [
      'Curiosity and openness to new ideas',
      'Willingness to engage in respectful dialogue',
      'No prior philosophical background required',
      'Registration is appreciated but not required'
    ]
  }
]

// ── Program Detail View ──
const selectedProgram = ref(null)

const openProgram = (program) => {
  selectedProgram.value = program
  window.scrollTo({ top: 0, behavior: 'smooth' })
  document.body.style.overflow = ''
}

const closeProgram = () => {
  selectedProgram.value = null
  window.scrollTo({ top: 0, behavior: 'smooth' })
}

// Related programs (excluding the currently selected one)
const relatedPrograms = computed(() => {
  if (!selectedProgram.value) return []
  return programs
    .filter(p => p.id !== selectedProgram.value.id)
    .slice(0, 3)
})

// ── Enrollment Modal ──
const showEnrollModal = ref(false)
const isSubmitting = ref(false)

const enrollForm = reactive({
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

const openEnrollModal = () => {
  enrollForm.requests = `Program: ${selectedProgram.value.title}`
  showEnrollModal.value = true
  document.body.style.overflow = 'hidden'
}

const closeEnrollModal = () => {
  showEnrollModal.value = false
  document.body.style.overflow = ''
}

const submitEnrollForm = () => {
  const requiredFields = ['date', 'time', 'name', 'email']
  const newErrors = {}
  
  requiredFields.forEach(field => {
    if (!enrollForm[field]) {
      newErrors[field] = `${field.charAt(0).toUpperCase() + field.slice(1)} is required`
    }
  })
  
  if (Object.keys(newErrors).length > 0) {
    showToast('Please fill in all required fields.', 'error')
    return
  }

  isSubmitting.value = true

  router.post('/visit-requests', {
    visitType: selectedProgram.value.id,
    date: enrollForm.date,
    time: enrollForm.time,
    name: enrollForm.name,
    email: enrollForm.email,
    phone: enrollForm.phone,
    guests: enrollForm.guests,
    requests: enrollForm.requests
  }, {
    preserveState: true,
    preserveScroll: true,
    onSuccess: (page) => {
      isSubmitting.value = false
      
      if (page.props.flash?.success) {
        showToast(page.props.flash.success, 'success')
      } else {
        showToast('Your enrollment request has been sent. We\'ll confirm within 24 hours.', 'success')
      }
      
      setTimeout(() => {
        closeEnrollModal()
        Object.assign(enrollForm, {
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
      isSubmitting.value = false
      showToast('Please check your form and try again.', 'error')
      console.error('Enrollment error:', err)
    }
  })
}

// ── Share Functions ──
const shareOn = (platform) => {
  const url = window.location.href
  const text = `Check out "${selectedProgram.value.title}" at The Lekki Ashram`
  
  let shareUrl = ''
  
  switch (platform) {
    case 'twitter':
      shareUrl = `https://twitter.com/intent/tweet?text=${encodeURIComponent(text)}&url=${encodeURIComponent(url)}`
      break
    case 'facebook':
      shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}`
      break
    case 'whatsapp':
      shareUrl = `https://wa.me/?text=${encodeURIComponent(text + ' ' + url)}`
      break
  }
  
  if (shareUrl) {
    window.open(shareUrl, '_blank', 'width=600,height=400')
  }
}

const copyLink = async () => {
  try {
    await navigator.clipboard.writeText(window.location.href)
    showToast('Link copied to clipboard!', 'success')
  } catch (err) {
    // Fallback for older browsers
    const textArea = document.createElement('textarea')
    textArea.value = window.location.href
    document.body.appendChild(textArea)
    textArea.select()
    try {
      document.execCommand('copy')
      showToast('Link copied to clipboard!', 'success')
    } catch (e) {
      showToast('Failed to copy link', 'error')
    }
    document.body.removeChild(textArea)
  }
}
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

.modal-enter-active,
.modal-leave-active {
  transition: opacity 0.3s ease;
}
.modal-enter-from,
.modal-leave-to {
  opacity: 0;
}

/* Smooth scroll for program detail */
html {
  scroll-behavior: smooth;
}
</style>