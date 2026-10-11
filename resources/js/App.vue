<template>
  <!-- Éléments fixes (hors flux) -->
  <audio ref="bgMusic" src="/storage/sons/StockTune-Sakura%20Night%20Whispers.mp3" loop></audio>

  <div class="bubble-container" aria-hidden="true">
    <div class="bubble" style="width:50px;height:50px;background:rgba(0,255,0,.6);left:10%;animation-delay:0s"></div>
    <div class="bubble" style="width:70px;height:70px;background:rgba(0,0,255,.6);left:25%;animation-delay:2s"></div>
    <div class="bubble" style="width:40px;height:40px;background:rgba(255,0,0,.6);left:40%;animation-delay:4s"></div>
    <div class="bubble" style="width:60px;height:60px;background:rgba(0,255,255,.6);left:55%;animation-delay:6s"></div>
    <div class="bubble" style="width:55px;height:55px;background:rgba(255,0,255,.6);left:70%;animation-delay:8s"></div>
    <div class="bubble" style="width:45px;height:45px;background:rgba(255,165,0,.6);left:85%;animation-delay:1s"></div>
    <div class="bubble" style="width:65px;height:65px;background:rgba(75,0,130,.6);left:35%;animation-delay:3s"></div>
    <div class="bubble" style="width:50px;height:50px;background:rgba(255,20,147,.6);left:60%;animation-delay:5s"></div>
    <div class="bubble" style="width:70px;height:70px;background:rgba(0,128,0,.6);left:80%;animation-delay:7s"></div>
    <div class="bubble" style="width:55px;height:55px;background:rgba(30,144,255,.6);left:90%;animation-delay:9s"></div>
  </div>

  <!-- Contrôle musique -->
  <div class="fixed top-4 right-4 z-50 flex items-center space-x-2 bg-[#e6f0ff] border-2 border-blue-900 shadow-md px-2 py-1 sm:px-3 sm:py-1.5 rounded-full">
    <button @click="toggleMusic" class="bg-[#1e3a8a] text-white px-2 py-1 sm:px-3 rounded-md hover:bg-blue-700 transition text-xs sm:text-sm font-semibold">
      {{ isPlaying ? 'Pause' : 'Musique' }}
    </button>
    <input type="range" min="0" max="1" step="0.01" v-model.number="volume" @input="changeVolume"
           class="accent-blue-900 w-12 sm:w-16" title="Volume" />
  </div>

  <!-- Bouton sidebar -->
  <button @click="toggleSidebar" class="fixed top-4 left-4 z-50 bg-blue-700 text-white px-3 py-2 rounded-full shadow-lg hover:bg-blue-800 transition">
    ☰
  </button>

  <!-- Sidebar -->
  <aside :class="{'-translate-x-full': !sidebarOpen}"
         class="fixed top-0 left-0 h-screen w-64 bg-white shadow-lg z-40 flex flex-col transition-transform duration-300">
    <div class="h-16 flex items-center justify-center border-b text-xl font-bold text-blue-700">MonPortfolio</div>
    <nav class="flex flex-col px-6 py-4 space-y-4 text-gray-800 font-medium">
      <router-link to="/app"            class="hover:text-blue-600 transition">Accueil</router-link>
      <router-link to="/projets"        class="hover:text-blue-600 transition">Projets</router-link>
      <router-link to="/parcours"       class="hover:text-blue-600 transition">Parcours</router-link>
      <router-link to="/certifications" class="hover:text-blue-600 transition">Certifications</router-link>
      <router-link to="/contact"        class="hover:text-blue-600 transition">Contact</router-link>

      <hr class="border-gray-300">

      <a href="https://github.com/Orgalord-Darkness" class="hover:text-blue-600 transition">Github</a>
      <a href="/storage/fichiers/RGPD.pdf"           class="hover:text-blue-600 transition" download>RGPD <i class="fa-solid fa-upload"></i></a>
      <a href="/storage/fichiers/mentionslegales.pdf" class="hover:text-blue-600 transition" download>Mentions légales <i class="fa-solid fa-upload"></i></a>
      <a href="https://www.figma.com/design/MK203PiQbB21mMhl1cq9P6/PortfolioV3?node-id=0-1&p=f&t=kM3vBuKExhrk56FG-0"
         class="hover:text-blue-600 transition">Maquette Figma</a>
    </nav>
  </aside>

  <!-- Layout principal : flex column qui prend toute la hauteur -->
  <div class="flex flex-col min-h-screen">

    <!-- Navbar (desktop uniquement — sidebar utilisée en mobile/tablette) -->
    <nav class="hidden lg:flex justify-center gap-x-6 bg-white shadow-lg py-4 px-4 text-base border-b border-gray-300 sticky top-0 z-30">
      <router-link to="/app"            class="text-gray-700 hover:text-green-600 transition">Accueil</router-link>
      <router-link to="/projets"        class="text-gray-800 hover:text-green-600 transition">Projets</router-link>
      <router-link to="/parcours"       class="text-gray-800 hover:text-green-600 transition">Parcours</router-link>
      <router-link to="/certifications" class="text-gray-800 hover:text-green-600 transition">Certifications</router-link>
      <router-link to="/contact"        class="text-gray-800 hover:text-green-600 transition">Contact</router-link>
    </nav>

    <!-- Contenu — pousse le footer vers le bas -->
    <main class="flex-grow py-6 sm:py-10 px-4">
      <router-view />
    </main>

    <!-- Footer toujours en bas -->
    <footer class="w-full bg-white shadow-inner border-t border-gray-300">
      <div class="max-w-screen-lg mx-auto py-6 px-4 flex flex-col items-center space-y-2 text-gray-700 text-sm">
        <div class="font-bold text-blue-700 text-lg">MonPortfolio</div>
        <nav class="flex flex-wrap justify-center gap-4">
          <router-link to="/app"        class="hover:text-blue-600 transition">Accueil</router-link>
          <a href="https://github.com/Orgalord-Darkness" class="hover:text-blue-600 transition">Github</a>
          <a href="/storage/fichiers/RGPD.pdf"           class="hover:text-blue-600 transition" download>RGPD <i class="fa-solid fa-upload"></i></a>
          <a href="/storage/fichiers/mentionslegales.pdf" class="hover:text-blue-600 transition" download>Mentions légales <i class="fa-solid fa-upload"></i></a>
          <a href="https://www.figma.com/design/MK203PiQbB21mMhl1cq9P6/PortfolioV3?node-id=0-1&p=f&t=kM3vBuKExhrk56FG-0"
             class="hover:text-blue-600 transition">Maquette Figma</a>
          <router-link to="/contact"    class="hover:text-blue-600 transition">Contact</router-link>
        </nav>
        <p class="text-xs text-gray-400 mt-2">
          <strong>Musique :</strong> Sakura Night Whispers — Stocktune — Domaine public
        </p>
        <p class="text-xs text-gray-400">© {{ currentYear }} MonPortfolio – Tous droits réservés</p>
      </div>
    </footer>
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
      isPlaying:   false,
      volume:      0.5,
      sidebarOpen: false,
      currentYear: new Date().getFullYear(),
    };
  },
  methods: {
    toggleSidebar() { this.sidebarOpen = !this.sidebarOpen; },
    toggleMusic() {
      const audio = this.$refs.bgMusic;
      if (!audio) return;
      if (audio.paused) {
        audio.volume = this.volume;
        audio.play().then(() => { this.isPlaying = true; }).catch(() => { this.isPlaying = false; });
      } else {
        audio.pause();
        this.isPlaying = false;
      }
    },
    changeVolume() {
      const audio = this.$refs.bgMusic;
      if (audio) audio.volume = this.volume;
    },
  },
  mounted() {
    axios.get('/api/home').catch(() => {});
    const audio = this.$refs.bgMusic;
    if (audio) {
      audio.volume = this.volume;
      audio.play().then(() => { this.isPlaying = true; }).catch(() => { this.isPlaying = false; });
    }
  },
};
</script>

<style scoped>
.bubble-container {
  position: fixed;
  width: 100%;
  height: 100vh;
  overflow: hidden;
  z-index: 0;
  top: 0;
  left: 0;
  pointer-events: none;
}
.bubble {
  position: absolute;
  bottom: -100px;
  border-radius: 50%;
  opacity: 0.6;
  animation: floatUp 12s linear infinite;
  filter: blur(1px);
}
@keyframes floatUp {
  0%   { transform: translateY(0) scale(1);        opacity: 0.6; }
  50%  { transform: scale(1.05);                   opacity: 0.4; }
  100% { transform: translateY(-120vh) scale(1.2); opacity: 0; }
}
nav a, nav .router-link-active { font-weight: bold; color: #2c3e50; }
nav a.router-link-exact-active  { color: #42b983; }
</style>
