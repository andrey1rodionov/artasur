<template>
  <kinesis-container
    class="flex flex-col items-center bg-white p-14 mx-8 lg:w-1/3 xl:w-1/4 md:w-1/2 w-full mb-14"
  >
    <kinesis-element :strength="5" type="depth">
      <div
        class="rounded-full h-28 w-28 flex items-center justify-center mx-auto"
        :class="gradient"
      >
        <i class="fa fa-4x text-white" :class="icon"></i>
      </div>
      <div
        class="text-md 3xl:text-3xl 2xl:text-2xl xl:text-xl text-center py-8"
      >
        {{ header }}
      </div>
      <div
        class="text-center opacity-50 text-md 3xl:text-2xl 2xl:text-xl xl:text-lg"
      >
        {{ text }}
      </div>
    </kinesis-element>
  </kinesis-container>
</template>

<script>
export default {
  props: ["gradient", "icon", "header", "text"]
};
</script>

<style scoped></style>
