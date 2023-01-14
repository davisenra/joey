<script setup>
import { ref } from "vue";
import { useAuthStore } from "../../stores/auth";
import LoginIcon from "../Icons/LoginIcon.vue";

const authStore = useAuthStore();
const payload = ref({
  email: "",
  password: "",
});
const handleLogin = async () => {
  await authStore.login(payload);
};
</script>

<template>
  <div class="flex flex-col rounded-md bg-white px-12 py-12 shadow-sm">
    <h1 class="mb-3 text-xl font-bold text-gray-700">Login</h1>
    <form @submit.prevent="handleLogin">
      <div class="mt-6 w-64 md:w-96">
        <p class="font-regular mb-2 text-gray-700">Email</p>
        <input
          type="email"
          v-model="payload.email"
          class="w-full rounded-md border-2 border-gray-100 py-2 pl-3 text-gray-700 focus:outline-0"
          placeholder="Email"
          required
        />
      </div>
      <div class="mt-3 w-64 md:w-96">
        <p class="font-regular mb-2 text-gray-700">Password</p>
        <input
          type="password"
          v-model="payload.password"
          class="w-full rounded-md border-2 border-gray-100 py-2 pl-3 text-gray-700 focus:outline-0"
          placeholder="Password"
          required
        />
      </div>
      <button
        type="submit"
        class="mt-6 block w-full rounded bg-green-300 px-3 py-2 font-medium transition-all hover:bg-green-400"
      >
        Login <LoginIcon />
      </button>
    </form>
    <div class="mt-6 flex justify-center text-gray-700">
      <router-link to="/register" class="transition-all hover:text-gray-900"
        >Don't have an account? Register</router-link
      >
    </div>
  </div>
</template>
