<script setup>
import { ref } from "vue";
const menuClosed = ref(true);
const iconClass = ref("fa-solid fa-bars");
const toggleMenuIcon = () => {
  !menuClosed.value
    ? (iconClass.value = "fa-solid fa-bars")
    : (iconClass.value = "fa-solid fa-xmark");
  menuClosed.value = !menuClosed.value;
};
</script>

<template>
  <button
    class="flex justify-center items-center mr-3 mt-1 h-6 w-6 text-gray-700"
    @click="toggleMenuIcon"
  >
    <i :class="iconClass"></i>
  </button>
</template>
