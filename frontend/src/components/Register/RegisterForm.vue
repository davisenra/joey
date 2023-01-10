<script setup>
import { ref } from "vue";
import RegisterIcon from "../Icons/RegisterIcon.vue";

const payload = ref({
  name: "",
  lastName: "",
  email: "",
  password: "",
  confirmPassword: "",
});
</script>

<template>
  <div class="flex flex-col bg-white rounded-md px-12 py-12 shadow-sm">
    <h1 class="text-gray-700 font-bold text-xl mb-3">Register</h1>
    <form @submit.prevent="handleRegister">
      <div class="mt-6 w-64 md:w-96">
        <p class="text-gray-700 font-regular mb-2">Name</p>
        <input
          type="text"
          v-model="payload.name"
          class="w-full pl-3 py-2 rounded-md text-gray-700 border-2 border-gray-100 focus:outline-0"
          placeholder="Name"
          required
        />
      </div>
      <div class="mt-3 w-64 md:w-96">
        <p class="text-gray-700 font-regular mb-2">Last name</p>
        <input
          type="text"
          v-model="payload.lastName"
          class="w-full pl-3 py-2 rounded-md text-gray-700 border-2 border-gray-100 focus:outline-0"
          placeholder="Last name"
          required
        />
      </div>
      <div class="mt-3 w-64 md:w-96">
        <p class="text-gray-700 font-regular mb-2">Email</p>
        <input
          type="email"
          v-model="payload.email"
          class="w-full pl-3 py-2 rounded-md text-gray-700 border-2 border-gray-100 focus:outline-0"
          placeholder="Email"
          required
        />
      </div>
      <div class="mt-3 w-64 md:w-96">
        <p class="text-gray-700 font-regular mb-2">Password</p>
        <input
          type="password"
          v-model="payload.password"
          class="w-full pl-3 py-2 rounded-md text-gray-700 border-2 border-gray-100 focus:outline-0"
          placeholder="Password"
          required
        />
      </div>
      <div class="mt-3 w-64 md:w-96">
        <p class="text-gray-700 font-regular mb-2">Confirm password</p>
        <input
          type="password"
          v-model="payload.confirmPassword"
          class="w-full pl-3 py-2 rounded-md text-gray-700 border-2 border-gray-100 focus:outline-0"
          placeholder="Confirm password"
          required
        />
      </div>
      <button
        type="submit"
        class="mt-6 w-full block rounded px-3 py-2 font-medium bg-green-300 hover:bg-green-400 transition-all"
      >
        Register <RegisterIcon />
      </button>
    </form>
    <div class="flex mt-6 justify-center text-gray-700">
      <router-link to="/login" class="hover:text-gray-900 transition-all"
        >Already a member? Login</router-link
      >
    </div>
  </div>
</template>
