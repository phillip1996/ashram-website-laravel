<template>
  <AdminLayout>
    <h1 class="text-2xl font-serif text-[#2b4b58] mb-6">Edit Ayurvedic Recipe</h1>

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

      <!-- Current Image -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Current Image</label>
        <div v-if="recipe.image_url" class="flex items-center gap-4 p-3 border rounded-md bg-slate-50">
          <img :src="recipe.image_url" :alt="recipe.title" class="w-20 h-20 object-cover rounded-md border border-slate-200" />
          <span class="text-sm text-slate-500 truncate">{{ recipe.image }}</span>
        </div>
        <p v-else class="text-sm text-slate-400">No image uploaded</p>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Replace Image</label>
        <FileUpload v-model="form.image" accept="image/*" :max-size="5" class="mt-1" />
        <p class="text-xs text-slate-400 mt-1">Upload a JPG, PNG, or WebP image (max 5MB)</p>
        <div v-if="form.errors.image" class="text-red-500 text-xs">{{ form.errors.image }}</div>

        <!-- New image preview -->
        <div v-if="imagePreviewUrl" class="mt-3 flex items-center gap-4 p-3 border rounded-md bg-slate-50">
          <img :src="imagePreviewUrl" alt="New image preview" class="w-20 h-20 object-cover rounded-md border border-slate-200" />
          <div class="flex-1">
            <p class="text-xs text-slate-500">Preview of new image</p>
            <p class="text-xs text-slate-400 truncate">{{ form.image?.name }}</p>
          </div>
          <button type="button" @click="clearNewImage" class="text-slate-400 hover:text-red-500 transition" title="Cancel replacement">
            <i class="fa-solid fa-xmark"></i>
          </button>
        </div>
      </div>

      <!-- Current Video -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Current Video</label>
        <div v-if="recipe.video_file_url" class="flex items-center gap-4 p-3 border rounded-md bg-slate-50">
          <video :src="recipe.video_file_url" controls class="w-40 h-24 object-cover rounded-md border border-slate-200" />
          <span class="text-sm text-slate-500 truncate">{{ recipe.video_file }}</span>
        </div>
        <div v-else-if="recipe.video_url" class="p-3 border rounded-md bg-slate-50">
          <p class="text-sm text-slate-500">External video: <a :href="recipe.video_url" target="_blank" class="text-[#E1B137] hover:underline">{{ recipe.video_url }}</a></p>
        </div>
        <p v-else class="text-sm text-slate-400">No video uploaded</p>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Replace/Add Video File</label>
        <FileUpload v-model="form.video_file" accept="video/*" :max-size="50" class="mt-1" />
        <p class="text-xs text-slate-400 mt-1">Upload MP4, WebM, or OGG (max 50MB)</p>
        <div v-if="form.errors.video_file" class="text-red-500 text-xs">{{ form.errors.video_file }}</div>

        <!-- New video preview -->
        <div v-if="videoPreviewUrl" class="mt-3 flex items-center gap-4 p-3 border rounded-md bg-slate-50">
          <video :src="videoPreviewUrl" controls class="w-40 h-24 object-cover rounded-md border border-slate-200" />
          <div class="flex-1">
            <p class="text-xs text-slate-500">Preview of new video</p>
            <p class="text-xs text-slate-400 truncate">{{ form.video_file?.name }}</p>
          </div>
          <button type="button" @click="clearNewVideo" class="text-slate-400 hover:text-red-500 transition" title="Cancel replacement">
            <i class="fa-solid fa-xmark"></i>
          </button>
        </div>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">OR Update Video URL</label>
        <input v-model="form.video_url" type="text" placeholder="https://www.youtube.com/watch?v=..." class="w-full border-gray-300 rounded-md shadow-sm focus:ring-[#E1B137] focus:border-[#E1B137]" />
        <div v-if="form.errors.video_url" class="text-red-500 text-xs">{{ form.errors.video_url }}</div>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Category</label>
        <input v-model="form.category" type="text" placeholder="e.g. Soup, Tea, Tonic, Meal" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-[#E1B137] focus:border-[#E1B137]" />
        <div v-if="form.errors.category" class="text-red-500 text-xs">{{ form.errors.category }}</div>
      </div>

      <!-- =========================================================
           GALLERY SECTION – Existing images + upload more
      ========================================================= -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Gallery Images</label>

        <!-- ── Existing Gallery ── -->
        <div v-if="existingGalleryImages.length > 0" class="mb-4">
          <p class="text-xs text-slate-500 mb-2">Existing images</p>
          <div class="grid grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-3">
            <div v-for="item in existingGalleryImages" :key="item.id"
              class="relative border rounded-md overflow-hidden group bg-slate-50 aspect-square">
              <img :src="item.image_url" :alt="item.caption || 'Gallery image'"
                class="w-full h-full object-cover" />
              <button
                type="button"
                @click="removeExistingGalleryImage(item.id)"
                class="absolute top-1 right-1 w-6 h-6 bg-red-500 text-white rounded-full flex items-center justify-center text-xs opacity-0 group-hover:opacity-100 transition-opacity hover:bg-red-600"
                title="Remove image"
              >
                <i class="fa-solid fa-xmark"></i>
              </button>
              <div v-if="item.caption" class="absolute bottom-0 left-0 right-0 bg-black/50 text-white text-[10px] px-1.5 py-0.5 truncate">
                {{ item.caption }}
              </div>
            </div>
          </div>
        </div>
        <p v-else class="text-sm text-slate-400 mb-2">No gallery images yet</p>

        <!-- ── Upload New Gallery Images ── -->
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
          @click="galleryInput.click()"
          class="inline-flex items-center gap-2 px-4 py-2 border-2 border-dashed border-slate-300 rounded-md hover:border-[#E1B137] hover:bg-slate-50 transition-colors duration-200"
        >
          <i class="fa-solid fa-plus text-[#E1B137]"></i>
          <span class="text-sm text-slate-600">Select Multiple Images</span>
        </button>

        <!-- Preview of newly selected files -->
        <div v-if="form.gallery_images && form.gallery_images.length > 0" class="mt-3">
          <p class="text-xs text-slate-500 mb-2">{{ form.gallery_images.length }} new image(s) selected</p>
          <div class="grid grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-3">
            <div v-for="(file, index) in form.gallery_images" :key="index"
              class="relative border rounded-md overflow-hidden group bg-slate-50 aspect-square">
              <img :src="galleryPreviewUrls[index]" alt="Gallery preview"
                class="w-full h-full object-cover" />
              <button
                type="button"
                @click="removeNewGalleryImage(index)"
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
          <input v-model="form.is_active" type="checkbox" class="rounded border-gray-300 text-[#E1B137] shadow-sm focus:ring-[#E1B137]" />
          <span class="ml-2 text-sm text-gray-700">Active</span>
        </label>
      </div>

      <div class="flex justify-end gap-4 pt-4 border-t border-slate-200">
        <Link href="/admin/ayurvedic-recipes" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300 transition">Cancel</Link>
        <button type="submit" class="px-4 py-2 bg-[#2b4b58] text-white rounded hover:bg-[#1e3540] transition disabled:opacity-50" :disabled="form.processing">
          {{ form.processing ? 'Updating...' : 'Update Recipe' }}
        </button>
      </div>
    </form>
  </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { Link, useForm } from '@inertiajs/vue3'
import FileUpload from '@/Components/Admin/FileUpload.vue'
import { ref, watch, onBeforeUnmount } from 'vue'
import { useToast } from '@/Composables/useToast'

const props = defineProps({ recipe: Object })
const { showToast } = useToast()

const galleryInput = ref(null)
const galleryIdsToDelete = ref([])

// ── Track existing gallery images ──
const existingGalleryImages = ref([...(props.recipe.gallery_images || [])])

// ── Form data ──
const form = useForm({
  title: props.recipe.title,
  description: props.recipe.description,
  ingredients: props.recipe.ingredients,
  instructions: props.recipe.instructions,
  image: null,
  video_file: null,
  video_url: props.recipe.video_url || '',
  category: props.recipe.category || '',
  gallery_images: [],
  delete_gallery_ids: '',
  is_featured: !!props.recipe.is_featured,
  is_active: !!props.recipe.is_active,
})

// ─── Existing gallery removal ───
const removeExistingGalleryImage = (id) => {
  galleryIdsToDelete.value.push(id)
  const index = existingGalleryImages.value.findIndex(item => item.id === id)
  if (index > -1) {
    existingGalleryImages.value.splice(index, 1)
  }
}

// ─── New gallery uploads ───
const handleGalleryFiles = (event) => {
  const files = Array.from(event.target.files)
  form.gallery_images.push(...files)
  event.target.value = ''
}

const removeNewGalleryImage = (index) => {
  form.gallery_images.splice(index, 1)
}

// ─── Preview URLs ───
const galleryPreviewUrls = ref([])
const imagePreviewUrl = ref(null)
const videoPreviewUrl = ref(null)

watch(
  () => form.gallery_images.length,
  () => {
    galleryPreviewUrls.value.forEach(url => URL.revokeObjectURL(url))
    galleryPreviewUrls.value = form.gallery_images.map(file => URL.createObjectURL(file))
  }
)

watch(() => form.image, (newFile) => {
  if (imagePreviewUrl.value) URL.revokeObjectURL(imagePreviewUrl.value)
  imagePreviewUrl.value = newFile ? URL.createObjectURL(newFile) : null
})

watch(() => form.video_file, (newFile) => {
  if (videoPreviewUrl.value) URL.revokeObjectURL(videoPreviewUrl.value)
  videoPreviewUrl.value = newFile ? URL.createObjectURL(newFile) : null
})

const clearNewImage = () => { 
  form.image = null 
  imagePreviewUrl.value = null
}

const clearNewVideo = () => { 
  form.video_file = null 
  videoPreviewUrl.value = null
}

// ─── Cleanup preview URLs ───
onBeforeUnmount(() => {
  if (imagePreviewUrl.value) URL.revokeObjectURL(imagePreviewUrl.value)
  if (videoPreviewUrl.value) URL.revokeObjectURL(videoPreviewUrl.value)
  galleryPreviewUrls.value.forEach(url => URL.revokeObjectURL(url))
})

// ─── 🔥 FIXED: Submit with proper image handling ───
const submit = () => {
  if (galleryIdsToDelete.value.length > 0) {
    form.delete_gallery_ids = galleryIdsToDelete.value.join(',')
  }

  // 🔥 CRITICAL FIX: Only include image if a new one was uploaded
  // This prevents the existing image from being overwritten with null
  const submitData = {
    title: form.title,
    description: form.description,
    ingredients: form.ingredients,
    instructions: form.instructions,
    video_url: form.video_url,
    category: form.category,
    is_featured: form.is_featured,
    is_active: form.is_active,
    delete_gallery_ids: form.delete_gallery_ids,
  }

  // Only add image if a new file was selected
  if (form.image && form.image instanceof File) {
    submitData.image = form.image
  }

  // Only add video_file if a new file was selected
  if (form.video_file && form.video_file instanceof File) {
    submitData.video_file = form.video_file
  }

  // Only add gallery_images if there are new files
  if (form.gallery_images && form.gallery_images.length > 0) {
    submitData.gallery_images = form.gallery_images
  }

  // Use transform to send the data with _method: 'put'
  const transformedForm = useForm(submitData)
  
  transformedForm
    .transform((data) => ({
      ...data,
      _method: 'put',
    }))
    .post(`/admin/ayurvedic-recipes/${props.recipe.slug}`, {
      forceFormData: true,
      onSuccess: () => {
        showToast('Recipe updated successfully!', 'success')
      },
      onError: (errors) => {
        console.error('Validation errors:', errors)
        if (errors.title) {
          showToast('Please fix the validation errors.', 'error')
        } else {
          showToast('Something went wrong. Please try again.', 'error')
        }
      }
    })
}
</script>