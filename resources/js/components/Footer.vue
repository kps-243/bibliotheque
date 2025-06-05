<template>
    <footer class="bg-amber-100 text-center py-4 text-sm mt-10 text-amber-600">
      © {{ year }} Ma Bibliothèque. Tous droits réservés.
    </footer>
  </template>
  
  <script setup>
  const year = new Date().getFullYear()
  </script>
  