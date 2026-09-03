<template>
  <div class="file-upload">
    <label
      class="relative block w-full p-6 border-2 border-dashed rounded-lg cursor-pointer transition-colors"
      :class="[
        isDragging ? 'border-[#E1B137] bg-[#E1B137]/5' : 'border-slate-300 hover:border-[#E1B137]',
        hasFile ? 'border-green-500 bg-green-50' : ''
      ]"
      @dragover.prevent="isDragging = true"
      @dragleave.prevent="isDragging = false"
      @drop.prevent="handleDrop"
    >
      <input
        type="file"
        :accept="accept"
        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
        @change="handleFileChange"
      />

      <!-- Preview / Placeholder -->
      <div v-if="!file && !previewUrl" class="text-center py-4">
        <i class="fa-solid fa-cloud-upload-alt text-3xl text-slate-300 mb-2 block"></i>
        <p class="text-sm text-slate-500">
          <span class="font-semibold text-[#2b4b58]">Click to upload</span> or drag &amp; drop
        </p>
        <p class="text-xs text-slate-400 mt-1">{{ accept }}</p>
        <p v-if="maxSize" class="text-xs text-slate-400">Max size: {{ maxSize }} MB</p>
      </div>

      <div v-else class="flex items-center gap-4">
        <!-- Image preview -->
        <img
          v-if="isImage"
          :src="previewUrl"
          alt="Preview"
          class="w-16 h-16 object-cover rounded-md border border-slate-200"
        />
        <!-- Audio preview -->
        <div v-else-if="isAudio" class="w-16 h-16 bg-slate-100 rounded-md flex items-center justify-center">
          <i class="fa-solid fa-music text-2xl text-slate-400"></i>
        </div>
        <!-- File info -->
        <div class="flex-1 min-w-0">
          <p class="text-sm font-medium text-[#2b4b58] truncate">{{ file.name }}</p>
          <p class="text-xs text-slate-400">{{ (file.size / 1024).toFixed(1) }} KB</p>
        </div>
        <button
          type="button"
          @click.stop="clearFile"
          class="text-slate-400 hover:text-red-500 transition"
        >
          <i class="fa-solid fa-times"></i>
        </button>
      </div>
    </label>
    <p v-if="error" class="text-xs text-red-500 mt-1">{{ error }}</p>
  </div>
</template>

<script setup>
import { ref, computed, watch } from 'vue'

const props = defineProps({
  modelValue: {
    type: [File, null],
    default: null,
  },
  accept: {
    type: String,
    default: 'image/*, audio/*',
  },
  maxSize: {
    type: Number,
    default: 10, // MB
  },
})

const emit = defineEmits(['update:modelValue'])

const file = ref(null)
const previewUrl = ref('')
const error = ref('')
const isDragging = ref(false)

const hasFile = computed(() => !!file.value)
const isImage = computed(() => file.value && file.value.type.startsWith('image/'))
const isAudio = computed(() => file.value && file.value.type.startsWith('audio/'))

const handleFileChange = (e) => {
  const selected = e.target.files?.[0]
  if (selected) processFile(selected)
}

const handleDrop = (e) => {
  isDragging.value = false
  const dropped = e.dataTransfer.files?.[0]
  if (dropped) processFile(dropped)
}

const processFile = (f) => {
  error.value = ''

  // Validate type
  const types = props.accept.split(',').map(t => t.trim())
  const isTypeValid = types.some(type => {
    if (type.endsWith('/*')) {
      const base = type.replace('/*', '')
      return f.type.startsWith(base)
    }
    return f.type === type
  })
  if (!isTypeValid) {
    error.value = `File type not allowed. Please upload ${props.accept}`
    return
  }

  // Validate size
  const maxBytes = props.maxSize * 1024 * 1024
  if (f.size > maxBytes) {
    error.value = `File too large. Max size is ${props.maxSize} MB.`
    return
  }

  file.value = f
  previewUrl.value = URL.createObjectURL(f)
  emit('update:modelValue', f)
}

const clearFile = () => {
  file.value = null
  previewUrl.value = ''
  error.value = ''
  emit('update:modelValue', null)
}

watch(() => props.modelValue, (newVal) => {
  if (newVal === null && file.value) {
    clearFile()
  }
}, { immediate: true })
</script>