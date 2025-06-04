<template>
    <div>
      <h2>Liste des livres</h2>
      <ul v-if="livres.length">
        <li v-for="livre in livres" :key="livre.id">
          <strong>{{ livre.titre }}</strong> — Auteur: {{ livre.auteur.nom }} {{ livre.auteur.prenom }} — Prix: {{ livre.prix }}€ — Publié le: {{ livre.date_publication }}
        </li>
      </ul>
      <p v-else>Chargement des livres...</p>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    name: 'LivreComponent',
    data() {
      return {
        livres: [],
      };
    },
    async mounted() {
      try {
        const response = await axios.get('/api/livres');
        this.livres = response.data;
      } catch (error) {
        console.error('Erreur lors du chargement des livres:', error);
      }
    },
  };
  </script>
  
  <style scoped>
  h2 {
    margin-bottom: 10px;
  }
  ul {
    list-style-type: none;
    padding-left: 0;
  }
  li {
    margin-bottom: 5px;
  }
  </style>
  