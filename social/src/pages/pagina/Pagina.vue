<template>
  <site-template>
    <span slot="menuesquerdo">
      <div class="row valign-wrapper">
        <grid-vue tamanho="4">
          <router-link :to="'/pagina/' + usuarioId">
            <img
              :src="donoPagina.imagem"
              :alt="donoPagina.name"
              class="circle responsive-img"
            />
          </router-link>
          <!-- notice the "circle" class -->
        </grid-vue>
        <grid-vue tamanho="8">
          <router-link :to="'/pagina/' + usuarioId">
            <h5>{{ donoPagina.name }}</h5>
          </router-link>
          <span class="black-text"> </span>
        </grid-vue>
      </div>
    </span>
    <span slot="principal">
      <publicar-conteudo-vue></publicar-conteudo-vue>

      <card-conteudo-vue
        :id="item.id"
        :totalCurtidasProp="item.total_curtidas"
        :comentariosProp="item.comentarios"
        :curtiuConteudo="item.curtiu_conteudo"
        :perfil="item.user.imagem"
        :usuarioId="item.user.id"
        :nome="item.user.name"
        :data="item.data"
        v-for="item in listaConteudos"
        :key="item.id"
      >
        <card-detalhe-vue
          :titulo="item.titulo"
          :img="item.imagem"
          :txt="item.texto"
          :link="item.link"
        ></card-detalhe-vue>
      </card-conteudo-vue>

      <div v-scroll="handleScroll"></div>
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
  name: "Pagina",
  components: {
    CardConteudoVue,
    CardDetalheVue,
    PublicarConteudoVue,
    SiteTemplate,
    GridVue,
  },
  data() {
    return {
      usuario: false,
      urlProximaPagina: null,
      pararScroll: false,
      donoPagina: { imagem: "", name: "" },
    };
  },
  created() {
    let usuarioAux = this.$store.getters.getUsuario;
    if (usuarioAux) {
      this.usuario = this.$store.getters.getUsuario;

      //Faz requisição do conteudo do feed
      this.$http
        .get(this.$urlApi + "conteudo/pagina/lista/" + this.$route.params.id, {
          headers: {
            authorization: "Bearer " + this.$store.getters.getToken,
          },
        })
        .then((response) => {
          //console.log("Conteudos:");
          //console.log(response);
          if (response.data.status) {
            this.$store.commit(
              "setConteudosLinhaTempo",
              response.data.conteudos.data
            );
            this.urlProximaPagina = response.data.conteudos.next_page_url;
            this.donoPagina = response.data.dono;
          }
        })
        .catch((e) => {
          console.log(e);
        });
    }
  },
  methods: {
    handleScroll() {
      //console.log(window.scrollY);
      //console.log(document.body.clientHeight);
      if (this.pararScroll) {
        return;
      }

      if (window.scrollY >= document.body.clientHeight - 770) {
        this.pararScroll = true;
        this.carregaPaginacao();
      }
    },

    carregaPaginacao() {
      if (!this.urlProximaPagina) {
        return;
      }
      //Faz requisição do conteudo do feed
      this.$http
        .get(this.urlProximaPagina, {
          headers: {
            authorization: "Bearer " + this.$store.getters.getToken,
          },
        })
        .then((response) => {
          //console.log(response);
          if (response.data.status) {
            this.$store.commit(
              "setPaginacaoConteudosLinhaTempo",
              response.data.conteudos.data
            );
            this.urlProximaPagina = response.data.conteudos.next_page_url;
            this.pararScroll = false;
          }
        })
        .catch((e) => {
          console.log(e);
        });
    },
  },
  computed: {
    listaConteudos() {
      return this.$store.getters.getConteudosLinhaTempo;
    },
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped></style>
