<script setup>
import DefaultLayout from '@/layouts/DefaultLayout.vue'
</script>

<template>
    <DefaultLayout>
        <div class="bg-amber-50 min-h-screen p-8">
          <div class="max-w-md mx-auto bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-bold text-amber-900 mb-6">Ajouter un auteur</h2>
        
            <form @submit.prevent="ajouterAuteur" class="space-y-4">
              <div>
                <label class="block text-sm font-medium text-amber-700 mb-1">Nom</label>
                <input v-model="nom" type="text" required class="w-full px-4 py-2 border border-amber-200 rounded focus:outline-none focus:ring-2 focus:ring-amber-500" />
              </div>
              <div>
                <label class="block text-sm font-medium text-amber-700 mb-1">Prénom</label>
                <input v-model="prenom" type="text" required class="w-full px-4 py-2 border border-amber-200 rounded focus:outline-none focus:ring-2 focus:ring-amber-500" />
              </div>
          
              <div class="pt-4">
                <button type="submit" class="bg-amber-700 text-white px-6 py-2 rounded hover:bg-amber-800">
                  Enregistrer l'auteur
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
        nom: '',
        prenom: ''
      }
    },
    methods: {
      async ajouterAuteur() {
        try {
          await axios.post('/api/auteurs', {
            nom: this.nom,
            prenom: this.prenom
          })
          this.$router.push('/auteurs')
        } catch (error) {
          console.error('Erreur lors de l’ajout :', error)
        }
      }
    }
  }
  </script>
  