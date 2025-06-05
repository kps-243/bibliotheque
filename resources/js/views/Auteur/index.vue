<template>
    <div class="max-w-4xl mx-auto py-10 px-4">
      <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Liste des auteurs</h2>
        <router-link to="/auteurs/ajouter">
          <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
            Ajouter un auteur
          </button>
        </router-link>
      </div>
  
      <div v-if="auteurs.length" class="grid gap-4 sm:grid-cols-2 md:grid-cols-3">
        <div
          v-for="auteur in auteurs"
          :key="auteur.id"
          class="p-4 bg-white shadow rounded-lg border border-gray-200"
        >
          <h3 class="text-lg font-semibold mb-2">{{ auteur.nom }} {{ auteur.prenom }}</h3>
          <router-link
            :to="`/auteurs/${auteur.id}/modifier`"
            class="text-blue-600 hover:underline text-sm"
          >
            Modifier
          </router-link>
        </div>
      </div>
  
      <p v-else class="text-gray-600">Aucun auteur trouvé.</p>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    name: 'AuteurIndex',
    data() {
      return {
        auteurs: []
      };
    },
    mounted() {
      this.chargerAuteurs();
    },
    methods: {
      async chargerAuteurs() {
        try {
          const response = await axios.get('/api/auteurs');
          this.auteurs = response.data;
        } catch (error) {
          console.error('Erreur lors du chargement des auteurs :', error);
        }
      }
    }
  };
  </script>
  