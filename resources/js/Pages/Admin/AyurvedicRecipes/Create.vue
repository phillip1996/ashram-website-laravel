<template>
  <AdminLayout>
    <h1 class="text-2xl font-serif text-[#2b4b58] mb-6">Create Ayurvedic Recipe</h1>

    <form @submit.prevent="submit" class="bg-white p-6 rounded shadow space-y-4 max-w-3xl">
      <div>
        <label class="block text-sm font-medium text-gray-700">Title *</label>
        <input v-model="form.title" type="text" required class="w-full border-gray-300 rounded-md shadow-sm focus:ring-[#E1B137] focus:border-[#E1B137]" />
        <div v-if="form.errors.title" class="text-red-500 text-xs">{{ form.errors.title }}</div>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Description *</label>
        <textarea v-model="form.description" rows="3" required class="w-full border-gray-300 rounded-md shadow-sm focus:ring-[#E1B137] focus:border-[#E1B137]"></textarea>
        <div v-if="form.errors.description" class="text-red-500 text-xs">{{ form.errors.description }}</div>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Ingredients *</label>
        <textarea v-model="form.ingredients" rows="4" required placeholder="List each ingredient on a new line" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-[#E1B137] focus:border-[#E1B137]"></textarea>
        <div v-if="form.errors.ingredients" class="text-red-500 text-xs">{{ form.errors.ingredients }}</div>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Instructions *</label>
        <textarea v-model="form.instructions" rows="6" required placeholder="Step by step instructions (one step per line)" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-[#E1B137] focus:border-[#E1B137]"></textarea>
        <div v-if="form.errors.instructions" class="text-red-500 text-xs">{{ form.errors.instructions }}</div>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Recipe Image</label>
        <FileUpload v-model="form.image" accept="image/*" :max-size="5" class="mt-1" />
        <p class="text-xs text-slate-400 mt-1">Upload a JPG, PNG, or WebP image (max 5MB)</p>
        <div v-if="form.errors.image" class="text-red-500 text-xs">{{ form.errors.image }}</div>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Upload Video File</label>
        <FileUpload v-model="form.video_file" accept="video/*" :max-size="50" class="mt-1" />
        <p class="text-xs text-slate-400 mt-1">Upload MP4, WebM, or OGG (max 50MB)</p>
        <div v-if="form.errors.video_file" class="text-red-500 text-xs">{{ form.errors.video_file }}</div>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">OR Video URL (YouTube/Vimeo)</label>
        <input v-model="form.video_url" type="text" placeholder="https://www.youtube.com/watch?v=..." class="w-full border-gray-300 rounded-md shadow-sm focus:ring-[#E1B137] focus:border-[#E1B137]" />
        <p class="text-xs text-slate-400 mt-1">Paste a YouTube or Vimeo URL (if not uploading a file)</p>
        <div v-if="form.errors.video_url" class="text-red-500 text-xs">{{ form.errors.video_url }}</div>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Category</label>
        <input v-model="form.category" type="text" placeholder="e.g. Soup, Tea, Tonic, Meal" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-[#E1B137] focus:border-[#E1B137]" />
        <div v-if="form.errors.category" class="text-red-500 text-xs">{{ form.errors.category }}</div>
      </div>

      <!-- =========================================================
           GALLERY SECTION – Upload Multiple Images at Once
      ========================================================= -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Gallery Images</label>
        <p class="text-xs text-slate-400 mb-2">Select multiple images to add to the recipe gallery</p>

        <!-- Hidden file input -->
        <input
          type="file"
          ref="galleryInput"
          multiple
          accept="image/*"
          class="hidden"
          @change="handleGalleryFiles"
        />

        <!-- Upload button -->
        <button
          type="button"
          @click="$refs.galleryInput.click()"
          class="inline-flex items-center gap-2 px-4 py-2 border-2 border-dashed border-slate-300 rounded-md hover:border-[#E1B137] hover:bg-slate-50 transition-colors duration-200"
        >
          <i class="fa-solid fa-plus text-[#E1B137]"></i>
          <span class="text-sm text-slate-600">Select Multiple Images</span>
        </button>

        <!-- Preview of selected files -->
        <div v-if="form.gallery_images && form.gallery_images.length > 0" class="mt-3">
          <p class="text-xs text-slate-500 mb-2">{{ form.gallery_images.length }} image(s) selected</p>
          <div class="grid grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-3">
            <div v-for="(file, index) in form.gallery_images" :key="index"
              class="relative border rounded-md overflow-hidden group bg-slate-50 aspect-square">
              <img :src="URL.createObjectURL(file)" alt="Gallery preview"
                class="w-full h-full object-cover" />
              <button
                @click="removeGalleryImage(index)"
                class="absolute top-1 right-1 w-6 h-6 bg-red-500 text-white rounded-full flex items-center justify-center text-xs opacity-0 group-hover:opacity-100 transition-opacity hover:bg-red-600"
              >
                <i class="fa-solid fa-xmark"></i>
              </button>
            </div>
          </div>
        </div>
        <div v-if="form.errors.gallery_images" class="text-red-500 text-xs mt-1">{{ form.errors.gallery_images }}</div>
      </div>

      <div class="flex flex-wrap items-center gap-6">
        <label class="inline-flex items-center">
          <input v-model="form.is_featured" type="checkbox" class="rounded border-gray-300 text-[#E1B137] shadow-sm focus:ring-[#E1B137]" />
          <span class="ml-2 text-sm text-gray-700">Featured</span>
        </label>
        <label class="inline-flex items-center">
          <input v-model="form.is_active" type="checkbox" class="rounded border-gray-300 text-[#E1B137] shadow-sm focus:ring-[#E1B137]" checked />
          <span class="ml-2 text-sm text-gray-700">Active</span>
        </label>
      </div>

      <div class="flex justify-end gap-4 pt-4 border-t border-slate-200">
        <Link href="/admin/ayurvedic-recipes" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300 transition">Cancel</Link>
        <button type="submit" class="px-4 py-2 bg-[#2b4b58] text-white rounded hover:bg-[#1e3540] transition disabled:opacity-50" :disabled="form.processing">
          {{ form.processing ? 'Saving...' : 'Create Recipe' }}
        </button>
      </div>
    </form>
  </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { Link, useForm } from '@inertiajs/vue3'
import FileUpload from '@/Components/Admin/FileUpload.vue'
import { ref } from 'vue'

const galleryInput = ref(null)

const form = useForm({
  title: '',
  description: '',
  ingredients: '',
  instructions: '',
  image: null,
  video_file: null,
  video_url: '',
  category: '',
  gallery_images: [], // 👈 This will hold multiple file objects
  is_featured: false,
  is_active: true,
})

const handleGalleryFiles = (event) => {
  const files = Array.from(event.target.files)
  form.gallery_images.push(...files)
  event.target.value = '' // Reset so the same files can be re-selected
}

const removeGalleryImage = (index) => {
  form.gallery_images.splice(index, 1)
}

const submit = () => {
  form.post('/admin/ayurvedic-recipes', {
    forceFormData: true,
  })
}
</script>