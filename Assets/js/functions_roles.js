var tableRoles;

document.addEventListener('DOMContentLoaded', function () {
  tableRoles = $('#tabelRoles').dataTable({
    "aProcessing": true,
    "aServerSide": true,
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
    },
    "ajax": {
      "url": " " + base_url + "/Roles/getRoles",
      "dataSrc": ""
    },
    "columns": [
      {"data": "idrol"},
      {"data": "nombrerol"},
      {"data": "descripcion"},
      {"data": "status"},
      {"data": "options"}
    ],
    "responsive":true,
    "bDestroy": true,
    "iDisplayLenght": 10,
    "order":[[0,"asc"]]
  });

  //  Nuevo Rol
  var formRol = document.querySelector("#formRol");
  formRol.onsubmit = function(e){
    e.preventDefault();
    
    var strNombre = document.querySelector('#txtNombre').value;
    var strDescripcion = document.querySelector('#txtDescripcion').value;
    var intStatus = document.querySelector('#listStatus').value;
    // Si los campos son vacíos, entonces...
    if (strNombre == '' || strDescripcion  == '' || intStatus
     == '') {
      // Mensaje de error con SweetAlert2
      Swal.fire({
        icon: 'error',
        title: 'Atención',
        text: 'Todos los campos son obligatorios.',
        showConfirmButton: true,
        confirmButtonColor: '#009688',
        confirmButtonText: 'Revisar'
      });
      return false;
    }

    // Haremos otra validacón request
    // Con la línea 52, detectamos si estamos en un navegador google Chrome, u otro para validarlos
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url+'/Roles/setRol';
    var formData = new FormData(formRol);
    // Hacemos el envíos de datos por AJAX
    request.open("POST",ajaxUrl,true);
    request.send(formData);
    request.onreadystatechange = function(){
      // console.log(request);
      // Hacemos validación
      if (request.readyState == 4 && request.status == 200) {
        // console.log(request.responseText);
        // Pasamos la respuesta 
        var objData = JSON.parse(request.responseText);
        if (objData.status) {
          $('#modalFormRol').modal("hide");
          formRol.reset();
          Swal.fire({
            icon: 'success',
            title: 'Roles de usuario',
            text: objData.msg,
            showConfirmButton : true,
            confirmButtonColor: '#009688',
            confirmButtonText:  'Listo'
          });
          tableRoles.api().ajax.reload(function(){
            // fntEditRol();
            // fntDelRol();
            // ftnPermisos();
          })
        }else {
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: objData.msg,
            showConfirmButton : true,
            confirmButtonColor: '#DC3545',
            confirmButtonText:  'Revisar'
          });
        }
      }
    }
  }
});

$('#tabelRoles').DataTable();

function openModal() {
  $('#modalFormRol').modal('show');
}

// Quiere decir qye se va a cargar el evento 'load', cuando se cargue todo el documento y va a ejecutar la funcion "fntEditRol "
window.addEventListener('load', function(){
  fntEditRol();
}, false);

// Funcion de Actualizar
function fntEditRol(){
  var btnEditRol = document.querySelectorAll(".btnEditRol");
  btnEditRol.forEach(function(btnEditRol){
    btnEditRol.addEventListener('click', function(){

      document.querySelector()

      $('#modalFormRol').modal('show');

    })
  });
}