<template>
  <div class="bg-white pt-16 lg:pb-52 3xl:pb-64 md:pb-32 pb-24 relative">
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
        data-aos="fade-up"
        data-aos-delay="250"
      >
        <slide>
          <div class="lg:w-70-percent w-85-percent 3xl:w-3/5 m-auto h-full">
            <div
              class="flex flex-col items-center h-full py-14 px-8 rounded-lg bg-footer-bg slide"
            >
              <div class="flex items-center justify-center mx-auto">
                <i class="fas fa-digging fa-4x text-white"></i>
              </div>
              <div
                class="text-center text-md 3xl:text-2xl 2xl:text-xl xl:text-lg py-8 text-white"
              >
                Постоянно в наличии стройматериалы по низким ценам! <br />
                <br />
                <a href="tel:+375296746298">+375 (29) 674-62-98</a>
              </div>
            </div>
          </div>
        </slide>
        <slide>
          <div class="lg:w-70-percent w-85-percent 3xl:w-3/5 m-auto h-full">
            <div
              class="flex flex-col items-center h-full py-14 px-8 rounded-lg bg-footer-bg slide"
            >
              <div class="flex items-center justify-center mx-auto">
                <i class="fas fa-sync fa-4x text-white"></i>
              </div>
              <div
                class="text-center text-md 3xl:text-2xl 2xl:text-xl xl:text-lg py-8 text-white"
              >
                Рекламный щит на МКАД <br />
                по бартеру! <br />
                <br />
                <a href="tel:+375296746298">+375 (29) 674-62-98</a>
              </div>
            </div>
          </div>
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
      return `<i class="fas fa-chevron-right fa-2x" style="color: #263135"></i>`;
    },
    navigationPrev: () => {
      return `<i class="fas fa-chevron-left fa-2x" style="color: #263135"></i>`;
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

.slide
  &:hover
    background-color: #313c40
</style>
