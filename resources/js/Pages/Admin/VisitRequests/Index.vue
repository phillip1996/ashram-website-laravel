<template>
  <AdminLayout>
    <DeleteModal />

    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mb-8">
      <div>
        <h1 class="text-2xl font-serif text-[#2b4b58] flex items-center gap-3">
          <i class="fa-solid fa-calendar-check text-[#E1B137] text-xl"></i>
          Visit Requests
          <span class="text-sm font-normal text-slate-400 bg-slate-100 px-3 py-1 rounded-full">
            {{ requests.length }}
          </span>
        </h1>
        <p class="text-slate-400 text-sm mt-1">Manage all visit requests from the website</p>
      </div>
      <button
        v-if="requests.length > 0"
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
            <div class="text-sm text-slate-400 font-medium">Total Requests</div>
            <div class="text-2xl font-bold text-[#2b4b58] mt-1">{{ requests.length }}</div>
          </div>
          <div class="w-10 h-10 bg-[#E1B137]/10 rounded-full flex items-center justify-center">
            <i class="fa-solid fa-calendar-plus text-[#E1B137]"></i>
          </div>
        </div>
      </div>
      <div class="bg-white p-5 rounded-xl shadow-sm border border-slate-100 hover:shadow-md transition">
        <div class="flex items-center justify-between">
          <div>
            <div class="text-sm text-slate-400 font-medium">Pending</div>
            <div class="text-2xl font-bold text-amber-600 mt-1">{{ pendingCount }}</div>
          </div>
          <div class="w-10 h-10 bg-amber-50 rounded-full flex items-center justify-center">
            <i class="fa-solid fa-clock text-amber-500"></i>
          </div>
        </div>
      </div>
      <div class="bg-white p-5 rounded-xl shadow-sm border border-slate-100 hover:shadow-md transition">
        <div class="flex items-center justify-between">
          <div>
            <div class="text-sm text-slate-400 font-medium">Confirmed</div>
            <div class="text-2xl font-bold text-emerald-600 mt-1">{{ confirmedCount }}</div>
          </div>
          <div class="w-10 h-10 bg-emerald-50 rounded-full flex items-center justify-center">
            <i class="fa-solid fa-circle-check text-emerald-500"></i>
          </div>
        </div>
      </div>
      <div class="bg-white p-5 rounded-xl shadow-sm border border-slate-100 hover:shadow-md transition">
        <div class="flex items-center justify-between">
          <div>
            <div class="text-sm text-slate-400 font-medium">Today's Requests</div>
            <div class="text-2xl font-bold text-blue-600 mt-1">{{ todayCount }}</div>
          </div>
          <div class="w-10 h-10 bg-blue-50 rounded-full flex items-center justify-center">
            <i class="fa-solid fa-calendar-day text-blue-500"></i>
          </div>
        </div>
      </div>
    </div>

    <!-- Empty State -->
    <div v-if="requests.length === 0" class="bg-white rounded-xl shadow-sm border border-slate-100 p-12 text-center">
      <div class="max-w-sm mx-auto">
        <div class="w-20 h-20 bg-[#E1B137]/10 rounded-full flex items-center justify-center mx-auto mb-5">
          <i class="fa-solid fa-calendar-plus text-3xl text-[#E1B137]"></i>
        </div>
        <h3 class="text-xl font-serif text-[#2b4b58] mb-2">No Visit Requests Yet</h3>
        <p class="text-slate-400 text-sm leading-relaxed">
          When someone schedules a visit through the website, their request will appear here.
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
              <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Type</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Date & Time</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Status</th>
              <th class="px-6 py-3 text-right text-xs font-medium text-slate-500 uppercase tracking-wider">Actions</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-100">
            <tr
              v-for="request in requests"
              :key="request.id"
              class="hover:bg-slate-50 transition"
            >
              <td class="px-6 py-4 text-sm text-slate-400 font-mono">#{{ request.id }}</td>
              <td class="px-6 py-4">
                <div>
                  <div class="text-sm font-medium text-[#2b4b58]">{{ request.name }}</div>
                  <div class="text-xs text-slate-400">{{ request.email }}</div>
                </div>
              </td>
              <td class="px-6 py-4 text-sm text-slate-500 capitalize">{{ request.visit_type }}</td>
              <td class="px-6 py-4">
                <div class="text-sm text-slate-600">{{ formatDate(request.preferred_date) }}</div>
                <div class="text-xs text-slate-400">{{ request.preferred_time }}</div>
              </td>
              <td class="px-6 py-4">
                <select
                  @change="updateStatus(request, $event.target.value)"
                  class="text-xs font-medium px-3 py-1 rounded-full border-0 focus:ring-2 focus:ring-[#E1B137] transition"
                  :class="getStatusClass(request.status)"
                >
                  <option value="pending" :selected="request.status === 'pending'">Pending</option>
                  <option value="confirmed" :selected="request.status === 'confirmed'">Confirmed</option>
                  <option value="cancelled" :selected="request.status === 'cancelled'">Cancelled</option>
                  <option value="completed" :selected="request.status === 'completed'">Completed</option>
                </select>
              </td>
              <td class="px-6 py-4 text-right">
                <div class="flex items-center justify-end gap-3">
                  <button
                    @click="viewRequest(request)"
                    class="text-slate-400 hover:text-[#2b4b58] transition text-sm"
                    title="View details"
                  >
                    <i class="fa-solid fa-eye"></i>
                  </button>
                  <button
                    @click="openDeleteModal(request.id, request.name)"
                    class="text-slate-400 hover:text-red-600 transition text-sm"
                    title="Delete request"
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
          Showing {{ requests.length }} request{{ requests.length !== 1 ? 's' : '' }}
        </span>
        <span class="text-xs text-slate-400">
          Last updated: {{ formatDate(new Date().toISOString()) }}
        </span>
      </div>
    </div>

    <!-- ── View Details Modal ── -->
    <div v-if="selectedRequest" class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4" @click.self="selectedRequest = null">
      <div class="bg-white rounded-xl shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto p-6 relative">
        <button @click="selectedRequest = null" class="absolute top-4 right-4 text-slate-400 hover:text-slate-600 transition">
          <i class="fa-solid fa-xmark text-xl"></i>
        </button>
        <div class="space-y-4">
          <div class="flex items-start justify-between">
            <div>
              <h3 class="text-xl font-serif text-[#2b4b58]">{{ selectedRequest.name }}</h3>
              <p class="text-sm text-slate-500">
                <a :href="`mailto:${selectedRequest.email}`" class="hover:text-[#E1B137]">{{ selectedRequest.email }}</a>
                <span class="mx-2">·</span>
                {{ selectedRequest.phone || 'No phone' }}
              </p>
            </div>
            <span class="text-xs px-3 py-1 rounded-full font-medium" :class="getStatusClass(selectedRequest.status)">
              {{ selectedRequest.status }}
            </span>
          </div>
          <div class="grid grid-cols-2 gap-4 p-4 bg-slate-50 rounded-lg">
            <div>
              <span class="text-xs font-semibold uppercase tracking-widest text-slate-400">Visit Type</span>
              <p class="text-slate-700 font-medium capitalize">{{ selectedRequest.visit_type }}</p>
            </div>
            <div>
              <span class="text-xs font-semibold uppercase tracking-widest text-slate-400">Guests</span>
              <p class="text-slate-700 font-medium">{{ selectedRequest.guests }}</p>
            </div>
            <div>
              <span class="text-xs font-semibold uppercase tracking-widest text-slate-400">Date</span>
              <p class="text-slate-700 font-medium">{{ formatDate(selectedRequest.preferred_date) }}</p>
            </div>
            <div>
              <span class="text-xs font-semibold uppercase tracking-widest text-slate-400">Time</span>
              <p class="text-slate-700 font-medium">{{ selectedRequest.preferred_time }}</p>
            </div>
          </div>
          <div v-if="selectedRequest.special_requests">
            <span class="text-xs font-semibold uppercase tracking-widest text-slate-400">Special Requests</span>
            <div class="mt-1 p-4 bg-slate-50 rounded-lg text-sm text-slate-700 whitespace-pre-wrap">
              {{ selectedRequest.special_requests }}
            </div>
          </div>
          <div class="flex justify-end gap-3 pt-4 border-t border-slate-100">
            <select
              @change="updateStatus(selectedRequest, $event.target.value)"
              class="text-sm font-medium px-4 py-2 rounded border border-slate-200 focus:ring-2 focus:ring-[#E1B137] focus:border-[#E1B137] transition"
            >
              <option value="pending" :selected="selectedRequest.status === 'pending'">Pending</option>
              <option value="confirmed" :selected="selectedRequest.status === 'confirmed'">Confirmed</option>
              <option value="cancelled" :selected="selectedRequest.status === 'cancelled'">Cancelled</option>
              <option value="completed" :selected="selectedRequest.status === 'completed'">Completed</option>
            </select>
            <button
              @click="selectedRequest = null"
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
import { useToast } from '@/Composables/useToast'

