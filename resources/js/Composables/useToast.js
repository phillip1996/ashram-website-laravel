import { ref } from 'vue';

const toastState = ref({
  message: '',
  type: 'success',
  visible: false,
});

export const useToast = () => {
  const showToast = (message, type = 'success', duration = 5000) => {
    toastState.value.message = message;
    toastState.value.type = type;
    toastState.value.visible = true;
    setTimeout(() => {
      toastState.value.visible = false;
    }, duration);
  };

  const hideToast = () => {
    toastState.value.visible = false;
  };

  return {
    toastState,
    showToast,
    hideToast,
  };
};