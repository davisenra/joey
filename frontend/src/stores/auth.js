import { defineStore } from "pinia";
import axios from "../lib/axios";

export const useAuthStore = defineStore("auth", {
  state: () => ({
    authUser: JSON.parse(localStorage.getItem("user")),
  }),
  getters: {
    isManager: (state) =>
      state.authUser !== null && state.authUser.role == "manager",
    isAuthenticated: (state) => state.authUser !== null,
  },
  actions: {
    async getToken() {
      await axios.get("/sanctum/csrf-cookie");
    },
    async getUser() {
      return (await axios.get("/api/me")).data;
    },
    async login(data) {
      await this.getToken();
      const res = await axios.post("/login", {
        email: data.value.email,
        password: data.value.password,
      });

      if (res.status === 204 || res.status === 302) {
        const user = await this.getUser();
        localStorage.setItem("user", JSON.stringify(user));
        this.authUser = localStorage.getItem("user");
        this.router.push("/");
      }
    },
    async register(data) {
      await this.getToken();
      const res = await axios.post("/register", {
        name: data.name,
        surname: data.surname,
        email: data.email,
        password: data.password,
        password_confirmation: data.confirmPassword,
      });

      if (res.status === 204) {
        const user = await this.getUser();
        localStorage.setItem("user", JSON.stringify(user));
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
