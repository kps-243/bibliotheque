<template>
    <div>
      <h1>Ajouter un auteur</h1>
  
      <form @submit.prevent="ajouterAuteur">
        <div>
          <label for="nom">Nom :</label>
          <input v-model="nom" type="text" id="nom" required />
        </div>
        <div>
          <label for="prenom">Prénom :</label>
          <input v-model="prenom" type="text" id="prenom" required />
        </div>
        <button type="submit">Enregistrer</button>
      </form>
  
      <p v-if="message" style="color: green">{{ message }}</p>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    name: 'AuteurStore',
    data() {
      return {
        nom: '',
        prenom: '',
        message: ''
      };
    },
    methods: {
      async ajouterAuteur() {
        try {
          const response = await axios.post('/api/auteurs', {
            nom: this.nom,
            prenom: this.prenom
          });
  
          this.message = "Auteur ajouté avec succès !";
          this.nom = '';
          this.prenom = '';
        } catch (error) {
          console.error('Erreur lors de l’ajout :', error);
        }
      }
    }
  };
  </script>
  