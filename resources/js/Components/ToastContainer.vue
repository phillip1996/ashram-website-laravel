<template>
  <Toast
    :message="toastState.message"
    :type="toastState.type"
    :duration="5000"
    v-model:visible="toastState.visible"
  />
</template>

<script setup>
import Toast from './Toast.vue';
import { useToast } from '@/Composables/useToast';

const { toastState } = useToast();
</script>