<script setup>
import SidebarLink from "./SidebarLink.vue";
import { useAuthStore } from "../../stores/auth";
const authStore = useAuthStore();
const emits = defineEmits(["toggleSidebar"]);
const handleToggle = () => {
  emits("toggleSidebar");
};
</script>

<template>
  <div
    class="absolute z-10 flex h-full w-96 bg-white pl-3 pr-3 shadow-lg md:w-60"
  >
    <ul class="mt-8 flex-grow space-y-3 pl-1 pr-1 pb-4 text-sm">
      <SidebarLink
        name="Dashboard"
        route="/"
        icon="fa-solid fa-home"
        @click="handleToggle"
      />
      <SidebarLink
        name="Tickets"
        route="/tickets"
        icon="fa-solid fa-ticket"
        @click="handleToggle"
      />
      <SidebarLink
        name="Users"
        route="/"
        icon="fa-solid fa-users"
        v-show="authStore.authUser.role === 'manager'"
        @click="handleToggle"
      />
      <SidebarLink
        name="Categories"
        route="/"
        icon="fa-solid fa-clone"
        v-show="authStore.authUser.role === 'manager'"
        @click="handleToggle"
      />
      <SidebarLink
        name="Labels"
        route="/"
        icon="fa-solid fa-tag"
        v-show="authStore.authUser.role === 'manager'"
        @click="handleToggle"
      />
    </ul>
  </div>
</template>
