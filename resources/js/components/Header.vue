<template>
    <header class="bg-amber-700 text-white py-4 shadow-md">
      <div class="max-w-7xl mx-auto px-4 flex justify-between items-center">
        <RouterLink
          to="/"
          class="hover:underline hover:text-amber-200 transition"
        >
          Ma Bibliothèque
        </RouterLink>
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
  </template>
  
  <script setup>
  // rien à ajouter ici
  </script>
  