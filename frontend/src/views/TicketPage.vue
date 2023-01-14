<script setup>
import TicketLayout from "@/components/Ticket/TicketLayout.vue";
import BackArrowIcon from "@/components/Icons/BackArrowIcon.vue";
</script>

<template>
  <div class="flex w-full flex-col">
    <router-link
      to="/tickets"
      class="mb-6 flex gap-3 font-medium text-gray-700 hover:text-gray-900"
    >
      <BackArrowIcon /> Return to tickets list
    </router-link>
    <Suspense>
      <TicketLayout />
    </Suspense>
  </div>
</template>
