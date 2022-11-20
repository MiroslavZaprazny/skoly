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
  },
  {
    path: "/register",
    name: "register",
    component: () => import("../pages/register/register.vue")
  }
];


const router = createRouter({
	history: createWebHistory(),
	routes,
})

export default router;