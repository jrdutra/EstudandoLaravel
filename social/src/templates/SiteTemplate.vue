<template>
  <span>
    <header>
      <nav-bar cor="green darken-1" logo="Social" url="/">
        <li>
          <router-link to="/">Home</router-link>
        </li>
        <li v-if="!usuario">
          <router-link to="/login">Entrar</router-link>
        </li>
        <li v-if="!usuario">
          <router-link to="/cadastro">Cadastro</router-link>
        </li>
        <li v-if="usuario">
          <router-link to="/perfil">{{ usuario.name }}</router-link>
        </li>
        <li v-if="usuario">
          <a v-on:click="sair()">Sair</a>
        </li>
      </nav-bar>
    </header>
    <main>
      <div class="container">
        <div class="row">
          <grid-vue tamanho="4">
            <card-menu-vue>
              <slot name="menuesquerdo"></slot>
            </card-menu-vue>
            <card-menu-vue>
              <h4>Amigos</h4>
              <li>Murilo</li>
              <li>Gustavo</li>
              <li>Reges</li>
              <li>Amauri</li>
              <li>Raphael</li>
            </card-menu-vue>
          </grid-vue>
          <grid-vue tamanho="8">
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
  name: "SiteTemplate",
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
    let usuarioAux = this.$store.getters.getUsuario;
    if(usuarioAux){
      this.usuario = this.$store.getters.getUsuario;
    }else{
      this.$router.push('/login');
    }
  },
  methods:{
    sair(){
      this.$store.commit('setUsuario', null);
      sessionStorage.clear();
      this.usuario = false;
      this.$router.push('/login');
    }
  }
};
</script>

<style></style>
