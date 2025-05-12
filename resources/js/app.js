require('./bootstrap');

import { createApp } from 'vue'
import App from './App.vue'
import router from './router'; // Ajout du router

createApp(App).use(router).mount('#app');
