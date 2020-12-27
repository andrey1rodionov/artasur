<template>
  <div class="bg-white pt-16 lg:pb-52 md:pb-32 pb-24 relative bg-site-color">
    <div class="flex flex-col items-center px-8">
      <div class="text-xl 3xl:text-5xl 2xl:text-4xl xl:text-3xl pb-4">
        Карта щитов
      </div>
      <div
        class="text-md 3xl:text-3xl 2xl:text-2xl xl:text-xl text-center opacity-50 xl:mb-24 mb-16"
      >
        Можете выбрать интересующий Вас рекламный щит <br />
        или оставить заявку, по которой мы обязательно <br />
        с Вами свяжемся!
      </div>
    </div>
    <div class="flex flex-wrap md:px-24 px-12">
      <div
        class="3xl:mb-32 xl:w-70-percent w-full lg:h-3/4-screen h-3/5-screen mb-12"
      >
        <yandex-map :coords="coords" :zoom="15">
          <ymap-marker :coords="coords" marker-id="1" hint-content="Artasur" />
        </yandex-map>
      </div>
      <div class="flex flex-col xl:w-30-percent xl:pl-12 w-full mb-12">
        <div class="mb-12 xl:w-full xl:mx-0 md:w-70-percent w-full mx-auto">
          <CallbackFormComponent />
        </div>
        <div class="text-md 3xl:text-2xl 2xl:text-xl xl:text-lg opacity-50">
          * Постоянно в наличии стройматериалы по низким ценам! <br />
          <br />
          * Бигборд на МКАД по бартеру! <br />
          <br />
          Обращайтесь по телефону: <br />
          <a href="tel:+375296746298">+375 (29) 674-62-98</a>
        </div>
      </div>
    </div>
    <svg
      xmlns="http://www.w3.org/2000/svg"
      viewBox="0 0 100 100"
      preserveAspectRatio="none"
    >
      <polygon fill="#263135" points="0,100 100,0 100,100" />
    </svg>
  </div>
</template>

<script>
import { yandexMap, ymapMarker } from "vue-yandex-maps";
import CallbackFormComponent from "@/components/CallbackFormComponent";

export default {
  components: { yandexMap, ymapMarker, CallbackFormComponent },
  data() {
    return {
      coords: [54.001085, 27.676657]
    };
  }
};
</script>

<style lang="sass">
.ymap-container
  height: 100%
</style>