const props = defineProps({ requests: Array })
const { openModal } = useDeleteModal()
const { showToast } = useToast()

const selectedRequest = ref(null)

const pendingCount = computed(() => props.requests.filter(r => r.status === 'pending').length)
const confirmedCount = computed(() => props.requests.filter(r => r.status === 'confirmed').length)
const todayCount = computed(() => {
  const today = new Date().toDateString()
  return props.requests.filter(r => new Date(r.created_at).toDateString() === today).length
})

const formatDate = (date) => {
  if (!date) return '—'
  return new Date(date).toLocaleDateString('en-US', {
    year: 'numeric',
    month: 'short',
    day: 'numeric',
  })
}

const getStatusClass = (status) => {
  const classes = {
    pending: 'bg-amber-100 text-amber-700',
    confirmed: 'bg-emerald-100 text-emerald-700',
    cancelled: 'bg-red-100 text-red-700',
    completed: 'bg-blue-100 text-blue-700',
  }
  return classes[status] || 'bg-slate-100 text-slate-700'
}

const updateStatus = (request, status) => {
  router.patch(`/admin/visit-requests/${request.id}/status`, { status }, {
    preserveScroll: true,
    onSuccess: () => {
      request.status = status
      if (selectedRequest.value && selectedRequest.value.id === request.id) {
        selectedRequest.value.status = status
      }
      showToast(`Status updated to ${status}`, 'success')
    }
  })
}

