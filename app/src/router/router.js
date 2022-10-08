import { createRouter, createWebHistory } from 'vue-router';

const routes = [
  { path: '/', 
    redirect: '/homepage' },
  {
    path: "/homepage",
    name: "homepage",
    component: () => import("../pages/homepage/homepage.vue"),
  },
];


const router = createRouter({
	history: createWebHistory(),
	routes,
})

export default router;