<template>
  <!-- Overlay -->
  <div
    v-if="modalState.isOpen"
    class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm"
    @click.self="close"
  >
    <!-- Modal -->
    <div class="bg-white rounded-lg shadow-xl max-w-md w-full overflow-hidden">
      <!-- Header -->
      <div class="px-6 py-4 border-b border-slate-200 flex items-center gap-3">
        <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center">
          <i class="fa-solid fa-trash-can text-red-500"></i>
        </div>
        <h3 class="text-lg font-serif font-medium text-[#2b4b58]">{{ modalState.title }}</h3>
      </div>

      <!-- Body -->
      <div class="px-6 py-4">
        <p class="text-slate-600 text-sm leading-relaxed">{{ modalState.message }}</p>
      </div>

      <!-- Footer -->
      <div class="px-6 py-4 bg-slate-50 border-t border-slate-200 flex justify-end gap-3">
        <button
          @click="close"
          class="px-4 py-2 text-sm font-medium text-slate-600 hover:text-slate-800 hover:bg-slate-100 rounded transition"
        >
          Cancel
        </button>
        <button
          @click="confirm"
          class="px-4 py-2 text-sm font-medium text-white bg-red-600 hover:bg-red-700 rounded transition"
          :disabled="isDeleting"
        >
          <i v-if="isDeleting" class="fa-solid fa-spinner fa-spin mr-2"></i>
          {{ isDeleting ? 'Deleting...' : 'Delete' }}
        </button>
      </div>
    </div>
  </div>
</template>

<script setup>
import { useDeleteModal } from '@/Composables/useDeleteModal'
import { ref } from 'vue'

const { modalState, closeModal, confirmDelete } = useDeleteModal()
const isDeleting = ref(false)

const close = () => {
  if (!isDeleting.value) {
    closeModal()
  }
}

const confirm = async () => {
  if (isDeleting.value) return
  
  isDeleting.value = true
  await confirmDelete()
  isDeleting.value = false
}
</script>