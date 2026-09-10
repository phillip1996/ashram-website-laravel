<template>
  <AdminLayout>
    <DeleteModal />

    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mb-6 md:mb-8">
      <div>
        <h1 class="text-2xl font-serif font-medium text-[#2b4b58]">Podcasts</h1>
        <p class="text-slate-400 text-sm mt-0.5">Manage episodes of The Ashram Dialogues.</p>
      </div>
      <Link
        href="/admin/podcasts/create"
        class="inline-flex items-center justify-center gap-2 bg-[#E1B137] text-white px-5 py-2.5 rounded-md text-sm font-semibold hover:bg-[#2b4b58] transition-colors duration-200 shrink-0 w-full sm:w-auto"
      >
        <i class="fa-solid fa-plus text-xs"></i>
        Add New
      </Link>
    </div>

    <!-- Empty state -->
    <div
      v-if="podcasts.length === 0"
      class="bg-white border border-dashed border-slate-200 rounded-lg py-12 md:py-16 px-6 text-center"
    >
      <div class="w-16 h-16 rounded-full bg-[#E1B137]/10 flex items-center justify-center mx-auto mb-5">
        <i class="fa-solid fa-podcast text-2xl text-[#E1B137]"></i>
      </div>
      <h2 class="font-serif text-lg font-medium text-[#2b4b58] mb-2">No podcasts yet</h2>
      <p class="text-slate-400 text-sm max-w-sm mx-auto mb-6 leading-relaxed">
        Episodes of The Ashram Dialogues will appear here once you publish your first one.
      </p>
      <Link
        href="/admin/podcasts/create"
        class="inline-flex items-center gap-2 bg-[#2b4b58] text-white px-6 py-3 rounded-md text-sm font-semibold hover:bg-[#E1B137] transition-colors duration-200"
      >
        <i class="fa-solid fa-plus text-xs"></i>
        Create Your First Podcast
      </Link>
    </div>

    <!-- ═══════════════════════════════════════════════════════
         DESKTOP TABLE (hidden on mobile)
    ═══════════════════════════════════════════════════════ -->
    <div v-else class="hidden md:block bg-white border border-slate-100 shadow-sm overflow-hidden rounded-lg">
      <table class="min-w-full divide-y divide-slate-100">
        <thead class="bg-[#f8f7f4]">
          <tr>
            <th class="px-6 py-3.5 text-left text-[11px] font-bold text-slate-500 uppercase tracking-widest">Episode</th>
            <th class="px-6 py-3.5 text-left text-[11px] font-bold text-slate-500 uppercase tracking-widest">Title</th>
            <th class="px-6 py-3.5 text-left text-[11px] font-bold text-slate-500 uppercase tracking-widest">Category</th>
            <th class="px-6 py-3.5 text-left text-[11px] font-bold text-slate-500 uppercase tracking-widest">Status</th>
            <th class="px-6 py-3.5 text-right text-[11px] font-bold text-slate-500 uppercase tracking-widest">Actions</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-slate-100">
          <tr
            v-for="podcast in podcasts"
            :key="podcast.id"
            class="hover:bg-[#f8f7f4]/60 transition-colors duration-150"
          >
            <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-[#2b4b58]">
              #{{ podcast.episode }}
            </td>
            <td class="px-6 py-4 text-sm text-slate-700 max-w-xs truncate">{{ podcast.title }}</td>
            <td class="px-6 py-4 whitespace-nowrap">
              <span class="px-2.5 py-1 bg-[#2b4b58]/10 text-[#2b4b58] rounded-full text-xs font-semibold">
                {{ podcast.category }}
              </span>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
              <span
                v-if="podcast.is_active"
                class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-green-50 text-green-700 rounded-full text-xs font-semibold"
              >
                <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                Active
              </span>
              <span
                v-else
                class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-red-50 text-red-600 rounded-full text-xs font-semibold"
              >
                <span class="w-1.5 h-1.5 rounded-full bg-red-400"></span>
                Inactive
              </span>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-right text-sm">
              <div class="flex items-center justify-end gap-4">
                <Link
                  :href="`/admin/podcasts/${podcast.id}/edit`"
                  class="text-slate-500 hover:text-[#2b4b58] font-medium transition-colors inline-flex items-center gap-1.5"
                >
                  <i class="fa-solid fa-pen text-xs"></i>
                  Edit
                </Link>
                <button
                  @click="openDeleteModal(podcast.id, podcast.title)"
                  class="text-red-500 hover:text-red-700 font-medium transition-colors inline-flex items-center gap-1.5"
                >
                  <i class="fa-solid fa-trash text-xs"></i>
                  Delete
                </button>
              </div>
            </td>
          </tr>
        </tbody>
      </table>

      <!-- Footer count -->
      <div class="px-6 py-3 bg-slate-50 border-t border-slate-100 flex items-center justify-between">
        <span class="text-xs text-slate-400">
          Showing {{ podcasts.length }} episode{{ podcasts.length !== 1 ? 's' : '' }}
        </span>
        <span class="text-xs text-slate-400">
          Last updated: {{ formatDate(new Date().toISOString()) }}
        </span>
      </div>
    </div>

    <!-- ═══════════════════════════════════════════════════════
         MOBILE CARD VIEW (visible on mobile only)
    ═══════════════════════════════════════════════════════ -->
    <div v-if="podcasts.length > 0" class="md:hidden space-y-4">

      <div
        v-for="podcast in podcasts"
        :key="podcast.id"
        class="bg-white border border-slate-100 shadow-sm rounded-lg overflow-hidden"
      >
        <!-- Card header: Episode + Status -->
        <div class="flex items-center justify-between px-5 pt-5 pb-3 border-b border-slate-100">
          <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-[#E1B137]/10 rounded-full flex items-center justify-center shrink-0">
              <i class="fa-solid fa-podcast text-[#E1B137] text-sm"></i>
            </div>
            <div>
              <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Episode</p>
              <p class="text-sm font-bold text-[#2b4b58]">#{{ podcast.episode }}</p>
            </div>
          </div>
          <span
            v-if="podcast.is_active"
            class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-green-50 text-green-700 rounded-full text-[10px] font-bold"
          >
            <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
            Active
          </span>
          <span
            v-else
            class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-red-50 text-red-600 rounded-full text-[10px] font-bold"
          >
            <span class="w-1.5 h-1.5 rounded-full bg-red-400"></span>
            Inactive
          </span>
        </div>

        <!-- Card body -->
        <div class="px-5 py-4 space-y-3">
          <!-- Title -->
          <div>
            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Title</p>
            <h3 class="font-serif text-base font-medium text-[#2b4b58] leading-snug">
              {{ podcast.title }}
            </h3>
          </div>

          <!-- Category -->
          <div>
            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Category</p>
            <span class="inline-block px-2.5 py-1 bg-[#2b4b58]/10 text-[#2b4b58] rounded-full text-xs font-semibold">
              {{ podcast.category }}
            </span>
          </div>
        </div>

        <!-- Card actions -->
        <div class="flex items-center gap-3 px-5 py-3 bg-slate-50 border-t border-slate-100">
          <Link
            :href="`/admin/podcasts/${podcast.id}/edit`"
            class="flex-1 inline-flex items-center justify-center gap-2 py-2.5 bg-[#2b4b58] text-white text-xs font-bold uppercase tracking-widest rounded-md hover:bg-[#E1B137] transition-colors"
          >
            <i class="fa-solid fa-pen text-xs"></i>
            Edit
          </Link>
          <button
            @click="openDeleteModal(podcast.id, podcast.title)"
            class="flex-1 inline-flex items-center justify-center gap-2 py-2.5 border border-red-200 text-red-500 text-xs font-bold uppercase tracking-widest rounded-md hover:bg-red-500 hover:text-white hover:border-red-500 transition-colors"
          >
            <i class="fa-solid fa-trash text-xs"></i>
            Delete
          </button>
        </div>
      </div>

      <!-- Mobile count -->
      <div class="text-center pt-2">
        <span class="text-xs text-slate-400">
          Showing {{ podcasts.length }} episode{{ podcasts.length !== 1 ? 's' : '' }}
        </span>
      </div>
    </div>
  </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { Link } from '@inertiajs/vue3'
import DeleteModal from '@/Components/DeleteModal.vue'
import { useDeleteModal } from '@/Composables/useDeleteModal'

const props = defineProps({ podcasts: Array })
const { openModal } = useDeleteModal()

const openDeleteModal = (id, title) => {
  openModal(
    id,
    `/admin/podcasts/${id}`,
    `Delete Podcast`,
    `Are you sure you want to delete "${title}"? This action cannot be undone.`
  )
}

const formatDate = (date) => {
  if (!date) return '—'
  const d = new Date(date)
  return d.toLocaleDateString('en-US', {
    year: 'numeric',
    month: 'short',
    day: 'numeric',
  })
}
</script>