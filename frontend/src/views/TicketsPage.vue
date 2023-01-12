<script setup>
import TicketsLayout from "@/components/Tickets/TicketsLayout.vue";
import NewTicketButton from "@/components/Tickets/NewTicketButton.vue";
</script>

<template>
  <div class="container mx-auto w-full">
    <div class="flex items-center justify-between">
      <p class="text-xl font-medium">Tickets</p>
      <NewTicketButton />
    </div>
    <Suspense>
      <TicketsLayout />
    </Suspense>
  </div>
</template>
