<template>
  <AdminLayout>
    <h1 class="text-2xl font-serif text-[#2b4b58] mb-6">Edit Article</h1>

    <form @submit.prevent="submit" class="bg-white p-6 rounded shadow space-y-6 max-w-3xl">

      <!-- ══════════════════════════════════════════════════
           BASIC INFORMATION
      ══════════════════════════════════════════════════════ -->

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

        <!-- Category -->
        <div>
          <label class="block text-sm font-medium text-gray-700">Category</label>
          <input
            v-model="form.category"
            class="w-full border-gray-300 rounded-md shadow-sm focus:ring-[#E1B137] focus:border-[#E1B137]"
          />
          <div v-if="form.errors.category" class="text-red-500 text-xs mt-1">{{ form.errors.category }}</div>
        </div>

        <!-- Date -->
        <div>
          <label class="block text-sm font-medium text-gray-700">Date</label>
          <input
            v-model="form.date"
            type="date"
            class="w-full border-gray-300 rounded-md shadow-sm focus:ring-[#E1B137] focus:border-[#E1B137]"
          />
          <div v-if="form.errors.date" class="text-red-500 text-xs mt-1">{{ form.errors.date }}</div>
        </div>

        <!-- Description (WYSIWYG) -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
          <QuillEditor v-model="form.description" :error="form.errors.description" />
        </div>

        <!-- Read Time -->
        <div>
          <label class="block text-sm font-medium text-gray-700">Read Time</label>
          <input
            v-model="form.read_time"
            placeholder="e.g. 5 min read"
            class="w-full border-gray-300 rounded-md shadow-sm focus:ring-[#E1B137] focus:border-[#E1B137]"
          />
          <div v-if="form.errors.read_time" class="text-red-500 text-xs mt-1">{{ form.errors.read_time }}</div>
        </div>

      </div>

      <!-- ══════════════════════════════════════════════════
           IMAGE – current + replace
      ══════════════════════════════════════════════════════ -->

      <div class="border-t border-slate-200 pt-6">
        <label class="block text-sm font-medium text-gray-700 mb-1">Current Image</label>
        <div v-if="article.image" class="flex items-center gap-3 p-3 border rounded-md bg-slate-50 mb-3">
          <img
            :src="article.image"
            :alt="article.title"
            class="w-16 h-16 object-cover rounded-md border border-slate-200"
          />
          <span class="text-sm text-slate-500 truncate">{{ article.image }}</span>
        </div>
        <p v-else class="text-sm text-slate-400 mb-3">No image set</p>

        <div>
          <label class="block text-sm font-medium text-gray-700">Replace Image</label>
          <p class="text-xs text-slate-400 mb-1">Upload a new image to replace the current one</p>
          <FileUpload
            v-model="form.image_file"
            accept="image/*"
            :max-size="5"
          />
          <div v-if="form.errors.image" class="text-red-500 text-xs mt-1">{{ form.errors.image }}</div>
        </div>
      </div>

      <!-- ══════════════════════════════════════════════════
           LINK (optional)
      ══════════════════════════════════════════════════════ -->

      <div>
        <label class="block text-sm font-medium text-gray-700">Link (optional)</label>
        <input
          v-model="form.link"
          type="text"
          placeholder="/blog/featured"
          class="w-full border-gray-300 rounded-md shadow-sm focus:ring-[#E1B137] focus:border-[#E1B137]"
        />
        <div v-if="form.errors.link" class="text-red-500 text-xs mt-1">{{ form.errors.link }}</div>
      </div>

      <!-- ══════════════════════════════════════════════════
           FEATURED POINTS PREVIEW
      ══════════════════════════════════════════════════════ -->

      <div class="border-t border-slate-200 pt-6">
        <label class="block text-sm font-medium text-gray-700 mb-1">Featured Points Preview</label>
        <p class="text-xs text-slate-400 mb-3">These points will appear as a bullet list in the featured article</p>
        <div class="bg-[#f8f7f4] border border-slate-200 rounded-lg p-4 space-y-2">
          <div v-for="(point, index) in featuredPoints" :key="index" class="flex items-start gap-2.5 text-slate-600 text-sm">
            <div class="w-1.5 h-1.5 bg-[#E1B137] mt-1.5 shrink-0"></div>
            {{ point }}
          </div>
          <div v-if="featuredPoints.length === 0" class="text-slate-400 text-sm italic">
            No featured points set. Add them in <code class="text-xs bg-slate-200 px-1 py-0.5 rounded">config/ashram.php</code>
          </div>
        </div>
        <div class="text-xs text-slate-400 mt-2">
          <i class="fa-solid fa-info-circle mr-1"></i>
          Manage these points in <code class="bg-slate-100 px-1 py-0.5 rounded">config/ashram.php</code> under <strong>'featured_points'</strong>
        </div>
      </div>

      <!-- ══════════════════════════════════════════════════
           STATUS & FEATURED
      ══════════════════════════════════════════════════════ -->

      <div class="flex flex-wrap items-center gap-6">
        <label class="inline-flex items-center">
          <input
            v-model="form.is_active"
            type="checkbox"
            class="rounded border-gray-300 text-[#E1B137] shadow-sm focus:ring-[#E1B137]"
          />
          <span class="ml-2 text-sm text-gray-700">Active</span>
        </label>
        <label class="inline-flex items-center">
          <input
            v-model="form.is_featured"
            type="checkbox"
            class="rounded border-gray-300 text-[#E1B137] shadow-sm focus:ring-[#E1B137]"
          />
          <span class="ml-2 text-sm text-gray-700">Featured</span>
        </label>
      </div>

      <!-- ══════════════════════════════════════════════════
           ACTIONS
      ══════════════════════════════════════════════════════ -->

      <div class="flex justify-end gap-4 pt-4 border-t border-slate-200">
        <Link href="/admin/articles" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300 transition">
          Cancel
        </Link>
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
import QuillEditor from '@/Components/Admin/QuillEditor.vue'

const props = defineProps({ article: Object })

const form = useForm({
  title: props.article.title,
  category: props.article.category,
  date: props.article.date,
  description: props.article.description,
  image: null,
  image_file: null,
  link: props.article.link,
  read_time: props.article.read_time,
  is_active: !!props.article.is_active,
  is_featured: !!props.article.is_featured,
})

const submit = () => {
  if (form.image_file) {
    form.image = form.image_file
  }
  form.put(`/admin/articles/${props.article.id}`)
}

// ── Featured points from config (for preview) ──
const featuredPoints = [
  'Ceremonial rituals blending ancient wisdom with modern consciousness',
  'Community gathering of seekers and environmental stewards',
  'Blessings from spiritual leaders across traditions',
]
</script>