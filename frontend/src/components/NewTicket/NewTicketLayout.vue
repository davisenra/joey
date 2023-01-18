<script setup>
import CategoryPicker from "./CategoryPicker.vue";
import LabelPicker from "./LabelPicker.vue";
import FilePickerComponent from "./FilePickerComponent.vue";
import { useNewTicketStore } from "@/stores/newTicketStore.js";
import { ref } from "vue";

const newTicketStore = useNewTicketStore();

const payload = ref({
  title: "",
  description: "",
  priority: "",
});
</script>

<template>
  <div class="mt-6">
    <div class="relative w-full rounded-md bg-white px-6 py-6 shadow">
      <p class="text-xl font-medium">New ticket</p>

      <form @submit.prevent="newTicketStore.submitTicket(payload)">
        <div class="mt-6 w-full">
          <div class="mb-3">
            <p class="font-regular mb-2 text-gray-700">Title</p>
            <input
              v-model="payload.title"
              type="text"
              class="w-full rounded-md border-2 border-gray-100 py-2 pl-3 text-gray-700 focus:outline-0"
              placeholder="Title"
              required
            />
          </div>

          <div class="mb-2">
            <p class="font-regular mb-2 text-gray-700">Description</p>
            <textarea
              class="h-32 w-full rounded-md border-2 border-gray-100 py-2 pl-3 text-gray-700 focus:outline-0"
              v-model="payload.description"
              placeholder="Description"
            ></textarea>
          </div>
        </div>

        <hr class="my-3" />

        <div class="w-full">
          <p class="font-regular mb-2 text-gray-700">Priority</p>
          <div class="mb-3">
            <select
              v-model="payload.priority"
              class="block w-full rounded-md border-2 border-gray-100 bg-transparent py-2 pl-3 pr-10 text-base focus:outline-0 sm:text-sm"
            >
              <option value="low">Low</option>
              <option value="normal">Normal</option>
              <option value="high">High</option>
            </select>
          </div>
        </div>

        <div class="flex w-full flex-col gap-2">
          <div>
            <p class="font-regular mb-2 text-gray-700">Categories</p>
            <CategoryPicker />
          </div>
          <div>
            <p class="font-regular mb-2 text-gray-700">Labels</p>
            <LabelPicker />
          </div>
        </div>

        <hr class="my-3" />

        <div class="w-full">
          <p class="font-regular mb-2 text-gray-700">Screenshots</p>
          <FilePickerComponent />
        </div>

        <button
          type="submit"
          class="mt-6 block w-full rounded bg-green-300 px-3 py-2 font-medium transition-all hover:bg-green-400"
        >
          Create
        </button>
      </form>
    </div>
  </div>
</template>
