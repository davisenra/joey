<script setup>
import { ref } from "vue";
import CloseIcon from "@/components/Icons/CloseIcon.vue";

const props = defineProps({
  images: {
    type: Array,
    default: () => [],
  },
});

const galleryOpen = ref(false);
let galleryImage = "";

function openGallery(image) {
  galleryOpen.value = true;
  galleryImage = image;
  document.body.classList.toggle("overflow-hidden");
}

function closeGallery() {
  galleryOpen.value = false;
  document.body.classList.toggle("overflow-hidden");
}
</script>

<template>
  <Transition appear>
    <div
      v-show="galleryOpen"
      class="fixed inset-0 z-10 flex h-screen w-screen items-center justify-center bg-black bg-opacity-70"
    >
      <div class="flex flex-col items-center rounded bg-white shadow">
        <button
          class="mx-2 mt-2 flex self-end rounded p-1 transition-all hover:bg-gray-100"
          @click="closeGallery"
        >
          <CloseIcon />
        </button>
        <img class="h-full w-auto p-3" :src="galleryImage" />
      </div>
    </div>
  </Transition>

  <div
    class="mt-4 flex w-full flex-wrap items-center justify-center p-3 shadow"
    v-show="props.images.length > 0"
  >
    <div
      v-for="image in props.images"
      :key="image.uuid"
      class="m-2 flex cursor-pointer flex-col items-center justify-center rounded border bg-gray-50 p-2 transition-all hover:bg-gray-300"
      @click="openGallery(image.url)"
    >
      <img :src="image.url" class="h-36 w-36" />
    </div>
  </div>
</template>
