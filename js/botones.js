


//     tablausers = $("#tablausers").DataTable({
//       "columnDefs": [{
//         "targets": -1,
//         "data": null,
//         "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar'>Editar</button><button class='btn btn-danger btnBorrar'>Borrar</button></div></div>"
//       }],
  
//       "language": {
//         "lengthMenu": "Mostrar _MENU_ registros",
//         "zeroRecords": "No se encontraron resultados",
//         "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
//         "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
//         "infoFiltered": "(filtrado de un total de _MAX_ registros)",
//         "sSearch": "Buscar:",
//         "oPaginate": {
//           "sFirst": "Primero",
//           "sLast": "Último",
//           "sNext": "Siguiente",
//           "sPrevious": "Anterior"
//         },
//         "sProcessing": "Procesando...",
//       }
//     });
  
//     $("#btnNuevo").click(function () {
//       $("#formusers").trigger("reset");
//       $("#cedula").prop("disabled", false);
//       $(".modal-header").css("background-color", "#0000FF");
//       $(".modal-header").css("color", "white");
//       $(".modal-title").html("<b>Nuevo</b>");
//       $("#modalCRUD").modal("show");
//       id = null;
//       opcion = 1; //alta
//     });
  
//     var fila; //capturar la fila para editar o borrar el registro
  
//     //botón EDITAR
//     $(document).on("click", ".btnEditar", function () {
//       fila = $(this).closest("tr");
//       id = parseInt(fila.find('td:eq(0)').text());
//       name = fila.find('td:eq(1)').text();
//       name_work_id = fila.find('td:eq(2)').text();
//       name_work= fila.find('td:eq(3)').text();
//       entry_date = fila.find('td:eq(4)').text();
  
//       $("#id").val(cedula);
//       $("#name").val(name);
//       $("#name_work_id").val(name_work_id);
//       $("#name_work").val(name_work);
//       $("#entry_date").val(entry_date);
//       opcion = 2; //editar
  
//       $("#id").prop("disabled", true);
//       $(".modal-header").css("background-color", "#0000FF");
//       $(".modal-header").css("color", "white");
//       $(".modal-title").html("<b>Editar</b>");
//       $("#modalCRUD").modal("show");
  
//     });
  
//     // Evento click para abrir el modal Borrar
//     $(document).on("click", ".btnBorrar", function () {
//       fila = $(this);
//       id = parseInt($(this).closest("tr").find('td:eq(0)').text());
//       opcion = 3; //borrar
//       $(".modal-title").html("<b>Eliminar</b>");
//       $(".modal-header").css("background-color", "#0000FF");
//       $(".modal-header").css("color", "white");
//       $("#modalBorrar").modal("show");
//     });
  
//     // Manejar el evento de clic en el botón "Eliminar" del modal de eliminación
//     $(document).on("click", "#btnConfirmarEliminar", function () {
//       $.ajax({
//         url: "bd/crud.php",
//         type: "POST",
//         dataType: "json",
//         data: { opcion: opcion, id: id },
//         success: function () {
//           tablaPersonas.row(fila.parents("tr")).remove().draw();
//           $("#modalBorrar").modal("hide");
//           // Agregar Sweet Alert de "Registro eliminado exitosamente"
//           Swal.fire({
//             icon: "success",
//             title: "Registro eliminado exitosamente.",
//             confirmButtonColor: "#0000FF",
//             confirmButtonText: "OK",
//           });
//         }
//       });
//     });
  
//     // Manejar el envío del formulario
//     $(document).on("submit", "#formPersonas", function (e) {
//       e.preventDefault();
//       id = $.trim($("#id").val());
//       name = $.trim($("#name").val());
//       name_work_id= $.trim($("#name_work_id").val());
//       name_work = $.trim($("#name_work").val());
//       entry_date = $.trim($("#entry_date").val());
  
//       $.ajax({
//         url: "bd/crud.php",
//         type: "POST",
//         dataType: "json",
//         data: {
//           id: id,
//           name: name,
//           name_work_id:  name_work_id,
//           name_work: name_work,
//           entry_date: entry_date,
//           opcion: opcion
//         },
//         success: function (data) {
//           if (data.error) {
//             // La cédula ya existe, mostrar alert
//             $("#modalCRUD").modal("hide");
//             Swal.fire({
//               icon: 'error',
//               title: data.error,
//               confirmButtonColor: '#E13925',
//               confirmButtonText: 'OK'
//             });
//           } else {
//             id = data[0].id;
//             name = data[0].name;
//             name_work_id = data[0].name_work_id;
//             name_work = data[0].name_work;
//             entry_date = data[0].entry_date;
//             if (opcion == 1) {
//               tablaUsers.row.add([id, name, name_work_id, name_work, entry_date]).draw();
//               $("#modalCRUD").modal("hide");
//               // Agregar Sweet Alert de "Registro guardado exitosamente"
//               Swal.fire({
//                 icon: "success",
//                 title: "Registro guardado exitosamente.",
//                 confirmButtonColor: "#0000FF",
//                 confirmButtonText: "OK",
//               });
//             } else {
//               tablaUsers.row(fila).data([id, name, name_work_id, name_work, entry_date]).draw();
//               $("#modalCRUD").modal("hide");
//               // Agregar Sweet Alert de "Registro modificado exitosamente"
//               Swal.fire({
//                 icon: "success",
//                 title: "Registro modificado exitosamente.",
//                 confirmButtonColor: "#0000FF",
//                 confirmButtonText: "OK",
//               });
//             }
//           }
//         }
//       });
//     });
  
//     cedulaInput.addEventListener("input", function() {
//         if (this.value.length > 10) {
//             this.value = this.value.slice(0, 10);
//         }
//     });
  
//     telefonoInput.addEventListener("input", function() {
//         if (this.value.length > 10) {
//             this.value = this.value.slice(0, 10);
//         }
//     });
  
   
// });
// Función para guardar un nuevo registro






document.addEventListener('DOMContentLoaded', () => {
const botonGuardar = document.getElementById('boton-guardar');
  botonGuardar.addEventListener('click', guardarRegistro);

 function guardarRegistro() {
  // Obtener los valores de los campos del formulario
  console.log('lo que llega');
  var name = document.getElementById("name").value;
  // var work_center_id = document.getElementById("work_center_id").value;
  var name_work = document.getElementById("name_work").value;
  var entry_date = document.getElementById("entry_date").value;

  // Crear un objeto FormData para enviar los datos al servidor
  var formData = new FormData();
  formData.append("name", name);
  formData.append("work_center_id", work_center_id);
  formData.append("name_work", name_work);
  formData.append("entry_date", entry_date);
  
  // Enviar la solicitud AJAX al servidor
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "guardar.php", true);
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // Respuesta del servidor
      alert(xhr.responseText);
      // Actualizar la tabla si es necesario
      // ...
      // Cerrar el modal
      $("#modalFormulario").modal("hide");
    }
  };
  xhr.send(formData);
}
});

// function editarRegistro(){

// }
