<script setup>
import moment from "moment";
import TicketPriorityLabel from "./TicketPriorityLabel.vue";
import TicketStatusLabel from "./TicketStatusLabel.vue";
const props = defineProps({
  tickets: {},
});
</script>

<template>
  <div
    class="relative w-full overflow-x-auto rounded-md bg-white px-6 pb-6 shadow"
  >
    <p class="py-6 text-lg">Open tickets</p>
    <table class="w-full text-left text-sm text-gray-500">
      <thead class="text-sm uppercase text-gray-700">
        <tr>
          <th scope="col" class="px-6 py-3">Title</th>
          <th scope="col" class="px-6 py-3 text-center">Created</th>
          <th scope="col" class="px-6 py-3 text-center">Priority</th>
          <th scope="col" class="px-6 py-3 text-center">Status</th>
          <th scope="col" class="px-6 py-3 text-center">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="ticket in props.tickets" :key="ticket.uuid" class="border-b">
          <th
            scope="row"
            class="whitespace-nowrap px-6 py-4 font-medium text-gray-900"
          >
            {{ ticket.title }}
          </th>
          <td class="px-6 py-4 text-center">
            {{ moment(ticket.created_at).fromNow() }}
          </td>
          <td class="px-6 py-4 text-center">
            <TicketPriorityLabel :priority="ticket.priority" />
          </td>
          <td class="px-6 py-4 text-center">
            <TicketStatusLabel :status="ticket.status" />
          </td>
          <td class="px-6 py-4 text-center">
            <router-link
              :to="'/tickets/' + ticket.uuid"
              class="rounded bg-gray-100 px-3 py-1 hover:bg-gray-200"
            >
              Show
            </router-link>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
