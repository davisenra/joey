<script setup>
const props = defineProps({
  label: null,
});
</script>

<template>
  <span class="h-max rounded bg-gray-100 px-2 text-sm">
    {{ props.label }}
  </span>
</template>
