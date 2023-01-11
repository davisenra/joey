<script setup>
import TicketIcon from "@/components/Icons/TicketIcon.vue";
const props = defineProps({
  tickets: {},
});
</script>

<template>
  <div class="flex bg-white py-3 px-3 rounded-md max-w-sm shadow-sm">
    <div class="rounded-full h-12 w-12 p-2 bg-red-100 fill-red-500">
      <TicketIcon />
    </div>
    <div class="flex flex-col ml-4">
      <p class="text-neutral-900">Total tickets</p>
      <p class="font-bold text-lg">{{ props.tickets.length }}</p>
    </div>
  </div>
</template>
