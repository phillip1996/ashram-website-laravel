<template>
  <div class="flex h-screen bg-gray-50 font-montserrat">

    <!-- =========================================================
         TOAST CONTAINER (global)
    ========================================================= -->
    <ToastContainer />

    <!-- =========================================================
         MOBILE OVERLAY
    ========================================================= -->
    <div
      v-if="sidebarOpen"
      class="fixed inset-0 bg-black/40 z-30 lg:hidden"
      @click="sidebarOpen = false"
    ></div>

    <!-- =========================================================
         SIDEBAR
    ========================================================= -->
    <aside
      class="fixed inset-y-0 left-0 z-40 w-64 bg-[#2b4b58] flex-shrink-0 flex flex-col transform transition-transform duration-300 lg:static lg:translate-x-0 overflow-y-auto"
      :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
    >

      <!-- ─── BRAND ─── -->
      <div class="flex items-center justify-center px-4 py-5">
        <img
          src="/img/logo.png"
          alt="The Lekki Ashram"
          class="h-10 w-auto object-contain brightness-0 invert"
        />
      </div>

      <!-- ─── DIVIDER ─── -->
      <hr class="border-white/10 mx-4" />

      <!-- ─── NAVIGATION ─── -->
      <nav class="flex-1 p-4 space-y-4 overflow-y-auto">

        <!-- GROUP 1: MAIN -->
        <div>
          <div class="text-[10px] font-bold uppercase tracking-[0.3em] text-white/30 px-3 mb-2">
            Main
          </div>
          <div class="space-y-1">
            <Link
              href="/admin"
              class="flex items-center gap-3 px-4 py-2.5 rounded-md text-sm font-medium transition-all duration-200"
              :class="isActive('/admin', true)
                ? 'bg-[#E1B137] text-[#2b4b58] font-semibold'
                : 'text-white/70 hover:bg-white/10 hover:text-white'"
            >
              <i class="fa-solid fa-gauge w-4 text-center text-sm"></i>
              Dashboard
            </Link>
          </div>
          <hr class="border-white/10 mt-4" />
        </div>

        <!-- GROUP 2: CONTENT -->
        <div>
          <div class="text-[10px] font-bold uppercase tracking-[0.3em] text-white/30 px-3 mb-2">
            Content
          </div>
          <div class="space-y-1">
            <Link
              href="/admin/podcasts"
              class="flex items-center gap-3 px-4 py-2.5 rounded-md text-sm font-medium transition-all duration-200"
              :class="isActive('/admin/podcasts')
                ? 'bg-[#E1B137] text-[#2b4b58] font-semibold'
                : 'text-white/70 hover:bg-white/10 hover:text-white'"
            >
              <i class="fa-solid fa-podcast w-4 text-center text-sm"></i>
              Podcasts
            </Link>
            <Link
              href="/admin/articles"
              class="flex items-center gap-3 px-4 py-2.5 rounded-md text-sm font-medium transition-all duration-200"
              :class="isActive('/admin/articles')
                ? 'bg-[#E1B137] text-[#2b4b58] font-semibold'
                : 'text-white/70 hover:bg-white/10 hover:text-white'"
            >
              <i class="fa-solid fa-newspaper w-4 text-center text-sm"></i>
              Articles
            </Link>
            <Link
              href="/admin/partners"
              class="flex items-center gap-3 px-4 py-2.5 rounded-md text-sm font-medium transition-all duration-200"
              :class="isActive('/admin/partners')
                ? 'bg-[#E1B137] text-[#2b4b58] font-semibold'
                : 'text-white/70 hover:bg-white/10 hover:text-white'"
            >
              <i class="fa-solid fa-handshake w-4 text-center text-sm"></i>
              Partners
            </Link>
            <Link
              href="/admin/news"
              class="flex items-center gap-3 px-4 py-2.5 rounded-md text-sm font-medium transition-all duration-200"
              :class="isActive('/admin/news')
                ? 'bg-[#E1B137] text-[#2b4b58] font-semibold'
                : 'text-white/70 hover:bg-white/10 hover:text-white'"
            >
              <i class="fa-solid fa-bullhorn w-4 text-center text-sm"></i>
              News
            </Link>
            <!-- ── Ayurvedic Recipes ── -->
            <Link
              href="/admin/ayurvedic-recipes"
              class="flex items-center gap-3 px-4 py-2.5 rounded-md text-sm font-medium transition-all duration-200"
              :class="isActive('/admin/ayurvedic-recipes')
                ? 'bg-[#E1B137] text-[#2b4b58] font-semibold'
                : 'text-white/70 hover:bg-white/10 hover:text-white'"
            >
              <i class="fa-solid fa-mortar-pestle w-4 text-center text-sm"></i>
              Ayurvedic Recipes
            </Link>
          </div>
          <hr class="border-white/10 mt-4" />
        </div>

        <!-- GROUP 3: MARKETING -->
        <div>
          <div class="text-[10px] font-bold uppercase tracking-[0.3em] text-white/30 px-3 mb-2">
            Marketing
          </div>
          <div class="space-y-1">
            <!-- ── Subscribers ── -->
            <Link
              href="/admin/subscribers"
              class="flex items-center gap-3 px-4 py-2.5 rounded-md text-sm font-medium transition-all duration-200"
              :class="isActive('/admin/subscribers')
                ? 'bg-[#E1B137] text-[#2b4b58] font-semibold'
                : 'text-white/70 hover:bg-white/10 hover:text-white'"
            >
              <i class="fa-solid fa-envelope w-4 text-center text-sm"></i>
              Subscribers
              <span
                v-if="subscriberCount > 0"
                class="ml-auto text-[10px] bg-[#E1B137] text-white px-2 py-0.5 rounded-full"
              >
                {{ subscriberCount }}
              </span>
              <span
                v-else
                class="ml-auto text-[10px] bg-white/10 text-white/40 px-2 py-0.5 rounded-full"
              >
                0
              </span>
            </Link>

            <!-- ── Contact Messages ── -->
            <Link
              href="/admin/contact"
              class="flex items-center gap-3 px-4 py-2.5 rounded-md text-sm font-medium transition-all duration-200"
              :class="isActive('/admin/contact')
                ? 'bg-[#E1B137] text-[#2b4b58] font-semibold'
                : 'text-white/70 hover:bg-white/10 hover:text-white'"
            >
              <i class="fa-solid fa-inbox w-4 text-center text-sm"></i>
              Contact Messages
              <span
                v-if="unreadContactCount > 0"
                class="ml-auto text-[10px] bg-red-500 text-white px-2 py-0.5 rounded-full"
              >
                {{ unreadContactCount }}
              </span>
              <span
                v-else
                class="ml-auto text-[10px] bg-white/10 text-white/40 px-2 py-0.5 rounded-full"
              >
                0
              </span>
            </Link>

            <!-- ── Visit Requests ── -->
            <Link
              href="/admin/visit-requests"
              class="flex items-center gap-3 px-4 py-2.5 rounded-md text-sm font-medium transition-all duration-200"
              :class="isActive('/admin/visit-requests')
                ? 'bg-[#E1B137] text-[#2b4b58] font-semibold'
                : 'text-white/70 hover:bg-white/10 hover:text-white'"
            >
              <i class="fa-solid fa-calendar-check w-4 text-center text-sm"></i>
              Visit Requests
              <span
                v-if="pendingVisitCount > 0"
                class="ml-auto text-[10px] bg-red-500 text-white px-2 py-0.5 rounded-full"
              >
                {{ pendingVisitCount }}
              </span>
              <span
                v-else
                class="ml-auto text-[10px] bg-white/10 text-white/40 px-2 py-0.5 rounded-full"
              >
                0
              </span>
            </Link>
          </div>
        </div>

      </nav>

      <!-- ─── DIVIDER ─── -->
      <hr class="border-white/10 mx-4" />

      <!-- ─── FOOTER ACTIONS ─── -->
      <div class="p-4 space-y-1 border-t border-white/10">

        <Link
          href="/"
          class="flex items-center gap-3 px-4 py-2.5 rounded-md text-sm text-white/50 hover:text-white hover:bg-white/10 transition"
        >
          <i class="fa-solid fa-arrow-left w-4 text-center text-sm"></i>
          Back to Site
        </Link>

        <Link
          href="/logout"
          method="post"
          as="button"
          class="flex items-center gap-3 w-full text-left px-4 py-2.5 rounded-md text-sm text-red-300 hover:bg-red-500/10 hover:text-red-200 transition mt-1"
        >
          <i class="fa-solid fa-arrow-right-from-bracket w-4 text-center text-sm"></i>
          Logout
        </Link>

      </div>

    </aside>

    <!-- =========================================================
         MAIN CONTENT
    ========================================================= -->
    <div class="flex-1 flex flex-col min-w-0">

      <!-- Mobile topbar -->
      <div class="lg:hidden flex items-center justify-between bg-white border-b border-slate-200 px-4 py-3">
        <button @click="sidebarOpen = true" class="text-[#2b4b58] text-lg">
          <i class="fa-solid fa-bars"></i>
        </button>
        <div class="w-5"></div>
      </div>

      <!-- Page Content -->
      <main class="flex-1 p-6 overflow-y-auto">
        <div class="max-w-7xl mx-auto">
          <slot />
        </div>
      </main>
    </div>

  </div>
</template>

<script setup>
import { Link, usePage } from '@inertiajs/vue3'
import { ref, computed, watch } from 'vue'
import ToastContainer from '@/Components/ToastContainer.vue'
import { useToast } from '@/Composables/useToast'

const page = usePage()
const sidebarOpen = ref(false)
const { showToast } = useToast()

// ── Get counts from global props ──
const subscriberCount = computed(() => page.props.subscriberCount || 0)
const unreadContactCount = computed(() => page.props.unreadContactCount || 0)
const pendingVisitCount = computed(() => page.props.pendingVisitCount || 0)

// ── Active state detection ──
const isActive = (href, exact = false) => {
  const url = page.url
  return exact ? url === href : url.startsWith(href)
}

// ── Auto-toast on any flash message coming from the backend ──
watch(
  () => page.props.flash,
  (flash) => {
    if (!flash) return
    if (flash.success) showToast(flash.success, 'success')
    if (flash.error) showToast(flash.error, 'error')
    if (flash.warning) showToast(flash.warning, 'warning')
    if (flash.info) showToast(flash.info, 'info')
  },
  { immediate: true, deep: true }
)
</script>

<style scoped>
.font-montserrat {
  font-family: 'Montserrat', sans-serif;
}
</style>