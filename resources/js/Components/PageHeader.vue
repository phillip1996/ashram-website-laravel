<template>
  <section class="relative h-[60vh] min-h-[500px] overflow-hidden">
    <!-- Background Image -->
    <img 
      :src="image" 
      :alt="title"
      class="absolute inset-0 w-full h-full object-cover"
    />
    
    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/40"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>
    
    <!-- Content -->
    <div class="relative z-10 container mx-auto px-6 h-full flex items-end pb-20">
      <div class="max-w-3xl">
        <div class="flex items-center gap-4 mb-4">
          <div class="w-12 h-px bg-[#E1B137]"></div>
          <span class="text-[#E1B137] text-[10px] font-bold uppercase tracking-[0.45em]">{{ category }}</span>
        </div>
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-serif text-white leading-tight">
          <slot name="title">{{ title }}</slot>
        </h1>
        <p v-if="subtitle" class="text-white/70 text-lg mt-4 max-w-2xl">{{ subtitle }}</p>
      </div>
    </div>
  </section>
</template>

<script setup>
defineProps({
  image: { type: String, required: true },
  title: { type: String, required: true },
  category: { type: String, default: '' },
  subtitle: { type: String, default: '' }
})
</script>