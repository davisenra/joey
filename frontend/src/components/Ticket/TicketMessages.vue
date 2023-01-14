<script setup>
import moment from "moment";
import PaperPlane from "@/components/Icons/PaperPlaneIcon.vue";
const props = defineProps({
  messages: null,
});
</script>

<template>
  <h2 class="mb-2 text-lg font-medium text-gray-700">Messages:</h2>

  <div class="mb-3">
    <form @submit.prevent="">
      <textarea
        placeholder="Write new message"
        class="h-24 w-full rounded-md border-2 border-gray-100 py-2 pl-3 text-gray-700 focus:outline-0"
      ></textarea>
      <button
        type="submit"
        class="my-2 flex w-max items-center justify-center gap-1 rounded bg-green-300 px-3 py-1 font-medium text-gray-900 transition-all hover:bg-green-400"
      >
        <PaperPlane /> Send
      </button>
    </form>
  </div>

  <div
    v-for="message in props.messages"
    :key="message.id"
    class="flex flex-col"
  >
    <div class="mb-4 rounded px-4 py-3 text-gray-700 shadow">
      <p class="mb-2 font-medium">
        {{ message.user.name }}
        <span class="text-sm font-normal text-gray-500">
          {{ moment(message.created_at).format("lll") }}
        </span>
      </p>
      <p class="text-sm">{{ message.message }}</p>
    </div>
  </div>
</template>
