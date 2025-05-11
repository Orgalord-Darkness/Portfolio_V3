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
        >
          <div
            v-for="(projet, index) in carrousel.data"
            :key="index"
            class="snap-start rounded-xl p-6 shadow-md flex items-center space-x-6 min-w-full w-full"
            :class="carrousel.style.bg"
          >
            <!-- Vignette -->
            <div class="w-1/2 h-70 bg-white border border-gray-300 rounded-md flex items-center justify-center overflow-hidden">
              <img
                v-if="getVignette(projet.id_vignette)"
                :src="getVignette(projet.id_vignette).chemin"
                alt="Vignette du projet"
                class="object-contain w-full h-full"
              />
            </div>

            <!-- Infos -->
            <div class="w-1/2 flex flex-col justify-between">
              <h2 class="text-2xl font-bold text-center" :class="carrousel.style.color">{{ projet.nom }}</h2>
              <div class="text-sm md:text-base text-gray-800 space-y-2 max-w-3xl">
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
                <p><strong>Github :</strong> {{ projet.github || 'Pas de github' }}</p>
                <p><strong>Durée :</strong> {{ projet.duree }} heures</p>
                <p><strong>Bilan :</strong> {{ projet.bilan }}</p>
              </div>
              <a :class="carrousel.style.btn" href="#">
                Voir la documentation
              </a>
            </div>
          </div>
        </div>

        <!-- Pagination -->
        <div class="flex items-center gap-2 justify-center mt-4" :class="carrousel.style.bg">
          <button
            v-for="(dot, index) in carrousel.data.length"
            :key="index"
            @click="scrollTo(index, i)"
            class="w-3 h-3 rounded-full transition-all duration-300"
            :class="[currentIndexes[i] === index ? carrousel.style.dot : 'bg-gray-300']"
          ></button>
          <p class="text-gray-700 ml-4">{{ currentIndexes[i] + 1 }}/{{ carrousel.data.length }}</p>
        </div>
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
      currentIndexes: [0, 0, 0],
    };
  },
  computed: {
    carrouselStyles() {
      return {
        ppe: {
          header: 'border-4 border-blue-900 bg-blue-300 text-blue-900',
          bg: 'bg-[#e6f0ff]',
          color: 'text-[#1e3a8a]',
          btn: 'bg-[#1e3a8a] w-1/2 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition',
          dot: 'bg-[#1e3a8a]'
        },
        ms: {
          header: 'border-4 border-red-900 bg-red-300 text-red-900',
          bg: 'bg-[#ffebe6]',
          color: 'text-[#8a1e1e]',
          btn: 'bg-[#8a1e1e] w-1/2 text-white px-5 py-2 rounded-lg hover:bg-red-700 transition',
          dot: 'bg-[#8a1e1e]'
        },
        pp: {
          header: 'border-4 border-green-900 bg-green-300 text-green-900',
          bg: 'bg-[#e6f9e6]',
          color: 'text-[#2f6e4d]',
          btn: 'bg-[#2f6e4d] w-1/2 text-white px-5 py-2 rounded-lg hover:bg-green-700 transition',
          dot: 'bg-[#2f6e4d]'
        },
      };
    },
    carrousels() {
      return [
        { title: 'Projets Personnels Encadrés', data: this.ppe, style: this.carrouselStyles.ppe },
        { title: 'Mises en Situation', data: this.ms, style: this.carrouselStyles.ms },
        { title: 'Projets Personnels', data: this.pp, style: this.carrouselStyles.pp },
      ];
    }
  },
  mounted() {
    axios.get("http://127.0.0.1:8000/api/home")
      .then(response => {
        this.ppe = response.data.ppe;
        this.ms = response.data.ms;
        this.pp = response.data.pp;
        this.apprentissages = response.data.apprentissages;
        this.projets_has_apprentissages = response.data.projets_has_apprentissages;
        this.vignettes = response.data.vignettes;
      })
      .catch(error => {
        console.error("Erreur lors de la récupération des données :", error);
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
      const carousel = this.$refs[refName];
      if (!carousel || !carousel[0]) return;
      const items = carousel[0].querySelectorAll('.snap-start');
      if (items[index]) {
        items[index].scrollIntoView({ behavior: 'smooth', inline: 'center' });
        this.$set(this.currentIndexes, carrouselIndex, index);
      }
    },
  },
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
