<script setup>
import CloudUploadIcon from "../Icons/CloudUploadIcon.vue";
</script>

<template>
  <div class="flex w-full items-center justify-center">
    <label
      class="flex h-36 w-full cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-gray-300 bg-gray-50 hover:bg-gray-100"
    >
      <div class="flex flex-col items-center justify-center pt-5 pb-6">
        <p class="mb-2 flex gap-1 text-sm text-gray-500">
          <CloudUploadIcon /> Click to upload or drag and drop an image
        </p>
        <p class="text-xs text-gray-500">Allowed formats: .jpg .png .gif</p>
      </div>
      <input type="file" class="hidden" />
    </label>
  </div>
</template>
