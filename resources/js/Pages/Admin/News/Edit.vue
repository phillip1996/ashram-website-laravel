<template>
  <AdminLayout>
    <h1 class="text-2xl font-serif text-[#2b4b58] mb-6">Edit News Item</h1>

    <form @submit.prevent="submit" class="bg-white p-6 rounded shadow space-y-4 max-w-3xl">

      <!-- ─── Title ─── -->
      <div>
        <label class="block text-sm font-medium text-gray-700">Title</label>
        <input
          v-model="form.title"
          type="text"
          class="w-full border-gray-300 rounded-md shadow-sm focus:ring-[#E1B137] focus:border-[#E1B137]"
        />
        <div v-if="form.errors.title" class="text-red-500 text-xs">{{ form.errors.title }}</div>
      </div>

      <!-- ─── Description ─── -->
      <div>
        <label class="block text-sm font-medium text-gray-700">Description</label>
        <textarea
          v-model="form.description"
          rows="4"
          class="w-full border-gray-300 rounded-md shadow-sm focus:ring-[#E1B137] focus:border-[#E1B137]"
        ></textarea>
        <div v-if="form.errors.description" class="text-red-500 text-xs">{{ form.errors.description }}</div>
      </div>

      <!-- ─── Date & Category ─── -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label class="block text-sm font-medium text-gray-700">Date</label>
          <input
            v-model="form.date"
            type="date"
            class="w-full border-gray-300 rounded-md shadow-sm focus:ring-[#E1B137] focus:border-[#E1B137]"
          />
          <div v-if="form.errors.date" class="text-red-500 text-xs">{{ form.errors.date }}</div>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700">Category</label>
          <input
            v-model="form.category"
            class="w-full border-gray-300 rounded-md shadow-sm focus:ring-[#E1B137] focus:border-[#E1B137]"
          />
          <div v-if="form.errors.category" class="text-red-500 text-xs">{{ form.errors.category }}</div>
        </div>
      </div>

      <!-- ─── Read Time & Current Image ─── -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label class="block text-sm font-medium text-gray-700">Read Time</label>
          <input
            v-model="form.read_time"
            placeholder="e.g. 3 min read"
            class="w-full border-gray-300 rounded-md shadow-sm focus:ring-[#E1B137] focus:border-[#E1B137]"
          />
          <div v-if="form.errors.read_time" class="text-red-500 text-xs">{{ form.errors.read_time }}</div>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Current Image</label>
          <div v-if="newsItem.image" class="flex items-center gap-3 p-3 border rounded-md bg-slate-50">
            <img
              :src="newsItem.image"
              :alt="newsItem.title"
              class="w-16 h-16 object-cover rounded-md border border-slate-200"
            />
            <span class="text-sm text-slate-500 truncate">{{ newsItem.image }}</span>
          </div>
          <p v-else class="text-sm text-slate-400">No image set</p>
          <div class="mt-2">
            <label class="block text-sm font-medium text-gray-700">Replace Image</label>
            <FileUpload
              v-model="form.image_file"
              accept="image/*"
              :max-size="5"
            />
            <div v-if="form.errors.image" class="text-red-500 text-xs">{{ form.errors.image }}</div>
          </div>
        </div>
      </div>

      <!-- ─── Link (optional) ─── -->
      <div>
        <label class="block text-sm font-medium text-gray-700">Link (optional)</label>
        <input
          v-model="form.link"
          type="text"
          placeholder="/news/featured"
          class="w-full border-gray-300 rounded-md shadow-sm focus:ring-[#E1B137] focus:border-[#E1B137]"
        />
        <div v-if="form.errors.link" class="text-red-500 text-xs">{{ form.errors.link }}</div>
      </div>

      <!-- ─── Status ─── -->
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

      <!-- ─── Actions ─── -->
      <div class="flex justify-end gap-4 pt-4">
        <Link href="/admin/news" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300 transition">Cancel</Link>
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

const props = defineProps({ newsItem: Object })

const form = useForm({
  title: props.newsItem.title,
  description: props.newsItem.description,
  date: props.newsItem.date,
  category: props.newsItem.category,
  read_time: props.newsItem.read_time,
  image: null,
  image_file: null,
  link: props.newsItem.link,
  is_active: !!props.newsItem.is_active,
})

const submit = () => {
  if (form.image_file) {
    form.image = form.image_file
  }
  form.put(`/admin/news/${props.newsItem.id}`)
}
</script>