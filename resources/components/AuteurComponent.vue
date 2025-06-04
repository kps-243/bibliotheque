<template>
  <div>
    <h1>Liste des auteurs</h1>
    <ul>
      <li v-for="auteur in auteurs" :key="auteur.id">{{ auteur.nom }}</li>
    </ul>
  </div>
</template>

<script>
export default {
  data() {
    return {
      auteurs: [],
    };
  },
  mounted() {
  fetch('/api/auteurs')
    .then(res => res.json())
    .then(data => {
      console.log('Auteurs reçus:', data);
      this.auteurs = data;
    })
    .catch(e => console.error('Erreur fetch auteurs:', e));
}
};
</script>
