<template>
  <kinesis-container class="lg:w-1/3 xl:w-1/4 md:w-1/2 w-full mx-8 mb-14">
    <kinesis-element :strength="5" type="depth" class="h-full">
      <div class="flex flex-col items-center bg-white h-full p-14">
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
          class="text-center opacity-50 text-sm 3xl:text-xl 2xl:text-lg xl:text-lg"
        >
          {{ text }}
        </div>
      </div>
    </kinesis-element>
  </kinesis-container>
</template>

<script>
export default {
  props: ["gradient", "icon", "header", "text"],
};
</script>

<style scoped></style>
