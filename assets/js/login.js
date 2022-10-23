const btnRegister = document.querySelector("#btnRegister");
const btnLogin = document.querySelector("#btnLogin");
const frmLogin = document.querySelector("#frmLogin");
const frmRegister = document.querySelector("#frmRegister");
const registrarse = document.querySelector("#registrarse");
const login = document.querySelector("#login");

//recuperar
const btnRecuperar = document.querySelector("#btnRecuperar");
const frmRecuperar = document.querySelector("#frmRecuperar");
const Recuperar = document.querySelector("#recuperar");
const correoRecuperar = document.querySelector("#correoRecuperar");

//captura de datos del registro
const nombreRegistro = document.querySelector("#nombreRegistro");
const apellidoRegistro = document.querySelector("#apellidoRegistro");
const correoRegistro = document.querySelector("#correoRegistro");
const claveRegistro = document.querySelector("#claveRegistro");
const docRegistro = document.querySelector("#docRegistro");

//CAPTURA DEL LOGIN
const correoLogin = document.querySelector("#correoLogin");
const claveLogin = document.querySelector("#claveLogin");
//CAPTURA DEL BOTON LOGIN
//const btnModalLogin = document.querySelector('#btnModalLogin');
//CAPTURA BOTON BUSQUEDA

//const busqueda = document.querySelector('#buscar');

var modalLogin = new bootstrap.Modal(document.getElementById("modalLogin"));

document.addEventListener("DOMContentLoaded", function () {
  btnRegister.addEventListener("click", function () {
    frmLogin.classList.add("d-none");
    frmRegister.classList.remove("d-none");
  });
  btnLogin.addEventListener("click", function () {
    frmRegister.classList.add("d-none");
    frmLogin.classList.remove("d-none");
  });
  btnRecuperar.addEventListener("click", function () {
    frmRecuperar.classList.remove("d-none");
    frmLogin.classList.add("d-none");
  });
  //registro
  registrarse.addEventListener("click", function () {
    if (
      nombreRegistro.value == "" ||
      apellidoRegistro.value == "" ||
      correoRegistro.value == "" ||
      claveRegistro.value == "" ||
      docRegistro.value == ""
    ) {
      Swal.fire("Aviso?", "TODOS LOS CAMPOS SON REQUERIDOS", "warning");
    } else {
      let formData = new FormData();
      formData.append("nombre", nombreRegistro.value);
      formData.append("apellido", apellidoRegistro.value);
      formData.append("correo", correoRegistro.value);
      formData.append("clave", claveRegistro.value);
      formData.append("doc", docRegistro.value);

      const url = base_url + "usuarios/registroDirecto";
      const http = new XMLHttpRequest();
      http.open("POST", url, true);
      http.send(formData);
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          Swal.fire("Aviso?", res.msg, res.icono);
          if (res.icono == "success") {
            setTimeout(() => {
              enviarCorreo(correoRegistro.value, res.token);
            }, 2000);
          }
        }
      };
    }
  });
  //LOGIN
  login.addEventListener("click", function () {
    if (correoLogin.value == "" || claveLogin.value == "") {
      Swal.fire("Aviso?", "TODOS LOS CAMPOS SON REQUERIDOS", "warning");
    } else {
      let formData = new FormData();
      formData.append("correoLogin", correoLogin.value);
      formData.append("claveLogin", claveLogin.value);

      const url = base_url + "usuarios/loginDirecto";
      const http = new XMLHttpRequest();
      http.open("POST", url, true);
      http.send(formData);
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          Swal.fire("Aviso?", res.msg, res.icono);
          if (res.icono == "success") {
            setTimeout(() => {
              window.location.reload();
            }, 2000);
          }
        }
      };
    }
  });

  //btnModalLogin.addEventListener("click", function () {
  //modalLogin.show();
  //});
  //LOGIN
  Recuperar.addEventListener("click", function () {
    if (correoRecuperar.value == "") {
      Swal.fire("Aviso?", "TODOS LOS CAMPOS SON REQUERIDOS", "warning");
    } else {
      let formData = new FormData();
      formData.append("correoRecuperar", correoRecuperar.value);

      const url = base_url + "usuarios/recuperar";
      const http = new XMLHttpRequest();
      http.open("POST", url, true);
      http.send(formData);
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          Swal.fire("Aviso?", res.msg, res.icono);
          if (res.icono == "success") {
            setTimeout(() => {
              enviarRecuperar(correoRecuperar.value, res.clave);
            }, 2000);
          }
        }
      };
    }
  });
});

function enviarCorreo(correo, token) {
  let formData = new FormData();
  formData.append("token", token);
  formData.append("correo", correo);

  const url = base_url + "usuarios/enviarCorreo";
  const http = new XMLHttpRequest();
  http.open("POST", url, true);
  http.send(formData);
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      Swal.fire("Aviso?", res.msg, res.icono);
      if (res.icono == "success") {
        setTimeout(() => {
          window.location.reload();
        }, 2000);
      }
    }
  };
}

function enviarRecuperar(correo, clave) {
  let formData = new FormData();
  formData.append("clave", clave);
  formData.append("correoRecuperar", correo);

  const url = base_url + "usuarios/enviarRecuperar";
  const http = new XMLHttpRequest();
  http.open("POST", url, true);
  http.send(formData);
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
      const res = JSON.parse(this.responseText);
      Swal.fire("Aviso?", res.msg, res.icono);
      if (res.icono == "success") {
        setTimeout(() => {
          window.location.reload();
        }, 2000);
      }
    }
  };
}

function abrirModalLogin() {
  myModal.hide();
  modalLogin.show();
}
