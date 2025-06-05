<template>
  <div class="livre">
    <h3>{{ livre.titre }}</h3>
    <p v-if="livre.auteur">Auteur : {{ livre.auteur.nom }} {{ livre.auteur.prenom }}</p>
    <p v-else>Auteur non renseigné</p>
  </div>
</template>

<script>
export default {
  name: 'LivreComponent',
  props: {
    livre: {
      type: Object,
      required: true
    }
  }
}
</script>
