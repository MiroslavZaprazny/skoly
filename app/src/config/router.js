import { createRouter, createWebHistory } from 'vue-router';

const routes = [
  {
    path: "/",
    name: "homepage",
    component: () => import("../pages/homepage/homepage.vue"),
  },
  {
    path: "/api/collage/:id",
    name: 'SchoolDetail',
    component: () => import("../pages/schoolpage/schoolpage.vue"),
    props: true
  }
];


const router = createRouter({
	history: createWebHistory(),
	routes,
})

export default router;