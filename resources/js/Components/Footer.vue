<template>
  <footer class="font-montserrat">

    <div class="bg-[#1e3540] text-white">
      <div class="max-w-6xl mx-auto px-4 lg:px-12 py-12 lg:py-14">

        <!-- Grid: 1 column mobile, 2 columns tablet, 4 columns desktop -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-10">

          <!-- Brand -->
          <div class="sm:col-span-2 space-y-4 lg:space-y-5">
            <img src="/img/logo.png" alt="The Lekki Ashram" class="h-10 w-auto brightness-0 invert" />
            <p class="text-white/50 text-sm leading-relaxed max-w-sm">
              A sanctuary for higher living, founded on the principles of Advaita, ecological stewardship, and social order.
            </p>
            <div class="flex gap-3 pt-1">
              <a href="https://x.com/AshramLekki" class="footer-social"><i class="fa-brands fa-x-twitter"></i></a>
              <a href="https://www.facebook.com/share/1CkSnfWiCn/" class="footer-social"><i class="fa-brands fa-facebook"></i></a>
              <a href="https://www.instagram.com/lekkiadvaita?stkn=Z3cwZXpkaTN1OWMX" class="footer-social"><i class="fa-brands fa-instagram"></i></a>
              <a href="https://www.tiktok.com/@guru.iyke?_r=1&_t=ZS-99VNndphiVN" class="footer-social"><i class="fa-brands fa-tiktok"></i></a>
            </div>
          </div>

          <!-- Quick Links -->
          <div>
            <h4 class="text-[#E1B137] text-[10px] font-bold uppercase tracking-[0.3em] mb-4">Quick Links</h4>
            <ul class="space-y-2.5 text-sm text-white/50">
              <li><Link href="/" class="hover:text-[#E1B137] transition-colors inline-block">Home</Link></li>
              <li><Link href="/about" class="hover:text-[#E1B137] transition-colors inline-block">About</Link></li>
              <li><Link href="/#recent-articles" class="hover:text-[#E1B137] transition-colors inline-block">Insights</Link></li>
              <li><Link href="/#news-updates" class="hover:text-[#E1B137] transition-colors inline-block">News</Link></li>
              <li><Link href="/contact" class="hover:text-[#E1B137] transition-colors inline-block">Contact</Link></li>
            </ul>
          </div>

          <!-- Contact -->
          <div>
            <h4 class="text-[#E1B137] text-[10px] font-bold uppercase tracking-[0.3em] mb-4">Contact</h4>
            <ul class="space-y-2.5 text-sm text-white/50">
              <li class="flex items-start gap-2">
                <i class="fa-solid fa-location-dot text-[#E1B137] mt-0.5 shrink-0"></i>
                <span class="text-xs lg:text-sm">
                  07, Kayode I. Micah Street, Off Abraham Adesanya-Ogombo Rd. Lekki Schem 2, Eti-Osa, Nigeria.
                </span>
              </li>
              <li class="flex items-center gap-2">
                <i class="fa-solid fa-phone text-[#E1B137] shrink-0"></i>
                <span>+234 906 925 8377</span>
              </li>
              <li class="flex items-center gap-2">
                <i class="fa-solid fa-envelope text-[#E1B137] shrink-0"></i>
                <span>info@lekkiashram.com</span>
              </li>
            </ul>
          </div>

        </div>
      </div>

      <!-- Subscribe -->
      <div class="border-t border-white/10">
        <div class="max-w-6xl mx-auto px-4 lg:px-12 py-8 lg:py-10">
          <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 lg:gap-6">
            <div>
              <p class="text-white font-medium text-sm mb-0.5">Subscribe to Contemplations</p>
              <p class="text-white/40 text-xs">Weekly insights on consciousness, ecology and the path within.</p>
            </div>
            <form class="flex flex-col sm:flex-row gap-2 lg:gap-3 w-full lg:w-auto" @submit.prevent="handleSubscribe">
              <div class="flex-1 flex flex-col sm:flex-row gap-2 lg:gap-3 w-full lg:w-auto">
                <input
                  v-model="email"
                  type="email"
                  placeholder="Your email address"
                  class="flex-1 lg:w-64 px-4 py-2.5 lg:py-3 bg-white/5 border border-white/15 text-white text-sm placeholder:text-white/30 focus:outline-none focus:border-[#E1B137] transition-colors rounded-none"
                  required
                  :disabled="isSubmitting"
                />
                <button
                  type="submit"
                  class="px-5 lg:px-6 py-2.5 lg:py-3 bg-[#E1B137] text-white text-[10px] lg:text-[11px] font-bold uppercase tracking-[0.2em] hover:bg-[#d4a52e] transition-all shrink-0 active:scale-95 rounded-none whitespace-nowrap disabled:opacity-50"
                  :disabled="isSubmitting"
                >
                  {{ isSubmitting ? 'Subscribing...' : 'Subscribe' }}
                </button>
              </div>
            </form>
          </div>
          <!-- Toast will handle feedback -->
        </div>
      </div>
    </div>

    <!-- Bottom bar -->
    <div class="bg-slate-950 text-white py-4 lg:py-5">
      <div class="max-w-6xl mx-auto px-4 lg:px-12">
        <div class="flex flex-col sm:flex-row items-center justify-between gap-2 lg:gap-3">
          <p class="text-white/30 text-[10px] lg:text-xs">
            &copy; {{ currentYear }} The Lekki Ashram. All rights reserved.
          </p>
          <div class="flex gap-4 lg:gap-5 text-white/30 text-[10px] lg:text-xs">
            <Link href="/privacy-policy" class="hover:text-[#E1B137] transition-colors">Privacy Policy</Link>
            <Link href="/terms-of-use" class="hover:text-[#E1B137] transition-colors">Terms of Use</Link>
          </div>
        </div>
      </div>
    </div>

  </footer>
</template>

<script setup>
import { ref, computed } from 'vue'
import { Link, router } from '@inertiajs/vue3'
import { useToast } from '@/Composables/useToast'

const { showToast } = useToast()

const email = ref('')
const currentYear = computed(() => new Date().getFullYear())
const isSubmitting = ref(false)

const handleSubscribe = () => {
  if (!email.value) return

  isSubmitting.value = true

  router.post('/subscribe', {
    email: email.value
  }, {
    onSuccess: () => {
      isSubmitting.value = false
      showToast('You\'ve been subscribed successfully!', 'success')
      email.value = ''
    },
    onError: (errors) => {
      isSubmitting.value = false
      if (errors.email) {
        showToast(errors.email, 'error')
      } else {
        showToast('❌ Something went wrong. Please try again.', 'error')
      }
    }
  })
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700;800&display=swap');

.font-montserrat { font-family: 'Montserrat', sans-serif; }

.footer-social {
  width: 36px;
  height: 36px;
  display: flex;
  align-items: center;
  justify-content: center;
  border: 1px solid rgba(255, 255, 255, 0.12);
  color: rgba(255, 255, 255, 0.4);
  transition: all 0.3s ease;
  border-radius: 50%;
}

.footer-social:hover {
  background: #E1B137;
  border-color: #E1B137;
  color: white;
  transform: translateY(-2px);
}

@media (max-width: 640px) {
  .footer-social {
    width: 40px;
    height: 40px;
  }
  .footer-social i {
    font-size: 14px;
  }
}
</style>