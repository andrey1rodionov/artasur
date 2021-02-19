<template>
  <div class="flex justify-between text-md 3xl:text-xl 2xl:text-lg opacity-50">
    <div class="flex">
      <div class="w-8">{{ count }}</div>
      <div>{{ title }}</div>
    </div>
    <div class="select-none cursor-pointer">
      <i class="fal fa-times px-2 hvr-grow" @click="removeBillboard"></i>
    </div>
  </div>
</template>

<script>
import { mapMutations } from "vuex";

export default {
  props: ["count", "id", "title"],
  methods: {
    ...mapMutations(["REMOVE_BILLBOARD"]),
    removeBillboard() {
      this.REMOVE_BILLBOARD(this.id);
    },
  },
};
</script>

<style scoped></style>
