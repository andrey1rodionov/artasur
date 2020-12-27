<template>
  <div class="bg-site-color pt-16 pb-52 relative">
    <div class="flex flex-col items-center px-8">
      <div class="text-xl 3xl:text-5xl 2xl:text-4xl xl:text-3xl pb-4">
        Почему мы?
      </div>
      <div
        class="text-md 3xl:text-3xl 2xl:text-2xl xl:text-xl text-center opacity-50  xl:mb-24 mb-16"
      >
        Наша наружная реклама у автомагистралей является <br />
        эффективным рекламным средством
      </div>
    </div>
    <div class="flex flex-wrap justify-center w-full">
      <CardAboutComponent
        v-for="(content, index) in aboutContents"
        :key="index"
        :gradient="content.gradient"
        :icon="content.icon"
        :header="content.header"
        :text="content.text"
      />
    </div>
    <svg
      xmlns="http://www.w3.org/2000/svg"
      viewBox="0 0 100 100"
      preserveAspectRatio="none"
    >
      <polygon fill="white" points="0,100 100,0 100,100" />
    </svg>
  </div>
</template>

<script>
import CardAboutComponent from "@/components/CardAboutComponent";

export default {
  components: { CardAboutComponent },
  data() {
    return {
      aboutContents: [
        {
          gradient: "bg-gradient-to-b from-firstCircle-from  to-firstCircle-to",
          icon: "fa-users",
          header: "Широчайший охват аудитории",
          text:
            "Если наружная реклама расположена в «правильном» месте, если она сделана качественно, " +
            "со вкусом и оригинально, она обязательно найдет своих потребителей. Наружная реклама воздействует " +
            "на людей без их собственного желания. В отличие от рекламы в печатных изданиях, на радио и " +
            "телевидении никто целенаправленно не покупает ее, не включает радио и телевизор. Она не сопровождает " +
            "развлекательные программы для привлечения аудитории."
        },
        {
          gradient:
            "bg-gradient-to-b from-secondCircle-from  to-secondCircle-to",
          icon: "fa-eye",
          header: "Неоднократность восприятия",
          text:
            "Это значит, что подавляющий процент аудитории видят наружную рекламу не один раз, а несколько. " +
            "Частотность просмотров наружной рекламы действует на психологическом уровне. Семь дней в неделю, " +
            "тридцать дней в месяц, ваше сообщение остается на щите. Видно, снова и снова. И в отличие от других " +
            "средств массовой информации, оно не может быть выключено, переключено или выброшено потребителем."
        },
        {
          gradient: "bg-gradient-to-b from-thirdCircle-from  to-thirdCircle-to",
          icon: "fa-head-side-brain",
          header: "Возможность «зацепить» средний класс",
          text:
            "30-40-летние работающие люди, которым некогда смотреть телевизор и читать глянец – лакомый целевой " +
            "кусок для большинства компаний. Но как достать его? Эти люди проводят определенное время за " +
            "рулем – так используйте его! Размещение рекламных щитов и перетяжек на автодорогах " +
            "всегда было очень выгодным."
        },
        {
          gradient:
            "bg-gradient-to-b from-fourthCircle-from  to-fourthCircle-to",
          icon: "fa-smile-beam",
          header: "Ненавязчивость",
          text:
            "Если реклама на ТВ вызывает стойкое желание по крайней мере выключить звук, на радио – поставить диск, " +
            "в журнале – перелистнуть страницу, то с улицей таких проблем не возникает. Наружная реклама НЕ РАЗДРАЖАЕТ, " +
            "даже наоборот, в некоторых ситуациях она радует глаз и служит настоящим украшением города."
        },
        {
          gradient: "bg-gradient-to-b from-fifthCircle-from  to-fifthCircle-to",
          icon: "fa-sack-dollar",
          header: "Экономичность",
          text:
            "Стоимость наружной рекламы намного меньше, чем стоимость рекламы на телевидении, радио, в газетах или журналах."
        }
      ]
    };
  }
};
</script>

<style lang="sass" scoped>
.bg-circle-first
  background: -webkit-gradient(linear, left top, left bottom, from(#e7c88c), to(#f2dcb0))
</style>
