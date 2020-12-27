<template>
  <div
    class="relative text-white bg-gradient-to-b from-bgColor-from to-bgColor-to"
  >
    <kinesis-container class="overflow-hidden">
      <kinesis-element :strength="25">
        <img
          class="content-height w-screen image-div"
          src="../assets/images/cloud.png"
          alt=""
        />
      </kinesis-element>
      <div
        class="lg:block contact-div-lg py-8 3xl:px-48 xl:px-16 lg:px-8 text-center hidden w-full"
      >
        <div class="flex items-center justify-between">
          <div class="flex w-2/5 items-center">
            <div class="flex flex-col text-lg xl:text-xl 3xl:text-3xl">
              <div class="flex items-center">
                <i class="fa fa-phone px-2"></i>
                <a href="tel:+375296896679">+375296896679</a>
              </div>
              <div class="flex items-center">
                <i class="fa fa-envelope px-2"></i>
                <a href="mailto:info@artasur.by">info@artasur.by</a>
              </div>
            </div>
          </div>
          <div class="flex text-lg xl:text-xl 3xl:text-3xl">
            <a
              href="#"
              class="mx-2 xl:mx-6 cursor-pointer hvr-underline-from-left"
              v-scroll-to="'#aboutInformation'"
            >
              Почему мы
            </a>
            <a
              href="#"
              class="mx-2 xl:mx-6 cursor-pointer hvr-underline-from-left"
              v-scroll-to="'#clientInformation'"
            >
              Нам доверяют
            </a>
            <a
              href="#"
              class="mx-2 xl:mx-6 cursor-pointer hvr-underline-from-left"
              v-scroll-to="'#mapInformation'"
            >
              Карта щитов
            </a>
            <a
              href="#"
              class="ml-2 xl:ml-6 cursor-pointer hvr-underline-from-left"
              v-scroll-to="'#footer'"
            >
              Контакты
            </a>
          </div>
        </div>
      </div>
      <div class="lg:block hidden info-div-lg text-right">
        <div>
          <div class="text-xl 3xl:text-5xl 2xl:text-4xl xl:text-3xl">
            Эффективная наружная реклама
          </div>
          <div class="py-4 text-md 3xl:text-3xl 2xl:text-2xl xl:text-xl">
            реклама на биллбордах
          </div>
        </div>
        <div class="pt-4">
          <button
            class="bg-button-blue p-4 text-lg focus:outline-none 3xl:text-3xl xl:text-lg lg:text-sm hvr-underline-from-left"
            v-scroll-to="'#mapInformation'"
          >
            Оставить заявку
          </button>
        </div>
      </div>
      <div
        class="hidden mb-2 lg:block billboard-div 3xl:w-3/5 2xl:w-55-percent xl:w-3/5 lg:w-3/4 3xl:ml-48 xl:ml-16 lg:ml-8"
      >
        <img src="../assets/images/billboard.png" alt="" />
      </div>
    </kinesis-container>
    <div class="contact-div text-center w-3/4 lg:hidden">
      <div class="flex flex-col items-center">
        <div class="pb-8 pt-16">
          <img src="../assets/images/artasur-logo.png" alt="" />
        </div>
        <div class="flex flex-col text-lg md:text-2xl">
          <div class="flex items-center">
            <i class="fa fa-phone px-2"></i>
            <a href="tel:+375296896679">+375296896679</a>
          </div>
          <div class="py-1"></div>
          <div class="flex items-center">
            <i class="fa fa-envelope px-2"></i>
            <a href="mailto:info@artasur.by">info@artasur.by</a>
          </div>
        </div>
        <div class="pt-8">
          <div class="md:text-3xl text-2xl">
            Эффективная наружная реклама
          </div>
          <div class="py-4 text-md md:text-2xl text-lg">
            Реклама на биллбордах
          </div>
        </div>
        <div class="pt-8">
          <button
            class="bg-button-blue p-4 md:text-xl text-lg focus:outline-none"
            v-scroll-to="'#mapInformation'"
          >
            Оставить заявку
          </button>
        </div>
      </div>
    </div>
    <Slide class="lg:hidden" :closeOnNavigation="true">
      <a href="#" v-scroll-to="'#aboutInformation'">
        <span>Почему мы</span>
      </a>
      <a href="#" v-scroll-to="'#clientInformation'">
        <span>Нам доверяют</span>
      </a>
      <a href="#" v-scroll-to="'#mapInformation'">
        <span>Карта щитов</span>
      </a>
      <a href="#" v-scroll-to="'#footer'">
        <span>Контакты</span>
      </a>
    </Slide>
    <svg
      xmlns="http://www.w3.org/2000/svg"
      viewBox="0 0 100 100"
      preserveAspectRatio="none"
    >
      <polygon fill="#f2f2f2" points="0,100 100,0 100,100" />
    </svg>
  </div>
</template>

<script>
import { Slide } from "vue-burger-menu";

export default {
  components: { Slide }
};
</script>

<style lang="sass">
svg
  position: absolute
  bottom: 0
  width: 100%
  height: 10vw

.image-div
  transform: translateY(20%) scale(1.4)
  object-fit: cover

@media (orientation: portrait) and (max-height: 1024px)
  .image-div
    transform: translateY(30%)

.billboard-div
  position: absolute
  bottom: 0

.bm-burger-bars
  background-color: white
  border-radius: 4px

.bm-menu
  background-color: #263135

.info-div-lg
  position: absolute
  top: 35%
  right: 0
  transform: translate(0, -50%)
  @apply 3xl:mr-48 xl:mr-16 lg:mr-8

.contact-div
  position: absolute
  top: 45%
  left: 50%
  transform: translate(-50%, -50%)

.contact-div-lg
  position: absolute
  top: 0

.hvr-underline-from-left
  &::before
    background: white !important
    height: 2px !important

.hvr-underline-from-left
  &::before
    background: white !important
    height: 4px !important
</style>
