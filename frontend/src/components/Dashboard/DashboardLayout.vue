<script setup>
import UserInfo from "./UserInfo.vue";
import TotalTicketsCard from "./TotalTicketsCard.vue";
import OpenTicketsCard from "./OpenTicketsCard.vue";
import { ref } from "vue";
import axios from "@/lib/axios";

const getUserTickets = async () => {
  const authUser = JSON.parse(localStorage.getItem("user"));
  const userTickets = (await axios.get(`/api/users/${authUser.uuid}/tickets`))
    .data.data;
  return userTickets;
};

const userData = ref(await getUserTickets());
const userTickets = userData.value.tickets;
</script>

<template>
  <UserInfo :name="userData.name" />
  <div class="mt-6">
    <OpenTicketsCard class="mb-3" :tickets="userTickets" />
    <TotalTicketsCard :tickets="userTickets" />
  </div>
</template>
