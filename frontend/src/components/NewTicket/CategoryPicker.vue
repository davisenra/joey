<script setup>
import axios from "@/lib/axios";
import { ref } from "vue";

const fetchCategories = async () => {
  const response = await axios.get("/api/categories");
  return response.data.data;
};

const categories = ref(await fetchCategories());
</script>

<template>
  <div class="flex flex-wrap">
    <label
      class="my-1 flex w-1/2 items-center px-2 text-gray-700 sm:w-max"
      v-for="category in categories"
      :key="category.id"
    >
      <input type="checkbox" class="mr-2 h-4 w-4" />
      <span>{{ category.name }}</span>
    </label>
  </div>
</template>
