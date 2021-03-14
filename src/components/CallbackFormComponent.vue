<template>
  <div class="flex flex-col items-center w-full">
    <form @submit.prevent="onSubmit" class="w-full submit-form">
      <div class="pb-2" v-if="getBillboards.length">
        <div class="text-sm md:text-lg mb-2 opacity-50">Период размещения</div>
        <v-date-picker
          v-model="dateRange"
          mode="date"
          :masks="masks"
          :min-date="new Date()"
          is-range
        >
          <template v-slot="{ inputValue, inputEvents }">
            <div class="flex justify-center items-center">
              <input
                :value="inputValue.start"
                v-on="inputEvents.start"
                class="input-field"
                :class="{
                  invalid: $v.dateRange.$dirty && !$v.dateRange.required,
                }"
              />
              <svg
                class="w-12 h-12 mx-4 opacity-50"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M14 5l7 7m0 0l-7 7m7-7H3"
                />
              </svg>
              <input
                :value="inputValue.end"
                v-on="inputEvents.end"
                class="input-field"
              />
            </div>
            <div
              class="text-red-500 h-6 text-sm"
              v-if="$v.dateRange.$dirty && !$v.dateRange.required"
            >
              Пожалуйста, введите период размещения
            </div>
          </template>
        </v-date-picker>
      </div>
      <div class="pb-2">
        <input
          type="text"
          placeholder="Ваше имя"
          class="input-field"
          v-model.trim="username"
          :class="{ invalid: $v.username.$dirty && !$v.username.required }"
        />
        <div
          class="text-red-500 h-6 text-sm"
          v-if="$v.username.$dirty && !$v.username.required"
        >
          Пожалуйста, введите свое имя
        </div>
      </div>
      <div>
        <input
          type="email"
          placeholder="Ваша электронная почта"
          class="input-field"
          v-model.trim="email"
          :class="{
            invalid:
              ($v.email.$dirty && !$v.email.required) ||
              ($v.email.$dirty && !$v.email.email),
          }"
        />
        <div
          class="text-red-500 h-6 text-sm"
          v-if="$v.email.$dirty && !$v.email.required"
        >
          Пожалуйста, введите свою эл. почту
        </div>
        <div
          class="text-red-500 h-6 text-sm"
          v-if="$v.email.$dirty && !$v.email.email"
        >
          Пожалуйста, введите корректную ел. почту
        </div>
      </div>
      <div class="py-2">
        <input
          type="tel"
          placeholder="Ваш номер телефона"
          class="input-field"
          v-model="phoneNumber"
          v-mask="'+375 (##) ###-##-##'"
          :class="{
            invalid:
              ($v.phoneNumber.$dirty && !$v.phoneNumber.required) ||
              ($v.phoneNumber.$dirty && !$v.phoneNumber.minLength),
          }"
        />
        <div
          class="text-red-500 h-6 text-sm"
          v-if="$v.phoneNumber.$dirty && !$v.phoneNumber.required"
        >
          Пожалуйста, введите свой номер телефона
        </div>
        <div
          class="text-red-500 h-6 text-sm"
          v-else-if="$v.phoneNumber.$dirty && !$v.phoneNumber.minLength"
        >
          Пожалуйста, введите корректный номер телефона
        </div>
      </div>
      <div class="flex w-full text-white text-2xl pt-2">
        <button
          class="bg-button-blue text-white w-full py-3 btn text-lg focus:outline-none 3xl:text-3xl xl:text-lg lg:text-sm hvr-underline-from-center pulse-single"
          type="submit"
        >
          {{ buttonText }}
        </button>
      </div>
    </form>
  </div>
</template>

<script>
import { email, required, minLength } from "vuelidate/lib/validators";
import { mapGetters, mapMutations } from "vuex";
import axios from "axios";

export default {
  data() {
    return {
      username: "",
      email: "",
      phoneNumber: "",
      buttonText: "Отправить заявку",
      dateRange: {
        start: new Date(),
        end: new Date(),
      },
      masks: {
        input: "DD-MM-YYYY",
      },
    };
  },
  validations: {
    username: { required },
    email: { email, required },
    phoneNumber: { required, minLength: minLength(19) },
    dateRange: { required },
  },
  methods: {
    ...mapMutations(["SET_BILLBOARD"]),
    onSubmit() {
      if (this.$v.$invalid) {
        this.$v.$touch();
        return;
      }

      let userOrderData = null;

      if (this.getBillboards.length) {
        userOrderData = {
          name: this.username,
          phone: this.phoneNumber,
          email: this.email,
          billboards: this.getBillboards,
          dateFrom: this.dateRange.start.toLocaleString().split(",")[0],
          dateTo: this.dateRange.end.toLocaleString().split(",")[0],
        };
      } else {
        userOrderData = {
          name: this.username,
          phone: this.phoneNumber,
          email: this.email,
        };
      }

      axios
        .post("http://media.artasur.by/callback.php", userOrderData)
        .then((res) => {
          console.log(res);
        });

      this.$v.$reset();

      this.buttonText = "Спасибо за заявку";
      setTimeout(() => (this.buttonText = "Отправить заявку"), 5000);
      this.SET_BILLBOARD([]);
      this.username = this.email = this.phoneNumber = "";
      this.dateRange.start = this.dateRange.end = new Date();
    },
  },
  computed: mapGetters(["getBillboards"]),
};
</script>

<style lang="sass">
.input-field
  background-color: white
  @apply px-4 py-3 text-black w-full
  &::placeholder
    @apply text-black font-light text-sm md:text-base
  &.invalid
    @apply border-red-500

  &:focus
    outline: none

.submit-form
  & > div
    @apply mb-2

.hvr-underline-from-center
  &::before
    background: white !important
    height: 2px !important

@keyframes pulse
  0%
    transform: scale(0.6)
  50%
    transform: scale(1.4)
  100%
    transform: scale(1)

.pulse-single:active
  animation: pulse 0.2s 1 ease
</style>
