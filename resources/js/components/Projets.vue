<template>
  <!--Bloc PPE-->
  <div class="h-screen mt-10">
    <!-- Titre du carrousel -->
    <div class="mx-auto w-1/2 border-4 border-blue-900 bg-blue-300 px-8 py-3 rounded shadow text-blue-900 text-2xl font-semibold mb-6">
      <h1 class="text-center">Projets Personnels Encadrés</h1>
    </div>

    <!-- Carrousel wrapper -->
    <div class="relative w-full max-w-5xl mx-auto" id="carousel-1">
      <div
        ref="carousel"
        class="flex overflow-x-hidden snap-x snap-mandatory space-x-6 transition-all duration-500"
        id="carousel-inner-1"
      >
        <div
          v-for="(projet, index) in ppe"
          :key="index"
          class="snap-start bg-[#e6f0ff] rounded-xl p-6 shadow-md flex items-center space-x-6 min-w-full w-full"
        >
          <!-- Partie Vignette -->
          <div class="w-1/2 h-70 bg-white border border-gray-300 rounded-md flex items-center justify-center overflow-hidden">
            <!-- Affichage de l'image de la vignette -->
            <img
              v-if="getVignette(projet.id_vignette)"
              :src="getVignette(projet.id_vignette).chemin"
              alt="Vignette du projet"
              class="object-contain w-full h-full"
            />
          </div>

          <!-- Infos du projet -->
          <div class="w-1/2 flex flex-col justify-between">
            <h2 class="text-2xl font-bold text-[#1e3a8a] text-center">{{ projet.nom }}</h2>
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
            <a href="#" class="bg-[#1e3a8a] w-1/2 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition">
              Voir la documentation
            </a>
          </div>
        </div>
      </div>

      <!-- Pagination -->
      <div class="bg-[#e6f0ff] flex items-center gap-2 justify-center mt-4" id="pagination-1">
        <button
          v-for="(dot, index) in ppe.length"
          :key="index"
          @click="scrollTo(index,1)"
          class="w-3 h-3 rounded-full transition-all duration-300"
          :class="[index === currentIndex ? 'bg-[#1e3a8a]' : 'bg-gray-300']"
        ></button>
        <p class="text-gray-700 ml-4" id="count-page-1">{{ currentIndex + 1 }}/{{ ppe.length }}</p>
      </div>
    </div>
  </div>

  <!--Bloc MS-->
  <div class="h-screen mt-10">
    <!-- Titre du carrousel -->
    <div class="mx-auto w-1/2 border-4 border-red-900 bg-red-300 px-8 py-3 rounded shadow text-red-900 text-2xl font-semibold mb-6">
      <h1 class="text-center">Projets Personnels Encadrés</h1>
    </div>

    <!-- Carrousel wrapper -->
    <div class="relative w-full max-w-5xl mx-auto" id="carousel-2">
      <div
        ref="carousel"
        class="flex overflow-x-hidden snap-x snap-mandatory space-x-6 transition-all duration-500"
        id="carousel-inner-2"
      >
        <div
          v-for="(projet, index) in ms"
          :key="index"
          class="snap-start bg-[#ffebe6] rounded-xl p-6 shadow-md flex items-center space-x-6 min-w-full w-full"
        >
          <!-- Partie Vignette -->
          <div class="w-1/2 h-70 bg-white border border-gray-300 rounded-md flex items-center justify-center overflow-hidden">
            <!-- Affichage de l'image de la vignette -->
            <img
              v-if="getVignette(projet.id_vignette)"
              :src="getVignette(projet.id_vignette).chemin"
              alt="Vignette du projet"
              class="object-contain w-full h-full"
            />
          </div>

          <!-- Infos du projet -->
          <div class="w-1/2 flex flex-col justify-between">
            <h2 class="text-2xl font-bold text-[#8a1e1e] text-center">{{ projet.nom }}</h2>
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
            <a href="#" class="bg-[#8a1e1e] w-1/2 text-white px-5 py-2 rounded-lg hover:bg-red-700 transition">
              Voir la documentation
            </a>
          </div>
        </div>
      </div>

      <!-- Pagination -->
      <div class="bg-[#ffebe6] flex items-center gap-2 justify-center mt-4" id="pagination-2">
        <button
          v-for="(dot, index) in ms.length"
          :key="index"
          @click="scrollTo(index,2)"
          class="w-3 h-3 rounded-full transition-all duration-300"
          :class="[index === currentIndex2 ? 'bg-[#8a1e1e]' : 'bg-gray-300']"
        ></button>
        <p class="text-gray-700 ml-4" id="count-page-2">{{ currentIndex2 + 1 }}/{{ ms.length }}</p>
      </div>
    </div>
  </div>

  <!--Bloc PP-->
  <div class="h-screen mt-10">
    <!-- Titre du carrousel -->
    <div class="mx-auto w-1/2 border-4 border-green-900 bg-green-300 px-8 py-3 rounded shadow text-green-900 text-2xl font-semibold mb-6">
      <h1 class="text-center">Projets Personnels</h1>
    </div>

    <!-- Carrousel wrapper -->
    <div class="relative w-full max-w-5xl mx-auto" id="carousel-3">
      <div
        ref="carousel"
        class="flex overflow-x-hidden snap-x snap-mandatory space-x-6 transition-all duration-500"
        id="carousel-inner-3"
      >
        <div
          v-for="(projet, index) in pp"
          :key="index"
          class="snap-start bg-[#e6f9e6] rounded-xl p-6 shadow-md flex items-center space-x-6 min-w-full w-full"
        >
          <!-- Partie Vignette -->
          <div class="w-1/2 h-70 bg-white border border-gray-300 rounded-md flex items-center justify-center overflow-hidden">
            <!-- Affichage de l'image de la vignette -->
            <img
              v-if="getVignette(projet.id_vignette)"
              :src="getVignette(projet.id_vignette).chemin"
              alt="Vignette du projet"
              class="object-contain w-full h-full"
            />
          </div>

          <!-- Infos du projet -->
          <div class="w-1/2 flex flex-col justify-between">
            <h2 class="text-2xl font-bold text-[#2f6e4d] text-center">{{ projet.nom }}</h2>
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
            <a href="#" class="bg-[#2f6e4d] w-1/2 text-white px-5 py-2 rounded-lg hover:bg-green-700 transition">
              Voir la documentation
            </a>
          </div>
        </div>
      </div>

      <!-- Pagination -->
      <div class="bg-[#e6f9e6] flex items-center gap-2 justify-center mt-4" id="pagination-3">
        <button
          v-for="(dot, index) in pp.length"
          :key="index"
          @click="scrollTo(index,3)"
          class="w-3 h-3 rounded-full transition-all duration-300"
          :class="[index === currentIndex3 ? 'bg-[#2f6e4d]' : 'bg-gray-300']"
        ></button>
        <p class="text-gray-700 ml-4" id="count-page-3">{{ currentIndex3 + 1 }}/{{ pp.length }}</p>
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
      currentIndex: 0,
      currentIndex2: 0,
      currentIndex3: 0,
    };
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
        console.log('Projets : ', this.ppe);
        console.log('Projets :', this.ms);
        console.log('Projets : ', this.pp);
        console.log('Apprentissages', this.apprentissages);
        console.log('Projets Apprentissages', this.projets_has_apprentissages);
        console.log('Vignettes', this.vignettes);
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
    scrollTo(index, carousel) {
      // Récupérer l'élément du carrousel correspondant
      const projectContainer = this.$refs[`carousel-inner-${carousel}`];
      if (!projectContainer) return;

      const items = projectContainer.querySelectorAll('.snap-start');
      const pagination = document.getElementById(`pagination-${carousel}`);
      if (!pagination) return;

      const dots = pagination.querySelectorAll('.dot');
      const pageCount = document.getElementById(`count-page-${carousel}`);

      // Scroll vers l'élément sélectionné
      items[index].scrollIntoView({ behavior: 'smooth', inline: 'center' });

      // Mettre à jour la pagination
      dots.forEach((dot, i) => {
        dot.classList.toggle('bg-[#b30000]', i === index);
        dot.classList.toggle('bg-gray-300', i !== index);
      });

      if (pageCount) {
        pageCount.textContent = `${index + 1}/${items.length}`;
      }

      // Mettre à jour l'index actif pour Vue
      if (carousel === 1) {
        this.currentIndex1 = index;
      } else {
        this.currentIndex2 = index;
      }
    }

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
#carousel-1 {
  padding-bottom: 20px; /* Ajout d'un padding pour que le carrousel n'ait pas de marge interne */
}
#carousel-inner-1 {
  margin: 0; /* Supprimer la marge interne du carrousel */
}
#pagination-1 {
  padding: 10px 0;
}
#carousel-2 {
  padding-bottom: 20px; /* Ajout d'un padding pour que le carrousel n'ait pas de marge interne */
}
#carousel-inner-2 {
  margin: 0; /* Supprimer la marge interne du carrousel */
}
#pagination-2 {
  padding: 10px 0;
}
</style>
