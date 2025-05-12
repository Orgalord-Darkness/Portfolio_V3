<template>
  <div class="p-4">
    <div class="bg-cyan-200 text-center py-2 rounded font-bold text-xl mb-6 border-2 border-cyan-900">
      Mes certifications
    </div>

    <div class="grid gap-4">
      <div
        v-for="certif in certifications"
        :key="certif.id"
        class="flex items-center bg-white border rounded p-4 shadow hover:bg-gray-50 cursor-pointer"
        @click="openModal(certif)"
      >
        <img
            v-if="getVignette(certif.id_vignette)"
            :src="getVignette(certif.id_vignette).chemin"
            alt="Logo"
            class="w-16 h-16 mr-4"
          />
        <div>
          <div class="font-semibold">{{ certif.libelle }}</div>
          <div class="text-sm text-gray-600">Source: {{ certif.source }}</div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div
      v-if="selectedCertification"
      class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50"
      @click.self="closeModal"
    >
      <div class="bg-white rounded-lg p-6 w-96 shadow-lg">
        <div class="flex items-center mb-4">
          <img
            v-if="getVignette(selectedCertification.id_vignette)"
            :src="getVignette(selectedCertification.id_vignette).chemin"
            alt="Logo"
            class="w-16 h-16 mx-auto my-auto"
          />
          <h2 class="text-xl font-semibold">{{ selectedCertification.libelle }}</h2>
        </div>
        <p><strong>Date d’obtention :</strong> {{ selectedCertification.fin }}</p>
        <p class="mt-1">
          <strong>Description :</strong> {{ selectedCertification.description }}
        </p>
        <p class="mt-1">
          <strong>Source :</strong> {{ selectedCertification.source }}
        </p>
        <div
            v-for="fichier in fichiers.filter(f => f.id === selectedCertification.id_fichier)"
            :key="fichier.id"
            class="bg-cyan-400 rounded-full px-6 py-3 font-semibold text-black hover:bg-cyan-600 transition cursor-pointer"
        >
        <a :href="`${fichier.chemin}`" target="_blank" download>{{ fichier.nom }}</a>

        </div>

        <button
          class="mx-auto my-auto mt-4 bg-cyan-500 hover:bg-cyan-600 text-white px-4 py-2 rounded"
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
    axios.get("http://127.0.0.1:8000/api/home")
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
    getFichier(id) {
      return this.fichiers.find(f => f.id === id);
    },
    downloadFile(filename) {
        const url = `${import.meta.env.VITE_API_BASE_URL}/download/${filename}`;
        window.open(url, '_blank');
    }

  },
};
</script>

<style scoped>
body {
  font-family: 'Arial', sans-serif;
}
</style>
