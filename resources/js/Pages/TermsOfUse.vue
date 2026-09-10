<template>
  <div class="page-wrapper font-body">

    <!-- =====================================================
         HERO — with background image (mobile‑optimized)
    ===================================================== -->
    <section class="relative min-h-[40vh] md:min-h-[45vh] flex items-center overflow-hidden bg-[#2b4b58]">
      <img
        src="https://images.unsplash.com/photo-1589829545856-d10d557cf95f?w=1600&auto=format&fit=crop&q=80"
        alt="Terms of Use"
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
            Terms of <em class="not-italic text-[#E1B137]">Use</em>
          </h1>
          <p class="text-white/70 text-sm md:text-base lg:text-lg max-w-xl mt-3 md:mt-4 leading-relaxed">
            Please read these terms carefully before using our website. By accessing this site, you agree to be bound by them.
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
              Welcome to The Lekki Ashram website. These Terms of Use govern your use of our website and services. By using this site, you accept these terms in full.
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
    title: '1. Acceptance of Terms',
    content: `
      <p>By accessing and using <strong>The Lekki Ashram</strong> website, you agree to be bound by these Terms of Use. If you do not agree, please do not use our site.</p>
    `
  },
  {
    title: '2. Use of Content',
    content: `
      <p>All original content on this website, including text, graphics, and logos, is the property of The Lekki Ashram and is protected by copyright and intellectual property laws. Some images used on this site are sourced from free stock photo platforms and remain the property of their respective owners.

You may not reproduce, distribute, or create derivative works from our original content without prior written permission.</p>
    `
  },
  {
    title: '3. User Conduct',
    content: `
      <p>You agree to use our website for lawful purposes only. You shall not:</p>
      <ul>
        <li>Post or transmit any unlawful, threatening, or abusive material</li>
        <li>Attempt to gain unauthorised access to our systems</li>
        <li>Interfere with the proper functioning of the website</li>
        <li>Use the site to distribute spam or malicious software</li>
      </ul>
    `
  },
  {
    title: '4. External Links',
    content: `
      <p>Our website may contain links to third‑party websites. We are not responsible for the content or privacy practices of those sites. We encourage you to review their terms and policies.</p>
    `
  },
  {
    title: '5. Disclaimer of Warranties',
    content: `
      <p>The information on this website is provided "as is" without any representations or warranties. We make no guarantee that the site will be error‑free, secure, or continuously available.</p>
    `
  },
  {
    title: '6. Limitation of Liability',
    content: `
      <p>To the fullest extent permitted by law, The Lekki Ashram shall not be liable for any direct, indirect, incidental, or consequential damages arising from your use of the site or any content provided.</p>
    `
  },
  {
    title: '7. Indemnification',
    content: `
      <p>You agree to indemnify and hold The Lekki Ashram harmless from any claims, losses, or damages arising from your violation of these Terms.</p>
    `
  },
  {
    title: '8. Changes to Terms',
    content: `
      <p>We reserve the right to update these Terms of Use at any time. Changes will be posted on this page with an updated revision date.</p>
    `
  },
  {
    title: '9. Governing Law',
    content: `
      <p>These terms shall be governed by and construed in accordance with the laws of the Federal Republic of Nigeria.</p>
    `
  },
  {
    title: '10. Contact Information',
    content: `
      <p>For questions about these Terms, please contact us at:</p>
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