<script setup>
const props = defineProps({
  category: null,
});
</script>

<template>
  <span class="h-max rounded bg-gray-100 px-2 text-sm">
    {{ props.category }}
  </span>
</template>
