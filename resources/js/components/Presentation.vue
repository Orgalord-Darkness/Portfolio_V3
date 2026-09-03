<template>
<div class="relative min-h-screen flex items-center justify-center py-12 px-4 sm:px-0" name="presentation">
  <div class="absolute inset-0 flex items-center justify-center">
    <svg class="w-3/4 h-1/2 opacity-20" viewBox="0 0 800 400" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,100 C200,200 600,0 800,100 L800,400 L0,400 Z" fill="#3b82f6"/>
    </svg>
  </div>

  <div class="relative z-10 flex flex-col md:flex-row bg-blue-100 rounded-xl shadow-lg overflow-hidden w-11/12 max-w-6xl border-4 border-blue-900">
    <div class="w-full md:w-1/2">
      <img :src="avatar" alt="Présentation" class="object-cover object-center border-4 border-blue-100 h-64 sm:h-80 md:h-full w-full rounded shadow-lg">
    </div>

    <div class="w-full md:w-1/2 p-6 sm:p-8 flex flex-col justify-center">
      <h2 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-blue-900 mb-4">Bienvenue sur mon portfolio</h2>
      <p class="text-blue-900 text-lg mb-4">
        Je m'appelle <strong>Heddy Mameri</strong>, <strong>étudiant en Bachelor de coordination de projet web </strong> au CFA Saint Vincent.
      </p>
      <p class="text-blue-900">
        Actuellement en Bachelor (niveau 6) en alternance dans la coordination de projets web après un BTS SIO SLAM obtenu avec 17,29 de moyenne, j’ai développé de solides compétences en développement Full Stack : <strong>PHP 8</strong>, <strong>Symfony 7</strong>, <strong>Laravel 12</strong>, <strong>C#</strong>, <strong>JavaScript</strong>, <strong>Vue 3</strong>, <strong>React 18</strong>, <strong>SQL</strong> ainsi que <strong>Drupal 10</strong> sous <strong>Docker</strong>.
        Admis pour la rentrée 2026 au cycle ingénieur "<strong>UniLaSalle</strong>" en <strong>réseaux et objets connectés</strong>, je recherche une entreprise pour un apprentissage de 3 ans à partir de septembre 2026.
        Mes expériences en agence web et en collectivité m’ont appris la rigueur, l’autonomie et le travail en équipe. Curieux et motivé, je souhaite désormais mettre mes compétences au service de projets orientés <strong>réseau</strong>, <strong>IoT</strong> et <strong>cybersécurité</strong>.
        N’hésitez pas à me contacter !
      </p>
    </div>
  </div>
</div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'Presentation',
  data() {
    return { avatar: '' };
  },
  mounted() {
    axios.get('/api/home')
      .then(response => { this.avatar = response.data.avatar; })
      .catch(() => {});
  },
};
</script>

<style scoped>
h1 { color: #42b983; }
</style>
