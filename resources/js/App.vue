<template>
  <div class="bg-gray-100 flex flex-col items-center pt-28 pb-10 space-y-6 relative">
    <!-- BOUTON TOGGLE -->
    <button @click="toggleSidebar" class="fixed top-4 left-4 z-50 bg-blue-700 text-white px-3 py-2 rounded-full shadow-lg hover:bg-blue-800 transition">
      ☰
    </button>

    <!-- SIDEBAR -->
    <aside :class="{'-translate-x-full': !sidebarOpen}" class="fixed top-0 left-0 h-screen w-64 bg-white shadow-lg z-40 flex flex-col transition-transform duration-300">
      <div class="h-16 flex items-center justify-center border-b text-xl font-bold text-blue-700">
        MonPortfolio
      </div>
      <nav class="flex flex-col px-6 py-4 space-y-4 text-gray-800 font-medium">
        <a href="/app" class="hover:text-blue-600 transition">Accueil</a>
        <a href="https://github.com/Orgalord-Darkness" class="hover:text-blue-600 transition">Github</a>
        <a href="/storage/fichiers/RGPD.pdf" class="hover:text-blue-600 transition" download="">RGPD<i class="fa-solid fa-upload"></i></a>
        <a href="/storage/fichiers/mentionslegales.pdf" class="hover:text-blue-600 transition" download="">Mentions légales<i class="fa-solid fa-upload"></i></a>
        <a href="https://www.figma.com/design/MK203PiQbB21mMhl1cq9P6/PortfolioV3?node-id=0-1&p=f&t=kM3vBuKExhrk56FG-0" class="hover:text-blue-600 transition">Maquette figma</a>
        <router-link to="/contact" class="hover:text-blue-600 transition">Contact</router-link>
      </nav>
    </aside>

    <div class="flex flex-col min-h-screen">
      <!-- Barre de navigation -->
      <nav class="bg-white shadow-lg py-4 flex justify-center space-x-6 border-b border-gray-300">
        <router-link to="/app" class="text-gray-700 hover:text-green-600 transition">Accueil</router-link>
        <router-link to="/projets" class="text-gray-800 hover:text-green-600 transition">Projets</router-link>
        <router-link to="/parcours" class="text-gray-800 hover:text-green-600 transition">Parcours</router-link>
        <router-link to="/certifications" class="text-gray-800 hover:text-green-600 transition">Certifications</router-link>
        <router-link to="/contact" class="text-gray-800 hover:text-green-600 transition">Contact</router-link>
      </nav>

      <div class="mx-10 my-10"></div>

      <!-- Spinner de chargement -->
      <div v-if="loading" class="absolute inset-0 bg-white bg-opacity-50 flex justify-center items-center z-50">
        <div class="animate-spin rounded-full h-16 w-16 border-t-4 border-blue-700"></div>
      </div>

      <router-view />
    </div>
  </div>
</template>

<script>
import axios from 'axios';
import Presentation from './components/Presentation.vue';
import Projets from './components/Projets.vue';

export default {
  components: { Presentation, Projets },
  data() {
    return {
      sidebarOpen: false,
      loading: true,
    };
  },
  methods: {
    toggleSidebar() {
      this.sidebarOpen = !this.sidebarOpen;
    },
  },
  mounted() {
    axios.get('/api/home')
      .then(() => { this.loading = false; })
      .catch(() => { this.loading = false; });
  },
};
</script>

<style scoped>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

nav {
  padding: 30px;
}

nav a {
  font-weight: bold;
  color: #2c3e50;
}

nav a.router-link-exact-active {
  color: #42b983;
}

.animate-spin {
  border-top-color: transparent;
  animation: spin 1s linear infinite;
}

@keyframes spin {
  0%   { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
