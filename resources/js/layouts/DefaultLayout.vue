<template>
    <div class="min-h-screen bg-amber-50 text-amber-900">
      <Header />
      <main class="py-8 px-4 max-w-7xl mx-auto">
        <slot />
      </main>
      <Footer />
    </div>
  </template>
  
  <script setup>
  import Header from '@/components/Header.vue'
  import Footer from '@/components/Footer.vue'
  </script>
  