<template>
  <div>
    <div class="relative w-full max-w-5xl">
      <div class="flex overflow-x-hidden snap-x snap-mandatory space-x-6">
        <div v-for="(projet, index) in items" :key="index" class="snap-start bg-[#e6f0ff] rounded-xl p-6 shadow-md flex items-center space-x-6 min-w-full">
          <!-- Vignette -->
          <div class="w-1/2 h-70 bg-white border border-gray-300 rounded-md flex items-center justify-center overflow-hidden">
            <img v-if="getVignette(projet)" :src="getVignette(projet).chemin" alt="Vignette du projet" class="object-contain w-full h-full" />
          </div>

          <!-- Description -->
          <div class="w-1/2 flex flex-col justify-between">
            <h2 class="text-2xl font-bold text-[#1e3a8a] text-center">{{ projet.nom }}</h2>
            <div class="text-sm md:text-base text-gray-800 space-y-2 max-w-3xl">
              <p><span class="font-semibold">Description :</span> {{ projet.description }}</p>
              <p><span class="font-semibold">Responsable :</span> {{ projet.chef }}</p>

              <div class="flex items-start gap-2 flex-wrap">
                <span class="font-semibold">Stack :</span>
                <div class="flex gap-2 flex-wrap">
                  <img v-for="(apprentissage, index) in getStack(projet)" :key="index" :src="apprentissage.vignette.chemin" alt="Apprentissage" class="h-20 w-20 object-contain rounded" />
                </div>
              </div>
              <p><span class="font-semibold">Github :</span> {{ projet.github || 'Pas de github' }}</p>
              <p><span class="font-semibold">Durée :</span> {{ projet.duree || '50' }} heures</p>
              <p><span class="font-semibold">Bilan :</span> {{ projet.bilan || "L'ensemble des fonctionnalités est traité, c’est du bon travail." }}</p>
            </div>

            <a href="#" class="bg-[#1e3a8a] w-1/2 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition">
              Voir la documentation
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- Pagination -->
    <div :id="paginationId" class="bg-[#e6f0ff] flex items-center gap-2 justify-center">
      <button v-for="(dot, index) in items.length" :key="index" class="w-3 h-3 rounded-full bg-blue-900 transition-all duration-300 dot" @click="scrollToProject(index)"></button>
      <p class="text-gray-700 ml-4">{{ currentIndex + 1 }}/{{ items.length }}</p>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    items: Array,
    vignettes: Array,
    apprentissages: Array,
    paginationId: String
  },
  data() {
    return {
      currentIndex: 0
    };
  },
  methods: {
    getVignette(projet) {
      return this.vignettes.find(v => v.id === projet.id_vignette);
    },
    getStack(projet) {
      const projectApprentissages = this.apprentissages.filter(apprentissage =>
        projet.apprentissages.includes(apprentissage.id)
      );
      return projectApprentissages;
    },
    scrollToProject(index) {
      const project = this.$refs[`project-${index}`];
      project.scrollIntoView({ behavior: 'smooth', inline: 'center' });
      this.currentIndex = index;
    }
  }
};
</script>
