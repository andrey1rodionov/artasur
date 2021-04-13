<template>
  <div class="w-full h-full">
    <aside
      class="flex flex-col items-center bg-footer-bg text-gray-700 shadow h-full fixed"
    >
      <div class="h-16 flex items-center w-full">
        <a class="h-6 w-6 mx-auto" :href="`${this.$route.path}`">
          <img
            class="h-6 w-6 mx-auto"
            src="../assets/images/logo_small.png"
            alt="artasur-logo"
          />
        </a>
      </div>
      <ul class="w-full">
        <li class="hover:bg-footer-textHover">
          <a
            href="#"
            class="h-16 px-6 flex flex justify-center items-center w-full focus:text-orange-500 text-white fa fa-question"
            @click="isQuestionDivShow = !isQuestionDivShow"
          >
          </a>
        </li>
      </ul>
      <ul>
        <li class="hover:bg-footer-textHover">
          <a
            href="/admin/billboards"
            class="h-16 px-6 flex flex justify-center items-center w-full focus:text-orange-500 fa fa-arrow-left text-white"
          >
          </a>
        </li>
      </ul>
      <div class="mt-auto h-16 flex items-center w-full">
        <a
          href="/admin"
          class="h-16 w-10 mx-auto flex flex justify-center items-center w-full focus:text-orange-500 hover:bg-red-500 focus:outline-none"
          @click="exit()"
        >
          <svg
            class="h-5 w-5 text-white"
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
          >
            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
            <polyline points="16 17 21 12 16 7"></polyline>
            <line x1="21" y1="12" x2="9" y2="12"></line>
          </svg>
        </a>
      </div>
    </aside>
    <transition name="fade">
      <div
        class="bg-white text-black whitespace-pre-wrap w-1/5 p-4 rounded-md question-menu absolute text-lg shadow-2xl"
        v-if="isQuestionDivShow"
      >
        <div class="relative">
          <div>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto
            asperiores aut culpa dolorum error, excepturi expedita magnam
            molestias placeat provident reprehenderit tenetur vitae voluptates!
            Asperiores aspernatur atque aut blanditiis deserunt eveniet fuga
            harum illum incidunt inventore ipsa laborum molestiae odit officiis
            optio perferendis quaerat, quo recusandae rerum vero voluptas
            voluptatum.
          </div>
        </div>
      </div>
    </transition>
    <div
      class="h-screen w-full pl-14 flex items-center justify-center"
      @click="isQuestionDivShow = false"
    >
      <!-- component -->
      <form
        class="bg-white shadow-md rounded px-8 w-1/2 pt-6 pb-8 mb-4 flex flex-col"
        @submit.prevent="onSubmit"
      >
        <div
          class="flex justify-center py-6 tracking-wide text-grey-darker text-xl font-bold"
        >
          {{ formTitle }}
        </div>
        <div class="-mx-3 md:flex mb-6">
          <div class="w-full px-3 mb-6 md:mb-0">
            <label
              class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
              for="grid-title"
            >
              Название
            </label>
            <input
              class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
              id="grid-title"
              type="text"
              placeholder="Название"
              v-model.trim="title"
              :class="{ invalid: $v.title.$dirty && !$v.title.required }"
            />
            <div
              class="text-red-500 h-6 text-sm"
              v-if="$v.title.$dirty && !$v.title.required"
            >
              Пожалуйста, введите название билборда
            </div>
            <div
              class="text-red-500 h-6 text-sm"
              v-else-if="$v.title.$dirty && !$v.title.minLength"
            >
              Пожалуйста, введите название от 3 до 64 символов
            </div>
            <div
              class="text-red-500 h-6 text-sm"
              v-else-if="$v.title.$dirty && !$v.title.maxLength"
            >
              Пожалуйста, введите название от 3 до 64 символов
            </div>
          </div>
        </div>
        <div class="-mx-3 md:flex mb-6">
          <div class="w-full px-3 mb-6 md:mb-0">
            <label
              class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
              for="grid-url"
            >
              URL
            </label>
            <div class="flex justify-between items-center mb-3">
              <input
                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4"
                id="grid-url"
                type="text"
                placeholder="URL"
                v-model.trim="URL"
                @change="onChangeUrl()"
                :class="{
                  invalid: $v.URL.$dirty && !$v.URL.required,
                }"
              />
              <a
                href="#"
                class="appearance-none block ml-4 bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 hover:bg-footer-textHover hover:text-white"
                @click="isUrlCorrect()"
              >
                <i class="fa fa-arrow-right"></i>
              </a>
            </div>
            <div
              class="text-red-500 h-6 text-sm"
              v-if="$v.URL.$dirty && !$v.URL.required"
            >
              Пожалуйста, введите URL
            </div>
            <div
              class="text-red-500 h-6 text-sm"
              v-if="$v.URL.$dirty && !$v.URL.validateUrl"
            >
              Пожалуйста, введите корректный URL
            </div>
          </div>
        </div>
        <div class="-mx-3 md:flex mb-2">
          <div class="md:w-1/2 px-3 mb-6 md:mb-0">
            <label
              class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
              for="grid-coords"
            >
              Координаты
            </label>
            <input
              class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 cursor-not-allowed"
              id="grid-coords"
              type="text"
              disabled
              placeholder="Координаты"
              v-model="coords"
            />
          </div>
          <div class="md:w-1/2 px-3">
            <label
              class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
              for="grid-direction"
            >
              Направление
            </label>
            <input
              class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 cursor-not-allowed"
              id="grid-direction"
              type="text"
              disabled
              placeholder="Направление"
              v-model="direction"
            />
          </div>
          <div class="md:w-1/2 px-3">
            <label
              class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
              for="grid-span"
            >
              Диапазон
            </label>
            <input
              class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 cursor-not-allowed"
              id="grid-span"
              type="text"
              disabled
              placeholder="Диапазон"
              v-model="span"
            />
          </div>
        </div>
        <div class="md:flex mb-2 mt-6">
          <button
            class="px-5 py-2 border-green-500 border text-black rounded transition duration-300 hover:bg-green-500 hover:text-white focus:outline-none"
          >
            {{ buttonValue }}
          </button>
        </div>
      </form>
    </div>
    <transition name="fade">
      <div
        class="space-x-2 bg-green-50 p-4 rounded flex items-center text-green-600 my-4 shadow-lg mx-auto max-w-2xl absolute right-0 bottom-0 w-1/3"
        v-if="isGoodNotificationShow"
      >
        <div class="mt-1">
          <i class="far fa-check-circle fa-lg"></i>
        </div>
        <h3 class="text-green-800 tracking-wider flex-1">
          {{ notificationValue }}
        </h3>
        <div class="select-none cursor-pointer">
          <i
            class="fal fa-times fa-lg px-2 hvr-grow"
            @click="isGoodNotificationShow = !isGoodNotificationShow"
          ></i>
        </div>
      </div>
    </transition>
    <transition name="fade">
      <div
        class="space-x-2 bg-red-50 p-4 rounded flex items-center text-red-600 my-4 shadow-lg mx-auto max-w-2xl absolute right-0 bottom-0 w-1/3"
        v-if="isBadNotificationShow"
      >
        <div class="mt-1">
          <i class="far fa-times-circle fa-lg"></i>
        </div>
        <h3 class="text-red-800 tracking-wider flex-1">
          {{ notificationValue }}
        </h3>
        <div class="select-none cursor-pointer">
          <i
            class="fal fa-times fa-lg px-2 hvr-grow"
            @click="isBadNotificationShow = !isBadNotificationShow"
          ></i>
        </div>
      </div>
    </transition>
  </div>
