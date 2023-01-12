<script setup>
import TicketIcon from "@/components/Icons/TicketIcon.vue";
const props = defineProps({
  tickets: {},
});
</script>

<template>
  <div class="flex max-w-sm rounded-md bg-white py-3 px-3 shadow-sm">
    <div class="h-12 w-12 rounded-full bg-red-100 fill-red-500 p-2">
      <TicketIcon />
    </div>
    <div class="ml-4 flex flex-col">
      <p class="text-neutral-900">Total tickets</p>
      <p class="text-lg font-bold">{{ props.tickets.length }}</p>
    </div>
  </div>
</template>
