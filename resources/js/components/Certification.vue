<template>
  <div class="p-6 bg-gray-100 min-h-screen">
    <h1 class="text-center text-2xl font-bold text-cyan-800 mb-8">
      Mes Certifications
    </h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <div
        v-for="certif in certifications"
        :key="certif.id"
        class="bg-white rounded-lg shadow-md p-4 hover:shadow-lg transition cursor-pointer"
        @click="openModal(certif)"
      >
        <div class="flex items-center space-x-4">
          <img
            v-if="getVignette(certif.id_vignette)"
            :src="getVignette(certif.id_vignette).chemin"
            alt="Logo"
            class="w-16 h-16 object-contain rounded"
          />
          <div>
            <h2 class="font-semibold text-lg text-gray-800">{{ certif.libelle }}</h2>
            <p class="text-sm text-gray-500">Source : {{ certif.source }}</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div
      v-if="selectedCertification"
      class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
      @click.self="closeModal"
    >
      <div class="bg-white rounded-lg p-6 w-full max-w-lg shadow-xl max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between mb-4">
          <img
            v-if="getVignette(selectedCertification.id_vignette)"
            :src="getVignette(selectedCertification.id_vignette).chemin"
            alt="Logo"
            class="w-16 h-16 object-contain aspect-square"
          />
          <h2 class="text-xl font-semibold text-right flex-1 ml-4">
            {{ selectedCertification.libelle }}
          </h2>
        </div>

        <p class="mb-2"><strong>Date d’obtention :</strong> {{ selectedCertification.fin }}</p>
        <p class="mb-2"><strong>Description :</strong> {{ selectedCertification.description }}</p>
        <p class="mb-4"><strong>Source :</strong> {{ selectedCertification.source }}</p>

       <div
        v-for="fichier in fichiers.filter(f => f.id === selectedCertification.id_fichier)"
        :key="fichier.id"
        >
            <template v-if="['png', 'jpg', 'jpeg', 'gif', 'webp'].includes(fichier.extension.toLowerCase())">
                <img
                :src="fichier.chemin"
                alt="Fichier image"
                class="max-w-full rounded border mb-4"
                />
            </template>

            <template v-else-if="fichier.extension.toLowerCase() === 'pdf'">
                <a
                :href="fichier.chemin"
                target="_blank"
                download
                class="inline-block bg-cyan-500 hover:bg-cyan-600 text-white font-semibold px-4 py-2 rounded mb-4 transition"
                >
                Télécharger le fichier PDF
                </a>
            </template>
        </div>


        <button
          class="mt-2 bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded"
          @click="closeModal"
        >
          Fermer
        </button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Certifications",
  data() {
    return {
      certifications: [],
      vignettes: [],
      fichiers: [],
      selectedCertification: null,
    };
  },
  mounted() {
    axios.get('https://hmameri.lyceestvincent.fr/api/home')
      .then(response => {
        this.vignettes = response.data.vignettes;
        this.certifications = response.data.certifications;
        this.fichiers = response.data.fichiers;
      })
      .catch(error => {
        console.error("Erreur lors de la récupération des données :", error);
      });
  },
  methods: {
    openModal(certif) {
      this.selectedCertification = certif;
    },
    closeModal() {
      this.selectedCertification = null;
    },
    getVignette(id) {
      return this.vignettes.find(v => v.id === id);
    },
    isPdf(filename) {
      return filename.toLowerCase().endsWith(".pdf");
    },
    isImage(filename) {
      return /\.(png|jpe?g|webp|gif)$/i.test(filename);
    }
  }
};
</script>

<style scoped>
body {
  font-family: 'Inter', sans-serif;
}
</style>
