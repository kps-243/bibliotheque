<script>
import axios from 'axios'

export default {
  name: 'AuteurIndex',
  data() {
    return {
      auteurs: []
    }
  },
  async mounted() {
    try {
      const response = await axios.get('/api/auteurs')
      this.auteurs = response.data
    } catch (error) {
      console.error('Erreur lors du chargement des auteurs :', error)
    }
  },
  methods: {
    async supprimerAuteur(id) {
      if (confirm('Voulez-vous vraiment supprimer cet auteur ?')) {
        try {
          await axios.delete(`/api/auteurs/${id}`)
          this.auteurs = this.auteurs.filter(auteur => auteur.id !== id)
        } catch (error) {
          console.error('Erreur lors de la suppression de l\'auteur :', error)
          alert("Impossible de supprimer cet auteur (peut-être lié à un livre).")
        }
      }
    }
  }
}
</script>

<script setup>
    import DefaultLayout from '@/layouts/DefaultLayout.vue'
    import AuteurComponent from '@/components/AuteurComponent.vue'
</script>

<template>
  <DefaultLayout>
    <div class="bg-amber-50 min-h-screen p-8">
      <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-bold mb-6 text-amber-900">Liste des auteurs</h2>

        <div v-if="auteurs.length" class="space-y-4">
            <AuteurComponent
            v-for="auteur in auteurs"
            :key="auteur.id"
            :auteur="auteur"
            @supprimer="supprimerAuteur"
          />
        </div>

        <p v-else class="text-amber-700">Aucun auteur trouvé.</p>

        <div class="mt-6">
          <router-link
            to="/auteurs/ajouter"
            class="inline-block bg-amber-700 text-white px-4 py-2 rounded hover:bg-amber-800"
          >
            Ajouter un auteur
          </router-link>
        </div>
      </div>
    </div>
  </DefaultLayout>
</template>
