<template>
  <div class="flex bg-white h-screen overflow-hidden">
    <!-- Sidebar -->
    <!-- <aside class="w-full bg-gray-100 p-4 border-r overflow-y-auto">
      <h2 class="text-lg font-bold mb-4">Technologies</h2>
      <ul>
        <li
          v-for="(apprentissage, index) in apprentissages"
          :key="index"
          class="mb-4 flex items-center space-x-2 cursor-pointer"
          @click="openModal(apprentissage)"
        >
          <img
            v-if="getVignette(apprentissage.id_vignette)"
            :src="getVignette(apprentissage.id_vignette).chemin"
            class="w-10 h-10 rounded-full object-contain border"
            :alt="apprentissage.libelle"
          />
          <span class="text-sm font-medium">{{ apprentissage.libelle }}</span>
        </li>
      </ul>
    </aside> -->

    <!-- Timeline -->
    <div class="flex-1 overflow-auto py-10">
      <div class="w-64 max-w-4xl mx-auto relative">
        <!-- Timeline centrale -->
        <div class="absolute left-1/2 transform -translate-x-1/2 h-full border-l-4 border-blue-600 z-0"></div>

        <!-- Bulles apprentissages -->
        <div
          v-for="(apprentissage, index) in apprentissages"
          :key="apprentissage.id"
          class="w-full flex items-center justify-between mb-12 relative"
        >
          <template v-if="index % 2 === 0">
            <div class="w-1/2 pr-6 text-right">
              <div class="inline-flex items-center space-x-2 cursor-pointer" @click="openModal(apprentissage)">
                <span class="text-sm font-semibold text-gray-700">{{ apprentissage.libelle }}</span>
                <img
                  v-if="getVignette(apprentissage.id_vignette)"
                  :src="getVignette(apprentissage.id_vignette).chemin"
                  class="w-12 h-12 rounded-full border object-contain"
                  alt="Vignette"
                />
              </div>
              <div class="text-xs text-gray-500 mt-1">{{ formatDate(apprentissage.commencement) }}</div>
            </div>
            <div class="w-4 h-4 rounded-full bg-white border-4 border-blue-500 z-10"></div>
            <div class="w-1/2 pl-6"></div>
          </template>

          <template v-else>
            <div class="w-1/2 pr-6"></div>
            <div class="w-4 h-4 rounded-full bg-white border-4 border-blue-500 z-10"></div>
            <div class="w-1/2 pl-6 text-left">
              <div class="inline-flex items-center space-x-2 cursor-pointer" @click="openModal(apprentissage)">
                <img
                  v-if="getVignette(apprentissage.id_vignette)"
                  :src="getVignette(apprentissage.id_vignette).chemin"
                  class="w-12 h-12 rounded-full border object-contain"
                  alt="Vignette"
                />
                <span class="text-sm font-semibold text-gray-700">{{ apprentissage.libelle }}</span>
              </div>
              <div class="text-xs text-gray-500 mt-1">{{ formatDate(apprentissage.commencement) }}</div>
            </div>
          </template>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div
      v-if="selectedApprentissage"
      class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
    >
      <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full relative">
        <button
          @click="selectedApprentissage = null"
          class="absolute top-2 right-3 text-gray-600 hover:text-red-600"
        >
          ✖
        </button>
        <h2 class="text-xl font-bold text-blue-800 mb-2">{{ selectedApprentissage.libelle }}</h2>
        <img
          v-if="getVignette(selectedApprentissage.id_vignette)"
          :src="getVignette(selectedApprentissage.id_vignette).chemin"
          alt="Vignette"
          class="w-32 h-32 object-contain mb-3 mx-auto"
        />
        <p class="text-gray-700 text-sm mb-2">{{ selectedApprentissage.description }}</p>
        <p class="text-sm text-gray-500">
          <strong>Période :</strong>
          {{ formatDate(selectedApprentissage.commencement) }} - {{ formatDate(selectedApprentissage.fin) }}
        </p>
        <p class="text-sm mt-2"><strong>Projets liés :</strong></p>
        <ul
            v-if="getProjetsPourApprentissage(selectedApprentissage.id).length > 0"
            class="text-sm list-disc list-inside text-gray-600"
            >
            <li
                v-for="projet in getProjetsPourApprentissage(selectedApprentissage.id)"
                :key="projet.id"
            >
                {{ projet.nom }}
            </li>
        </ul>
        <div v-else>
            <p class="text-sm text-gray-500">Pas de projets liés</p>
        </div>

      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      apprentissages: [],
      vignettes: [],
      projets_has_apprentissages: [],
      projets: [],
      selectedApprentissage: null,
    };
  },
  mounted() {
    axios.get("http://127.0.0.1:8000/api/home")
      .then(response => {
        this.apprentissages = response.data.apprentissages;
        this.vignettes = response.data.vignettes;
        this.projets_has_apprentissages = response.data.projets_has_apprentissages;
        this.projets = response.data.projets;
      });
  },
  methods: {
    getVignette(id) {
      return this.vignettes.find(v => v.id === id);
    },
    getProjetsPourApprentissage(idApprentissage) {
        const idsProjets = this.projets_has_apprentissages
            .filter(relation => relation.id_apprentissage === idApprentissage)
            .map(relation => relation.id_projet);

        // Supprimer les doublons
        const idsUniques = [...new Set(idsProjets)];

        // Trouver les projets correspondants
        return this.projets.filter(projet => idsUniques.includes(projet.id));
    },


    openModal(apprentissage) {
      this.selectedApprentissage = apprentissage;
    },
    formatDate(dateStr) {
      return new Date(dateStr).toLocaleDateString('fr-FR', {
        year: 'numeric',
        month: 'short',
        day: 'numeric',
      });
    },
  }
};
</script>

<style scoped>
::-webkit-scrollbar {
  width: 6px;
}
::-webkit-scrollbar-thumb {
  background-color: #94a3b8;
  border-radius: 4px;
}
</style>
