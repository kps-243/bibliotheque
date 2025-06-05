<template>
  <div>
    <h2>Liste des livres</h2>
    <div v-if="livres.length">
      <LivreComponent
        v-for="livre in livres"
        :key="livre.id"
        :livre="livre"
      />
    </div>
    <p v-else>Aucun livre trouvé.</p>
  </div>
</template>

<script>
import axios from 'axios'
import LivreComponent from '../../../components/LivreComponent.vue'

export default {
  name: 'LivreIndex',
  components: {
    LivreComponent
  },
  data() {
    return {
      livres: []
    }
  },
  mounted() {
    this.getLivres()
  },
  methods: {
    async getLivres() {
      try {
        const response = await axios.get('/api/livres')
        this.livres = response.data
      } catch (error) {
        console.error('Erreur lors du chargement des livres :', error)
      }
    }
  }
}
</script>
