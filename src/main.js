import Vue from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./store";

// CSS
import "./assets/css/main.css";
import "hover.css";
import "aos/dist/aos.css";

// Library
import VueKinesis from "vue-kinesis";
import VueScrollTo from "vue-scrollto";
import Vuelidate from "vuelidate";
import VCalendar from "v-calendar";
import VueMask from "v-mask";
import AOS from "aos";

Vue.config.productionTip = false;

Vue.use(VueKinesis);
Vue.use(VueScrollTo, {
  container: "body",
  duration: 750,
  easing: "ease",
  offset: 0,
  force: true,
  cancelable: true,
  onStart: false,
  onDone: false,
  onCancel: false,
  x: false,
  y: true,
});
Vue.use(Vuelidate);
Vue.use(VueMask);
Vue.use(VCalendar);

new Vue({
  router,
  created() {
    AOS.init();
  },
  store,
  render: (h) => h(App),
}).$mount("#app");
