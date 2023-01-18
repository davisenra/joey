import { defineStore } from "pinia";
import axios from "@/lib/axios";

export const useNewTicketStore = defineStore("newTicket", {
  state: () => ({
    images: [],
    categories: [],
    labels: [],
  }),
  getters: {
    getCategories: (state) => state.categories,
  },
  actions: {
    async submitTicket(payload) {
      const formData = new FormData();
      formData.append("title", payload.title);
      formData.append("description", payload.description);
      formData.append("priority", payload.priority);

      this.images.forEach((image) => formData.append(`images[]`, image));
      this.labels.forEach((label) => formData.append("labels[]", label));
      this.categories.forEach((category) =>
        formData.append("categories[]", category)
      );

      const response = await axios.post("/api/tickets", formData, {
        headers: {
          "Content-Type": "multipart/form-data",
        },
      });

      if (response.status == 201) {
        this.router.push(`/tickets/${response.data.data.uuuid}`);
      }
    },
    updateCategories(category) {
      const index = this.categories.indexOf(category);
      index > -1
        ? this.categories.splice(index, 1)
        : this.categories.push(category);
    },
    updateLabels(label) {
      const index = this.labels.indexOf(label);
      index > -1 ? this.labels.splice(index, 1) : this.labels.push(label);
    },
    addImage(image) {
      this.images.push(...image.files);
    },
    removeImage(image) {
      this.images.splice(image, 1);
    },
  },
});
