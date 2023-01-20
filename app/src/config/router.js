import { createRouter, createWebHistory } from "vue-router";

const routes = [
  {
    path: "/",
    name: "homepage",
    component: () => import("../pages/homepage/homepage.vue"),
  },
  {
    path: "/collage/:slug",
    name: "SchoolDetail",
    component: () => import("../pages/schoolpage/schoolpage.vue"),
    props: true,
  },
  {
    path: "/register",
    name: "register",
    component: () => import("../pages/register/register.vue"),
  },
  {
    path: "/login",
    name: "login",
    component: () => import("../pages/login/login.vue"),
  },
  {
    path: "/review/:id",
    name: "reviewDetail",
    component: () => import("../pages/reviews/reviewDetail.vue"),
    props: true,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
