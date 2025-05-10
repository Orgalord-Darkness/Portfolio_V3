import { createRouter, createWebHistory } from 'vue-router';
import Presentation from './components/Presentation.vue';
import Projets from './components/Projets.vue';
// import Projets from './components/Projets.vue';
// import Parcours from './components/Parcours.vue';
// import Certifications from './components/Certifications.vue';
// import Contact from './components/Contact.vue';

const routes = [
//   { path: "/presentation", component: Presentation },
  { path: "/projets", component: Projets },
//   { path: "/parcours", component: Parcours },
//   { path: "/certifications", component: Certifications },
//   { path: "/contact", component: Contact }
];

const router = createRouter({
  history: createWebHistory(),
  routes
});

export default router;
