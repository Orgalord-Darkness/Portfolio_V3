<template>
  <div class="h-screen mt-10 space-y-32">
    <div
      v-for="(carrousel, i) in carrousels"
      :key="i"
      class="space-y-6"
    >
      <!-- Titre -->
      <div
        class="mx-auto w-1/2 px-8 py-3 rounded shadow text-2xl font-semibold mb-6"
        :class="carrousel.style.header"
      >
        <h1 class="text-center">{{ carrousel.title }}</h1>
      </div>

      <!-- Carrousel wrapper -->
      <div class="relative w-full max-w-5xl mx-auto">
        <div
          :ref="'carouselInner' + i"
          class="flex overflow-x-hidden snap-x snap-mandatory space-x-6 transition-all duration-500"
          @scroll="handleScroll($event, i)"
        >
          <div
            v-for="(projet, index) in carrousel.data"
            :key="index"
            class="snap-start rounded-xl p-6 shadow-md flex items-center space-x-6 min-w-full w-full"
            :class="carrousel.style.bg"
          >
          <!-- Vignette -->
            <div
              class="w-1/2 h-70 bg-white border border-gray-300 rounded-md flex items-center justify-center overflow-hidden group relative cursor-pointer"
              @click="openFullscreen(getVignette(projet.id_vignette))"
            >
              <img
                v-if="getVignette(projet.id_vignette)"
                :src="getVignette(projet.id_vignette).chemin"
                alt="Vignette du projet"
                class="object-contain w-full h-full transition-transform duration-300 ease-in-out group-hover:scale-105"
              />

              <!-- Overlay au survol -->
              <div
                class="absolute inset-0 bg-black bg-opacity-30 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center pointer-events-none"
              >
                <span class="text-white text-sm font-semibold">Voir en plein écran</span>
              </div>
            </div>



            <!-- Infos -->
            <div class="w-1/2 flex flex-col justify-between">
              <h2 class="text-2xl font-bold text-left" :class="carrousel.style.colorDark">{{ projet.nom }}</h2>
              <div class="text-sm md:text-base text-left space-y-2 max-w-3xl" :class="carrousel.style.colorDark">
                <p><strong>Description :</strong> {{ projet.description }}</p>
                <p><strong>Responsable :</strong> {{ projet.chef }}</p>
                <div class="flex items-start gap-2 flex-wrap">
                  <span class="font-semibold">Stack :</span>
                  <div
                    v-for="row in projets_has_apprentissages.filter(r => r.id_projet === projet.id)"
                    :key="row.id_apprentissage"
                  >
                    <div v-if="getApprentissage(row.id_apprentissage)">
                      <div
                        v-for="vignette in vignettes"
                        :key="vignette.id"
                      >
                        <img
                          v-if="vignette.id === getApprentissage(row.id_apprentissage).id_vignette"
                          :src="vignette.chemin"
                          alt="Apprentissage"
                          class="h-20 w-20 object-contain rounded"
                        />
                      </div>
                    </div>
                  </div>
                </div>
                <a :href="projet.github"><strong>Github :</strong> {{ projet.github || 'Pas sur github' }}</a>
                <p><strong>Durée :</strong> {{ projet.duree }} heures</p>
                <p><strong>Bilan :</strong> {{ projet.bilan }}</p>
              </div>
              <button :class="carrousel.style.btn" @click="openDocumentationModal(projet.id)">
                Voir la documentation
              </button>
            </div>
          </div>
        </div>

        <!-- Pagination -->
        <div class="flex items-center gap-2 justify-center" :class="carrousel.style.bg">
          <button
            v-for="(index, idx) in carrousel.data"
            :key="index"
            @click="scrollTo(idx, i)"
            class="w-3 h-3 rounded-full transition-all duration-300"
            :class="[currentIndexes[i] === idx
              ? 'scale-125 ' + carrousel.style.dot + ' shadow-md'
              : 'bg-gray-300 hover:scale-110']"
          ></button>
          <p class="text-gray-700 ml-4">{{ currentIndexes[i] + 1 }}/{{ carrousel.data.length }}</p>
        </div>

      </div>
    </div>
  </div>

  <!-- Documentation Modal -->
  <div
    v-if="selectedProjetId !== null"
    class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
    @click.self="closeModal"
  >
    <div class="p-8 rounded-lg shadow-xl w-96 text-center space-y-4">
      <h2
        v-if="selectedProject"
        class="bg-cyan-500 text-white font-bold py-2 px-4 rounded"
      >
        Documentations projet {{ selectedProject.nom }}
      </h2>

      <div
        v-for="doc in documentations.filter(d => d.id_projet === selectedProjetId)"
        :key="doc.id"
        class="bg-cyan-400 rounded-full px-6 py-3 font-semibold text-black hover:bg-cyan-600 transition cursor-pointer"
      >
        <a :href="`/storage${doc.chemin}`" target="_blank" download>{{ doc.nom }}</a>
      </div>

      <button
        @click="closeModal"
        class="mt-4 text-red-600 underline hover:text-red-800"
      >
        Fermer
      </button>
    </div>
  </div>

  <!--Modal Vignette Projet-->
  <div
    v-if="fullscreenVignette"
    class="fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center z-50"
    @click.self="closeFullscreen"
  >
    <div class="relative bg-white p-4 rounded-lg shadow-2xl max-w-6xl w-[90%] max-h-[90%] flex flex-col items-end">
      <!-- Bouton Fermer -->
      <button
        @click="closeFullscreen"
        class="text-gray-700 text-3xl font-bold hover:text-red-500 mb-2"
      >
        &times;
      </button>

      <!-- Image -->
      <div class="w-full h-full flex justify-center items-center">
        <img
          :src="fullscreenVignette.chemin"
          alt="Vignette en plein écran"
          class="max-h-[80vh] max-w-full object-contain rounded"
        />
      </div>
    </div>
  </div>


