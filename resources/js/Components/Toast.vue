<template>
  <transition
    enter-active-class="transition ease-out duration-300 transform"
    enter-from-class="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
    enter-to-class="translate-y-0 opacity-100 sm:translate-x-0"
    leave-active-class="transition ease-in duration-100"
    leave-from-class="opacity-100"
    leave-to-class="opacity-0"
  >
    <div
      v-if="visible"
      class="fixed top-4 right-4 z-50 max-w-sm w-full bg-white rounded-lg shadow-lg border-l-4"
      :class="borderColor"
      role="alert"
    >
      <div class="flex items-center p-4">
        <div class="flex-shrink-0">
          <i :class="iconClass" class="text-xl"></i>
        </div>
        <div class="ml-3 flex-1">
          <p class="text-sm font-medium text-gray-900">{{ message }}</p>
        </div>
        <button
          @click="close"
          class="ml-4 flex-shrink-0 text-gray-400 hover:text-gray-600 transition"
        >
          <i class="fa-solid fa-times"></i>
        </button>
      </div>
    </div>
  </transition>
</template>

<script setup>
import { computed } from 'vue';

const props = defineProps({
  message: { type: String, default: '' },
  type: { type: String, default: 'success' },
  duration: { type: Number, default: 5000 },
  visible: { type: Boolean, default: false },
});

const emit = defineEmits(['update:visible']);

const borderColor = computed(() => ({
  success: 'border-green-500',
  error: 'border-red-500',
  warning: 'border-yellow-500',
  info: 'border-blue-500',
}[props.type] || 'border-gray-500'));

const iconClass = computed(() => ({
  success: 'fa-solid fa-check-circle text-green-500',
  error: 'fa-solid fa-exclamation-circle text-red-500',
  warning: 'fa-solid fa-exclamation-triangle text-yellow-500',
  info: 'fa-solid fa-info-circle text-blue-500',
}[props.type] || 'fa-solid fa-circle text-gray-500'));

const close = () => {
  emit('update:visible', false);
};
</script>