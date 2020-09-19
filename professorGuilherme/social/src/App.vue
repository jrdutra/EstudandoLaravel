<template>
  <span>
    <header>
      <nav-bar cor="green darken-1" logo="Social" url="#" />
    </header>
    <main>
      <div class="container">
        <div class="row">
          <grid-vue tamanho="4">
            <card-menu-vue>
              <div class="row valign-wrapper">
                <div class="col s4">
                  <img
                    src="https://materializecss.com/images/yuna.jpg"
                    alt=""
                    class="circle responsive-img"
                  />
                  <!-- notice the "circle" class -->
                </div>
                <div class="col s8">
                  <h5>Maria Silva</h5>
                  <span class="black-text">
                    Descrição do perfil do usuário no sistema de teste da rede
                    social
                  </span>
                </div>
              </div>
            </card-menu-vue>
            <card-menu-vue>
              <h4>Teste</h4>
            </card-menu-vue>
          </grid-vue>
          <grid-vue tamanho="8">
            <router-view />
          </grid-vue>
        </div>
      </div>
    </main>
    <footer-vue
      ano="2020"
      cor="green darken-1"
      logo="Social"
      descricao="Teste de descrição"
    >
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
import GridVue from "@/components/layouts/GridVue";
import CardMenuVue from "@/components/layouts/CardMenuVue";

export default {
  name: "App",
  components: {
    NavBar,
    FooterVue,
    GridVue,
    CardMenuVue
  }
};
</script>

<style></style>
