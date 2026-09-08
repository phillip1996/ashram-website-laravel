import { ref } from 'vue'
import { router } from '@inertiajs/vue3'

const modalState = ref({
  isOpen: false,
  id: null,
  url: '',
  title: '',
  message: '',
})

export function useDeleteModal() {
  const openModal = (id, url, title, message) => {
    modalState.value = {
      isOpen: true,
      id: id,
      url: url,
      title: title,
      message: message,
    }
  }

  const closeModal = () => {
    modalState.value.isOpen = false
  }

  const confirmDelete = () => {
    if (!modalState.value.url) {
      console.error('No delete URL provided')
      return
    }

    router.delete(modalState.value.url, {
      onSuccess: () => {
        closeModal()
        // Refresh the page to update the list
        window.location.reload()
      },
      onError: (errors) => {
        console.error('Delete failed:', errors)
        alert('Failed to delete news item. Please try again.')
      },
    })
  }

  return {
    modalState,
    openModal,
    closeModal,
    confirmDelete,
  }
}