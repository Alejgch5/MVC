const nuevo = document.querySelector("#nuevo_registro");
const tittleModal = document.querySelector("#tittleModal");
const frm = document.querySelector("#frmRegistro");
const btnAccion = document.querySelector("#btnAccion");
let tblAlumnos;
var myModal = new bootstrap.Modal(document.getElementById("nuevoModal"));
document.addEventListener("DOMContentLoaded", function () {
  tblAlumnos = $("#tblAlumnos").DataTable({
    ajax: {
      url: "alumnos/listar",
      dataSrc: "",
    },
    columns: [
      { data: "id" },
      { data: "nombre" },
      { data: "apellido" },
      { data: "correo" },
      { data: "perfil" },
      { data: "accion" },
    ],
    language,
    dom,
    buttons,
  });
  //levantar modal registro nuevo usuario
  nuevo.addEventListener("click", function () {
    document.querySelector('#id').value = '';
    tittleModal.textContent = "AGREGA ESTUDIANTES";
    btnAccion.textContent = 'Registrar';
    frm.reset();
    document.querySelector('#clave').removeAttribute('readonly');
    myModal.show();
  });

  //registrar alumnos
  frm.addEventListener("submit", function (e) {
    e.preventDefault();
    let data = new FormData(this);
    const url = base_url + "alumnos/registrar";
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(data);
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText);
        const res = JSON.parse(this.responseText);
        if (res.icono == "success") {
          myModal.hide();
          tblAlumnos.ajax.reload();
        }
        swal.fire("aviso?", res.msg.toUpperCase(), res.icono);
      }
    };
  });
});

function eliminarUser(idUser) {
  Swal.fire({
    title: "Estas seguro?",
    text: "Se eliminara el estudiante!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, Eliminar!",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "alumnos/delete/" + idUser;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          console.log(this.responseText);
          const res = JSON.parse(this.responseText);
          if (res.icono == "success") {
            tblAlumnos.ajax.reload();
          }
          swal.fire("aviso?", res.msg.toUpperCase(), res.icono);
        }
      };
    }
  });
}

function editUser($idUser) {
  const url = base_url + "alumnos/edit/" + $idUser;
  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
      const res = JSON.parse(this.responseText);
      document.querySelector('#id').value = res.id;
      document.querySelector('#nombre').value = res.nombre;
      document.querySelector('#apellido').value = res.apellido;
      document.querySelector('#correo').value = res.correo;
      document.querySelector('#clave').setAttribute('readonly', 'readonly');
      tittleModal.textContent = "MODIFICAR USUARIO";
      btnAccion.textContent = 'Actualizar';
      myModal.show();
    }
  };
}
