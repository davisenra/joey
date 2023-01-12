<script setup>
import { RouterView } from "vue-router";
import HeaderComponent from "./components/Header/HeaderComponent.vue";
import SidebarComponent from "@/components/Sidebar/SidebarComponent.vue";
import { useAuthStore } from "./stores/auth";
import { ref } from "vue";

const authStore = useAuthStore();
const sidebarOpen = ref(false);
const handleSidebarToggle = () => (sidebarOpen.value = !sidebarOpen.value);
</script>

<template>
  <HeaderComponent @toggle-sidebar="handleSidebarToggle" />
  <div class="flex flex-grow h-full">
    <Transition name="slide-fade">
      <SidebarComponent
        v-show="authStore.isAuthenticated && sidebarOpen"
        @toggle-sidebar="handleSidebarToggle"
      />
    </Transition>
    <div class="container mx-auto">
      <div class="flex flex-grow h-full mt-8 px-4">
        <RouterView />
      </div>
    </div>
  </div>
</template>
