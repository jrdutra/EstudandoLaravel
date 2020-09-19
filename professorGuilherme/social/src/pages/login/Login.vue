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
      <span v-if="!cadastro">
        <h4>Login</h4>
        <input type="text" placeholder="E-mail" value />
        <input type="password" placeholder="Senha" value />
        <button class="btn">Entrar</button>
        <button class="btn orange" v-on:click="cadastro = !cadastro">Cadastrar</button>
      </span>
      <span v-if="cadastro">
        <h4>Cadastro</h4>
        <input type="text" placeholder="Nome" value />
        <input type="text" placeholder="E-mail" value />
        <input type="password" placeholder="Senha" value />
        <input type="password" placeholder="Repetir Senha" value />
        <button class="btn">Enviar</button>
        <button class="btn red" v-on:click="cadastro = !cadastro">Já tenho conta</button>
      </span>
    </span>
  </login-template>
</template>

<script>
import LoginTemplate from "@/templates/LoginTemplate";
export default {
  name: "Login",
  components: {
    LoginTemplate
  },
  data() {
    return {

      cadastro:false

    };
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped></style>
