<template>
  <AdminLayout>
    <DeleteModal />

    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mb-8">
      <div>
        <h1 class="text-2xl font-serif text-[#2b4b58] flex items-center gap-3">
          <i class="fa-solid fa-envelope text-[#E1B137] text-xl"></i>
          Contact Messages
          <span class="text-sm font-normal text-slate-400 bg-slate-100 px-3 py-1 rounded-full">
            {{ messages.length }}
          </span>
        </h1>
        <p class="text-slate-400 text-sm mt-1">Manage all inquiries from the contact form</p>
      </div>
      <button
        v-if="messages.length > 0"
        @click="exportCSV"
        class="flex items-center gap-2 px-4 py-2 border border-slate-200 text-slate-600 text-sm font-medium rounded hover:bg-slate-50 transition"
      >
        <i class="fa-solid fa-download"></i>
        Export CSV
      </button>
    </div>

    <!-- Stats -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
      <div class="bg-white p-5 rounded-xl shadow-sm border border-slate-100 hover:shadow-md transition">
        <div class="flex items-center justify-between">
          <div>
            <div class="text-sm text-slate-400 font-medium">Total Messages</div>
            <div class="text-2xl font-bold text-[#2b4b58] mt-1">{{ messages.length }}</div>
          </div>
          <div class="w-10 h-10 bg-[#E1B137]/10 rounded-full flex items-center justify-center">
            <i class="fa-solid fa-envelope text-[#E1B137]"></i>
          </div>
        </div>
      </div>
      <div class="bg-white p-5 rounded-xl shadow-sm border border-slate-100 hover:shadow-md transition">
        <div class="flex items-center justify-between">
          <div>
            <div class="text-sm text-slate-400 font-medium">Read</div>
            <div class="text-2xl font-bold text-emerald-600 mt-1">{{ readCount }}</div>
          </div>
          <div class="w-10 h-10 bg-emerald-50 rounded-full flex items-center justify-center">
            <i class="fa-solid fa-circle-check text-emerald-500"></i>
          </div>
        </div>
      </div>
      <div class="bg-white p-5 rounded-xl shadow-sm border border-slate-100 hover:shadow-md transition">
        <div class="flex items-center justify-between">
          <div>
            <div class="text-sm text-slate-400 font-medium">Unread</div>
            <div class="text-2xl font-bold text-amber-600 mt-1">{{ unreadCount }}</div>
          </div>
          <div class="w-10 h-10 bg-amber-50 rounded-full flex items-center justify-center">
            <i class="fa-solid fa-envelope-open text-amber-500"></i>
          </div>
        </div>
      </div>
      <div class="bg-white p-5 rounded-xl shadow-sm border border-slate-100 hover:shadow-md transition">
        <div class="flex items-center justify-between">
          <div>
            <div class="text-sm text-slate-400 font-medium">Today</div>
            <div class="text-2xl font-bold text-blue-600 mt-1">{{ todayCount }}</div>
          </div>
          <div class="w-10 h-10 bg-blue-50 rounded-full flex items-center justify-center">
            <i class="fa-solid fa-calendar-day text-blue-500"></i>
          </div>
        </div>
      </div>
    </div>

    <!-- Empty State -->
    <div v-if="messages.length === 0" class="bg-white rounded-xl shadow-sm border border-slate-100 p-12 text-center">
      <div class="max-w-sm mx-auto">
        <div class="w-20 h-20 bg-[#E1B137]/10 rounded-full flex items-center justify-center mx-auto mb-5">
          <i class="fa-solid fa-inbox text-3xl text-[#E1B137]"></i>
        </div>
        <h3 class="text-xl font-serif text-[#2b4b58] mb-2">No Messages Yet</h3>
        <p class="text-slate-400 text-sm leading-relaxed">
          Your inbox is empty. When someone submits the contact form, their message will appear here.
        </p>
      </div>
    </div>

    <!-- Table -->
    <div v-else class="bg-white rounded-xl shadow-sm border border-slate-100 overflow-hidden">
      <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-slate-200">
          <thead class="bg-slate-50">
            <tr>
              <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">ID</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Name</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Email</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Subject</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Status</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Date</th>
              <th class="px-6 py-3 text-right text-xs font-medium text-slate-500 uppercase tracking-wider">Actions</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-100">
            <tr
              v-for="message in messages"
              :key="message.id"
              class="hover:bg-slate-50 transition"
              :class="!message.is_read ? 'bg-[#f8f7f4]/60' : ''"
            >
              <td class="px-6 py-4 text-sm text-slate-400 font-mono">#{{ message.id }}</td>
              <td class="px-6 py-4 text-sm font-medium text-[#2b4b58]">
                {{ message.name }}
                <span v-if="!message.is_read" class="ml-2 inline-block w-2 h-2 bg-[#E1B137] rounded-full"></span>
              </td>
              <td class="px-6 py-4 text-sm text-slate-600">
                <a :href="`mailto:${message.email}`" class="hover:text-[#E1B137] transition">
                  {{ message.email }}
                </a>
              </td>
              <td class="px-6 py-4 text-sm text-slate-500">
                {{ message.subject || '—' }}
              </td>
              <td class="px-6 py-4">
                <button
                  @click="toggleRead(message)"
                  class="text-xs font-medium px-3 py-1 rounded-full transition"
                  :class="message.is_read
                    ? 'bg-emerald-100 text-emerald-700 hover:bg-emerald-200'
                    : 'bg-amber-100 text-amber-700 hover:bg-amber-200'"
                >
                  {{ message.is_read ? 'Read' : 'Unread' }}
                </button>
              </td>
              <td class="px-6 py-4 text-sm text-slate-500">
                {{ formatDate(message.created_at) }}
              </td>
              <td class="px-6 py-4 text-right">
                <div class="flex items-center justify-end gap-3">
                  <button
                    @click="viewMessage(message)"
                    class="text-slate-400 hover:text-[#2b4b58] transition text-sm"
                    title="View message"
                  >
                    <i class="fa-solid fa-eye"></i>
                  </button>
                  <button
                    @click="openDeleteModal(message.id, message.name)"
                    class="text-slate-400 hover:text-red-600 transition text-sm"
                    title="Delete message"
                  >
                    <i class="fa-solid fa-trash-can"></i>
                  </button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="px-6 py-3 bg-slate-50 border-t border-slate-100 flex items-center justify-between">
        <span class="text-xs text-slate-400">
          Showing {{ messages.length }} message{{ messages.length !== 1 ? 's' : '' }}
        </span>
        <span class="text-xs text-slate-400">
          Last updated: {{ formatDate(new Date().toISOString()) }}
        </span>
      </div>
    </div>

    <!-- ── View Message Modal ── -->
    <div v-if="selectedMessage" class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4" @click.self="selectedMessage = null">
      <div class="bg-white rounded-xl shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto p-6 relative">
        <button @click="selectedMessage = null" class="absolute top-4 right-4 text-slate-400 hover:text-slate-600 transition">
          <i class="fa-solid fa-xmark text-xl"></i>
        </button>
        <div class="space-y-4">
          <div class="flex items-start justify-between">
            <div>
              <h3 class="text-xl font-serif text-[#2b4b58]">{{ selectedMessage.name }}</h3>
              <p class="text-sm text-slate-500">
                <a :href="`mailto:${selectedMessage.email}`" class="hover:text-[#E1B137]">{{ selectedMessage.email }}</a>
                <span class="mx-2">·</span>
                {{ selectedMessage.phone || 'No phone' }}
              </p>
            </div>
            <span class="text-xs text-slate-400">{{ formatDate(selectedMessage.created_at) }}</span>
          </div>
          <div>
            <span class="text-xs font-semibold uppercase tracking-widest text-slate-400">Subject</span>
            <p class="text-slate-700 font-medium">{{ selectedMessage.subject || 'No subject' }}</p>
          </div>
          <div>
            <span class="text-xs font-semibold uppercase tracking-widest text-slate-400">Message</span>
            <div class="mt-1 p-4 bg-slate-50 rounded-lg text-sm text-slate-700 whitespace-pre-wrap leading-relaxed">
              {{ selectedMessage.message }}
            </div>
          </div>
          <div class="flex justify-end gap-3 pt-4 border-t border-slate-100">
            <button
              @click="toggleRead(selectedMessage)"
              class="px-4 py-2 text-sm font-medium rounded border border-slate-200 hover:bg-slate-50 transition"
            >
              {{ selectedMessage.is_read ? 'Mark as Unread' : 'Mark as Read' }}
            </button>
            <button
              @click="selectedMessage = null"
              class="px-4 py-2 text-sm font-medium rounded bg-[#2b4b58] text-white hover:bg-[#1e3540] transition"
            >
              Close
            </button>
          </div>
        </div>
      </div>
    </div>

  </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { Link, router } from '@inertiajs/vue3'
