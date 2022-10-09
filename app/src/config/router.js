import { createRouter, createWebHistory } from 'vue-router';

const routes = [
  {
    path: "/",
    name: "homepage",
    component: () => import("../pages/homepage/homepage.vue"),
  },
];


const router = createRouter({
	history: createWebHistory(),
	routes,
})

export default router;