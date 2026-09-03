<template>
  <AdminLayout>
    <div class="font-montserrat">

      <!-- ══════════════════════════════════════════════
           HEADER BAR — brand logo + page context
      ══════════════════════════════════════════════ -->
      <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 mb-8 border-b border-slate-200">
        <div class="flex items-center gap-4">
          <div>
            <h1 class="text-2xl font-serif font-medium text-[#2b4b58]">Dashboard</h1>
            <p class="text-slate-500 text-sm mt-0.5">Welcome back — here's what's happening today.</p>
          </div>
        </div>

        <div class="flex items-center gap-3">
          <span class="text-slate-400 text-xs uppercase tracking-widest font-semibold hidden sm:inline">
            {{ todayLabel }}
          </span>
          <div class="w-10 h-10 rounded-full bg-[#2b4b58] flex items-center justify-center text-white text-sm font-bold">
            {{ adminInitial }}
          </div>
        </div>
      </div>

      <!-- ══════════════════════════════════════════════
           STAT CARDS
      ══════════════════════════════════════════════ -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div
          v-for="card in statCards"
          :key="card.label"
          class="group relative bg-white p-6 rounded-lg border border-slate-100 shadow-sm hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300 overflow-hidden"
        >
          <div class="absolute top-0 left-0 h-full w-1" :style="{ backgroundColor: card.color }"></div>
          <div class="flex items-start justify-between">
            <div>
              <div class="text-xs font-semibold uppercase tracking-widest text-slate-400">{{ card.label }}</div>
              <div class="text-3xl font-bold text-[#2b4b58] mt-2">{{ card.value }}</div>
            </div>
            <div
              class="w-11 h-11 rounded-full flex items-center justify-center shrink-0"
              :style="{ backgroundColor: card.color + '1A' }"
            >
              <i :class="card.icon" class="text-lg" :style="{ color: card.color }"></i>
            </div>
          </div>
          <Link :href="card.href" class="mt-4 inline-flex items-center gap-1.5 text-xs font-semibold uppercase tracking-wider text-slate-400 group-hover:text-[#E1B137] transition-colors">
            Manage
            <i class="fa-solid fa-arrow-right text-[10px] group-hover:translate-x-1 transition-transform"></i>
          </Link>
        </div>
      </div>

      <!-- ══════════════════════════════════════════════
           QUICK ACTIONS + AT-A-GLANCE
      ══════════════════════════════════════════════ -->
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-8">

        <!-- Quick Actions -->
        <div class="lg:col-span-2 bg-white rounded-lg border border-slate-100 shadow-sm p-6">
          <h2 class="font-serif text-lg font-medium text-[#2b4b58] mb-5">Quick Actions</h2>
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <Link
              v-for="action in quickActions"
              :key="action.label"
              :href="action.href"
              class="flex items-center gap-3 p-4 rounded-md border border-slate-100 hover:border-[#E1B137]/50 hover:bg-[#f8f7f4] transition-all duration-200"
            >
              <div class="w-9 h-9 rounded-full bg-[#2b4b58]/10 flex items-center justify-center shrink-0">
                <i :class="action.icon" class="text-[#2b4b58] text-sm"></i>
              </div>
              <span class="text-sm font-semibold text-[#2b4b58]">{{ action.label }}</span>
            </Link>
          </div>
        </div>

        <!-- Content Overview -->
        <div class="bg-white rounded-lg border border-slate-100 shadow-sm p-6">
          <h2 class="font-serif text-lg font-medium text-[#2b4b58] mb-5">Content Overview</h2>
          <ul class="space-y-4">
            <li v-for="card in statCards" :key="'overview-' + card.label" class="flex items-center justify-between">
              <span class="text-sm text-slate-500 flex items-center gap-2">
                <span class="w-2 h-2 rounded-full" :style="{ backgroundColor: card.color }"></span>
                {{ card.label }}
              </span>
              <span class="text-sm font-bold text-[#2b4b58]">{{ card.value }}</span>
            </li>
          </ul>
        </div>
      </div>

    </div>
  </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { Link } from '@inertiajs/vue3'
import { computed } from 'vue'

const props = defineProps({
  stats: Object,
  adminName: {
    type: String,
    default: 'Admin',
  },
})

const statCards = computed(() => [
  { label: 'Podcasts', value: props.stats?.podcasts ?? 0, icon: 'fa-solid fa-podcast', color: '#E1B137', href: '/admin/podcasts' },
  { label: 'Articles', value: props.stats?.articles ?? 0, icon: 'fa-solid fa-newspaper', color: '#3b82f6', href: '/admin/articles' },
  { label: 'Partners', value: props.stats?.partners ?? 0, icon: 'fa-solid fa-handshake', color: '#22c55e', href: '/admin/partners' },
  { label: 'News', value: props.stats?.news ?? 0, icon: 'fa-solid fa-bullhorn', color: '#a855f7', href: '/admin/news' },
])

const quickActions = [
  { label: 'Add Podcast Episode', icon: 'fa-solid fa-plus', href: '/admin/podcasts/create' },
  { label: 'Write New Article', icon: 'fa-solid fa-pen', href: '/admin/articles/create' },
  { label: 'Add Partner', icon: 'fa-solid fa-building', href: '/admin/partners/create' },
  { label: 'Post News Update', icon: 'fa-solid fa-bullhorn', href: '/admin/news/create' },
]

const adminInitial = computed(() => (props.adminName || 'A').trim().charAt(0).toUpperCase())

const todayLabel = computed(() =>
  new Date().toLocaleDateString('en-GB', { weekday: 'long', day: 'numeric', month: 'long' })
)
</script>

<style scoped>
.font-montserrat {
  font-family: 'Montserrat', sans-serif;
}
</style>