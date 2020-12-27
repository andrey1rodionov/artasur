<template>
  <div class="flex flex-col items-center w-full">
    <form @submit.prevent="onSubmit" class="w-full submit-form">
      <div class="py-2">
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
          type="text"
          placeholder="Ваша электронная почта"
          class="input-field"
          v-model.trim="email"
          :class="{
            invalid:
              ($v.email.$dirty && !$v.email.required) ||
              ($v.email.$dirty && !$v.email.email)
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
          type="text"
          placeholder="Ваш номер телефона"
          class="input-field"
          v-model="phoneNumber"
          v-mask="'+375 (##) ###-##-##'"
          :class="{
            invalid:
              ($v.phoneNumber.$dirty && !$v.phoneNumber.required) ||
              ($v.phoneNumber.$dirty && !$v.phoneNumber.minLength)
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
          class="bg-button-blue text-white w-full py-3 btn text-lg focus:outline-none 3xl:text-3xl xl:text-lg lg:text-sm hvr-underline-from-center"
          type="submit"
        >
          Отправить заявку
        </button>
      </div>
    </form>
  </div>
</template>

<script>
import { email, required, minLength } from "vuelidate/lib/validators";
export default {
  data() {
    return {
      username: "",
      email: "",
      phoneNumber: ""
    };
  },
  validations: {
    username: { required },
    email: { email, required },
    phoneNumber: { required, minLength: minLength(19) },
    deliveryAddress: { required }
  },
  methods: {
    async onSubmit() {
      if (this.$v.$invalid) {
        this.$v.$touch();
        return;
      }

      const userOrderData = {
        name: this.username,
        phone: this.phoneNumber,
        email: this.email
      };

      console.log(userOrderData);
    }
  }
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
</style>
