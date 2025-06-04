<!-- resources/js/components/AuteurComponent.vue -->
<template>
  <div class="auteur">
    <h3>{{ auteur.nom }}</h3>
    <p>{{ auteur.bio }}</p>
  </div>
</template>

<script>
export default {
  name: "AuteurComponent",
  props: {
    auteur: {
      type: Object,
      required: true
    }
  }
}
</script>
