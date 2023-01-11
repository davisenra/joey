<script setup>
import TicketIcon from "@/components/Icons/TicketIcon.vue";
const props = defineProps({
  tickets: {},
});
const ticketsCount = props.tickets.filter((element) => {
  return element.status == "open";
});
</script>

<template>
  <div class="flex bg-white py-3 px-3 rounded-md max-w-sm shadow-sm">
    <div class="rounded-full h-12 w-12 p-2 bg-green-100 fill-green-500">
      <TicketIcon />
    </div>
    <div class="flex flex-col ml-4">
      <p class="text-neutral-900">Open tickets</p>
      <p class="font-bold text-lg">{{ ticketsCount.length }}</p>
    </div>
  </div>
</template>
