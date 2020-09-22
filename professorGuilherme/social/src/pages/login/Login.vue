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
      <h4>Login</h4>
      <input type="text" placeholder="E-mail" v-model="email" />
      <input type="password" placeholder="Senha" v-model="password" />
      <button class="btn" v-on:click="login()">Entrar</button>
      <router-link to="/cadastro" class="btn orange">Cadastrar</router-link>
    </span>
  </login-template>
</template>

<script>
import LoginTemplate from "@/templates/LoginTemplate";
import axios from 'axios';

export default {
  name: "Login",
  components: {
    LoginTemplate,
  },
  data() {
    return {

      email:'',
      password:''

    };
  },
  methods:{
    login(){
      axios.post('http://127.0.0.1:8000/api/login', {
        email: this.email,
        password: this.password
      })
      .then(response=>{
        console.log(response.data)
      })
      .catch(e=>{
        console.log(e)
      });
    }
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped></style>
