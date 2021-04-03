<template>
  <div>
    <div id="header">
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
    <div id="information">
      <InformationComponent />
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
import InformationComponent from "@/components/InformationComponent";

export default {
  components: {
    HeaderComponent,
    AboutComponent,
    ClientInformationComponent,
    MapComponent,
    FooterComponent,
    InformationComponent,
  },
};
</script>
