<template>
  <AdminLayout>
    <h1 class="text-2xl font-serif text-[#2b4b58] mb-6">Create Podcast</h1>

    <form @submit.prevent="submit" class="bg-white p-6 rounded shadow space-y-4 max-w-3xl">

      <!-- ─── Basic Info ─── -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label class="block text-sm font-medium text-gray-700">Episode</label>
          <input v-model="form.episode" type="text" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-[#E1B137] focus:border-[#E1B137]" />
          <div v-if="form.errors.episode" class="text-red-500 text-xs">{{ form.errors.episode }}</div>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700">Title</label>
          <input v-model="form.title" type="text" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-[#E1B137] focus:border-[#E1B137]" />
          <div v-if="form.errors.title" class="text-red-500 text-xs">{{ form.errors.title }}</div>
        </div>
      </div>

      <!-- ─── Description (WYSIWYG) ─── -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
        <QuillEditor v-model="form.description" />
        <div v-if="form.errors.description" class="text-red-500 text-xs mt-1">{{ form.errors.description }}</div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label class="block text-sm font-medium text-gray-700">Date</label>
          <input v-model="form.date" type="date" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-[#E1B137] focus:border-[#E1B137]" />
          <div v-if="form.errors.date" class="text-red-500 text-xs">{{ form.errors.date }}</div>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700">Duration (e.g. 48:22)</label>
          <input v-model="form.duration" placeholder="48:22" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-[#E1B137] focus:border-[#E1B137]" />
          <div v-if="form.errors.duration" class="text-red-500 text-xs">{{ form.errors.duration }}</div>
        </div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label class="block text-sm font-medium text-gray-700">Duration (seconds)</label>
          <input v-model.number="form.duration_seconds" type="number" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-[#E1B137] focus:border-[#E1B137]" />
          <div v-if="form.errors.duration_seconds" class="text-red-500 text-xs">{{ form.errors.duration_seconds }}</div>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700">Category</label>
          <input v-model="form.category" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-[#E1B137] focus:border-[#E1B137]" />
          <div v-if="form.errors.category" class="text-red-500 text-xs">{{ form.errors.category }}</div>
        </div>
      </div>

      <!-- ─── File Uploads ─── -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Thumbnail Image</label>
        <FileUpload
          v-model="form.thumbnail_file"
          accept="image/*"
          :max-size="5"
        />
        <div v-if="form.errors.thumbnail" class="text-red-500 text-xs">{{ form.errors.thumbnail }}</div>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Audio File</label>
        <FileUpload
          v-model="form.audio_file"
          accept="audio/*"
          :max-size="50"
        />
        <div v-if="form.errors.audio" class="text-red-500 text-xs">{{ form.errors.audio }}</div>
      </div>

      <!-- ─── Speaker Info ─── -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label class="block text-sm font-medium text-gray-700">Speaker Name</label>
          <input v-model="form.speaker_name" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-[#E1B137] focus:border-[#E1B137]" />
          <div v-if="form.errors.speaker_name" class="text-red-500 text-xs">{{ form.errors.speaker_name }}</div>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700">Speaker Role</label>
          <input v-model="form.speaker_role" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-[#E1B137] focus:border-[#E1B137]" />
          <div v-if="form.errors.speaker_role" class="text-red-500 text-xs">{{ form.errors.speaker_role }}</div>
        </div>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Speaker Avatar</label>
        <FileUpload
          v-model="form.avatar_file"
          accept="image/*"
          :max-size="2"
        />
        <div v-if="form.errors.speaker_avatar" class="text-red-500 text-xs">{{ form.errors.speaker_avatar }}</div>
      </div>

      <!-- ─── Status ─── -->
      <div class="flex items-center gap-4">
        <label class="inline-flex items-center">
          <input v-model="form.bookmarked" type="checkbox" class="rounded border-gray-300 text-[#E1B137] shadow-sm focus:ring-[#E1B137]" />
          <span class="ml-2 text-sm text-gray-700">Bookmarked</span>
        </label>
        <label class="inline-flex items-center">
          <input v-model="form.is_active" type="checkbox" class="rounded border-gray-300 text-[#E1B137] shadow-sm focus:ring-[#E1B137]" />
          <span class="ml-2 text-sm text-gray-700">Active</span>
        </label>
      </div>

      <!-- ─── Actions ─── -->
      <div class="flex justify-end gap-4 pt-4">
        <Link href="/admin/podcasts" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300 transition">Cancel</Link>
        <button type="submit" class="px-4 py-2 bg-[#2b4b58] text-white rounded hover:bg-[#1e3540] transition" :disabled="form.processing">
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
import { useToast } from '@/Composables/useToast'

const { showToast } = useToast()

const form = useForm({
  episode: '',
  title: '',
  description: '',
  date: '',
  duration: '',
  duration_seconds: '',
  category: '',
  thumbnail: null,
  thumbnail_file: null,
  audio: null,
  audio_file: null,
  speaker_name: '',
  speaker_role: '',
  speaker_avatar: null,
  avatar_file: null,
  bookmarked: false,
  is_active: true,
})

const submit = () => {
  form.thumbnail = form.thumbnail_file
  form.audio = form.audio_file
  form.speaker_avatar = form.avatar_file
  form.post('/admin/podcasts', {
    onSuccess: () => {
      showToast('Podcast created successfully')
    },
    onError: () => {
      showToast('Please check the form for errors', 'error')
    },
  })
}
</script>