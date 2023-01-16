<script setup>
import axios from "@/lib/axios";
import { ref } from "vue";

const fetchLabels = async () => {
  const response = await axios.get("/api/labels");
  return response.data.data;
};

const labels = ref(await fetchLabels());
</script>

<template>
  <div class="flex flex-wrap">
    <label
      class="my-1 flex w-1/2 items-center px-2 text-gray-700 sm:w-max"
      v-for="label in labels"
      :key="label.id"
    >
      <input type="checkbox" class="mr-2 h-4 w-4" />
      <span>{{ label.name }}</span>
    </label>
  </div>
</template>
