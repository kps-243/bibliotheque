<script>
import axios from 'axios'

export default {
  name: 'LivreIndex',
  data() {
    return {
      livres: []
    }
  },
  async mounted() {
    try {
      const response = await axios.get('/api/livres')
      this.livres = response.data
    } catch (error) {
      console.error('Erreur lors du chargement des livres :', error)
    }
  },
  methods: {
    async supprimerLivre(id) {
      if (confirm('Voulez-vous vraiment supprimer ce livre ?')) {
        try {
          await axios.delete(`/api/livres/${id}`)
          this.livres = this.livres.filter(livre => livre.id !== id)
        } catch (error) {
          console.error('Erreur lors de la suppression du livre :', error)
          alert('Une erreur est survenue.')
        }
      }
    }
  }
}
</script>

<script setup>
import DefaultLayout from '@/layouts/DefaultLayout.vue'
</script>

<template>
  <DefaultLayout>
    <div class="bg-amber-50 min-h-screen p-8">
      <div class="max-w-5xl mx-auto bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-bold mb-6 text-amber-900">Liste des livres</h2>

        <div v-if="livres.length" class="space-y-4">
          <div
            v-for="livre in livres"
            :key="livre.id"
            class="bg-amber-100 p-4 rounded border border-amber-200 shadow-sm"
          >
            <div class="flex justify-between items-center">
              <div>
                <p class="text-lg font-semibold text-amber-800">{{ livre.titre }}</p>
                <p class="text-sm text-amber-700">
                  Auteur : {{ livre.auteur.nom }} {{ livre.auteur.prenom }}
                </p>
                <p class="text-sm text-amber-700">Prix : {{ livre.prix }} €</p>
                <p class="text-sm text-amber-700">
                  Publié le : {{ livre.date_publication }}
                </p>
              </div>
              <div class="flex gap-2">
                <router-link
                  :to="`/livres/${livre.id}/modifier`"
                  class="bg-amber-600 text-white px-4 py-2 rounded hover:bg-amber-700"
                >
                  Modifier
                </router-link>
                <button
                  @click="supprimerLivre(livre.id)"
                  class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700"
                >
                  Supprimer
                </button>
              </div>
            </div>
          </div>
        </div>

        <p v-else class="text-amber-700">Aucun livre trouvé.</p>

        <div class="mt-6">
          <router-link
            to="/livres/ajouter"
            class="inline-block bg-amber-700 text-white px-4 py-2 rounded hover:bg-amber-800"
          >
            Ajouter un livre
          </router-link>
        </div>
      </div>
    </div>
  </DefaultLayout>
</template>
