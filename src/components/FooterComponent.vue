<template>
  <div
    class="bg-footer-bg text-footer-text flex flex-col 2xl:px-52 xl:px-40 lg:px-20 py-20"
  >
    <div class="lg:flex lg:justify-between hidden">
      <div>
        <div
          class="text-footer-header text-md 3xl:text-2xl 2xl:text-xl xl:text-lg mb-2"
        >
          Контакты
        </div>
        <div class="flex flex-col">
          <div class="flex items-center  mb-2">
            <i class="fa fa-phone px-2"></i>
            <a class="hover:text-footer-textHover" href="tel:+375296896679"
              >+375296896679</a
            >
          </div>
          <div class="flex items-center">
            <i class="fa fa-envelope px-2"></i>
            <a class="hover:text-footer-textHover" href="mailto:info@artasur.by"
              >info@artasur.by</a
            >
          </div>
        </div>
      </div>
      <div>
        <div
          class="text-footer-header text-md 3xl:text-2xl 2xl:text-xl xl:text-lg  mb-2"
        >
          График работы
        </div>
        <div class="flex flex-col  mb-2">
          <p class="mb-2">9:00 - 17:00</p>
          <p class="mb-2">Выходной: суббота,</p>
          <p class="mb-2">воскресенье</p>
        </div>
      </div>
      <div>
        <div
          class="text-footer-header text-md 3xl:text-2xl 2xl:text-xl xl:text-lg mb-2"
        >
          Навигация
        </div>
        <div class="flex flex-col">
          <a
            class="mb-2 hover:text-footer-textHover"
            href="#"
            v-scroll-to="'#aboutInformation'"
            >О нас</a
          >
          <a
            class="mb-2 hover:text-footer-textHover"
            href="#"
            v-scroll-to="'#clientInformation'"
            >Нам доверяют</a
          >
          <a
            class="mb-2 hover:text-footer-textHover"
            href="#"
            v-scroll-to="'#mapInformation'"
            >Карта щитов</a
          >
        </div>
      </div>
      <div class="flex">
        <a href="#" class="mr-4">
          <i class="fab fa-telegram fa-3x hover:text-footer-textHover"></i>
        </a>
        <a href="viber://chat?number=+375296896679">
          <i class="fab fa-viber fa-3x hover:text-footer-textHover"></i>
        </a>
      </div>
    </div>
    <div class="flex flex-col lg:hidden px-24 mb-8 md:mb-0">
      <div
        class="flex md:justify-between md:flex-row md:items-stretch flex-col items-center mb-4 md:mb-0"
      >
        <div class="mb-8 md:mb-0">
          <div
            class="text-footer-header text-md 3xl:text-2xl 2xl:text-xl xl:text-lg mb-2 md:text-left text-center"
          >
            Контакты
          </div>
          <div class="flex flex-col">
            <div class="flex items-center mb-2">
              <i class="fa fa-phone px-2"></i>
              <a class="hover:text-footer-textHover" href="tel:+375296896679"
                >+375296896679</a
              >
            </div>
            <div class="flex items-center">
              <i class="fa fa-envelope px-2"></i>
              <a
                class="hover:text-footer-textHover"
                href="mailto:info@artasur.by"
                >info@artasur.by</a
              >
            </div>
          </div>
        </div>
        <div class="md:text-left text-center">
          <div
            class="text-footer-header text-md 3xl:text-2xl 2xl:text-xl xl:text-lg mb-2"
          >
            График работы
          </div>
          <div class="flex flex-col mb-2">
            <p class="mb-2">9:00 - 17:00</p>
            <p class="mb-2">Выходной: суббота,</p>
            <p class="mb-2">воскресенье</p>
          </div>
        </div>
      </div>
      <div
        class="flex md:justify-between md:flex-row md:items-stretch flex-col items-center"
      >
        <div class="mb-4 md:mb-0 md:text-left text-center">
          <div
            class="text-footer-header text-md 3xl:text-2xl 2xl:text-xl xl:text-lg mb-2"
          >
            Навигация
          </div>
          <div class="flex flex-col">
            <a
              class="mb-2 hover:text-footer-textHover"
              href="#"
              v-scroll-to="'#aboutInformation'"
              >О нас</a
            >
            <a
              class="mb-2 hover:text-footer-textHover"
              href="#"
              v-scroll-to="'#clientInformation'"
              >Нам доверяют</a
            >
            <a
              class="mb-2 hover:text-footer-textHover"
              href="#"
              v-scroll-to="'#mapInformation'"
              >Карта щитов</a
            >
          </div>
        </div>
        <div class="flex items-center">
          <a href="#" class="mr-4">
            <i
              class="fab fa-telegram fa-3x md:fa-4x hover:text-footer-textHover"
            ></i>
          </a>
          <a href="viber://chat?number=+375296896679">
            <i
              class="fab fa-viber fa-3x md:fa-4x hover:text-footer-textHover"
            ></i>
          </a>
        </div>
      </div>
    </div>
    <div
      class="flex lg:justify-between lg:my-16 lg:flex-row md:flex-col md:px-24 md:my-12 lg:px-0 flex-col px-12"
    >
      <div
        class="flex items-center justify-center mx-auto lg:w-2/5 2xl:px-24 xl:px-8 lg:px-8 md:mb-12 lg:mb-0 md:w-full md:px-24 px-2 mb-8"
      >
        <img src="../assets/images/artasur-logo-footer.png" alt="" />
      </div>
      <div class="md:w-3/5 w-full mb-8 md:mb-0">
        РБ, 223053, Минская обл., Минский р-н, д. Боровляны, ул. Березовая роща,
        106, офис 133
        <br />
        <br />
        УНП 800008495 ОКПО 37547354 <br />
        р/с 3012040197419 <br />
        в ОАО «Евроторгинвестбанк», код 735 <br />
        Адрес банка : г. Минск, ул. Л. Беды, 2Б, код 735
      </div>
    </div>
    <div
      class="flex md:px-24 lg:px-0 md:flex-row flex-col items-center md:items-stretch"
    >
      <div class="mb-2 md:mb-0">
        <a
          class="md:pr-4 pr-2 hover:text-footer-textHover"
          href="https://t.me/vladislav_zubetcs"
          target="_blank"
          >Владислав Зубец
        </a>
        <a
          class="md:pr-4 hover:text-footer-textHover"
          href="https://t.me/andrey1rodionov"
          target="_blank"
          >Андрей Родионов</a
        >
      </div>
      <div>&copy; {{ new Date().getFullYear() }} ООО «Артасур»</div>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style lang="sass">
.bg-footer
  background-color: #323232

.map-div
  width: 25%
  height: 100vh

.ymap-container
  height: 100%
</style>
