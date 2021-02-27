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
        и (или) оставить заявку, по которой мы обязательно <br />
        с Вами свяжемся!
      </div>
    </div>
    <div class="flex flex-wrap md:px-24 px-12">
      <div
        class="3xl:mb-32 xl:w-70-percent w-full lg:h-3/4-screen h-3/5-screen mb-12"
      >
        <yandex-map :coords="maps.position" :zoom="maps.zoom">
          <ymap-marker
            v-for="mark in coords"
            :key="mark.id"
            :coords="mark.markCoords"
            :marker-id="mark.id"
            :hint-content="mark.title"
            :icon="maps.markerIcon"
            @click="onClick(mark.id, mark.title, mark.markCoords)"
          />
        </yandex-map>
      </div>
      <div class="flex flex-col xl:w-30-percent xl:pl-12 w-full mb-12">
        <div
          class="text-md 3xl:text-xl 2xl:text-lg opacity-50"
          v-if="!getBillboards.length"
        >
          * Ни один рекламный щит не выбран
        </div>
        <div
          class="mb-8 xl:w-full xl:mx-0 md:w-70-percent w-full mx-auto overflow-x-hidden overflow-y-auto max-h-32"
        >
          <SelectedBillboardComponent
            v-for="(billboard, index) in getBillboards"
            :key="index"
            :count="index + 1"
            :id="billboard.id"
            :title="billboard.title"
          ></SelectedBillboardComponent>
        </div>
        <div class="mb-12 xl:w-full xl:mx-0 md:w-70-percent w-full mx-auto">
          <CallbackFormComponent />
        </div>
        <div class="text-md 3xl:text-xl 2xl:text-lg xl:text-lg opacity-50">
          * Постоянно в наличии стройматериалы по низким ценам! <br />
          <br />
          * Рекламный щит на МКАД по бартеру! <br />
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
import { mapGetters, mapMutations } from "vuex";
import SelectedBillboardComponent from "@/components/SelectedBillboardComponent";
import axios from "axios";

export default {
  components: {
    yandexMap,
    ymapMarker,
    CallbackFormComponent,
    SelectedBillboardComponent,
  },
  data() {
    return {
      maps: {
        position: [53.902284, 27.561831],
        zoom: 10,
        markerIcon: {
          layout: "default#imageWithContent",
          imageHref: require("../assets/images/billboard-icon.png"),
          imageSize: [32, 32],
          imageOffset: [-32, -32],
        },
      },
      coords: [],
    };
  },
  methods: {
    ...mapMutations(["ADD_BILLBOARD"]),
    onClick(id, title, coords) {
      this.ADD_BILLBOARD({
        id: id,
        title: title,
        coords: coords,
      });
    },
    fetchBillboards() {
      axios.get("http://media.artasur.by/api.php").then((resp) => {
        console.log(resp.data);
      });
    },
  },
  computed: mapGetters(["getBillboards"]),
  async mounted() {
    this.fetchBillboards();
  },
};
</script>

<style lang="sass">
.ymap-container
  height: 100%
</style>
