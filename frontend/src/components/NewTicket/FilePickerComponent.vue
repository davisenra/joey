<script setup>
import CloudUploadIcon from "../Icons/CloudUploadIcon.vue";
import TrashIcon from "../Icons/TrashIcon.vue";
import { ref } from "vue";
import { useNewTicketStore } from "@/stores/newTicketStore.js";

const newTicketStore = useNewTicketStore();
const file = ref(null);

const generateURL = (file) => {
  let fileSrc = URL.createObjectURL(file);
  setTimeout(() => {
    URL.revokeObjectURL(fileSrc);
  }, 1000);
  return fileSrc;
};
</script>

<template>
  <div class="flex w-full flex-col items-center justify-center">
    <label
      class="flex h-36 w-full cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-gray-300 bg-gray-50 hover:bg-gray-100"
    >
      <div class="flex flex-col items-center justify-center pt-5 pb-6">
        <p class="mb-2 flex gap-1 text-sm text-gray-500">
          <CloudUploadIcon /> Click to upload or drag and drop an image
        </p>
        <p class="text-xs text-gray-500">Allowed formats: .jpg .png .gif</p>
      </div>
      <input
        class="hidden"
        type="file"
        name="file"
        id="fileInput"
        ref="file"
        multiple
        @change="newTicketStore.addImage(file)"
        accept=".jpg,.jpeg,.png"
      />
    </label>

    <div
      class="mt-4 flex w-full flex-wrap items-center justify-center self-start p-3 shadow"
      v-show="newTicketStore.images.length > 0"
    >
      <div
        v-for="image in newTicketStore.images"
        :key="image.name"
        class="m-2 flex flex-col items-center justify-center rounded border bg-gray-50 p-2"
      >
        <img :src="generateURL(image)" class="h-24 w-24" />
        <button type="button" @click="newTicketStore.removeImage(image)">
          <TrashIcon class="mt-2 text-red-500 hover:text-red-700" />
        </button>
      </div>
    </div>
  </div>
</template>
