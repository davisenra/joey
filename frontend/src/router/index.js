import { createRouter, createWebHistory } from "vue-router";
import { useAuthStore } from "@/stores/auth";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/",
      name: "home",
      component: () => import("@/views/DashboardPage.vue"),
    },
    {
      path: "/tickets",
      name: "tickets",
      component: () => import("@/views/TicketsPage.vue"),
    },
    {
      path: "/tickets/:ticketId",
      component: () => import("@/views/TicketPage.vue"),
    },
    {
      path: "/tickets/new",
      component: () => import("@/views/NewTicketPage.vue"),
    },
    {
      path: "/login",
      name: "login",
      component: () => import("../views/LoginPage.vue"),
      beforeEnter: (to) => {
        const authStore = useAuthStore();
        if (authStore.isAuthenticated && to.name === "login") {
          return "/";
        }
      },
    },
    {
      path: "/register",
      name: "register",
      component: () => import("../views/RegisterPage.vue"),
      beforeEnter: (to) => {
        const authStore = useAuthStore();
        if (authStore.isAuthenticated && to.name === "register") {
          return "/";
        }
      },
    },
    {
      path: "/:pathMatch(.*)*",
      redirect: "/",
    },
  ],
});

router.beforeEach(async (to) => {
  const authStore = useAuthStore();
  const publicRoutes = ["/login", "/register"];
  const authRequired = !publicRoutes.includes(to.path);

  if (authRequired && !authStore.isAuthenticated) {
    return "/login";
  }
});

export default router;
