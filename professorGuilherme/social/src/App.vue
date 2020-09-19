<template>
  <span>
    <header>
      <nav-bar cor="green darken-1" logo="Social" url="#" />
    </header>
    <main>
      <div class="container">
        <router-view />
      </div>
    </main>
    <footer-vue ano="2020" cor="green darken-1" logo="Social" descricao="Teste de descrição">
      <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
      <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
      <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
      <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
    </footer-vue>
  </span>
</template>

<script>
import NavBar from "@/components/layouts/NavBar";
import FooterVue from "@/components/layouts/FooterVue";

export default {
  name: "App",
  components: {
    NavBar,
    FooterVue
  }
};
</script>

<style></style>
