<script setup>
import DefaultLayout from '@/layouts/DefaultLayout.vue'
</script>

<template>
  <DefaultLayout>
    <div class="bg-amber-50 min-h-screen p-8">
      <div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-bold text-amber-900 mb-6">Ajouter un livre</h2>
      
        <form @submit.prevent="ajouterLivre" class="space-y-4">
          <div>
            <label class="block text-sm font-medium text-amber-700 mb-1">Titre</label>
            <input v-model="livre.titre" type="text" required class="w-full px-4 py-2 border border-amber-200 rounded focus:outline-none focus:ring-2 focus:ring-amber-500" />
          </div>
        
          <div>
            <label class="block text-sm font-medium text-amber-700 mb-1">Prix</label>
            <input v-model="livre.prix" type="number" step="0.01" required class="w-full px-4 py-2 border border-amber-200 rounded focus:outline-none focus:ring-2 focus:ring-amber-500" />
          </div>
        
          <div>
            <label class="block text-sm font-medium text-amber-700 mb-1">Date de publication</label>
            <input v-model="livre.date_publication" type="date" required class="w-full px-4 py-2 border border-amber-200 rounded focus:outline-none focus:ring-2 focus:ring-amber-500" />
          </div>
        
          <div>
            <label class="block text-sm font-medium text-amber-700 mb-1">Auteur</label>
            <select v-model="livre.auteur_id" required class="w-full px-4 py-2 border border-amber-200 rounded focus:outline-none focus:ring-2 focus:ring-amber-500">
              <option disabled value="">Sélectionnez un auteur</option>
              <option v-for="auteur in auteurs" :key="auteur.id" :value="auteur.id">
                {{ auteur.nom }} {{ auteur.prenom }}
              </option>
            </select>
          </div>
        
          <div class="pt-4">
            <button type="submit" class="bg-amber-700 text-white px-6 py-2 rounded hover:bg-amber-800">
              Ajouter le livre
            </button>
          </div>
        </form>
      </div>
    </div>
  </DefaultLayout>
</template>

<script>
import axios from 'axios'

export default {
  data() {
    return {
      livre: {
        titre: '',
        prix: '',
        date_publication: '',
        auteur_id: ''
      },
      auteurs: []
    }
  },
  async mounted() {
    try {
      const res = await axios.get('/api/auteurs')
      this.auteurs = res.data
    } catch (e) {
      console.error('Erreur lors du chargement des auteurs :', e)
    }
  },
  methods: {
    async ajouterLivre() {
      try {
        await axios.post('/api/livres', this.livre)
        this.$router.push('/livres')
      } catch (error) {
        console.error('Erreur lors de l’ajout du livre :', error)
      }
    }
  }
}
</script>
