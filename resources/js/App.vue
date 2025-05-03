<template>
    <div>
      <h1>Liste des Projets</h1>
      <ul>
        <li v-for="projet in projets" :key="projet.id">
          {{ projet.nom }} - {{ projet.description }}
        </li>
      </ul>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        projets: [], // Tableau vide pour stocker les projets récupérés
      };
    },
    mounted() {
      // Appel API pour récupérer les projets
      axios.get('/api/home')  // Assure-toi que cette URL correspond à celle de ton API
        .then(response => {
          // Afficher les données dans la console pour déboguer
          console.log('Réponse API:', response.data);
          this.projets = response.data; // Assigner les données à la variable projets
        })
        .catch(error => {
          console.error('Erreur lors de la récupération des projets:', error);
        });
    }
  };
  </script>
  