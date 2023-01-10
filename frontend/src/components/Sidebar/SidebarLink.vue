<script setup>
import { defineProps } from "vue";

const props = defineProps({
  name: null,
  icon: null,
  route: null,
});
</script>

<template>
  <li class="rounded-sm w-full">
    <router-link
      :to="{ path: props.route }"
      class="flex items-center p-2 rounded-md space-x-3 text-gray-700 text-lg hover:text-gray-900 hover:bg-gray-100 transition-all"
    >
      <i :class="icon"></i>
      <span>{{ props.name }}</span>
    </router-link>
  </li>
</template>
