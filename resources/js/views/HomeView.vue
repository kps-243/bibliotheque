<template>
    <DefaultLayout>
      <div class="min-h-screen bg-amber-50 text-gray-800 px-6 py-10">
        <!-- Titre principal -->
        <header class="mb-12">
          <h1 class="text-4xl font-bold text-amber-600">Gestion de Bibliothèque</h1>
          <p class="mt-2 text-lg text-gray-600">Suivez vos livres et auteurs en toute simplicité</p>
        </header>
  
        <!-- Statistiques -->
        <section class="mb-12">
          <h2 class="text-2xl font-semibold text-gray-700 mb-6">📊 Statistiques</h2>
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white rounded-2xl shadow p-6 text-center border border-amber-100">
              <p class="text-gray-500">Auteurs</p>
              <p class="text-4xl font-bold text-amber-600">{{ auteurs.length }}</p>
            </div>
            <div class="bg-white rounded-2xl shadow p-6 text-center border border-amber-100">
              <p class="text-gray-500">Livres</p>
              <p class="text-4xl font-bold text-amber-600">{{ livres.length }}</p>
            </div>
            <div class="bg-white rounded-2xl shadow p-6 text-center border border-amber-100">
              <p class="text-gray-500">Prix moyen</p>
              <p class="text-3xl font-semibold text-amber-600">{{ prixMoyen }} €</p>
            </div>
            <div class="bg-white rounded-2xl shadow p-6 text-center border border-amber-100">
              <p class="text-gray-500">Auteur vedette</p>
              <p class="text-xl font-semibold text-amber-600">{{ topAuteur }}</p>
            </div>
          </div>
        </section>
  
        <!-- Boutons d’action -->
        <section>
          <h2 class="text-2xl font-semibold text-gray-700 mb-6">🔗 Accès rapide</h2>
          <div class="flex flex-wrap gap-4">
            <RouterLink
              to="/auteurs"
              class="inline-flex items-center gap-2 bg-amber-500 hover:bg-amber-600 text-white px-6 py-3 rounded-lg text-sm font-medium shadow transition"
            >
              ➕ Ajouter un auteur
            </RouterLink>
            <RouterLink
              to="/livres"
              class="inline-flex items-center gap-2 bg-amber-500 hover:bg-amber-600 text-white px-6 py-3 rounded-lg text-sm font-medium shadow transition"
            >
              ➕ Ajouter un livre
            </RouterLink>
          </div>
        </section>
      </div>
    </DefaultLayout>
  </template>
  
  <script setup>
  import { ref, onMounted, computed } from 'vue'
  import axios from 'axios'
  import DefaultLayout from '@/layouts/DefaultLayout.vue'
  
  const auteurs = ref([])
  const livres = ref([])
  
  onMounted(async () => {
    const [resAuteurs, resLivres] = await Promise.all([
      axios.get('/api/auteurs'),
      axios.get('/api/livres'),
    ])
    auteurs.value = resAuteurs.data
    livres.value = resLivres.data
  })
  
  const prixMoyen = computed(() => {
    if (!livres.value.length) return 0
    const total = livres.value.reduce((sum, livre) => sum + parseFloat(livre.prix), 0)
    return (total / livres.value.length).toFixed(2)
  })
  
  const topAuteur = computed(() => {
    if (!livres.value.length) return 'N/A'
    const counts = livres.value.reduce((acc, livre) => {
      const id = livre.auteur_id
      acc[id] = (acc[id] || 0) + 1
      return acc
    }, {})
    const maxId = Object.entries(counts).sort((a, b) => b[1] - a[1])[0]?.[0]
    const auteur = auteurs.value.find(a => a.id == maxId)
    return auteur ? `${auteur.prenom} ${auteur.nom}` : 'Inconnu'
  })
  </script>
  