</template>

<script>
import { required, minLength, maxLength } from "vuelidate/lib/validators";
import axios from "axios";

const validateUrl = (value) =>
  value.includes("https://yandex.by/maps/") &&
  value.includes("point") &&
  value.includes("direction") &&
  value.includes("span");

export default {
  data() {
    return {
      title: "",
      URL: "",
      coords: "",
      direction: "",
      span: "",
      isQuestionDivShow: false,
      buttonValue: "",
      notificationValue: "",
      isGoodNotificationShow: false,
      isBadNotificationShow: false,
      formTitle: "",
    };
  },
  validations: {
    title: { required, minLength: minLength(3), maxLength: maxLength(64) },
    URL: { required, validateUrl },
    // coords: { required },
    // direction: { required },
    // span: { required },
  },
  mounted() {
    if (localStorage.getItem("authKey") !== "1111") {
      this.$router.push("/admin");
    }
    if (this.$route.path === "/admin/billboard/new") {
      this.buttonValue = "Добавить";
      this.formTitle = "Добавление нового билборда";
    } else {
      this.formTitle = "Изменение билборда";
      this.buttonValue = "Применить";
      this.getBillboardData();
    }
  },
  methods: {
    exit() {
      localStorage.removeItem("authKey");
    },
    isUrlCorrect() {
      if (!this.URL) {
        window.open(
          "https://yandex.by/maps/157/minsk/geo/2171251432/?l=stv%2Csta&ll=27.677485%2C53.942090&panorama%5Bdirection%5D=196.068888%2C1.000000&panorama%5Bfull%5D=true&panorama%5Bpoint%5D=27.675213%2C53.936054&panorama%5Bspan%5D=110.439471%2C60.000000&tab=panorama&z=13",
          "_blank"
        );
      } else if (this.checkUrl(this.URL)) {
        window.open(this.URL, "_blank");
      } else {
        this.URL = "";
        document.getElementById("grid-url").focus();
        this.notificationValue = "Некорректный URL";
        this.isBadNotificationShow = true;
        setTimeout(() => {
          this.isBadNotificationShow = false;
        }, 5000);
      }
    },
    onSubmit() {
      if (this.$v.$invalid) {
        this.$v.$touch();
        return;
      }

      let billboardData = null;

      if (this.buttonValue === "Добавить") {
        billboardData = {
          title: this.title,
          url: this.URL,
        };

        axios
          .post("/api.php", { action: "insert", data: billboardData })
          .then((res) => {
            if (res.status === 200) {
              this.notificationValue = "Билборд успешно добавлен!";
              this.title = this.URL = this.coords = this.direction = this.span =
                "";
              this.isGoodNotificationShow = true;
              this.$v.$reset();
              setTimeout(() => {
                this.isGoodNotificationShow = false;
              }, 5000);
            }
          })
          .catch((error) => {
            this.notificationValue = "Ошибка добавления!";
            this.title = this.URL = this.coords = this.direction = this.span =
              "";
            this.isBadNotificationShow = true;
            this.$v.$reset();
            setTimeout(() => {
              this.isBadNotificationShow = false;
            }, 5000);
            console.log(error);
          });
      } else {
        billboardData = {
          id: this.$route.params.id,
          title: this.title,
          url: this.URL,
        };
        axios
          .post("/api.php", { action: "update", data: billboardData })
          .then((res) => {
            if (res.status === 200) {
              this.notificationValue = "Билборд успешно обновлен!";
              this.isGoodNotificationShow = true;
              this.$v.$reset();
              setTimeout(() => {
                this.isGoodNotificationShow = false;
                this.$router.push("/admin/billboards");
              }, 5000);
            }
          })
          .catch((error) => {
            this.notificationValue = "Ошибка обновления!";
            this.title = this.URL = this.coords = this.direction = this.span =
              "";
            this.isBadNotificationShow = true;
            this.$v.$reset();
            setTimeout(() => {
              this.isBadNotificationShow = false;
            }, 5000);
            console.log(error);
          });
      }
    },
    onChangeUrl() {
      let params = new URL(this.URL).searchParams;
      if (this.checkUrl(this.URL)) {
        this.coords = params.get("panorama[point]");
        this.direction = params.get("panorama[direction]");
        this.span = params.get("panorama[span]");
      } else {
        this.coords = "";
        this.direction = "";
        this.span = "";
      }
    },
    checkUrl(url) {
      let params = new URL(url).searchParams;
      return (
        url.includes("https://yandex.by/maps/") &&
        params.has("panorama[point]") &&
        params.has("panorama[direction]") &&
        params.has("panorama[span]")
      );
    },
    getBillboardData() {
      axios
        .post("/api.php", { action: "get", data: this.$route.params.id })
        .then((res) => {
          if (res.status === 200) {
            this.title = res.data.title;
            this.URL = res.data.url;
            this.coords = res.data.markCoords;
            this.direction = res.data.markDirection;
            this.span = res.data.markSpan;
          }
        })
        .catch((error) => {
          console.log(error);
          this.$router.push("/admin/billboard/new");
        });
    },
  },
};
</script>

<style scoped lang="sass">
.question-menu
  top: 1.5%
  left: 5%

.fade-enter-active, .fade-leave-active
  transition: opacity .3s

.fade-enter, .fade-leave-to
  opacity: 0
</style>
