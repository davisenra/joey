<script setup>
import { ref } from "vue";
import axios from "@/lib/axios";

const user = ref(await axios.get("/api/me"));
</script>

<template>
  <div>
    <p class="text-xl font-medium">Welcome back, {{ user.data.name }}!</p>
  </div>
</template>
