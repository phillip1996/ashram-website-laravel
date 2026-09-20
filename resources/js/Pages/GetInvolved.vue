<template>
  <div class="page-wrapper font-body">

    <!-- Hero -->
    <section class="hero relative min-h-[45vh] flex items-center overflow-hidden">
      <!-- Ripple rings: the one decorative element on the page -->
      <svg class="hero-rings" viewBox="0 0 600 600" fill="none" aria-hidden="true">
        <circle cx="300" cy="300" r="44"  stroke-opacity="0.55" />
        <circle cx="300" cy="300" r="96"  stroke-opacity="0.42" />
        <circle cx="300" cy="300" r="156" stroke-opacity="0.32" />
        <circle cx="300" cy="300" r="224" stroke-opacity="0.22" />
        <circle cx="300" cy="300" r="300" stroke-opacity="0.14" />
      </svg>

      <div class="relative w-full max-w-5xl mx-auto px-6 md:px-12 py-16 md:py-24">
        <h1 class="font-display text-4xl md:text-6xl leading-tight text-white max-w-2xl mb-5">
          Support The Lekki Ashram
        </h1>
        <p class="text-white/75 text-base md:text-lg max-w-md leading-relaxed">
          Help us continue our work in Advaita philosophy, ecology, wellness, and conscious living.
        </p>
      </div>
    </section>

    <!-- Coming Soon Panel -->
    <section class="panel-section py-16 md:py-24">
      <div class="max-w-2xl mx-auto px-6 md:px-12">

        <div class="panel rounded-lg p-8 md:p-12">

          <!-- Icon (Tabler heart, inline SVG) -->
          <div class="heart-badge">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"
                 fill="none" stroke="currentColor" stroke-width="1.75"
                 stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
            </svg>
          </div>

          <!-- Heading -->
          <h2 class="font-display text-3xl md:text-4xl brand-ink mb-4">
            Donations are coming soon
          </h2>

          <!-- Body -->
          <p class="brand-muted text-base leading-relaxed mb-5">
            We're putting the finishing touches on our secure online donation portal
            (via PayPal and other trusted payment methods).
          </p>
          <p class="brand-muted text-base leading-relaxed mb-8">
            In the meantime, if you'd like to contribute to The Lekki Ashram
            or discuss partnership and volunteering, please reach out to us directly.
          </p>

          <!-- Contact Options -->
          <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 mb-8">
            <a
              href="https://wa.me/2349069258377?text=Hi%2C%20I%27d%20like%20to%20support%20The%20Lekki%20Ashram"
              target="_blank"
              rel="noopener noreferrer"
              class="btn btn-primary"
            >
              <i class="fa-brands fa-whatsapp"></i>
              Chat on WhatsApp
            </a>
            <Link href="/contact" class="btn btn-secondary">
              <i class="fa-solid fa-envelope"></i>
              Send a message
            </Link>
          </div>

          <!-- Address -->
          <div class="panel-divider pt-6">
            <p class="brand-muted text-sm leading-relaxed flex gap-2.5">
              <i class="fa-solid fa-location-dot brand-green mt-1"></i>
              <span>07, Kayode I. Micah Street, Off Abraham Adesanya-Ogombo Rd. Lekki Scheme 2, Eti-Osa, Nigeria.</span>
            </p>
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
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Montserrat:wght@300;400;500;600;700&display=swap');

/* ---- Brand tokens: change the look of the whole page here ---- */
.page-wrapper {
  --brand-green:   #1F4D3F; /* mangrove: hero, links, secondary button */
  --brand-saffron: #F2A007; /* saffron: rings, icon badge, main button */
  --brand-mist:    #EEF3EE; /* page surface below the hero */
  --brand-ink:     #14261F; /* headings and text on saffron */
  --brand-muted:   #4A645A; /* body copy */
  --brand-line:    #D5E0D8; /* borders and dividers */
}

.font-display { font-family: 'Playfair Display', Georgia, serif; }
.font-body    { font-family: 'Montserrat', sans-serif; }

.brand-ink   { color: var(--brand-ink); }
.brand-muted { color: var(--brand-muted); }
.brand-green { color: var(--brand-green); }

/* Hero */
.hero { background: var(--brand-green); }

.hero-rings {
  position: absolute;
  right: -200px;
  bottom: -220px;
  width: 480px;
  height: 480px;
  pointer-events: none;
}
.hero-rings circle {
  stroke: var(--brand-saffron);
  stroke-width: 1.5;
}
@media (min-width: 768px) {
  .hero-rings {
    right: -120px;
    top: 50%;
    bottom: auto;
    width: 680px;
    height: 680px;
    transform: translateY(-50%);
  }
}

/* Panel */
.panel-section { background: var(--brand-mist); }
.panel {
  background: #fff;
  border: 1px solid var(--brand-line);
}
.panel-divider { border-top: 1px solid var(--brand-line); }

.heart-badge {
  width: 56px;
  height: 56px;
  border-radius: 9999px;
  background: var(--brand-saffron);
  color: var(--brand-ink);
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 1.5rem;
}

/* Buttons */
.btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 0.5rem;
  padding: 0.85rem 1.5rem;
  font-size: 0.9375rem;
  font-weight: 600;
  border-radius: 0.375rem;
  border: 1px solid transparent;
  transition: background-color 0.2s, color 0.2s, border-color 0.2s;
}
.btn:focus-visible {
  outline: 3px solid var(--brand-green);
  outline-offset: 2px;
}
.btn-primary {
  background: var(--brand-saffron);
  color: var(--brand-ink);
}
.btn-primary:hover {
  background: var(--brand-green);
  color: #fff;
}
.btn-secondary {
  border-color: var(--brand-green);
  color: var(--brand-green);
}
.btn-secondary:hover {
  background: var(--brand-green);
  color: #fff;
}
</style>