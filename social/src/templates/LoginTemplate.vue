<template>
  <span>
    <header>
      <nav-bar cor="green darken-1" logo="Social" url="/">

        <li v-if="!usuario">
          <router-link to="/login">Entrar</router-link>
        </li>
        <li v-if="!usuario">
          <router-link to="/cadastro">Cadastro</router-link>
        </li>
        <li v-if="usuario">
          <router-link to="/cadastro">{{ usuario.name }}</router-link>
        </li>
        <li v-if="usuario">
          <a v-on:click="sair()">Sair</a>
        </li>
      </nav-bar>
    </header>
    <main>
      <div class="container">
        <div class="row">
          <grid-vue tamanho="8">
            <card-menu-vue>
              <slot name="menuesquerdo"></slot>
            </card-menu-vue>
          </grid-vue>
          <grid-vue tamanho="4">
            <slot name="principal"></slot>
          </grid-vue>
        </div>
      </div>
    </main>
    <footer-vue ano="2020" cor="green darken-1" logo="Social" descricao="Teste de descrição">
      <li>
        <a class="grey-text text-lighten-3" href="#!">Link 1</a>
      </li>
      <li>
        <a class="grey-text text-lighten-3" href="#!">Link 2</a>
      </li>
      <li>
        <a class="grey-text text-lighten-3" href="#!">Link 3</a>
      </li>
      <li>
        <a class="grey-text text-lighten-3" href="#!">Link 4</a>
      </li>
    </footer-vue>
  </span>
</template>

<script>
import NavBar from "@/components/layouts/NavBar";
import FooterVue from "@/components/layouts/FooterVue";
import GridVue from "@/components/layouts/GridVue";
import CardMenuVue from "@/components/layouts/CardMenuVue";

export default {
  name: "LoginTemplate",
  data(){
    return {
      usuario: false
    };
  },
  components: {
    NavBar,
    FooterVue,
    GridVue,
    CardMenuVue,
  },
  created(){
    let usuarioAux = this.$store.getters.getUsuario
    if(usuarioAux){
      this.usuario = this.$store.getters.getUsuario
      this.$router.push('/');
    }
  },
  methods:{
    sair(){
      this.$store.commit('setUsuario', null);
      sessionStorage.clear();
      this.usuario = false;
    }
  }
};
</script>

<style></style>
