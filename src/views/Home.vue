<template>
  <div>
    <div class="">
      <HeaderComponent />
    </div>
    <div id="aboutInformation">
      <AboutComponent />
    </div>
    <div id="clientInformation">
      <ClientInformationComponent />
    </div>
    <div id="mapInformation">
      <MapComponent />
    </div>
    <div id="footer">
      <FooterComponent />
    </div>
  </div>
</template>

<script>
import HeaderComponent from "@/components/HeaderComponent";
import AboutComponent from "@/components/AboutComponent";
import ClientInformationComponent from "@/components/ClientInformationComponent";
import MapComponent from "@/components/MapComponent";
import FooterComponent from "@/components/FooterComponent";

export default {
  components: {
    HeaderComponent,
    AboutComponent,
    ClientInformationComponent,
    MapComponent,
    FooterComponent
  }
};
</script>
