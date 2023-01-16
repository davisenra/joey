<script setup>
import { useRoute } from "vue-router";
import { ref } from "vue";
import axios from "@/lib/axios";
import moment from "moment";
import TicketStatusLabel from "../Tickets/TicketStatusLabel.vue";
import TicketPriorityLabel from "../Tickets/TicketPriorityLabel.vue";
import TicketCategory from "./TicketCategory.vue";
import TicketLabel from "./TicketLabel.vue";
import TicketMessages from "./TicketMessages.vue";

const fetchTickets = async () => {
  const response = await axios.get(`/api/tickets/${ticketId}`);
  return response.data.data;
};

const ticketId = useRoute().params.ticketId;
const ticket = ref(await fetchTickets());
</script>

<template>
  <div class="relative w-full rounded-md bg-white px-6 py-6 shadow">
    <div class="flex gap-2">
      <TicketStatusLabel :status="ticket.status" />
      <TicketPriorityLabel :priority="ticket.priority" />
    </div>

    <div class="py-3">
      <div class="flex flex-col justify-between md:flex-row">
        <h2 class="text-lg font-bold text-gray-700">{{ ticket.title }}</h2>
        <p class="text-sm text-gray-500">
          Created {{ moment(ticket.created_at).fromNow() }}
        </p>
      </div>
      <p class="mt-3 w-full bg-transparent text-gray-700">
        {{ ticket.description }}
      </p>
    </div>
    <div></div>

    <div class="mb-3 flex items-center gap-2">
      <p class="text-sm text-gray-700">Categories:</p>
      <p v-show="ticket.categories.length === 0" class="text-sm text-gray-700">
        no categories
      </p>
      <TicketCategory
        v-for="category in ticket.categories"
        :key="category"
        :category="category.name"
      />
    </div>

    <div class="mb-3 flex items-center gap-2">
      <p class="text-sm text-gray-700">Labels:</p>
      <p v-show="ticket.labels.length === 0" class="text-sm text-gray-700">
        no labels
      </p>
      <TicketLabel
        v-for="label in ticket.labels"
        :key="label"
        :label="label.name"
      />
    </div>
  </div>

  <div class="relative mt-4 w-full rounded-md bg-white px-6 py-6 shadow">
    <TicketMessages />
  </div>
</template>
