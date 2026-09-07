<template>
  <AdminLayout>
    <DeleteModal />

    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mb-8">
      <div>
        <h1 class="text-2xl font-serif font-medium text-[#2b4b58]">Ayurvedic Recipes</h1>
        <p class="text-slate-400 text-sm mt-0.5">Manage recipes for the Ayurvedic section.</p>
      </div>
      <Link
        href="/admin/ayurvedic-recipes/create"
        class="inline-flex items-center justify-center gap-2 bg-[#E1B137] text-white px-5 py-2.5 rounded-md text-sm font-semibold hover:bg-[#2b4b58] transition-colors duration-200 shrink-0 w-full sm:w-auto"
      >
        <i class="fa-solid fa-plus text-xs"></i>
        Add New
      </Link>
    </div>

    <div v-if="recipes.length === 0" class="bg-white border border-dashed border-slate-200 rounded-lg py-12 md:py-16 px-6 text-center">
      <div class="w-16 h-16 rounded-full bg-[#E1B137]/10 flex items-center justify-center mx-auto mb-5">
        <i class="fa-solid fa-mortar-pestle text-2xl text-[#E1B137]"></i>
      </div>
      <h2 class="font-serif text-lg font-medium text-[#2b4b58] mb-2">No recipes yet</h2>
      <p class="text-slate-400 text-sm max-w-sm mx-auto mb-6 leading-relaxed">
        Add your first Ayurvedic recipe – it will appear on the public recipes page.
      </p>
      <Link
        href="/admin/ayurvedic-recipes/create"
        class="inline-flex items-center gap-2 bg-[#2b4b58] text-white px-6 py-3 rounded-md text-sm font-semibold hover:bg-[#E1B137] transition-colors duration-200"
      >
        <i class="fa-solid fa-plus text-xs"></i>
        Create Your First Recipe
      </Link>
    </div>

    <div v-else class="bg-white border border-slate-100 shadow-sm overflow-hidden rounded-lg">
      <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-slate-100">
          <thead class="bg-[#f8f7f4]">
            <tr>
              <th class="px-4 md:px-6 py-3 text-left text-[11px] font-bold text-slate-500 uppercase tracking-widest">Title</th>
              <th class="px-4 md:px-6 py-3 text-left text-[11px] font-bold text-slate-500 uppercase tracking-widest">Category</th>
              <th class="px-4 md:px-6 py-3 text-left text-[11px] font-bold text-slate-500 uppercase tracking-widest">Status</th>
              <th class="px-4 md:px-6 py-3 text-right text-[11px] font-bold text-slate-500 uppercase tracking-widest">Actions</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-100">
            <tr
              v-for="recipe in recipes"
              :key="recipe.id"
              class="hover:bg-[#f8f7f4]/60 transition-colors duration-150"
            >
              <td class="px-4 md:px-6 py-3 md:py-4 text-sm font-semibold text-[#2b4b58] max-w-[160px] md:max-w-xs truncate">
                {{ recipe.title }}
              </td>
              <td class="px-4 md:px-6 py-3 md:py-4 whitespace-nowrap">
                <span class="px-2.5 py-1 bg-[#2b4b58]/10 text-[#2b4b58] rounded-full text-xs font-semibold">
                  {{ recipe.category || 'Uncategorized' }}
                </span>
              </td>
              <td class="px-4 md:px-6 py-3 md:py-4 whitespace-nowrap">
                <span
                  v-if="recipe.is_active"
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
              <td class="px-4 md:px-6 py-3 md:py-4 whitespace-nowrap text-right text-sm">
                <div class="flex items-center justify-end gap-3 md:gap-4">
                  <!-- ✅ Edit link uses slug -->
                  <Link
                    :href="`/admin/ayurvedic-recipes/${recipe.slug}/edit`"
                    class="text-slate-500 hover:text-[#2b4b58] font-medium transition-colors inline-flex items-center gap-1.5"
                  >
                    <i class="fa-solid fa-pen text-xs"></i>
                    <span class="hidden sm:inline">Edit</span>
                  </Link>
                  <!-- Delete uses slug too -->
                  <button
                    @click="openDeleteModal(recipe.id, recipe.slug, recipe.title)"
                    class="text-red-500 hover:text-red-700 font-medium transition-colors inline-flex items-center gap-1.5"
                  >
                    <i class="fa-solid fa-trash text-xs"></i>
                    <span class="hidden sm:inline">Delete</span>
                  </button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="px-4 md:px-6 py-3 bg-slate-50 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-between gap-2">
        <span class="text-xs text-slate-400">
          Showing {{ recipes.length }} recipe{{ recipes.length !== 1 ? 's' : '' }}
        </span>
        <span class="text-xs text-slate-400">
          Last updated: {{ formatDate(new Date().toISOString()) }}
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

const props = defineProps({ recipes: Array })
const { openModal } = useDeleteModal()

const formatDate = (date) => {
  if (!date) return '—'
  const d = new Date(date)
  return d.toLocaleDateString('en-US', {
    year: 'numeric',
    month: 'short',
    day: 'numeric',
  })
}

const openDeleteModal = (id, slug, title) => {
  openModal(
    id,
    `/admin/ayurvedic-recipes/${slug}`, // delete URL uses slug
    `Delete Recipe`,
    `Are you sure you want to delete "${title}"? This action cannot be undone.`
  )
}
</script>