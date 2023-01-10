<script setup>
import { useAuthStore } from "../../stores/auth";
import JoeyLogo from "../Icons/JoeyLogo.vue";
import LoginIcon from "../Icons/LoginIcon.vue";
import LogoutIcon from "../Icons/LogoutIcon.vue";
import RegisterIcon from "../Icons/RegisterIcon.vue";
import HeaderLink from "./HeaderLink.vue";
import { storeToRefs } from "pinia";
import MenuButton from "./MenuButton.vue";

const authStore = useAuthStore();
const { isAuthenticated } = storeToRefs(authStore);
const emits = defineEmits(["toggleSidebar"]);
const handeToggle = () => {
  emits("toggleSidebar");
};
</script>

<template>
  <header class="bg-white drop-shadow-sm">
    <div class="flex items-center justify-between h-16 px-2 mx-auto container">
      <div
        class="flex items-center justify-center px-1 h-full font-bold text-2xl"
      >
        <Transition appear>
          <MenuButton v-show="isAuthenticated" @click="handeToggle" />
        </Transition>
        <JoeyLogo /> <span class="text-gray-700 ml-3">Joey</span>
      </div>
      <Transition appear>
        <div v-if="!isAuthenticated" class="flex gap-3">
          <HeaderLink route="/login">Login <LoginIcon /></HeaderLink>
          <HeaderLink route="/register">Register <RegisterIcon /></HeaderLink>
        </div>
        <div v-else class="flex">
          <button
            class="block rounded text-gray-700 px-3 py-1 font-medium hover:text-gray-900 hover:bg-gray-100 transition-all"
            @click="authStore.logout()"
          >
            Logout <LogoutIcon />
          </button>
        </div>
      </Transition>
    </div>
  </header>
</template>
