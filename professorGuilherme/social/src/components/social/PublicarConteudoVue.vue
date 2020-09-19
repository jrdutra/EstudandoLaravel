<template>
  <div class="row">
    <grid-vue tamanho="12" class="input-field">
      <textarea v-model="conteudo" id="conteudoID" class="materialize-textarea"></textarea>
      <label for="conteudoID">O que está acontecendo?</label>
    </grid-vue>
    <grid-vue v-if="conteudo" class="btn waves-effect waves-light col" tamanho="2 offset-s10">Publicar</grid-vue>
  </div>
</template>

<script>
import GridVue from "@/components/layouts/GridVue";
export default {
  name: "PublicarConteudoVue",
  props: [],
  components: {
    GridVue,
  },
  data() {
    return {

      conteudo: ''

    };
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped></style>
