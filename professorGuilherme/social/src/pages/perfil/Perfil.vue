<template>
  <site-template>
    <span slot="menuesquerdo">
      <img
        class="responsive-img"
        src="https://www.frenet.com.br/blog/wp-content/uploads/2019/01/social-selling-como-aumentar-as-vendas-com-as-redes-sociais.png"
        alt
      />
    </span>
    <span slot="principal">
      <h4>Perfil</h4>
      <input type="text" placeholder="Nome" v-model="name" />
      <input type="text" placeholder="E-mail" v-model="email" />

      <div class="file-field input-field">
        <div class="btn">
          <span>Imagem</span>
          <input type="file" />
        </div>
        <div class="file-path-wrapper">
          <input class="file-path validate" type="text" />
        </div>
      </div>

      <input type="password" placeholder="Senha" v-model="password" />
      <input type="password" placeholder="Repetir Senha" v-model="password_confirmation" />
      <button class="btn" v-on:click="perfil()">Enviar</button>
    </span>
  </site-template>
</template>

<script>
import SiteTemplate from "@/templates/SiteTemplate";
import axios from "axios";
export default {
  name: "Perfil",
  components: {
    SiteTemplate,
  },
  data() {
    return {
      usuario: false,
      name: "",
      email: "",
      password: "",
      password_confirmation: "",
    };
  },
  created(){
    let usuarioAux = sessionStorage.getItem('usuario');
    if(usuarioAux){
      this.usuario = JSON.parse(usuarioAux);
      this.name = this.usuario.name;
      this.email = this.usuario.email;
    }
  },
  methods: {
    perfil() {
      axios
        .post("http://127.0.0.1:8000/api/cadastro", {
          name: this.name,
          email: this.email,
          password: this.password,
          password_confirmation: this.password_confirmation,
        })
        .then((response) => {
          if (response.data.token) {
            //login com sucesso
            sessionStorage.setItem("usuario", JSON.stringify(response.data));
            this.$router.push("/");
          } else if (response.data.status == false) {
            //login nao existe
            alert("Erro ao cadastrar");
          } else {
            //erros de validacao
            console.log("erros de validacao");
            let erros = "";
            for (let erro of Object.values(response.data)) {
              erros += erro + " ";
            }
            alert(erros);
          }
        })
        .catch((e) => {
          console.log(e);
          alert("Erro: Tente novamente mais tarde.");
        });
    },
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped></style>
