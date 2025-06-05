<template>
  <div class="max-w-6xl mx-auto py-10 px-4">
    <div class="flex justify-between items-center mb-6">
      <h2 class="text-2xl font-bold">Liste des livres</h2>
      <router-link to="/livres/ajouter">
        <button class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition">
          Ajouter un livre
        </button>
      </router-link>
    </div>

    <div v-if="livres.length" class="grid gap-4 sm:grid-cols-2 md:grid-cols-3">
      <div
        v-for="livre in livres"
        :key="livre.id"
        class="p-4 bg-white shadow rounded-lg border border-gray-200"
      >
        <h3 class="text-lg font-semibold mb-2">{{ livre.titre }}</h3>
        <p class="text-sm text-gray-600">Prix : {{ livre.prix }} €</p>
        <p class="text-sm text-gray-600">
          Date : {{ new Date(livre.date_publication).toLocaleDateString() }}
        </p>
        <p class="text-sm text-gray-700 mt-2">
          Auteur : {{ livre.auteur?.nom }} {{ livre.auteur?.prenom }}
        </p>
        <router-link
          :to="`/livres/${livre.id}/modifier`"
          class="text-blue-600 hover:underline text-sm mt-3 inline-block"
        >
          Modifier
        </router-link>
      </div>
    </div>

    <p v-else class="text-gray-600">Aucun livre trouvé.</p>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'LivreIndex',
  data() {
    return {
      livres: []
    };
  },
  mounted() {
    this.chargerLivres();
  },
  methods: {
    async chargerLivres() {
      try {
        const response = await axios.get('/api/livres');
        this.livres = response.data;
      } catch (error) {
        console.error('Erreur lors du chargement des livres :', error);
      }
    }
  }
};
</script>
