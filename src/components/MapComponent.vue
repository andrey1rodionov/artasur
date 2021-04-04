<template>
  <div class="pt-16 lg:pb-52 md:pb-32 pb-24 relative bg-site-color">
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
        class="3xl:mb-32 xl:w-70-percent w-full lg:h-3/4-screen h-3/5-screen mb-12 relative"
      >
        <yandex-map
          :coords="maps.position"
          :zoom="maps.zoom"
          :controls="['zoomControl', 'typeSelector']"
          v-show="!isBalloonShow"
        >
          <ymap-marker
            v-for="mark in billboardsData"
            :key="mark.id"
            :coords="mark.markCoords"
            :marker-id="mark.id"
            :hint-content="mark.title"
            :icon="maps.markerIcon"
            @click="onClickMark(mark)"
          />
        </yandex-map>
        <div
          v-if="isBalloonShow"
          class="w-screen lg:w-full bg-white bg-opacity-30 customBalloon p-4"
        >
          <div class="flex justify-center">
            <div
              id="tittlePanorama"
              class="font-bold mb-2 text-center ml-auto text-md 3xl:text-xl 2xl:text-lg xl:text-lg"
            ></div>
            <div class="ml-auto -mt-1 -mr-1" @click="isBalloonShow = false">
              <i class="fal fa-times fa-lg cursor-pointer"></i>
            </div>
          </div>
          <div id="panorama" class="w-full h-1/2-screen lg:h-3/5-screen"></div>
          <button
            id="panoramaAdd"
            class="bg-button-blue text-white py-1 px-2 text-sm focus:outline-none mt-4 mx-auto hover:opacity-90 pulse-single"
          >
            Добавить
          </button>
        </div>
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
      </div>
    </div>
    <svg
      xmlns="http://www.w3.org/2000/svg"
      viewBox="0 0 100 100"
      preserveAspectRatio="none"
      class="svg-line"
    >
      <polygon fill="white" points="0,100 100,0 100,100" />
    </svg>
  </div>
</template>

<script>
import { loadYmap, yandexMap, ymapMarker } from "vue-yandex-maps";
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
      billboardsData: [],
      isBalloonShow: false,
      settings: {
        apiKey: "9f67bdd5-33ec-4e47-8204-949f76c30100",
        lang: "ru_RU",
        coordorder: "latlong",
        version: "2.1",
      },
    };
  },
  methods: {
    ...mapMutations(["ADD_BILLBOARD"]),
    onClickMark(mark) {
      ymaps.panorama.locate(mark.markCoords).done((panoramas) => {
        if (panoramas.length > 0) {
          // eslint-disable-next-line no-unused-vars
          var player = new ymaps.panorama.Player("panorama", panoramas[0], {
            direction: mark.markDirection,
            span: mark.markSpan,
            controls: ["panoramaName"],
          });
          document.getElementById("panoramaAdd").onclick = () => {
            this.ADD_BILLBOARD({
              id: mark.id,
              title: mark.title,
              coords: mark.markCoords,
            });
            this.isBalloonShow = false;
          };
          document.getElementById("tittlePanorama").innerHTML = mark.title;
        } else {
          document.getElementById("panoramaAdd").onclick = () => {
            this.ADD_BILLBOARD({
              id: mark.id,
              title: mark.title,
              coords: mark.markCoords,
            });
            this.isBalloonShow = false;
          };
          document.getElementById("tittlePanorama").innerHTML =
            mark.title + "<br>Для данной точки не найдено панорамы";
          document.getElementById("panorama").style.height = "5vh";
        }
      });
      this.isBalloonShow = true;
    },
    fetchBillboards() {
      axios
        .get("/api.php")
        .then((response) => (this.billboardsData = response.data))
        .catch((error) => console.log(error));
    },
  },
  computed: {
    ...mapGetters(["getBillboards"]),
  },
  async created() {
    await loadYmap({ ...this.settings, debug: true });
  },
  async mounted() {
    await this.fetchBillboards();
  },
};
</script>

<style lang="sass">
.ymap-container
  height: 100%

.customBalloon
  position: absolute
  top: 50%
  right: 50%
  transform: translate(50%,-50%)
</style>
