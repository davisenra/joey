<script setup>
import axios from "@/lib/axios";
import { ref } from "vue";
import { useNewTicketStore } from "@/stores/newTicketStore.js";

const newTicketStore = useNewTicketStore();

const fetchCategories = async () => {
  const response = await axios.get("/api/categories");
  return response.data.data;
};

const availableCategories = ref(await fetchCategories());
</script>

<template>
  <div class="flex flex-wrap">
    <div
      class="my-1 flex w-1/2 items-center px-2 text-gray-700 sm:w-max"
      v-for="category in availableCategories"
      :key="category.id"
    >
      <input
        type="checkbox"
        :value="category.name"
        :name="category.name"
        @input="newTicketStore.updateCategories(category.name)"
        class="mr-2 h-4 w-4"
      />
      <label :for="category.name">
        <span>{{ category.name }}</span>
      </label>
    </div>
  </div>
</template>
