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
  import LivreComponent from '@/components/LivreComponent.vue'

</script>

<template>
  <DefaultLayout>
    <div class="bg-amber-50 min-h-screen p-8">
      <div class="max-w-5xl mx-auto bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-bold mb-6 text-amber-900">Liste des livres</h2>

        <div v-if="livres.length" class="space-y-4">
          <LivreComponent
            v-for="livre in livres"
            :key="livre.id"
            :livre="livre"
            @supprimer="supprimerLivre"
          />
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
