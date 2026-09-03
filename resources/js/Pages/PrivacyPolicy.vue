<template>
  <div class="page-wrapper font-body">

    <!-- =====================================================
         HERO — with background image (mobile‑optimized)
    ===================================================== -->
    <section class="relative min-h-[40vh] md:min-h-[45vh] flex items-center overflow-hidden bg-[#2b4b58]">
      <img
        src="https://images.unsplash.com/photo-1504196606672-aef5c9cefc92?w=1600&auto=format&fit=crop&q=80"
        alt="Privacy Policy"
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
            <span class="text-[#E1B137] text-[10px] md:text-[11px] font-bold uppercase tracking-[0.35em] font-display">Legal</span>
          </div>
          <h1 class="font-display text-3xl sm:text-4xl md:text-5xl lg:text-6xl text-white leading-tight">
            Privacy <em class="not-italic text-[#E1B137]">Policy</em>
          </h1>
          <p class="text-white/70 text-sm md:text-base lg:text-lg max-w-xl mt-3 md:mt-4 leading-relaxed">
            Your privacy matters to us. This policy explains how we collect, use, and safeguard your information.
          </p>
          <div class="mt-4 md:mt-6 flex flex-wrap items-center gap-3 md:gap-4 text-white/40 text-xs md:text-sm">
            <span>Last updated: <strong class="text-white/60">{{ formattedDate }}</strong></span>
            <span class="w-px h-4 bg-white/20"></span>
            <span>Version 1.0</span>
          </div>
        </div>
      </div>
    </section>

    <!-- Content -->
    <section class="py-12 md:py-20 lg:py-28 bg-[#f8f7f4]">
      <div class="max-w-4xl mx-auto px-6 md:px-12">
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 md:p-10 lg:p-16 prose prose-slate max-w-none">

          <!-- Introduction -->
          <div class="mb-8 md:mb-10 pb-6 md:pb-8 border-b border-slate-100">
            <p class="text-base md:text-lg text-slate-600 leading-relaxed">
              The Lekki Ashram ("we", "our", "us") respects your privacy. This Privacy Policy describes how we collect, use, and protect your personal information when you visit our website or interact with us.
            </p>
          </div>

          <!-- Sections -->
          <div v-for="(section, index) in sections" :key="index" class="mb-8 md:mb-10 last:mb-0">
            <h2 class="text-xl md:text-2xl font-serif text-[#2b4b58] mb-3 md:mb-4 flex items-center gap-3">
              <span class="w-1 h-5 md:h-6 bg-[#E1B137] rounded-full"></span>
              {{ section.title }}
            </h2>
            <div class="pl-3 md:pl-4 space-y-2 md:space-y-3 text-slate-600 leading-relaxed text-sm md:text-base" v-html="section.content"></div>
          </div>

          <!-- Footer back link -->
          <div class="mt-10 md:mt-12 pt-6 border-t border-slate-200 text-sm text-slate-500 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3">
            <Link href="/" class="text-[#2b4b58] hover:text-[#E1B137] transition-colors inline-flex items-center gap-2 font-medium">
              <i class="fa-solid fa-arrow-left"></i> Back to Home
            </Link>
            <span class="text-slate-400 text-xs">Effective: {{ formattedDate }}</span>
          </div>

        </div>
      </div>
    </section>

  </div>
</template>

<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue'
import { Link } from '@inertiajs/vue3'
import { computed } from 'vue'

defineOptions({ layout: GuestLayout })

// ── Dynamic date ──
const formattedDate = computed(() => {
  const now = new Date()
  return now.toLocaleDateString('en-US', {
    year: 'numeric',
    month: 'long',
    day: 'numeric'
  })
})

const sections = [
  {
    title: '1. Information We Collect',
    content: `
      <p>We collect information you voluntarily provide when you:</p>
      <ul>
        <li>Subscribe to our newsletter</li>
        <li>Submit a contact form or visit request</li>
        <li>Register for an event or program</li>
        <li>Communicate with us via email or phone</li>
      </ul>
      <p>This may include your name, email address, phone number, and any other details you choose to share.</p>
    `
  },
  {
    title: '2. How We Use Your Information',
    content: `
      <p>We use your information to:</p>
      <ul>
        <li>Respond to inquiries and requests</li>
        <li>Send newsletters and updates (only with your consent)</li>
        <li>Improve our programs and services</li>
        <li>Comply with legal obligations</li>
      </ul>
    `
  },
  {
    title: '3. Data Security',
    content: `
      <p>We implement appropriate technical and organisational measures to protect your personal data against unauthorised access, alteration, disclosure, or destruction. While we strive to protect your information, no method of transmission over the internet is 100% secure.</p>
    `
  },
  {
    title: '4. Sharing Your Information',
    content: `
      <p>We do not sell, trade, or rent your personal information to third parties. We may share data with trusted service providers who assist us in operating our website and conducting our activities, provided they agree to keep your information confidential.</p>
    `
  },
  {
    title: '5. Cookies',
    content: `
      <p>Our website uses cookies to enhance your browsing experience. You can choose to disable cookies in your browser settings, though this may affect some functionalities.</p>
    `
  },
  {
    title: '6. Your Rights',
    content: `
      <p>You have the right to access, correct, or delete your personal data at any time. To exercise these rights, please contact us at <a href="mailto:info@lekkiashram.com" class="text-[#E1B137] hover:underline">info@lekkiashram.com</a>.</p>
    `
  },
  {
    title: '7. Changes to This Policy',
    content: `
      <p>We may update this Privacy Policy from time to time. We will notify you of any significant changes by posting the new policy on this page. The date at the top of this policy indicates when it was last revised.</p>
    `
  },
  {
    title: '8. Contact Us',
    content: `
      <p>If you have any questions about this Privacy Policy, please contact us at:</p>
      <address class="not-italic bg-slate-50 p-4 rounded-lg border border-slate-200 mt-2 text-sm md:text-base">
        <strong>The Lekki Ashram</strong><br>
        07, Kayode I. Micah Street, Off Abraham Adesanya-Ogombo Rd.<br>
        Lekki Scheme 2, Eti-Osa, Nigeria.<br>
        Email: <a href="mailto:info@lekkiashram.com" class="text-[#E1B137] hover:underline">info@lekkiashram.com</a>
      </address>
    `
  }
]
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Montserrat:wght@300;400;500;600;700&display=swap');

.font-display { font-family: 'Playfair Display', Georgia, serif; }
.font-body { font-family: 'Montserrat', sans-serif; }

.prose ul {
  list-style-type: disc;
  padding-left: 1.5rem;
}
.prose ul li {
  margin-bottom: 0.25rem;
}
.prose a {
  color: #E1B137;
  text-decoration: none;
}
.prose a:hover {
  text-decoration: underline;
}
.prose address {
  font-style: normal;
}

@media (max-width: 640px) {
  .prose ul {
    padding-left: 1.2rem;
  }
  .prose ul li {
    margin-bottom: 0.15rem;
  }
}
</style>