const viewRequest = (request) => {
  selectedRequest.value = request
}

const openDeleteModal = (id, name) => {
  openModal(
    id,
    `/admin/visit-requests/${id}`,
    'Delete Visit Request',
    `Are you sure you want to delete the visit request from "${name}"? This action cannot be undone.`
  )
}

const exportCSV = () => {
  if (props.requests.length === 0) return

  const headers = ['ID', 'Name', 'Email', 'Phone', 'Visit Type', 'Date', 'Time', 'Guests', 'Status', 'Special Requests', 'Created At']
  const rows = props.requests.map(r => [
    r.id,
    r.name,
    r.email,
    r.phone || '',
    r.visit_type,
    formatDate(r.preferred_date),
    r.preferred_time,
    r.guests,
    r.status,
    (r.special_requests || '').replace(/,/g, ' '),
    formatDate(r.created_at)
  ])

  const csv = [
    headers.join(','),
    ...rows.map(row => row.join(','))
  ].join('\n')

  const blob = new Blob([csv], { type: 'text/csv' })
  const url = window.URL.createObjectURL(blob)
  const a = document.createElement('a')
  a.href = url
  a.download = `visit-requests-${new Date().toISOString().slice(0,10)}.csv`
  a.click()
  window.URL.revokeObjectURL(url)
}
</script>