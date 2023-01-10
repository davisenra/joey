<script setup>
import { defineProps } from "vue";

const props = defineProps({
  route: null,
  text: null,
});
</script>
<template>
  <router-link
    :to="props.route"
    class="block rounded text-gray-700 px-3 py-1 font-medium hover:text-gray-900 hover:bg-gray-100 transition-all"
  >
    <slot></slot>
  </router-link>
</template>
