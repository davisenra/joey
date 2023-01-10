import { defineStore } from "pinia";
import axios from "../lib/axios";

export const useAuthStore = defineStore("auth", {
  state: () => ({
    authUser: localStorage.getItem("user"),
  }),
  getters: {
    isAuthenticated: (state) => state.authUser !== null,
  },
  actions: {
    async getToken() {
      await axios.get("/sanctum/csrf-cookie");
    },
    async getUser() {
      return await axios.get("/api/me");
    },
    async login(data) {
      await this.getToken();
      const res = await axios.post("/login", {
        email: data.value.email,
        password: data.value.password,
      });

      if (res.status === 204 || res.status === 302) {
        const user = await this.getUser();
        localStorage.setItem("user", JSON.stringify(user.data));
        this.authUser = localStorage.getItem("user");
        this.router.push("/");
      }
    },
    async logout() {
      await axios.post("/logout");
      localStorage.removeItem("user");
      this.authUser = localStorage.getItem("user");
      this.router.push("/login");
    },
  },
});
