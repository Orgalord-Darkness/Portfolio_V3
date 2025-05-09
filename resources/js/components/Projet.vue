<template>
    <div class="relative h-screen flex items-center justify-center" name="projet">
      <div class="absolute inset-0 flex items-center justify-center">
        <svg class="w-3/4 h-1/2 opacity-20" viewBox="0 0 800 400" xmlns="http://www.w3.org/2000/svg">
          <path d="M0,100 C200,200 600,0 800,100 L800,400 L0,400 Z" fill="#3b82f6"/>
        </svg>
      </div>
    
      <div class="relative z-10 flex bg-blue-100 rounded-xl shadow-lg overflow-hidden w-11/12 max-w-6xl border-4 border-blue-900">
        <div class="w-1/2">
          <img :src="avatar" alt="Présentation" class="object-cover object-center border-4 border-blue-100 h-full w-full rounded shadow-lg">
        </div>
    
        <div class="w-1/2 p-8 flex flex-col justify-center">
          <h2 class="text-4xl font-extrabold text-blue-900 mb-4">Bienvenue sur mon portfolio</h2>
          <p class="text-blue-900 text-lg mb-4">
            Je m'appelle <strong>Heddy Mameri</strong>, étudiant de 2e année de <strong>BTS SIO SLAM</strong> à l'institut Saint Vincent
          </p>
          <p class="text-blue-900">
            J’ai appris à être développeur Full Stack, avec des projets en <strong>PHP</strong>, <strong>C#</strong>, <strong>Symfony 7</strong>, <strong>Laravel 12</strong>. 
            Mon objectif est d'atteindre un master en génie informatique spécialisé en Intelligence Artificielle tout en conservant mes compétences Full Stack. 
          </p>
        </div>
      </div>
    </div>
    </template>
      
      <script>
      export default {
        name: 'Projet',
      data() {
        return {
          avatar: ''
        };
      },
      mounted() {
        axios.get("http://127.0.0.1:8000/api/home")
          .then(response => {
            this.avatar = response.data.avatar;
            console.log("Avatar :", this.avatar);
          })
          .catch(error => {
            console.error("Erreur lors de la récupération des données :", error);
          });
      }
    }
      </script>
      
      <style scoped>
      h1 {
        color: #42b983;
      }
      </style>
      
    