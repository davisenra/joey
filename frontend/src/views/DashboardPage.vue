<script setup>
import UserInfo from "@/components/Dashboard/UserInfo.vue";
</script>

<template>
  <div class="w-full container mx-auto">
    <Suspense>
      <UserInfo />
    </Suspense>
  </div>
</template>
