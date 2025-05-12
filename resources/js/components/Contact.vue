<template>
  <form @submit.prevent="submitForm" class="space-y-4">
    <div>
      <label class="block mb-1 text-sm font-medium text-gray-700 text-left">Nom</label>
      <input type="text" v-model="form.nom" required
             class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
    </div>

    <div>
      <label class="block mb-1 text-sm font-medium text-gray-700 text-left">Prénom</label>
      <input type="text" v-model="form.prenom" required
             class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
    </div>

    <div>
      <label class="block mb-1 text-sm font-medium text-gray-700 text-left">Téléphone</label>
      <input type="tel" v-model="form.telephone" required
             class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
    </div>

    <div>
      <label class="block mb-1 text-sm font-medium text-gray-700 text-left">Email</label>
      <input type="email" v-model="form.email" required
             class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
    </div>

    <div>
      <label class="block mb-1 text-sm font-medium text-gray-700 text-left">Société</label>
      <input type="text" v-model="form.societe"
             class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
    </div>

    <div>
      <label class="block mb-1 text-sm font-medium text-gray-700 text-left">Message</label>
      <textarea v-model="form.message"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
    </div>

    <button type="submit"
            class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-200">
      Envoyer
    </button>
  </form>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      form: {
        nom: '',
        prenom: '',
        telephone: '',
        email: '',
        societe: '',
        message: ''
      }
    };
  },
  methods: {
    submitForm() {
      axios.post('http://localhost:8000/api/contact', this.form)
      .then(response => {
        console.log('Formulaire envoyé avec succès', response);
      })
      .catch(error => {
        console.error('Erreur lors de l\'envoi du formulaire', error);
      });
    }
  }
};
</script>
