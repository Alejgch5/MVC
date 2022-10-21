const tableLista = document.querySelector('#tableListaDeseo tbody');
document.addEventListener('DOMContentLoaded', function () {
    getListaDeseo()
    
    
});

function getListaDeseo() {
    const url = base_url + 'principal/listaCursos';
    const http = new XMLHttpRequest();
    http.open('POST', url, true );
    http.send(JSON.stringify(listaDeseo));
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200 ){
            const res = JSON.parse(this.responseText);
            let html = '';
            res.cursos.forEach(curso => {
                html += `<tr>
                    <td>
                    <img class="img-thumbnail rounded-circle" src="${curso.imagen}" alt="" width="150">
                    </td>
                    <td>${curso.nombre}</td>
                    <td><span class="badge bg-warning">${res.moneda + ' ' + curso.precio}</span></td>
                    <td><span class="badge bg-primary">${curso.cantidad}</span></td>
                    <td>
                    <button class="btn btn-danger btnEliminarDeseo" type="button" prod="${curso.idcurso}" ><i class="fas fa-trash" ></i></button>
                    <button class="btn btn-primary btnAddCart" type="button" prod="${curso.idcurso}"><i class="fas fa-cart-plus" ></i></button>
                    </td>
              </tr>`;

            });
            tableLista.innerHTML = html;
            btnEliminarDeseo();
            btnAgregarCurso();
            

        }
        
    }
    
}
function btnEliminarDeseo() {
    let listaEliminar = document.querySelectorAll('.btnEliminarDeseo');
    for (let i = 0; i < listaEliminar.length; i++) {
        listaEliminar[i].addEventListener('click', function () {
            let idcurso = listaEliminar[i].getAttribute('prod');
            eliminarListaDeseo(idcurso);

            
        })

    }
}
function eliminarListaDeseo(idcurso) {
    for (let i = 0; i < listaDeseo.length; i++){
        if (listaDeseo[i]['idcurso'] == idcurso){
            listaDeseo.splice(i, 1);
        }
    }
    localStorage.setItem('listaDeseo', JSON.stringify(listaDeseo));
    getListaDeseo();
    cantidadDeseo();
    Swal.fire(
        'Aviso?',
        'CURSO ELIMINADO DE LA LISTA DE DESEOS',
        'success'
    )
}

//agregar cursos a desde deseos
function btnAgregarCurso() {
    let listaAgregar = document.querySelectorAll('.btnAddCart');
    for (let i = 0; i < listaAgregar.length; i++) {
        listaAgregar[i].addEventListener('click', function () {
            let idcurso = listaAgregar[i].getAttribute('prod');
            agregarCarrito(idcurso, 1, true);

            
        })

    }
}
