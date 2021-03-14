<template>
  <div class="bg-white pt-16 pb-52 relative">
    <div class="flex flex-col items-center px-8">
      <div class="text-xl 3xl:text-5xl 2xl:text-4xl xl:text-3xl pb-4">
        Нам доверяют
      </div>
      <div
        class="text-md 3xl:text-3xl 2xl:text-2xl xl:text-xl text-center opacity-50 xl:mb-24 mb-16"
      >
        Небольшой список компаний с которыми мы работали
      </div>
    </div>
    <div class="flex flex-wrap justify-center w-full px-4 md:px-16">
      <LogoComponent
        v-for="(brand, index) in brands"
        :key="index"
        :imageUrl="brand.path"
        data-aos="fade-up"
        data-aos-delay="250"
      />
    </div>
    <svg
      xmlns="http://www.w3.org/2000/svg"
      viewBox="0 0 100 100"
      preserveAspectRatio="none"
      class="svg-line"
    >
      <polygon fill="#f2f2f2" points="0,100 100,0 100,100" />
    </svg>
  </div>
</template>

<script>
import LogoComponent from "@/components/LogoComponent";

export default {
  components: { LogoComponent },
  data() {
    return {
      brands: [
        {
          path: "A1.png",
        },
        {
          path: "alter.png",
        },
        {
          path: "audi.png",
        },
        {
          path: "belgiss.png",
        },
        {
          path: "belmarket.png",
        },
        {
          path: "BMW.png",
        },
        {
          path: "bsb.png",
        },
        {
          path: "ekk.png",
        },
        {
          path: "ford.png",
        },
        {
          path: "gippo.png",
        },
        {
          path: "grundfos.png",
        },
        {
          path: "isuzu.png",
        },
        {
          path: "izomat.svg",
        },
        {
          path: "keramin.png",
        },
        {
          path: "kfc.png",
        },
        {
          path: "kolesoplus.png",
        },
        {
          path: "kopilka.png",
        },
        {
          path: "LM.png",
        },
        {
          path: "mac.png",
        },
        {
          path: "mile.png",
        },
        {
          path: "mts.png",
        },
        {
          path: "oma.png",
        },
        {
          path: "peugeot.png",
        },
        {
          path: "prostore.png",
        },
        {
          path: "sosedi.png",
        },
        {
          path: "volkswagen.png",
        },
        {
          path: "wilo.png",
        },
        {
          path: "zabudova.png",
        },
      ],
    };
  },
};
</script>

<style lang="sass" scoped></style>
