<script setup>
import UserInfo from "./UserInfo.vue";
import TotalTicketsCard from "./TotalTicketsCard.vue";
import OpenTicketsCard from "./OpenTicketsCard.vue";
import { ref } from "vue";
import axios from "@/lib/axios";
import { useAuthStore } from "../../stores/auth";

const authStore = useAuthStore();
const authUser = authStore.authUser;
const userData = ref(
  (await axios.get(`/api/users/${authUser.uuid}/tickets`)).data.data
);
const userTickets = userData.value.tickets;
</script>

<template>
  <UserInfo :name="userData.name" />
  <div class="mt-6">
    <OpenTicketsCard class="mb-3" :tickets="userTickets" />
    <TotalTicketsCard :tickets="userTickets" />
  </div>
</template>
