<template>
  <div class="bg-white min-h-screen">
    <!-- Timeline -->
    <div class="py-10">
      <div class="w-full max-w-3xl mx-auto relative px-4 md:px-0">
        <!-- Timeline centrale -->
        <div class="absolute left-4 md:left-1/2 md:-translate-x-1/2 top-0 h-full border-l-4 border-blue-600 z-0"></div>

        <!-- Bulles apprentissages -->
        <div
          v-for="(apprentissage, index) in apprentissages"
          :key="apprentissage.id"
          class="relative mb-10 md:mb-12 md:flex md:items-center"
        >
          <div class="absolute left-4 md:left-1/2 top-1 md:top-1/2 -translate-x-1/2 md:-translate-y-1/2 w-4 h-4 rounded-full bg-white border-4 border-blue-500 z-10"></div>

          <template v-if="index % 2 === 0">
            <div class="pl-10 md:pl-0 md:pr-6 md:w-1/2 md:ml-auto text-left md:text-right">
              <div class="inline-flex items-center space-x-2 cursor-pointer" @click="openModal(apprentissage)">
                <span class="text-sm font-semibold text-gray-700">{{ apprentissage.libelle }}</span>
                <img
                  v-if="getVignette(apprentissage.id_vignette)"
                  :src="getVignette(apprentissage.id_vignette).chemin"
                  class="w-12 h-12 rounded-full border object-contain hover:bg-blue-300 hover:border-blue-500"
                  alt="Vignette"
                />
              </div>
              <div class="text-xs text-gray-500 mt-1">{{ formatDate(apprentissage.commencement) }}</div>
            </div>
          </template>

          <template v-else>
            <div class="pl-10 md:pl-6 md:w-1/2 md:mr-auto text-left">
              <div class="inline-flex items-center space-x-2 cursor-pointer" @click="openModal(apprentissage)">
                <img
                  v-if="getVignette(apprentissage.id_vignette)"
                  :src="getVignette(apprentissage.id_vignette).chemin"
                  class="w-12 h-12 rounded-full border object-contain hover:bg-blue-300 hover:border-blue-500"
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
      <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full mx-4 relative">
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
    axios.get("/api/home")
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
