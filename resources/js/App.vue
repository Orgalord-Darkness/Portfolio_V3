<template>
    <div>
      <h1>Projets</h1>
      <ul>
        <li v-for="projet in projets" :key="projet.id">
          {{ projet.nom }}
        </li>
      </ul>
    </div>
  </template>
  
  <script>
  import axios from "axios";
  
  export default {
    data() {
      return {
        projets: [],
      };
    },
    mounted() {
      // Récupérer les données depuis Laravel
      axios.get("http://127.0.0.1:8000/api/home")
        .then(response => {
          this.projets = response.data;
          console.log("Projets récupérés :", this.projets); // Debugging avec console.log
        })
        .catch(error => {
          console.error("Erreur lors de la récupération des projets :", error);
        });
    }
  };
  </script>
  
  