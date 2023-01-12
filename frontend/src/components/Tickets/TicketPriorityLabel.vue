<script setup>
const props = defineProps({
  priority: null,
});
let labelColor = "py-0.5 text-xs font-bold text-white px-3 rounded uppercase ";
switch (props.priority) {
  case "high":
    labelColor += " bg-red-600";
    break;
  case "normal":
    labelColor += " bg-orange-500";
    break;
  case "low":
    labelColor += " bg-yellow-400";
    break;
}
</script>

<template>
  <span :class="labelColor">{{ props.priority }}</span>
</template>
