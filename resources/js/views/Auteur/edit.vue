<template>
    <div>
      <h1>Modifier un auteur</h1>
  
      <div v-if="auteur.nom || auteur.prenom">
        <p><strong>Nom actuel :</strong> {{ auteur.nom }}</p>
        <p><strong>Prénom actuel :</strong> {{ auteur.prenom }}</p>
      </div>
  
      <form @submit.prevent="modifierAuteur">
        <div>
          <label for="nom">Nouveau nom :</label>
          <input v-model="auteur.nom" type="text" id="nom" required />
        </div>
        <div>
          <label for="prenom">Nouveau prénom :</label>
          <input v-model="auteur.prenom" type="text" id="prenom" required />
        </div>
        <button type="submit">Mettre à jour</button>
      </form>
  
      <p v-if="message" style="color: green">{{ message }}</p>
  
      <router-link to="/auteurs">
        <button style="margin-top: 10px;">Retour à la liste</button>
      </router-link>
    </div>
  </template>
  
  <script>
  import axios from 'axios'
  
  export default {
    name: 'AuteurEdit',
    data() {
      return {
        auteur: {
          nom: '',
          prenom: ''
        },
        message: ''
      }
    },
    mounted() {
      this.recupererAuteur()
    },
    methods: {
      async recupererAuteur() {
        const id = this.$route.params.id
        try {
          const response = await axios.get(`/api/auteurs/${id}`)
          this.auteur = response.data
        } catch (error) {
          console.error('Erreur récupération auteur :', error)
        }
      },
      async modifierAuteur() {
        const id = this.$route.params.id
        try {
          await axios.put(`/api/auteurs/${id}`, this.auteur)
          this.message = 'Auteur mis à jour avec succès.'
        } catch (error) {
          console.error('Erreur modification :', error)
        }
      }
    }
  }
  </script>
  