import { ref, computed } from 'vue'
import DeleteModal from '@/Components/DeleteModal.vue'
import { useDeleteModal } from '@/Composables/useDeleteModal'

const props = defineProps({ messages: Array })
const { openModal } = useDeleteModal()

const selectedMessage = ref(null)

const readCount = computed(() => props.messages.filter(m => m.is_read).length)
const unreadCount = computed(() => props.messages.filter(m => !m.is_read).length)
const todayCount = computed(() => {
  const today = new Date().toDateString()
  return props.messages.filter(m => new Date(m.created_at).toDateString() === today).length
})

const formatDate = (date) => {
  if (!date) return '—'
  return new Date(date).toLocaleDateString('en-US', {
    year: 'numeric',
    month: 'short',
    day: 'numeric',
    hour: '2-digit',
    minute: '2-digit',
  })
}

const toggleRead = (message) => {
  router.patch(`/admin/contact/${message.id}/toggle-read`, {}, {
    preserveScroll: true,
    onSuccess: () => {
      // If the modal is open, update the selected message too
      if (selectedMessage.value && selectedMessage.value.id === message.id) {
        selectedMessage.value.is_read = !message.is_read
      }
    }
  })
}

const viewMessage = (message) => {
  selectedMessage.value = message
  if (!message.is_read) {
    toggleRead(message)
  }
}

const openDeleteModal = (id, name) => {
  openModal(
    id,
    `/admin/contact/${id}`,
    `Delete Message`,
    `Are you sure you want to delete the message from "${name}"? This action cannot be undone.`
  )
}

const exportCSV = () => {
  if (props.messages.length === 0) return

  const headers = ['ID', 'Name', 'Email', 'Phone', 'Subject', 'Message', 'Read', 'Date']
  const rows = props.messages.map(m => [
    m.id,
    m.name,
    m.email,
    m.phone || '',
    m.subject || '',
    m.message.replace(/,/g, ' '), // sanitize commas
    m.is_read ? 'Yes' : 'No',
    formatDate(m.created_at)
  ])

  const csv = [
    headers.join(','),
    ...rows.map(row => row.join(','))
  ].join('\n')

  const blob = new Blob([csv], { type: 'text/csv' })
  const url = window.URL.createObjectURL(blob)
  const a = document.createElement('a')
  a.href = url
  a.download = `contact-messages-${new Date().toISOString().slice(0,10)}.csv`
  a.click()
  window.URL.revokeObjectURL(url)
}
</script>