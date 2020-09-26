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
        :id="item.id"
        :totalCurtidas="item.total_curtidas"
        :curtiuConteudo="item.curtiu_conteudo"
        :perfil="item.user.imagem"
        :nome="item.user.name"
        :data="item.data"
        v-for="item in listaConteudos" :key="item.id"
      >
        <card-detalhe-vue
          :titulo="item.titulo"
          :img="item.imagem"
          :txt="item.texto"
          :link="item.link"
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
      usuario: false,
    };
  },
  created() {
    let usuarioAux = this.$store.getters.getUsuario;
    if (usuarioAux) {
      this.usuario = this.$store.getters.getUsuario;

      //Faz requisição do conteudo do feed
      this.$http
        .get(
          this.$urlApi+"conteudo/lista",
          {
            headers: {
              authorization: "Bearer " + this.$store.getters.getToken,
            },
          }
        )
        .then((response) => {
          console.log(response);
          if(response.data.status){
            this.$store.commit('setConteudosLinhaTempo', response.data.conteudos.data);
          }
        })
        .catch((e) => {
          console.log(e);
        });

    }
  },
  computed:{
    listaConteudos(){
      return this.$store.getters.getConteudosLinhaTempo;
    }
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped></style>
