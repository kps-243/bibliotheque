<template>
  <div class="bg-amber-100 p-4 rounded border border-amber-200 shadow-sm">
    <div class="flex justify-between items-center">
      <div>
        <p class="text-lg font-semibold text-amber-800">{{ livre.titre }}</p>
        <p class="text-sm text-amber-700">
          Auteur : {{ livre.auteur?.nom ?? 'Inconnu' }} {{ livre.auteur?.prenom ?? '' }}
        </p>
        <p class="text-sm text-amber-700">Prix : {{ livre.prix }} €</p>
        <p class="text-sm text-amber-700">
          Publié le : {{ livre.date_publication }}
        </p>
      </div>
      <div class="flex gap-2">
        <router-link
          :to="`/livres/${livre.id}/modifier`"
          class="bg-amber-600 text-white px-4 py-2 rounded hover:bg-amber-700"
        >
          Modifier
        </router-link>
        <button
          @click="$emit('supprimer', livre.id)"
          class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700"
        >
          Supprimer
        </button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'LivreComponent',
  props: {
    livre: Object
  }
}
</script>
