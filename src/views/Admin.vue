<template>
  <div>
    <div
      class="w-screen h-screen flex justify-center items-center bg-footer-bg"
    >
      <div class="container h-screen max-w-full overflow-hidden shadow-lg">
        <div class="flex flex-col">
          <div class="flex flex-col w-full h-48 justify-center">
            <div class="text-3xl block w-full text-footer-header text-center">
              Код авторизации
            </div>
            <div
              class="text-sm block w-full text-gray-400 font-base text-center pt-2"
            >
              Пожалуйста, введите код авторизации
              <br />
              для продолжения
            </div>
          </div>
          <div
            class="flex w-full flex-1 h-screen flex justify-center items-center text-white"
          >
            <div class="h-full py-1 px-8 text-center">
              <div class="w-full max-w-sm">
                <div
                  class="flex items-center border-b-2 border-footer-textHover py-2 mt-1"
                >
                  <input
                    class="text-center appearance-none bg-transparent border-none w-full text-white text-3xl mr-3 py-1 px-2 leading-tight focus:outline-none"
                    placeholder="Введите код"
                    type="number"
                    v-model="screen"
                  />
                </div>
                <div class="text-center text-xs font-base my-10">
                  <div class="px-2">
                    <div class="flex -mx-2 text-3xl">
                      <div
                        class="w-1/3 px-2 hover:bg-footer-textHover rounded cursor-pointer my-auto py-2"
                        @click="numberClick(1)"
                      >
                        1
                      </div>
                      <div
                        class="w-1/3 px-2 hover:bg-footer-textHover rounded cursor-pointer my-auto py-2"
                        @click="numberClick(2)"
                      >
                        2
                      </div>
                      <div
                        class="w-1/3 px-2 hover:bg-footer-textHover rounded cursor-pointer my-auto py-2"
                        @click="numberClick(3)"
                      >
                        3
                      </div>
                    </div>
                  </div>
                  <div class="px-2 pt-6">
                    <div class="flex -mx-2 text-3xl">
                      <div
                        class="w-1/3 px-2 hover:bg-footer-textHover rounded cursor-pointer my-auto py-2"
                        @click="numberClick(4)"
                      >
                        4
                      </div>
                      <div
                        class="w-1/3 px-2 hover:bg-footer-textHover rounded cursor-pointer my-auto py-2"
                        @click="numberClick(5)"
                      >
                        5
                      </div>
                      <div
                        class="w-1/3 px-2 hover:bg-footer-textHover rounded cursor-pointer my-auto py-2"
                        @click="numberClick(6)"
                      >
                        6
                      </div>
                    </div>
                  </div>
                  <div class="px-2 pt-6">
                    <div class="flex -mx-2 text-3xl">
                      <div
                        class="w-1/3 px-2 hover:bg-footer-textHover rounded cursor-pointer my-auto py-2"
                        @click="numberClick(7)"
                      >
                        7
                      </div>
                      <div
                        class="w-1/3 px-2 hover:bg-footer-textHover rounded cursor-pointer my-auto py-2"
                        @click="numberClick(8)"
                      >
                        8
                      </div>
                      <div
                        class="w-1/3 px-2 hover:bg-footer-textHover rounded cursor-pointer my-auto py-2"
                        @click="numberClick(9)"
                      >
                        9
                      </div>
                    </div>
                  </div>
                  <div class="px-2 pt-6">
                    <div class="flex -mx-2 text-3xl">
                      <div
                        class="w-1/3 px-2 hover:bg-footer-textHover rounded cursor-pointer my-auto py-2"
                        @click="numberClick(-1)"
                      >
                        <div class="px-10 py-2">
                          <svg
                            stroke="currentColor"
                            fill="currentColor"
                            stroke-width="0"
                            viewBox="0 0 640 512"
                            height="1em"
                            width="1em"
                            xmlns="http://www.w3.org/2000/svg"
                          >
                            <path
                              d="M576 64H205.26A63.97 63.97 0 0 0 160 82.75L9.37 233.37c-12.5 12.5-12.5 32.76 0 45.25L160 429.25c12 12 28.28 18.75 45.25 18.75H576c35.35 0 64-28.65 64-64V128c0-35.35-28.65-64-64-64zm-84.69 254.06c6.25 6.25 6.25 16.38 0 22.63l-22.62 22.62c-6.25 6.25-16.38 6.25-22.63 0L384 301.25l-62.06 62.06c-6.25 6.25-16.38 6.25-22.63 0l-22.62-22.62c-6.25-6.25-6.25-16.38 0-22.63L338.75 256l-62.06-62.06c-6.25-6.25-6.25-16.38 0-22.63l22.62-22.62c6.25-6.25 16.38-6.25 22.63 0L384 210.75l62.06-62.06c6.25-6.25 16.38-6.25 22.63 0l22.62 22.62c6.25 6.25 6.25 16.38 0 22.63L429.25 256l62.06 62.06z"
                            ></path>
                          </svg>
                        </div>
                      </div>
                      <div
                        class="w-1/3 px-2 hover:bg-footer-textHover rounded cursor-pointer my-auto py-2"
                        @click="numberClick(0)"
                      >
                        0
                      </div>
                      <div
                        class="w-1/3 px-2 hover:bg-footer-textHover rounded cursor-pointer my-auto py-2"
                        @click="checkAuth()"
                      >
                        <div class="px-10 py-2">
                          <svg
                            stroke="currentColor"
                            fill="currentColor"
                            stroke-width="0"
                            viewBox="0 0 512 512"
                            height="1em"
                            width="1em"
                            xmlns="http://www.w3.org/2000/svg"
                          >
                            <path
                              d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"
                            ></path>
                          </svg>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
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
export default {
  data() {
    return {
      screen: "",
      isBadNotificationShow: false,
      notificationValue: "",
    };
  },
  methods: {
    numberClick(number) {
      if (this.screen === 0) {
        this.screen = number.toString();
      } else if (number === -1) {
        this.screen = this.screen.slice(0, -1);
      } else {
        this.screen += number;
      }
    },
    checkAuth() {
      if (window.screen.width < 1024) {
        this.screen = "";
        this.notificationValue =
          "Панель администратора доступна только с компьютерной версии!";
        this.isBadNotificationShow = true;
        setTimeout(() => {
          this.isBadNotificationShow = false;
        }, 5000);
        return;
      }
      if (this.screen === "1111") {
        localStorage.setItem("authKey", this.screen);
        this.$router.push("admin/billboards");
        this.screen = "";
      } else {
        this.screen = "";
        this.notificationValue = "Неверный код!";
        this.isBadNotificationShow = true;
        setTimeout(() => {
          this.isBadNotificationShow = false;
        }, 5000);
      }
    },
  },
  mounted() {
    if (
      localStorage.getItem("authKey") === `${process.env.VUE_APP_ADMIN_KEY}`
    ) {
      this.$router.push("admin/billboards");
    }
  },
};
</script>

<style scoped>
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  /* display: none; <- Crashes Chrome on hover */
  -webkit-appearance: none;
  margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
}

input[type="number"] {
  -moz-appearance: textfield; /* Firefox */
}

.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.3s;
}

.fade-enter,
.fade-leave-to {
  opacity: 0;
}
</style>
