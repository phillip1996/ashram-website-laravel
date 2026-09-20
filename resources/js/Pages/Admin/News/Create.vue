<template>
  <AdminLayout>
    <h1 class="text-2xl font-serif text-[#2b4b58] mb-6">Create News Item</h1>

    <form @submit.prevent="submit" class="bg-white p-6 rounded shadow space-y-6 max-w-3xl">

      <!-- ══════════════════════════════════════════════════
           BASIC INFORMATION
      ══════════════════════════════════════════════════ -->

      <div class="space-y-4">

        <!-- Title -->
        <div>
          <label class="block text-sm font-medium text-gray-700">Title</label>
          <input
            v-model="form.title"
            type="text"
            class="w-full border-gray-300 rounded-md shadow-sm focus:ring-[#E1B137] focus:border-[#E1B137]"
          />
          <div v-if="form.errors.title" class="text-red-500 text-xs mt-1">{{ form.errors.title }}</div>
        </div>

        <!-- Description (Quill) -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
          <QuillEditor v-model="form.description" placeholder="Write the news article…" />
          <div v-if="form.errors.description" class="text-red-500 text-xs mt-1">{{ form.errors.description }}</div>
        </div>

        <!-- Date & Category -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <label class="block text-sm font-medium text-gray-700">Date</label>
            <input
              v-model="form.date"
              type="date"
              class="w-full border-gray-300 rounded-md shadow-sm focus:ring-[#E1B137] focus:border-[#E1B137]"
            />
            <div v-if="form.errors.date" class="text-red-500 text-xs mt-1">{{ form.errors.date }}</div>
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700">Category</label>
            <input
              v-model="form.category"
              class="w-full border-gray-300 rounded-md shadow-sm focus:ring-[#E1B137] focus:border-[#E1B137]"
            />
            <div v-if="form.errors.category" class="text-red-500 text-xs mt-1">{{ form.errors.category }}</div>
          </div>
        </div>

        <!-- Read Time -->
        <div>
          <label class="block text-sm font-medium text-gray-700">Read Time</label>
          <input
            v-model="form.read_time"
            placeholder="e.g. 3 min read"
            class="w-full border-gray-300 rounded-md shadow-sm focus:ring-[#E1B137] focus:border-[#E1B137]"
          />
          <div v-if="form.errors.read_time" class="text-red-500 text-xs mt-1">{{ form.errors.read_time }}</div>
        </div>

      </div>

      <!-- ══════════════════════════════════════════════════
           IMAGE UPLOAD (Full-width, prominent)
      ══════════════════════════════════════════════════ -->

      <div class="border-t border-slate-200 pt-6">
        <div class="mb-1">
          <label class="block text-sm font-medium text-gray-700">Image</label>
          <p class="text-xs text-slate-400">Upload a featured image for this news article</p>
        </div>
        <FileUpload
          v-model="form.image_file"
          accept="image/*"
          :max-size="5"
        />
        <div v-if="form.errors.image" class="text-red-500 text-xs mt-1">{{ form.errors.image }}</div>
      </div>

      <!-- ══════════════════════════════════════════════════
           LINK (optional)
      ══════════════════════════════════════════════════ -->

      <div>
        <label class="block text-sm font-medium text-gray-700">Link (optional)</label>
        <input
          v-model="form.link"
          type="text"
          placeholder="/news/featured"
          class="w-full border-gray-300 rounded-md shadow-sm focus:ring-[#E1B137] focus:border-[#E1B137]"
        />
        <div v-if="form.errors.link" class="text-red-500 text-xs mt-1">{{ form.errors.link }}</div>
      </div>

      <!-- ══════════════════════════════════════════════════
           STATUS
      ══════════════════════════════════════════════════ -->

      <div class="flex items-center gap-4">
        <label class="inline-flex items-center">
          <input
            v-model="form.is_active"
            type="checkbox"
            class="rounded border-gray-300 text-[#E1B137] shadow-sm focus:ring-[#E1B137]"
          />
          <span class="ml-2 text-sm text-gray-700">Active</span>
        </label>
      </div>

      <!-- ══════════════════════════════════════════════════
           ACTIONS
      ══════════════════════════════════════════════════ -->

      <div class="flex justify-end gap-4 pt-4 border-t border-slate-200">
        <Link href="/admin/news" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300 transition">
          Cancel
        </Link>
        <button
          type="submit"
          class="px-4 py-2 bg-[#2b4b58] text-white rounded hover:bg-[#1e3540] transition"
          :disabled="form.processing"
        >
          {{ form.processing ? 'Saving...' : 'Create' }}
        </button>
      </div>

    </form>
  </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { Link, useForm } from '@inertiajs/vue3'
import FileUpload from '@/Components/Admin/FileUpload.vue'
import QuillEditor from '@/Components/Admin/QuillEditor.vue'

const form = useForm({
  title: '',
  description: '',
  date: '',
  category: '',
  read_time: '',
  image: null,
  image_file: null,
  link: '',
  is_active: true,
})

const submit = () => {
  form.image = form.image_file
  form.post('/admin/news')
}
</script>