<template>
  <AdminLayout>
    <h1 class="text-2xl font-serif text-[#2b4b58] mb-6">Edit Podcast</h1>

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

      <!-- ─── Description ─── -->
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
          <label class="block text-sm font-medium text-gray-700">Duration</label>
          <input v-model="form.duration" placeholder="HH:MM:SS" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-[#E1B137] focus:border-[#E1B137]" />
          <div v-if="form.errors.duration" class="text-red-500 text-xs">{{ form.errors.duration }}</div>
        </div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label class="block text-sm font-medium text-gray-700">Category</label>
          <input v-model="form.category" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-[#E1B137] focus:border-[#E1B137]" />
          <div v-if="form.errors.category" class="text-red-500 text-xs">{{ form.errors.category }}</div>
        </div>
        <div>
          <!-- Empty -->
        </div>
      </div>

      <!-- ─── Thumbnail ─── -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Current Thumbnail</label>
        <div v-if="currentThumbnail" class="flex items-center gap-3 p-2 border rounded-md bg-slate-50">
          <img :src="currentThumbnail" alt="Thumbnail" class="w-24 h-24 object-cover rounded" />
        </div>
        <p v-else class="text-sm text-slate-400">No thumbnail set</p>
        <div class="mt-2">
          <label class="block text-sm font-medium text-gray-700">Replace Thumbnail</label>
          <input
            type="file"
            accept="image/*"
            @change="handleThumbnailChange"
            class="w-full border-gray-300 rounded-md shadow-sm focus:ring-[#E1B137] focus:border-[#E1B137]"
          />
          <div v-if="form.errors.thumbnail" class="text-red-500 text-xs">{{ form.errors.thumbnail }}</div>
        </div>
        <div v-if="form.thumbnail_file" class="mt-2">
          <p class="text-xs text-green-600">New thumbnail selected: {{ form.thumbnail_file.name }}</p>
          <img :src="form.thumbnail_preview" alt="New thumbnail preview" class="mt-1 w-24 h-24 object-cover rounded border" />
        </div>
      </div>

      <!-- ─── Audio ─── -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Current Audio</label>
        <div v-if="podcast.audio" class="flex items-center gap-3 p-2 border rounded-md bg-slate-50">
          <i class="fa-solid fa-file-audio text-2xl text-slate-400"></i>
          <span class="text-sm text-slate-500 truncate">{{ podcast.audio }}</span>
        </div>
        <p v-else class="text-sm text-slate-400">No audio file</p>
        <div class="mt-2">
          <label class="block text-sm font-medium text-gray-700">Replace Audio</label>
          <input
            type="file"
            accept="audio/*"
            @change="handleAudioChange"
            class="w-full border-gray-300 rounded-md shadow-sm focus:ring-[#E1B137] focus:border-[#E1B137]"
          />
          <div v-if="form.errors.audio" class="text-red-500 text-xs">{{ form.errors.audio }}</div>
        </div>
        <div v-if="form.audio_file" class="mt-2">
          <p class="text-xs text-green-600">New audio selected: {{ form.audio_file.name }}</p>
        </div>
      </div>

      <!-- ─── Speaker Avatar ─── -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Current Speaker Avatar</label>
        <div v-if="currentAvatar" class="flex items-center gap-3 p-2 border rounded-md bg-slate-50">
          <img :src="currentAvatar" alt="Avatar" class="w-12 h-12 rounded-full object-cover" />
        </div>
        <p v-else class="text-sm text-slate-400">No avatar set</p>
        <div class="mt-2">
          <label class="block text-sm font-medium text-gray-700">Replace Avatar</label>
          <input
            type="file"
            accept="image/*"
            @change="handleAvatarChange"
            class="w-full border-gray-300 rounded-md shadow-sm focus:ring-[#E1B137] focus:border-[#E1B137]"
          />
          <div v-if="form.errors.speaker_avatar" class="text-red-500 text-xs">{{ form.errors.speaker_avatar }}</div>
        </div>
        <div v-if="form.avatar_file" class="mt-2">
          <p class="text-xs text-green-600">New avatar selected: {{ form.avatar_file.name }}</p>
          <img :src="form.avatar_preview" alt="New avatar preview" class="mt-1 w-12 h-12 rounded-full object-cover border" />
        </div>
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
          {{ form.processing ? 'Updating...' : 'Update' }}
        </button>
      </div>
    </form>
  </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { Link, useForm, router } from '@inertiajs/vue3'
import QuillEditor from '@/Components/Admin/QuillEditor.vue'
import { useToast } from '@/Composables/useToast'
import { ref, computed } from 'vue'

const { showToast } = useToast()
const props = defineProps({ podcast: Object })

// Track current images
const currentThumbnail = ref(props.podcast.thumbnail || null)
const currentAvatar = ref(props.podcast.speaker_avatar || null)

const form = useForm({
  episode: props.podcast.episode,
  title: props.podcast.title,
  description: props.podcast.description,
  date: props.podcast.date,
  duration: props.podcast.duration,
  category: props.podcast.category,
  thumbnail_file: null,
  thumbnail_preview: null,
  audio_file: null,
  speaker_name: props.podcast.speaker_name,
  speaker_role: props.podcast.speaker_role,
  avatar_file: null,
  avatar_preview: null,
  bookmarked: !!props.podcast.bookmarked,
  is_active: !!props.podcast.is_active,
})

// ─── File Handlers ───
const handleThumbnailChange = (event) => {
  const file = event.target.files[0]
  if (file) {
    form.thumbnail_file = file
    const reader = new FileReader()
    reader.onload = (e) => {
      form.thumbnail_preview = e.target.result
    }
    reader.readAsDataURL(file)
  }
}

const handleAudioChange = (event) => {
  const file = event.target.files[0]
  if (file) {
    form.audio_file = file
  }
}

const handleAvatarChange = (event) => {
  const file = event.target.files[0]
  if (file) {
    form.avatar_file = file
    const reader = new FileReader()
    reader.onload = (e) => {
      form.avatar_preview = e.target.result
    }
    reader.readAsDataURL(file)
  }
}

const submit = () => {
  // Convert the form data to FormData for file uploads
  const data = new FormData()
  
  data.append('episode', form.episode)
  data.append('title', form.title)
  data.append('description', form.description)
  data.append('date', form.date)
  data.append('duration', form.duration)
  data.append('category', form.category)
  data.append('speaker_name', form.speaker_name)
  data.append('speaker_role', form.speaker_role)
  data.append('bookmarked', form.bookmarked ? 1 : 0)
  data.append('is_active', form.is_active ? 1 : 0)
  
  if (form.thumbnail_file) {
    data.append('thumbnail', form.thumbnail_file)
  }
  if (form.audio_file) {
    data.append('audio', form.audio_file)
  }
  if (form.avatar_file) {
    data.append('speaker_avatar', form.avatar_file)
  }

  // ✅ Use PUT with FormData
  router.post(`/admin/podcasts/${props.podcast.id}`, {
    _method: 'PUT',
    ...Object.fromEntries(data)
  }, {
    preserveScroll: true,
    onSuccess: () => {
      showToast('Podcast updated successfully!', 'success')
      
      // ✅ Full page reload to show fresh images
      setTimeout(() => {
        window.location.href = '/admin/podcasts'
      }, 500)
    },
    onError: (errors) => {
      console.error('Error updating podcast:', errors)
      showToast('Please check the form for errors', 'error')
    },
  })
}
</script>