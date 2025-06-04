<template>
    <div>
      <h2>Liste des auteurs</h2>
      <div v-if="auteurs.length">
        <AuteurComponent
          v-for="auteur in auteurs"
          :key="auteur.id"
          :auteur="auteur"
        />
      </div>
      <p v-else>Aucun auteur trouvé.</p>
    </div>
  </template>
  
  <script>
  import AuteurComponent from '../../../components/AuteurComponent.vue'
  import axios from 'axios'
  
  export default {
    name: 'AuteurIndex',
    components: {
      AuteurComponent
    },
    data() {
      return {
        auteurs: []
      }
    },
    mounted() {
      this.getAuteurs()
    },
    methods: {
      async getAuteurs() {
        try {
          const response = await axios.get('/api/auteurs') // ← 🔁 bien changer ici
          this.auteurs = response.data
        } catch (error) {
          console.error("Erreur lors du chargement des auteurs :", error)
        }
      }
    }
  }
  </script>
  