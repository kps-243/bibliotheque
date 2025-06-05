<script setup>
import DefaultLayout from '@/layouts/DefaultLayout.vue'
</script>

<template>
    <DefaultLayout>
        <div class="bg-amber-50 min-h-screen p-8">
          <div class="max-w-md mx-auto bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-bold text-amber-900 mb-6">Modifier l’auteur</h2>
        
            <form @submit.prevent="modifierAuteur" class="space-y-4">
              <div>
                <label class="block text-sm font-medium text-amber-700 mb-1">Nom</label>
                <input v-model="auteur.nom" type="text" required class="w-full px-4 py-2 border border-amber-200 rounded focus:outline-none focus:ring-2 focus:ring-amber-500" />
              </div>
              <div>
                <label class="block text-sm font-medium text-amber-700 mb-1">Prénom</label>
                <input v-model="auteur.prenom" type="text" required class="w-full px-4 py-2 border border-amber-200 rounded focus:outline-none focus:ring-2 focus:ring-amber-500" />
              </div>
          
              <div class="pt-4">
                <button type="submit" class="bg-amber-700 text-white px-6 py-2 rounded hover:bg-amber-800">
                  Enregistrer les modifications
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
        auteur: {
          nom: '',
          prenom: ''
        }
      }
    },
    async mounted() {
      try {
        const res = await axios.get(`/api/auteurs/${this.$route.params.id}`)
        this.auteur = res.data
      } catch (error) {
        console.error('Erreur chargement auteur :', error)
      }
    },
    methods: {
      async modifierAuteur() {
        try {
          await axios.put(`/api/auteurs/${this.$route.params.id}`, this.auteur)
          this.$router.push('/auteurs')
        } catch (error) {
          console.error('Erreur modification auteur :', error)
        }
      }
    }
  }
  </script>
  