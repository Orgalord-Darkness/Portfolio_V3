<template>
  <div class="max-w-lg mx-auto mt-10 px-6">
    <h1 class="text-2xl font-bold text-blue-900 mb-6 text-center">Contactez-moi</h1>

    <div v-if="success" class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg">
      {{ success }}
    </div>
    <div v-if="errorMsg" class="mb-4 p-4 bg-red-100 text-red-800 rounded-lg">
      {{ errorMsg }}
    </div>

    <form @submit.prevent="submitForm" class="space-y-4">
      <div>
        <label class="block mb-1 text-sm font-medium text-gray-700 text-left">Nom *</label>
        <input type="text" v-model="form.nom" required maxlength="100"
               class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
      </div>

      <div>
        <label class="block mb-1 text-sm font-medium text-gray-700 text-left">Prénom *</label>
        <input type="text" v-model="form.prenom" required maxlength="100"
               class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
      </div>

      <div>
        <label class="block mb-1 text-sm font-medium text-gray-700 text-left">Email *</label>
        <input type="email" v-model="form.email" required maxlength="255"
               class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
      </div>

      <div>
        <label class="block mb-1 text-sm font-medium text-gray-700 text-left">Téléphone</label>
        <input type="tel" v-model="form.telephone" maxlength="20"
               class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
      </div>

      <div>
        <label class="block mb-1 text-sm font-medium text-gray-700 text-left">Société</label>
        <input type="text" v-model="form.societe" maxlength="255"
               class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
      </div>

      <div>
        <label class="block mb-1 text-sm font-medium text-gray-700 text-left">Message *</label>
        <textarea v-model="form.message" required minlength="10" maxlength="2000" rows="5"
                  class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
      </div>

      <button type="submit" :disabled="sending"
              class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-200 disabled:opacity-50">
        {{ sending ? 'Envoi en cours…' : 'Envoyer' }}
      </button>
    </form>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'Contact',
  data() {
    return {
      sending: false,
      success: null,
      errorMsg: null,
      form: {
        nom: '',
        prenom: '',
        email: '',
        telephone: '',
        societe: '',
        message: '',
      },
    };
  },
  methods: {
    submitForm() {
      this.sending  = true;
      this.success  = null;
      this.errorMsg = null;

      axios.post('/api/contact', this.form)
        .then(() => {
          this.success = 'Votre message a bien été envoyé. Je vous répondrai dès que possible.';
          this.form = { nom: '', prenom: '', email: '', telephone: '', societe: '', message: '' };
        })
        .catch(err => {
          const data = err.response?.data;
          if (data?.errors) {
            this.errorMsg = Object.values(data.errors).flat().join(' ');
          } else {
            this.errorMsg = 'Une erreur est survenue. Veuillez réessayer.';
          }
        })
        .finally(() => { this.sending = false; });
    },
  },
};
</script>
