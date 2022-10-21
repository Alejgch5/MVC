const frm = document.querySelector("#frmRegistro");
const btnAccion = document.querySelector("#btnAccion");
let tblCursos;

var firstTabEl = document.querySelector('#myTab li:last-child a')
var firstTab = new bootstrap.Tab(firstTabEl)

document.addEventListener("DOMContentLoaded", function () {
  tblCursos = $("#tblCursos").DataTable({
    ajax: {
      url: "cursos/listar",
      dataSrc: "",
    },
    columns: [
      { data: "idcurso" },
      { data: "nombre" },
      { data: "descripcion" },
      { data: "precio" },
      { data: "video" },
      { data: "imagen" },
      { data: "accion" },
    ],
    language,
    dom,
    buttons,
  });

  //registrar alumnos
  frm.addEventListener("submit", function (e) {
    e.preventDefault();
    let data = new FormData(this);
    const url = base_url + "cursos/registrar";
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(data);
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText);
        const res = JSON.parse(this.responseText);
        if (res.icono == "success") {
          frm.reset();
          tblCursos.ajax.reload();
          document.querySelector("#imagen").value = "";
        }
        swal.fire("aviso?", res.msg.toUpperCase(), res.icono);
      }
    };
  });
});

function eliminarCur($idCur) {
  Swal.fire({
    title: "Estas seguro?",
    text: "Se eliminara el curso!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, Eliminar!",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "cursos/delete/" + $idCur;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          console.log(this.responseText);
          const res = JSON.parse(this.responseText);
          if (res.icono == "success") {
            tblCursos.ajax.reload();
          }
          swal.fire("aviso?", res.msg.toUpperCase(), res.icono);
        }
      };
    }
  });
}

function editCur($idCur) {
  const url = base_url + "cursos/edit/" + $idCur;
  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
      const res = JSON.parse(this.responseText);
      document.querySelector("#idcurso").value = res.idcurso;
      document.querySelector("#nombre").value = res.nombre;
      document.querySelector("#descripcion").value = res.descripcion;
      document.querySelector("#precio").value = res.precio;
      document.querySelector("#video").value = res.video;
      document.querySelector("#tematica").value = res.idtematica;
      document.querySelector("#imagen_actual").value = res.imagen;
      btnAccion.textContent = "Actualizar";
      firstTab.show();
    }
  };
}
