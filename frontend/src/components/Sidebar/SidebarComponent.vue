<script setup>
import SidebarLink from "./SidebarLink.vue";
</script>

<template>
  <div class="bg-white fixed flex h-full pl-3 pr-3 w-96 md:w-60 shadow-md">
    <ul class="mt-8 flex-grow pl-1 pr-1 pb-4 space-y-3 text-sm">
      <SidebarLink name="Dashboard" route="/" icon="fa-solid fa-home" />
      <SidebarLink name="Tickets" route="/" icon="fa-solid fa-ticket" />
      <SidebarLink name="Users" route="/" icon="fa-solid fa-users" />
      <SidebarLink name="Categories" route="/" icon="fa-solid fa-clone" />
      <SidebarLink name="Labels" route="/" icon="fa-solid fa-tag" />
    </ul>
  </div>
</template>
