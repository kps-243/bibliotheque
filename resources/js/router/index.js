import { createRouter, createWebHistory } from 'vue-router';
import HomeView from '../views/HomeView.vue';
import AuteurIndex from '../views/Auteur/index.vue';
import AuteurStore from '../views/Auteur/store.vue';
import AuteurEdit from '../views/Auteur/edit.vue';

const routes = [
  { path: '/', name: 'home', component: HomeView },
  { path: '/auteurs', name: 'auteur.index', component: AuteurIndex },
  { path: '/auteurs/ajouter', name: 'auteur.store', component: AuteurStore },
  { path: '/auteurs/:id/modifier', name: 'auteur.edit', component: AuteurEdit },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
