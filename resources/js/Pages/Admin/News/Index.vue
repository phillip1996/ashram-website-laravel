<template>
  <AdminLayout>
    <DeleteModal />

    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mb-8">
      <div>
        <h1 class="text-2xl font-serif font-medium text-[#2b4b58]">News</h1>
        <p class="text-slate-400 text-sm mt-0.5">Manage news articles &amp; updates.</p>
      </div>
      <Link
        href="/admin/news/create"
        class="inline-flex items-center gap-2 bg-[#E1B137] text-white px-5 py-2.5 rounded-md text-sm font-semibold hover:bg-[#2b4b58] transition-colors duration-200 shrink-0"
      >
        <i class="fa-solid fa-plus text-xs"></i>
        Add New
      </Link>
    </div>

    <div
      v-if="newsItems.length === 0"
      class="bg-white border border-dashed border-slate-200 rounded-lg py-16 px-6 text-center"
    >
      <div class="w-16 h-16 rounded-full bg-[#E1B137]/10 flex items-center justify-center mx-auto mb-5">
        <i class="fa-solid fa-newspaper text-2xl text-[#E1B137]"></i>
      </div>
      <h2 class="font-serif text-lg font-medium text-[#2b4b58] mb-2">No news items yet</h2>
      <p class="text-slate-400 text-sm max-w-sm mx-auto mb-6 leading-relaxed">
        Add your first news article – it will appear in the News section of the site.
      </p>
      <Link
        href="/admin/news/create"
        class="inline-flex items-center gap-2 bg-[#2b4b58] text-white px-6 py-3 rounded-md text-sm font-semibold hover:bg-[#E1B137] transition-colors duration-200"
      >
        <i class="fa-solid fa-plus text-xs"></i>
        Create Your First News Item
      </Link>
    </div>

    <div v-else class="bg-white border border-slate-100 shadow-sm overflow-hidden rounded-lg">
      <table class="min-w-full divide-y divide-slate-100">
        <thead class="bg-[#f8f7f4]">
          <tr>
            <th class="px-6 py-3.5 text-left text-[11px] font-bold text-slate-500 uppercase tracking-widest">Title</th>
            <th class="px-6 py-3.5 text-left text-[11px] font-bold text-slate-500 uppercase tracking-widest">Category</th>
            <th class="px-6 py-3.5 text-left text-[11px] font-bold text-slate-500 uppercase tracking-widest">Date</th>
            <th class="px-6 py-3.5 text-left text-[11px] font-bold text-slate-500 uppercase tracking-widest">Status</th>
            <th class="px-6 py-3.5 text-right text-[11px] font-bold text-slate-500 uppercase tracking-widest">Actions</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-slate-100">
          <tr
            v-for="item in newsItems"
            :key="item.id"
            class="hover:bg-[#f8f7f4]/60 transition-colors duration-150"
          >
            <td class="px-6 py-4 text-sm font-semibold text-[#2b4b58]">{{ item.title }}</td>
            <td class="px-6 py-4 whitespace-nowrap">
              <span class="px-2.5 py-1 bg-[#2b4b58]/10 text-[#2b4b58] rounded-full text-xs font-semibold">
                {{ item.category }}
              </span>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500">{{ item.date }}</td>
            <td class="px-6 py-4 whitespace-nowrap">
              <span
                v-if="item.is_active"
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
                  :href="`/admin/news/${item.id}/edit`"
                  class="text-slate-500 hover:text-[#2b4b58] font-medium transition-colors inline-flex items-center gap-1.5"
                >
                  <i class="fa-solid fa-pen text-xs"></i>
                  Edit
                </Link>
                <button
                  @click="openDeleteModal(item.id, item.title)"
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
    </div>
  </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { Link } from '@inertiajs/vue3'
import DeleteModal from '@/Components/DeleteModal.vue'
import { useDeleteModal } from '@/Composables/useDeleteModal'

const props = defineProps({ newsItems: Array })
const { openModal } = useDeleteModal()

const openDeleteModal = (id, title) => {
  openModal(
    id,
    `/admin/news/${id}`,
    `Delete News Item`,
    `Are you sure you want to delete "${title}"? This action cannot be undone.`
  )
}
</script>