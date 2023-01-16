<script setup>
import NewTicketLayout from "@/components/NewTicket/NewTicketLayout.vue";
import BackArrowIcon from "@/components/Icons/BackArrowIcon.vue";
</script>

<template>
  <div class="container mx-auto w-full">
    <router-link
      to="/tickets"
      class="mb-6 flex gap-3 font-medium text-gray-700 hover:text-gray-900"
    >
      <BackArrowIcon /> Return to tickets list
    </router-link>
    <Suspense>
      <NewTicketLayout />
    </Suspense>
  </div>
</template>
