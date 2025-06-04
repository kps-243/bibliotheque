import './bootstrap';
import { createApp } from 'vue';

import AuteurComponent from '../components/AuteurComponent.vue';
import LivreComponent from '../components/LivreComponent.vue';

const app = createApp({});

app.component('auteur-component', AuteurComponent);
app.component('livre-component', LivreComponent);

app.mount('#app');
