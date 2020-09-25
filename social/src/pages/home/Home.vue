<template>
  <site-template>
    <span slot="menuesquerdo">
      <div class="row valign-wrapper">
        <grid-vue tamanho="4">
          <img :src="usuario.imagem" :alt="usuario.name" class="circle responsive-img" />
          <!-- notice the "circle" class -->
        </grid-vue>
        <grid-vue tamanho="8">
          <h5>{{ usuario.name }}</h5>
          <span class="black-text">

          </span>
        </grid-vue>
      </div>
    </span>
    <span slot="principal">
      <publicar-conteudo-vue></publicar-conteudo-vue>
      <card-conteudo-vue
        perfil="https://materializecss.com/images/yuna.jpg"
        nome="Maria Silva"
        data="13/01/2020 13:30"
      >
        <card-detalhe-vue
          titulo="Meu card"
          img="https://materializecss.com/images/sample-1.jpg"
          txt="Conteúdo do de texto do card, escrevendo só para preencher espaço para ajustar o layout"
        ></card-detalhe-vue>
      </card-conteudo-vue>
    </span>
  </site-template>
</template>

<script>
import CardConteudoVue from "@/components/social/CardConteudoVue";
import SiteTemplate from "@/templates/SiteTemplate";
import CardDetalheVue from "@/components/social/CardDetalheVue";
import PublicarConteudoVue from "@/components/social/PublicarConteudoVue";
import GridVue from "@/components/layouts/GridVue";
export default {
  name: "Home",
  components: {
    CardConteudoVue,
    CardDetalheVue,
    PublicarConteudoVue,
    SiteTemplate,
    GridVue
  },
  data() {
    return {
      usuario:false
    };
  },
  created() {
    let usuarioAux = this.$store.getters.getUsuario;
    if (usuarioAux) {
      this.usuario = this.$store.getters.getUsuario;
    }
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped></style>
