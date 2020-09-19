<template>
  <login-template>
    <span slot="menuesquerdo">
      <img
        class="responsive-img"
        src="https://www.frenet.com.br/blog/wp-content/uploads/2019/01/social-selling-como-aumentar-as-vendas-com-as-redes-sociais.png"
        alt
      />
    </span>
    <span slot="principal">
      <h4>Cadastro</h4>
      <input type="text" placeholder="Nome" value />
      <input type="text" placeholder="E-mail" value />
      <input type="password" placeholder="Senha" value />
      <input type="password" placeholder="Repetir Senha" value />
      <button class="btn">Enviar</button>
      <router-link to="/login" class="btn red">Já tenho conta</router-link>
    </span>
  </login-template>
</template>

<script>
import LoginTemplate from "@/templates/LoginTemplate";
export default {
  name: "Cadastro",
  components: {
    LoginTemplate,
  },
  data() {
    return {};
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped></style>
