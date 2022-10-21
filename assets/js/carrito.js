const btnAddDeseo = document.querySelectorAll('.btnAddDeseo');
const btnAddCarrito = document.querySelectorAll('.btnAddCarrito');
const btnDeseo = document.querySelector('#btnCantidadDeseo');
const btnCarrito = document.querySelector('#btnCantidadCarrito');
const verCarrito = document.querySelector('#verCarrito');
const tableListaCarrito = document.querySelector('#tableListaCarrito tbody');
//ver carrito
var myModal = new bootstrap.Modal(document.getElementById('myModal'))

let listaDeseo, listaCarrito;
document.addEventListener('DOMContentLoaded', function () {
    if (localStorage.getItem('listaDeseo') != null ) {
        listaDeseo = JSON.parse(localStorage.getItem('listaDeseo'));
    } 
    if (localStorage.getItem('listaCarrito') != null ) {
        listaCarrito = JSON.parse(localStorage.getItem('listaCarrito'));
    } 
   
    for (let i = 0; i < btnAddDeseo.length; i++) {
        btnAddDeseo[i].addEventListener('click', function () {
            let idcurso = btnAddDeseo[i].getAttribute('prod');
            agregarDeseo(idcurso);
            
        });
        
    }
    for (let i = 0; i < btnAddCarrito.length; i++){
        btnAddCarrito[i].addEventListener('click', function () {
            let idcurso = btnAddCarrito[i].getAttribute('prod');
            agregarCarrito(idcurso, 1);
            
        });
    }
     
    cantidadDeseo();
    cantidadCarrito();

    
    verCarrito.addEventListener('click', function () {
        getListaCarrito();
        myModal.show();
    })

});
    //agregar cursos a la lista de deseos
        function agregarDeseo(idcurso) {
        if (localStorage.getItem('listaDeseo') == null ) {
            listaDeseo = [];
        } else {
            let listaExiste = JSON.parse(localStorage.getItem('listaDeseo'));
            for (let i = 0; i < listaExiste.length; i++) {
                if (listaExiste[i]['idcurso'] == idcurso) {
                    Swal.fire(
                        'Aviso?',
                        'EL PRODDUCTO YA ESTA EN LA LISTA DESEO ',
                        'warning'
                    )
                    return;
                }
                
            }
            listaDeseo.concat(localStorage.getItem('listaDeseo'));
        }
        listaDeseo.push({
            "idcurso" : idcurso,
            "cantidad" : 1
        })

        localStorage.setItem('listaDeseo', JSON.stringify(listaDeseo));
        Swal.fire(
            'Aviso?',
            'CURSO AGREGADO A LA LISTAS DE DESEO',
            'success'
        )
        cantidadDeseo();
    }

    function cantidadDeseo() {
        let listas = JSON.parse(localStorage.getItem('listaDeseo'));
        if (listas != null) {
            btnDeseo.textContent = listas.length;
            
        } else {
            btnDeseo.textContent = 0;
        }
        
        
        
    }

    //agregar cursos al carrito
    function agregarCarrito(idcurso, cantidad, accion = false) {
        if (localStorage.getItem('listaCarrito') == null ) {
            listaCarrito = [];
        } else {
            let listaExiste = JSON.parse(localStorage.getItem('listaCarrito'));
            for (let i = 0; i < listaExiste.length; i++) {
                if (accion){
                    eliminarListaDeseo(idcurso);
                }
                if (listaExiste[i]['idcurso'] == idcurso) {
                    Swal.fire(
                        'Aviso?',
                        'EL PRODDUCTO YA ESTA AGREGADO ',
                        'warning'
                    )
                    return;
                }
                
            }
            listaCarrito.concat(localStorage.getItem('listaCarrito'));
        }
        listaCarrito.push({
            "idcurso" : idcurso,
            "cantidad" : cantidad
        })

        localStorage.setItem('listaCarrito', JSON.stringify(listaCarrito));
        Swal.fire(
            'Aviso?',
            'CURSO AGREGADO AL CARRITO',
            'success'
        )
        cantidadCarrito();
    }

    function cantidadCarrito() {
        let listas = JSON.parse(localStorage.getItem('listaCarrito'));
        if (listas != null) {
            btnCarrito.textContent = listas.length;
            
        } else {
            btnCarrito.textContent = 0;
        }
        
        
        
    }

    //ver cursos en el carrito

    function getListaCarrito() {
        const url = base_url + 'principal/listaCursos';
        const http = new XMLHttpRequest();
        http.open('POST', url, true );
        http.send(JSON.stringify(listaCarrito));
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
                        <td>${curso.subTotal}</td>
                        <td>
                        <button class="btn btn-danger btnDeleteCart" type="button" prod="${curso.idcurso}"><i class="fas fa-times-circle"></i></button>
                        </td>
                  </tr>`;
    
                });
                tableListaCarrito.innerHTML = html;
                document.querySelector('#totalGeneral').textContent = res.total;
                btnEliminarCarrito();
                
    
            }
            
        }
        
    }
    function btnEliminarCarrito() {
        let listaEliminar = document.querySelectorAll('.btnDeleteCart');
        for (let i = 0; i < listaEliminar.length; i++) {
            listaEliminar[i].addEventListener('click', function () {
                let idcurso = listaEliminar[i].getAttribute('prod');
                eliminarListaCarrito(idcurso);
    
                
            })
    
        }
    }
    function eliminarListaCarrito(idcurso) {
        for (let i = 0; i < listaCarrito.length; i++){
            if (listaCarrito[i]['idcurso'] == idcurso){
                listaCarrito.splice(i, 1);
            }
        }
        localStorage.setItem('listaCarrito', JSON.stringify(listaCarrito));
        getListaCarrito();
        cantidadCarrito();
        Swal.fire(
            'Aviso?',
            'CURSO ELIMINADO DE LA LISTA DEL CARRITO',
            'success'
        )
    }
