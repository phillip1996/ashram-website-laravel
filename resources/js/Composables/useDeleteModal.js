import { ref } from 'vue'
import { router } from '@inertiajs/vue3'

const modalState = ref({
  isOpen: false,
  id: null,
  title: '',
  message: '',
  route: '',
})

export const useDeleteModal = () => {
  const openModal = (id, route, title = 'Delete Item', message = 'Are you sure you want to delete this item? This action cannot be undone.') => {
    modalState.value.isOpen = true
    modalState.value.id = id
    modalState.value.title = title
    modalState.value.message = message
    modalState.value.route = route
  }

  const closeModal = () => {
    modalState.value.isOpen = false
    modalState.value.id = null
    modalState.value.route = ''
  }

  const confirmDelete = () => {
    if (modalState.value.id && modalState.value.route) {
      router.delete(modalState.value.route)
      closeModal()
    }
  }

  return {
    modalState,
    openModal,
    closeModal,
    confirmDelete,
  }
}