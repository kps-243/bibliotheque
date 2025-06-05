import { createRouter, createWebHistory } from 'vue-router';
import HomeView from '../views/HomeView.vue';
import AuteurIndex from '../views/Auteur/index.vue';
import AuteurStore from '../views/Auteur/store.vue';
import AuteurEdit from '../views/Auteur/edit.vue';
import LivreIndex from '../views/Livre/index.vue';
import LivreStore from '../views/Livre/store.vue';
import LivreEdit from '../views/Livre/edit.vue';

const routes = [
  { path: '/', name: 'home', component: HomeView },
  { path: '/auteurs', name: 'auteur.index', component: AuteurIndex },
  { path: '/auteurs/ajouter', name: 'auteur.store', component: AuteurStore },
  { path: '/auteurs/:id/modifier', name: 'auteur.edit', component: AuteurEdit },
  { path: '/livres', name: 'livre.index', component: LivreIndex },
  { path: '/livres/ajouter', name: 'livre.store', component: LivreStore },
  { path: '/livres/:id/modifier', name: 'livre.edit', component: LivreEdit },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
