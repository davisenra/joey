<script setup>
const props = defineProps({
  name: null,
});
</script>

<template>
  <div>
    <p class="text-xl font-medium">Welcome back, {{ props.name }}!</p>
  </div>
</template>
