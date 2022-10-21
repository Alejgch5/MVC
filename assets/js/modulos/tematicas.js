const nuevo = document.querySelector("#nuevo_registro");
const tittleModal = document.querySelector("#tittleModal");
const frm = document.querySelector("#frmRegistro");
const btnAccion = document.querySelector("#btnAccion");
let tblTematicas;
var myModal = new bootstrap.Modal(document.getElementById("nuevoModal"));
document.addEventListener("DOMContentLoaded", function () {
    tblTematicas = $("#tblTematicas").DataTable({
    ajax: {
      url: "tematicas/listar",
      dataSrc: "",
    },
    columns: [
      { data: "idtematica" },
      { data: "tematica" },
      { data: "imagen" },
      { data: "accion" },
    ],
    language,
    dom,
    buttons,
  });
  //levantar modal registro nuevo usuario
  nuevo.addEventListener("click", function () {
    document.querySelector('#idtematica').value = '';
    document.querySelector('#imagen').value = '';
    document.querySelector('#imagen_actual').value = '';
    tittleModal.textContent = "AGREGA TEMATICA";
    btnAccion.textContent = 'Registrar';
    frm.reset();
    myModal.show();
  });

  //registrar alumnos
  frm.addEventListener("submit", function (e) {
    e.preventDefault();
    let data = new FormData(this);
    const url = base_url + "tematicas/registrar";
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(data);
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText);
        const res = JSON.parse(this.responseText);
        if (res.icono == "success") {
          myModal.hide();
          tblTematicas.ajax.reload();
          document.querySelector('#imagen').value = '';
        }
        swal.fire("aviso?", res.msg.toUpperCase(), res.icono);
      }
    };
  });
});

function eliminarTe($idTe) {
  Swal.fire({
    title: "Estas seguro?",
    text: "Se eliminara la tematica!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, Eliminar!",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "tematicas/delete/" + $idTe;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          console.log(this.responseText);
          const res = JSON.parse(this.responseText);
          if (res.icono == "success") {
            tblTematicas.ajax.reload();
          }
          swal.fire("aviso?", res.msg.toUpperCase(), res.icono);
        }
      };
    }
  });
}

function editTe($idTe) {
  const url = base_url + "tematicas/edit/" + $idTe;
  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
      const res = JSON.parse(this.responseText);
      document.querySelector('#idtematica').value = res.idtematica;
      document.querySelector('#tematica').value = res.tematica;
      document.querySelector('#imagen_actual').value = res.imagen;
      tittleModal.textContent = "MODIFICAR TEMATICA";
      btnAccion.textContent = 'Actualizar';
      myModal.show();
    }
  };
}
