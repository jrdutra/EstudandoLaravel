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
      <input type="text" placeholder="Nome" v-model="name" />
      <input type="text" placeholder="E-mail" v-model="email" />
      <input type="password" placeholder="Senha" v-model="password" />
      <input type="password" placeholder="Repetir Senha" v-model="password_confirmation" />
      <button class="btn" v-on:click="cadastro()">Enviar</button>
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
    return {
      name:'',
      email:'',
      password:'',
      password_confirmation:''
    };
  },
    methods:{
    cadastro(){
      this.$http.post(this.$urlApi+'cadastro', {
        name: this.name,
        email: this.email,
        password: this.password,
        password_confirmation: this.password_confirmation
      })
      .then(response=>{
        if(response.data.status){
          //login com sucesso
          this.$store.commit('setUsuario', response.data.usuario);
          sessionStorage.setItem('usuario',  JSON.stringify(response.data.usuario));
          this.$router.push('/');
        }else if (response.data.status == false && response.data.validacao){
          //erros de validacao
          let erros = '';
          for(let erro of Object.values(response.data.erros)){
            erros += erro + " ";
          }
          alert(erros);


        }else{
          //login nao existe
          alert("Erro ao cadastrar")
        }
      })
      .catch(e=>{

        alert("Erro: Tente novamente mais tarde.")
      });
    }
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped></style>
