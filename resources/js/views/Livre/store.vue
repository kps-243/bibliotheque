<template>
  <div>
    <h1>Ajouter un livre</h1>

    <form @submit.prevent="ajouterLivre">
      <div>
        <label for="titre">Titre :</label>
        <input v-model="livre.titre" type="text" id="titre" required />
      </div>

      <div>
        <label for="prix">Prix (€) :</label>
        <input v-model="livre.prix" type="number" id="prix" required step="0.01" min="0" />
      </div>

      <div>
        <label for="date_publication">Date de publication :</label>
        <input v-model="livre.date_publication" type="date" id="date_publication" required />
      </div>

      <div>
        <label for="auteur">Auteur :</label>
        <select v-model="livre.auteur_id" id="auteur" required>
          <option disabled value="">Sélectionner un auteur</option>
          <option v-for="auteur in auteurs" :key="auteur.id" :value="auteur.id">
            {{ auteur.nom }} {{ auteur.prenom }}
          </option>
        </select>
      </div>

      <button type="submit">Ajouter le livre</button>
    </form>

    <p v-if="message" style="color: green">{{ message }}</p>

    <router-link to="/livres">
      <button style="margin-top: 10px;">Retour à la liste</button>
    </router-link>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  name: 'LivreStore',
  data() {
    return {
      livre: {
        titre: '',
        prix: '',
        date_publication: '',
        auteur_id: ''
      },
      auteurs: [],
      message: ''
    }
  },
  mounted() {
    this.chargerAuteurs()
  },
  methods: {
    async chargerAuteurs() {
      try {
        const response = await axios.get('/api/auteurs')
        this.auteurs = response.data
      } catch (error) {
        console.error("Erreur lors du chargement des auteurs :", error)
      }
    },
    async ajouterLivre() {
      try {
        await axios.post('/api/livres', this.livre)
        this.message = 'Livre ajouté avec succès.'
        this.livre = {
          titre: '',
          prix: '',
          date_publication: '',
          auteur_id: ''
        }
      } catch (error) {
        console.error("Erreur lors de l’ajout du livre :", error)
      }
    }
  }
}
</script>
