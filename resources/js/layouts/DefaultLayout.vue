<template>
    <div class="min-h-screen bg-amber-50 text-amber-900">
      <!-- Header -->
      <header class="bg-amber-700 text-white py-4 shadow-md">
        <div class="max-w-7xl mx-auto px-4 flex justify-between items-center">
            <RouterLink
              to="/"
              class="hover:underline hover:text-amber-200 transition"
            >Ma Bibliothèque</RouterLink>          
            <nav class="space-x-4">
            <RouterLink
              to="/auteurs"
              class="hover:underline hover:text-amber-200 transition"
            >
              Auteurs
            </RouterLink>
            <RouterLink
              to="/livres"
              class="hover:underline hover:text-amber-200 transition"
            >
              Livres
            </RouterLink>
          </nav>
        </div>
      </header>
  
      <!-- Main content -->
      <main class="py-8 px-4 max-w-7xl mx-auto">
        <slot />
      </main>
  
      <!-- Footer -->
      <footer class="bg-amber-100 text-center py-4 text-sm mt-10 text-amber-600">
        © {{ new Date().getFullYear() }} Ma Bibliothèque. Tous droits réservés.
      </footer>
    </div>
  </template>
  
  <script setup>
  // rien à ajouter ici
  </script>
  