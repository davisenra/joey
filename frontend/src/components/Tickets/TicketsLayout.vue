<script setup>
import { ref } from "vue";
import axios from "@/lib/axios";
import TicketsTable from "@/components/Tickets/TicketsTable.vue";

const authUser = JSON.parse(localStorage.getItem("user"));
const userData = ref(
  (await axios.get(`/api/users/${authUser.uuid}/tickets`)).data.data
);

const userTickets = userData.value.tickets;
const openTickets = userTickets.filter((ticket) => {
  return ticket.status == "open";
});
</script>

<template>
  <div v-if="openTickets.length" class="mt-6">
    <TicketsTable :tickets="openTickets" />
  </div>
</template>
