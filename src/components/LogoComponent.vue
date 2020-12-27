<template>
  <div
    class="flex flex-col items-center px-6 lg:w-1/6 3xl:w-1/12 2xl:w-10-percent xl:w-12-percent md:w-1/4 w-1/3 mb-4 justify-center"
  >
    <img
      class="object-contain"
      :src="require('../assets/images/brands/' + imageUrl)"
      alt=""
    />
  </div>
</template>

<script>
export default {
  props: ["imageUrl"]
};
</script>

<style scoped></style>
