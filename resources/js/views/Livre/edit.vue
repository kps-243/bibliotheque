<template>
  <div>
    <h1>Modifier le livre</h1>

    <form v-if="livre" @submit.prevent="modifierLivre">
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

      <button type="submit">Enregistrer les modifications</button>
    </form>

    <p v-if="message" style="color: green">{{ message }}</p>

    <router-link to="/livres">
      <button style="margin-top: 10px;">Retour à la liste</button>
    </router-link>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'LivreEdit',
  data() {
    return {
      livre: null,
      auteurs: [],
      message: ''
    };
  },
  mounted() {
    this.chargerLivre();
    this.chargerAuteurs();
  },
  methods: {
    async chargerLivre() {
      const id = this.$route.params.id;
      try {
        const response = await axios.get(`/api/livres/${id}`);
        this.livre = {
          titre: response.data.titre,
          prix: response.data.prix,
          date_publication: response.data.date_publication,
          auteur_id: response.data.auteur_id
        };
      } catch (error) {
        console.error("Erreur lors du chargement du livre :", error);
      }
    },
    async chargerAuteurs() {
      try {
        const response = await axios.get('/api/auteurs');
        this.auteurs = response.data;
      } catch (error) {
        console.error("Erreur lors du chargement des auteurs :", error);
      }
    },
    async modifierLivre() {
      const id = this.$route.params.id;
      try {
        await axios.put(`/api/livres/${id}`, this.livre);
        this.message = 'Livre modifié avec succès.';
      } catch (error) {
        console.error("Erreur lors de la modification du livre :", error);
      }
    }
  }
};
</script>
