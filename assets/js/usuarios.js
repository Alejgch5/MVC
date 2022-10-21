const tableLista = document.querySelector('#tableListaCursos tbody');
const tblPendientes = document.querySelector('#tblPendientes');
document.addEventListener('DOMContentLoaded', function () {
    if (tableLista){
       getListaCursos();
    }
    $('#tblPendientes').DataTable( {
          ajax: {
            url: 'usuarios/listarPendientes',
            dataSrc: '',
        },
          columns: [
              { data: 'id_transaccion' },
              { data: 'monto' },
              { data: 'fecha' },
              { data: 'accion' }
        ],
        language,
        dom,
        buttons
     });

    
      
    
});


function getListaCursos() {
    let html = '';
    const url = base_url + 'principal/listaCursos';
    const http = new XMLHttpRequest();
    http.open('POST', url, true );
    http.send(JSON.stringify(listaCarrito));
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200 ){
            //console.log(this,this.responseText);
            const res = JSON.parse(this.responseText);
            if (res.totalPaypal > 0){
              res.cursos.forEach(curso => {
                html += `<tr>
                    <td>
                    <img class="img-thumbnail rounded-circle" src="${curso.imagen}" alt="" width="150">
                    </td>
                    <td>${curso.nombre}</td>
                    <td><span class="badge bg-warning">${res.moneda + ' ' + curso.precio}</span></td>
                    <td><span class="badge bg-primary">${curso.cantidad}</span></td>
                    <td>${curso.subTotal}</td>
                    
              </tr>`;

            });
            tableLista.innerHTML = html;
            document.querySelector('#totalCursos').textContent = 'TOTAL A PAGAR:' + res.moneda + ' ' + res.total;
            botonPaypal(res.totalPaypal);
          } else {
            tableLista.innerHTML = `
            <tr>
               <td colspan="5" class="text-center">CARRITO VACIO</td>
            </tr>`;
          }
     

        }
        
    }
    
}

function botonPaypal(total) {
    paypal.Buttons({
        // Sets up the transaction when a payment button is clicked
        createOrder: (data, actions) => {
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: total // Can also reference a variable or function
              }
            }]
          });
        },
        // Finalize the transaction after payer approval
        onApprove: (data, actions) => {
          return actions.order.capture().then(function(orderData) {
             registrarPedido(orderData)
          });
        }
      }).render('#paypal-button-container');
    
}
function registrarPedido(datos) {
    const url = base_url + 'usuarios/registrarPedido';
    const http = new XMLHttpRequest();
    http.open('POST', url, true );
    http.send(JSON.stringify({
      pedidos: datos,
      cursos: listaCarrito
    }));
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200 ){
            //console.log(this.responseText);
            const res = JSON.parse(this.responseText);
            Swal.fire(
              'Aviso?',
              res.msg,
              res.icono
          );
            if (res.icono == 'success') {
              localStorage.removeItem('listaCarrito');
              setTimeout(() => {
                window.location.reload();
              }, 2000);
            }
            
            

        }
        
    }
}

function verPedido(idPedido) {
  var mPedido = new bootstrap.Modal(document.getElementById('modalPedido'));
  const url = base_url + 'usuarios/verPedido/' + idPedido ;
        const http = new XMLHttpRequest();
        http.open('GET', url, true );
        http.send();
        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200 ){
                const res = JSON.parse(this.responseText);
                let html = '';
                res.cursos.forEach(row => {
                    html += `<tr>
                        <td>${row.curso}</td>
                        <td><span class="badge bg-warning">${res.moneda + ' ' + row.precio}</span></td>
                  </tr>`;
    
                });
                document.querySelector('#tablePedidos tbody').innerHTML = html;
                mPedido.show();
       
            }
            
        }
 
}

