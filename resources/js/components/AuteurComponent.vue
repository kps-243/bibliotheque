<template>
  <div class="bg-amber-100 p-4 rounded flex justify-between items-center border border-amber-200">
    <div>
      <p class="text-lg font-semibold text-amber-800">
        {{ auteur.nom }} {{ auteur.prenom }}
      </p>
    </div>
    <div class="flex gap-2">
      <router-link
        :to="`/auteurs/${auteur.id}/modifier`"
        class="bg-amber-600 text-white px-4 py-2 rounded hover:bg-amber-700"
      >
        Modifier
      </router-link>
      <button
        @click="$emit('supprimer', auteur.id)"
        class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700"
      >
        Supprimer
      </button>
    </div>
  </div>
</template>

<script>
export default {
  name: "AuteurComponent",
  props: {
    auteur: Object
  }
}
</script>
