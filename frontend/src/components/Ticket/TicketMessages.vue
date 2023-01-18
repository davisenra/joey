<script setup>
import moment from "moment";
import { ref } from "vue";
import { useRoute } from "vue-router";
import { useAuthStore } from "@/stores/auth.js";
import axios from "@/lib/axios";
import PaperPlane from "@/components/Icons/PaperPlaneIcon.vue";
import TrashIcon from "@/components/Icons/TrashIcon.vue";

const userUuid = useAuthStore().authUser.uuid;
const ticketId = useRoute().params.ticketId;
const messageContent = ref("");

const fetchMessages = async () => {
  const response = await axios.get(`/api/messages/${ticketId}`);
  return response.data.data;
};

const postNewMessage = async () => {
  const response = await axios.post(`/api/messages/${ticketId}`, {
    message: messageContent.value,
  });

  if (response.status === 201) {
    messageContent.value = "";
    messages.value = await fetchMessages();
  }
};

const destroyMessage = async (id) => {
  const response = await axios.delete(`/api/messages/${id}`);

  if (response.status === 204) {
    messages.value = await fetchMessages();
  }
};

const messages = ref(await fetchMessages());
</script>

<template>
  <h2 class="mb-2 text-lg font-medium text-gray-700">Messages:</h2>

  <div class="mb-3">
    <form @submit.prevent="postNewMessage">
      <textarea
        v-model="messageContent"
        placeholder="Write new message"
        class="h-24 w-full rounded-md border-2 border-gray-100 py-2 pl-3 text-gray-700 focus:outline-0"
        minlength="10"
      >
      </textarea>
      <button
        type="submit"
        class="my-2 flex w-max items-center justify-center gap-1 rounded bg-green-300 px-3 py-1 font-medium text-gray-900 transition-all hover:bg-green-400"
      >
        <PaperPlane /> Send
      </button>
    </form>
  </div>

  <div v-for="message in messages" :key="message.id" class="flex flex-col">
    <div class="mb-4 rounded px-4 py-3 text-gray-700 shadow">
      <div class="flex items-center justify-between py-2">
        <p class="font-medium">
          {{ message.user.name }}
          <span class="ml-1 text-xs font-normal text-gray-500">
            {{ moment(message.created_at).fromNow() }}
          </span>
        </p>
        <button
          v-if="message.user.uuid == userUuid"
          @click="destroyMessage(message.id)"
        >
          <TrashIcon class="cursor-pointer text-red-400 hover:text-red-500" />
        </button>
      </div>
      <p class="text-sm">{{ message.message }}</p>
    </div>
  </div>
</template>
