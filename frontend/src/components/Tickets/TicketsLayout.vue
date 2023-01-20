<script setup>
import { ref } from "vue";
import axios from "@/lib/axios";
import TicketsTable from "@/components/Tickets/TicketsTable.vue";
import TicketIcon from "@/components/Icons/TicketIcon.vue";

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
  <div
    v-else
    class="relative mt-6 flex w-full flex-col justify-center overflow-x-auto rounded-md bg-white px-6 py-6 text-center shadow"
  >
    <p class="text-lg text-gray-700">Looks like you have no open tickets!</p>
    <TicketIcon class="h-24 w-auto opacity-30" />
  </div>
</template>