</template>
<script>
export default {
  name: 'Projets',
  data() {
    return {
      ppe: [],
      ms: [],
      pp: [],
      vignettes: [],
      apprentissages: [],
      projets_has_apprentissages: [],
      documentations: [],
      selectedProjetId: null,
      selectedProject: null,
      currentIndexes: [0, 0, 0],
      fullscreenVignette: null,
    };
  },
  computed: {
    carrouselStyles() {
      return {
        ppe: {
          header: 'border-4 border-blue-900 bg-blue-300 text-blue-900',
          bg: 'bg-[#e6f0ff]',
          color: 'text-[#1e3a8a]',
          colorDark: 'text-[#172554]',
          btn: 'bg-[#1e3a8a] w-1/2 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition',
          dot: 'bg-[#1e3a8a]'
        },
        ms: {
          header: 'border-4 border-red-900 bg-red-300 text-red-900',
          bg: 'bg-[#ffebe6]',
          color: 'text-[#8a1e1e]',
          colorDark: 'text-[#450a0a]',
          btn: 'bg-[#8a1e1e] w-1/2 text-white px-5 py-2 rounded-lg hover:bg-red-700 transition',
          dot: 'bg-[#8a1e1e]'
        },
        pp: {
          header: 'border-4 border-green-900 bg-green-300 text-green-900',
          bg: 'bg-[#e6f9e6]',
          color: 'text-[#2f6e4d]',
          colorDark: 'text-[#14532d]',
          btn: 'bg-[#2f6e4d] w-1/2 text-white px-5 py-2 rounded-lg hover:bg-green-700 transition',
          dot: 'bg-[#2f6e4d]'
        },
      };
    },
    carrousels() {
      return [
        { title: 'Projets Personnels Encadrés', data: this.ppe, style: this.carrouselStyles.ppe },
        { title: 'Missions de stages', data: this.ms, style: this.carrouselStyles.ms },
        { title: 'Projets Personnels', data: this.pp, style: this.carrouselStyles.pp },
      ];
    }
  },
  mounted() {
    axios.get('https://hmameri.lyceestvincent.fr/api/home')
      .then(response => {
        this.ppe = response.data.ppe;
        this.ms = response.data.ms;
        this.pp = response.data.pp;
        this.apprentissages = response.data.apprentissages;
        this.projets_has_apprentissages = response.data.projets_has_apprentissages;
        this.vignettes = response.data.vignettes;
        this.documentations = response.data.documentations;
      })
      .catch(error => {
        console.error("Erreur lors de la récupération des données :", error);
      });
      this.$nextTick(() => {
        this.carrousels.forEach((_, i) => {
          const ref = this.$refs['carouselInner' + i]?.[0];
          if (ref) {
            ref.addEventListener('scroll', () => this.handleScroll(i));
          }
        });
      });

  },
  methods: {
    getVignette(id) {
      return this.vignettes.find(v => v.id === id);
    },
    getApprentissage(id) {
      return this.apprentissages.find(a => a.id === id);
    },
    scrollTo(index, carrouselIndex) {
      const refName = 'carouselInner' + carrouselIndex;
      const carousel = this.$refs[refName]?.[0];
      if (!carousel) return;

      const items = carousel.querySelectorAll('.snap-start');
      if (items[index]) {
        const offsetLeft = items[index].offsetLeft;
        carousel.scrollTo({ left: offsetLeft, behavior: 'smooth' });

        // Mise à jour du currentIndex pour le carrousel actuel
        this.$set(this.currentIndexes, carrouselIndex, index);
      }
    },
    handleScroll(carrouselIndex) {
      const carousel = this.$refs['carouselInner' + carrouselIndex]?.[0];
      if (!carousel) return;

      const items = carousel.querySelectorAll('.snap-start');
      let closestIndex = 0;
      let closestOffset = Infinity;

      items.forEach((item, index) => {
        const offset = Math.abs(item.getBoundingClientRect().left - carousel.getBoundingClientRect().left);
        if (offset < closestOffset) {
          closestOffset = offset;
          closestIndex = index;
        }
      });

      if (this.currentIndexes[carrouselIndex] !== closestIndex) {
        this.currentIndexes[carrouselIndex] = closestIndex;  // Directly mutate for reactivity test
      }
    },

    openDocumentationModal(id) {
      this.selectedProjetId = id;
      this.selectedProject = [...this.ppe, ...this.ms, ...this.pp].find(p => p.id === id);
    },
    closeModal() {
      this.selectedProjetId = null;
      this.selectedProject = null;
    },
    openFullscreen(vignette) {
      this.fullscreenVignette = vignette;
    },
    closeFullscreen() {
      this.fullscreenVignette = null;
    },
  }
};
</script>
<style scoped>
.snap-x {
  scroll-snap-type: x mandatory;
}
.snap-start {
  scroll-snap-align: center;
}
</style>
