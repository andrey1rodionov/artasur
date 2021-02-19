import Vuex from "vuex";
import Vue from "vue";
import billboard from "./modules/billboard";

Vue.use(Vuex);

export default new Vuex.Store({
  modules: {
    billboard,
  },
});
