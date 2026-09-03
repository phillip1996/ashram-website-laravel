<template>
  <AdminLayout>
    <DeleteModal />

    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mb-8">
      <div>
        <h1 class="text-2xl font-serif text-[#2b4b58] flex items-center gap-3">
          <i class="fa-solid fa-envelope text-[#E1B137] text-xl"></i>
          Subscribers
          <span class="text-sm font-normal text-slate-400 bg-slate-100 px-3 py-1 rounded-full">
            {{ subscribers.length }}
          </span>
        </h1>
        <p class="text-slate-400 text-sm mt-1">Manage your newsletter subscribers</p>
      </div>
      <button
        v-if="subscribers.length > 0"
        @click="exportCSV"
        class="flex items-center gap-2 px-4 py-2 border border-slate-200 text-slate-600 text-sm font-medium rounded hover:bg-slate-50 transition"
      >
        <i class="fa-solid fa-download"></i>
        Export CSV
      </button>
    </div>

    <!-- Stats -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-8">
      <div class="bg-white p-5 rounded-xl shadow-sm border border-slate-100 hover:shadow-md transition">
        <div class="flex items-center justify-between">
          <div>
            <div class="text-sm text-slate-400 font-medium">Total Subscribers</div>
            <div class="text-2xl font-bold text-[#2b4b58] mt-1">{{ subscribers.length }}</div>
          </div>
          <div class="w-10 h-10 bg-[#E1B137]/10 rounded-full flex items-center justify-center">
            <i class="fa-solid fa-users text-[#E1B137]"></i>
          </div>
        </div>
      </div>
      <div class="bg-white p-5 rounded-xl shadow-sm border border-slate-100 hover:shadow-md transition">
        <div class="flex items-center justify-between">
          <div>
            <div class="text-sm text-slate-400 font-medium">Active</div>
            <div class="text-2xl font-bold text-green-600 mt-1">{{ activeCount }}</div>
          </div>
          <div class="w-10 h-10 bg-green-50 rounded-full flex items-center justify-center">
            <i class="fa-solid fa-circle-check text-green-500"></i>
          </div>
        </div>
      </div>
      <div class="bg-white p-5 rounded-xl shadow-sm border border-slate-100 hover:shadow-md transition">
        <div class="flex items-center justify-between">
          <div>
            <div class="text-sm text-slate-400 font-medium">Inactive</div>
            <div class="text-2xl font-bold text-red-600 mt-1">{{ inactiveCount }}</div>
          </div>
          <div class="w-10 h-10 bg-red-50 rounded-full flex items-center justify-center">
            <i class="fa-solid fa-circle-xmark text-red-500"></i>
          </div>
        </div>
      </div>
    </div>

    <!-- Empty State -->
    <div v-if="subscribers.length === 0" class="bg-white rounded-xl shadow-sm border border-slate-100 p-12 text-center">
      <div class="max-w-sm mx-auto">
        <div class="w-20 h-20 bg-[#E1B137]/10 rounded-full flex items-center justify-center mx-auto mb-5">
          <i class="fa-solid fa-envelope-open-text text-3xl text-[#E1B137]"></i>
        </div>
        <h3 class="text-xl font-serif text-[#2b4b58] mb-2">No Subscribers Yet</h3>
        <p class="text-slate-400 text-sm leading-relaxed">
          Your newsletter list is currently empty.
          <br class="hidden sm:block" />
          Once visitors subscribe via the footer form, they'll appear here.
        </p>
        <div class="mt-6 inline-flex items-center gap-2 text-sm text-slate-500 bg-slate-50 px-4 py-2 rounded-lg border border-slate-200">
          <i class="fa-solid fa-lightbulb text-[#E1B137]"></i>
          <span>Tip: Add the subscription form to your footer</span>
        </div>
      </div>
    </div>

    <!-- Table -->
    <div v-else class="bg-white rounded-xl shadow-sm border border-slate-100 overflow-hidden">
      <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-slate-200">
          <thead class="bg-slate-50">
            <tr>
              <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">ID</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Email</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Subscribed At</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Status</th>
              <th class="px-6 py-3 text-right text-xs font-medium text-slate-500 uppercase tracking-wider">Actions</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-100">
            <tr
              v-for="subscriber in subscribers"
              :key="subscriber.id"
              class="hover:bg-slate-50 transition"
            >
              <td class="px-6 py-4 text-sm text-slate-400 font-mono">#{{ subscriber.id }}</td>
              <td class="px-6 py-4 text-sm text-[#2b4b58] font-medium">
                {{ subscriber.email }}
              </td>
              <td class="px-6 py-4 text-sm text-slate-500">
                {{ formatDate(subscriber.subscribed_at) }}
              </td>
              <td class="px-6 py-4">
                <button
                  @click="toggleActive(subscriber)"
                  class="text-xs font-medium px-3 py-1 rounded-full transition"
                  :class="subscriber.is_active
                    ? 'bg-emerald-100 text-emerald-700 hover:bg-emerald-200'
                    : 'bg-rose-100 text-rose-700 hover:bg-rose-200'"
                >
                  {{ subscriber.is_active ? 'Active' : 'Inactive' }}
                </button>
              </td>
              <td class="px-6 py-4 text-right">
                <button
                  @click="openDeleteModal(subscriber.id, subscriber.email)"
                  class="text-slate-400 hover:text-red-600 transition text-sm"
                  title="Delete subscriber"
                >
                  <i class="fa-solid fa-trash-can"></i>
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="px-6 py-3 bg-slate-50 border-t border-slate-100 flex items-center justify-between">
        <span class="text-xs text-slate-400">
          Showing {{ subscribers.length }} subscriber{{ subscribers.length !== 1 ? 's' : '' }}
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
import { Link, router } from '@inertiajs/vue3'
import { computed } from 'vue'
import DeleteModal from '@/Components/DeleteModal.vue'
import { useDeleteModal } from '@/Composables/useDeleteModal'

const props = defineProps({ subscribers: Array })
const { openModal } = useDeleteModal()

const activeCount = computed(() => props.subscribers.filter(s => s.is_active).length)
const inactiveCount = computed(() => props.subscribers.filter(s => !s.is_active).length)

const formatDate = (date) => {
  if (!date) return '—'
  return new Date(date).toLocaleDateString('en-US', {
    year: 'numeric',
    month: 'short',
    day: 'numeric',
  })
}

const toggleActive = (subscriber) => {
  router.patch(`/admin/subscribers/${subscriber.id}/toggle`)
}

const openDeleteModal = (id, email) => {
  openModal(
    id,
    `/admin/subscribers/${id}`,
    `Delete Subscriber`,
    `Are you sure you want to delete "${email}"? This action cannot be undone.`
  )
}

const exportCSV = () => {
  if (props.subscribers.length === 0) return

  const headers = ['ID', 'Email', 'Status', 'Subscribed At']
  const rows = props.subscribers.map(s => [
    s.id,
    s.email,
    s.is_active ? 'Active' : 'Inactive',
    formatDate(s.subscribed_at)
  ])

  const csv = [
    headers.join(','),
    ...rows.map(row => row.join(','))
  ].join('\n')

  const blob = new Blob([csv], { type: 'text/csv' })
  const url = window.URL.createObjectURL(blob)
  const a = document.createElement('a')
  a.href = url
  a.download = `subscribers-${new Date().toISOString().slice(0,10)}.csv`
  a.click()
  window.URL.revokeObjectURL(url)
}
</script>