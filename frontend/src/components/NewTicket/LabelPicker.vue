<script setup>
import axios from "@/lib/axios";
import { ref } from "vue";
import { useNewTicketStore } from "@/stores/newTicketStore.js";

const newTicketStore = useNewTicketStore();

const fetchLabels = async () => {
  const response = await axios.get("/api/labels");
  return response.data.data;
};

const availableLabels = ref(await fetchLabels());
</script>

<template>
  <div class="flex flex-wrap">
    <div
      class="my-1 flex w-1/2 items-center px-2 text-gray-700 sm:w-max"
      v-for="label in availableLabels"
      :key="label.id"
    >
      <input
        type="checkbox"
        :value="label.name"
        :name="label.name"
        @input="newTicketStore.updateLabels(label.name)"
        class="mr-2 h-4 w-4"
      />
      <label :for="label.name">
        <span>{{ label.name }}</span>
      </label>
    </div>
  </div>
</template>
