<script setup>
const props = defineProps({
  status: null,
});
let labelColor = "py-0.5 text-xs font-bold text-white px-3 rounded uppercase ";
switch (props.status) {
  case "open":
    labelColor += "bg-green-600";
    break;
  case "closed":
    labelColor += " bg-orange-500";
    break;
}
</script>

<template>
  <span :class="labelColor">{{ props.status }}</span>
</template>
