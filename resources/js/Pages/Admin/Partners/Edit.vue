<template>
  <AdminLayout>
    <h1 class="text-2xl font-serif text-[#2b4b58] mb-6">Edit Partner</h1>

    <form @submit.prevent="submit" class="bg-white p-6 rounded shadow space-y-4 max-w-3xl">

      <!-- ─── Name ─── -->
      <div>
        <label class="block text-sm font-medium text-gray-700">Name</label>
        <input
          v-model="form.name"
          type="text"
          class="w-full border-gray-300 rounded-md shadow-sm focus:ring-[#E1B137] focus:border-[#E1B137]"
        />
        <div v-if="form.errors.name" class="text-red-500 text-xs mt-1">{{ form.errors.name }}</div>
      </div>

      <!-- ─── Current Logo ─── -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Current Logo</label>
        <div v-if="partner.logo" class="flex items-center gap-3 p-3 border rounded-md bg-slate-50">
          <img
            :src="partner.logo"
            :alt="partner.name"
            class="w-16 h-16 object-contain border border-slate-200 rounded-md bg-white"
          />
          <span class="text-sm text-slate-500 truncate">{{ partner.logo }}</span>
        </div>
        <p v-else class="text-sm text-slate-400">No logo set</p>

        <div class="mt-2">
          <label class="block text-sm font-medium text-gray-700">Replace Logo</label>
          <FileUpload
            v-model="form.logo_file"
            accept="image/*"
            :max-size="2"
          />
          <div v-if="form.errors.logo" class="text-red-500 text-xs mt-1">{{ form.errors.logo }}</div>
        </div>
      </div>

      <!-- ─── Location ─── -->
      <div>
        <label class="block text-sm font-medium text-gray-700">Location</label>
        <input
          v-model="form.location"
          type="text"
          class="w-full border-gray-300 rounded-md shadow-sm focus:ring-[#E1B137] focus:border-[#E1B137]"
        />
        <div v-if="form.errors.location" class="text-red-500 text-xs mt-1">{{ form.errors.location }}</div>
      </div>

      <!-- ─── Website ─── -->
      <div>
        <label class="block text-sm font-medium text-gray-700">Website (optional)</label>
        <input
          v-model="form.website"
          type="url"
          class="w-full border-gray-300 rounded-md shadow-sm focus:ring-[#E1B137] focus:border-[#E1B137]"
        />
        <div v-if="form.errors.website" class="text-red-500 text-xs mt-1">{{ form.errors.website }}</div>
      </div>

      <!-- ─── Status ─── -->
      <div class="flex items-center gap-4">
        <label class="inline-flex items-center">
          <input v-model="form.is_active" type="checkbox" class="rounded border-gray-300 text-[#E1B137] shadow-sm focus:ring-[#E1B137]" />
          <span class="ml-2 text-sm text-gray-700">Active</span>
        </label>
      </div>

      <!-- ─── Actions ─── -->
      <div class="flex justify-end gap-4 pt-4">
        <Link href="/admin/partners" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300 transition">Cancel</Link>
        <button
          type="submit"
          class="px-4 py-2 bg-[#2b4b58] text-white rounded hover:bg-[#1e3540] transition"
          :disabled="form.processing"
        >
          {{ form.processing ? 'Updating...' : 'Update' }}
        </button>
      </div>
    </form>
  </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { Link, useForm } from '@inertiajs/vue3'
import FileUpload from '@/Components/Admin/FileUpload.vue'
import { useToast } from '@/Composables/useToast'

const { showToast } = useToast()
const props = defineProps({ partner: Object })

const form = useForm({
  name: props.partner.name,
  logo: null,
  logo_file: null,
  location: props.partner.location,
  website: props.partner.website || '',
  is_active: !!props.partner.is_active,
})

const submit = () => {
  if (form.logo_file) {
    form.logo = form.logo_file
  }
  form.put(`/admin/partners/${props.partner.id}`, {
    onSuccess: () => {
      showToast('Partner updated successfully')
    },
    onError: () => {
      showToast('Please check the form for errors', 'error')
    },
  })
}
</script>