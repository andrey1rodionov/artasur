<template>
  <div
    class="bg-site-color pt-16 lg:pb-52 3xl:pb-64 md:pb-32 pb-24 bg-gradient-to-b from-bgColor-from to-bgColor-to relative"
  >
    <div class="md:px-24 px-12">
      <carousel
        :autoplay="true"
        :autoplayTimeout="3500"
        :loop="true"
        :navigationEnabled="true"
        :paginationActiveColor="paginationActive"
        :navigationNextLabel="navigationNext"
        :navigationPrevLabel="navigationPrev"
        :centerMode="true"
        :perPageCustom="[
          [300, 1],
          [1024, 2],
        ]"
      >
        <slide>
          <img
            class="lg:w-70-percent w-85-percent 3xl:w-3/5 m-auto"
            src="../assets/images/information-1.jpg"
            alt=""
          />
        </slide>
        <slide>
          <img
            class="lg:w-70-percent w-85-percent 3xl:w-3/5 m-auto"
            src="../assets/images/information-2.jpg"
            alt=""
          />
        </slide>
      </carousel>
    </div>
    <svg
      xmlns="http://www.w3.org/2000/svg"
      viewBox="0 0 100 100"
      preserveAspectRatio="none"
      class="svg-line"
    >
      <polygon fill="#263135" points="0,100 100,0 100,100" />
    </svg>
  </div>
</template>

<script>
export default {
  computed: {
    navigationNext: () => {
      return `<i class="fas fa-chevron-right fa-2x" style="color: white"></i>`;
    },
    navigationPrev: () => {
      return `<i class="fas fa-chevron-left fa-2x" style="color: white"></i>`;
    },
    paginationActive: () => {
      return `#263135`;
    },
  },
};
</script>

<style lang="sass">
.VueCarousel-navigation-button
  @apply -mt-7
</style>
