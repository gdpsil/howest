<?php
require_once("header.php");
require_once("../config/conexion.php");
require_once("../controller/ConsultasController.php");
$sentencia = new consultas();
$mostrardatos = $sentencia->select_cliente();
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!-- Latest compiled and minified CSS -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
   <!-- jQuery library -->
   <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
   <!-- Popper JS -->
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
   <!-- Latest compiled JavaScript -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

   <title>Admin. Clientes</title>
</head>
<body>
   <div class="container-fluid">
      <div class="table-responsive">
      <table class="table table-condensed table-striped" >
         <thead>
           <tr>
               <th>Id</th>
               <th>Cliente</th>
               <th>Nombre</th>
               <th>Domicilio</th>
               <th>Localidad</th>
               <th>Cod.Post.</th>
               <th>Pais</th>
               <th>Telefonos</th>
               <th>Contactos</th>
               <!-- <th>Comentarios</th> -->
               <th>Editar</th>
               <th>Eliminar</th>
            </tr>
         </thead>
         <tbody id="TablaClientes">
            <?php
            echo '<ul>';
            foreach ($mostrardatos as $row) {
               echo '<tr>';                  
                  echo '<td>'.$row['id'].'</td>';
                  echo '<td>'.$row['cliente'].'</td>';
                  echo '<td>'.$row['nombre'].'</td>';
                  echo '<td>'.$row['domicilio'].'</td>';
                  echo '<td>'.$row['localidad'].'</td>';
                  echo '<td>'.$row['codigopostal'].'</td>';
                  echo '<td>'.$row['pais'].'</td>';
                  echo '<td>'.$row['telefonos'].'</td>';
                  echo '<td>'.$row['contactos'].'</td>';
                  //echo '<td>'.$row['comentarios'].'</td>';
                  ?>
                  <td><button onclick="editar(<?php echo $row['id'] ?> )" type="button" class="btn btn-info">Editar</button></td>
                  <td><button onclick="eliminar(<?php echo $row['id'] ?> )" type="button" class="btn btn-danger">Eliminar</button></td>
                  <?php   
               echo '</tr>';
            }
            echo '</ul>';
            ?>
         </tbody>
      </table>
      </div>
   </div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type="text/javascript">

const latable = document.querySelector("#TablaClientes");
   latable.addEventListener("click", (e) =>{
         e.preventDefault();
         //alert("hicieron clicck");
         const datos = (document.getElementById("TablaClientes")); 
         var url = "../model/ejecutarconsultas.php";

         var formdata = new FormData();
            //formdata.append('tipo_operacion', 'mostrar');
            formdata.append('id', '0');
                     //method:'POST',body:formdata
         fetch(url,{    
            method:'POST',body:JSON.stringify(datos),headers:{
               'Content-Type':'applixarion/json'
            }
         } ).then(res=>res.text())
         .catch(error=>console.log('Error: ',error))
         .then(response=>console.log('Successsssss: '));
         //pintar_tabla_clientes();
         //formulariop.reset();
         
   })

   const error = (tipo_mensaje) => {
    mensajes.innerHTML +=`
    <div class="row">
        <div class="col-md-5 offset-md-3">
            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">Error!</h4>
                <P> *${tipo_mensaje}</P>
            </div>
        </div>

    </div>

    `;
   }

   const editar = (id) => {
      alert("Editando el id nro: "+id);
      var url = "../model/ejecutarconsultas.php";
      var formData = new FormData();
      formData.append('tipo_operacion','editar');
      formData.append('id',id);
      fetch(url,{
         method:'post',
         body:formData
      })
      .then(data => data.json())
      .then(data => {
         console.log('success', data);
         for(let item of data){
            var id        = item.id;
            var cliente   = item.cliente;
            var nombre    = item.nombre;
            var domicilio = item.domicilio;
            var localidad = item.localidad;
            var codpost   = item.codigopostal;
            var pais      = item.pais;
            var telefono  = item.telefono;
            var contacto  = item.contacto;
            var coment    = item.comentarios;
            var sexo      = item.sexo;
            if(sexo == 'Masculino'){
               var sex = `
               <select name="sexou" id="sexou" class="form-control">
                  <option value="Masculino" selected>Masculino</option>
                  <option value="Femenino">Femenino</option>
               </select>
               `;
            }else if(sexo == 'Femenino'){
               var sex = `
               <select name="sexou" id="sexou" class="form-control">
                  <option value="Masculino">Masculino</option>
                  <option value="Femenino" selected>Femenino</option>
               </select>
               `;
            }
         }   
         Swal.fire({
            title: 'Actualizar información',
            html: `
               <form id="update_form">
                  <input type="text" value="update" name="tipo_operacion" hidden="true">
                  <input type="number" value="${id}"   hidden="true" name="idu" class="form-control" placeholder="id de la persona">
                  <hr>
                  <input type="text" value="${nom}"   name="nombreu" class="form-control" placeholder="nombre">
                  <hr>
                  <input type="text" value="${ape}" name="apellidosu"  class="form-control" placeholder="apellidos">
                  <hr>
                  ${sex}
               </form>    
            `,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar'
         }).then((result) => {
            if (result.value) {
               const datos = document.querySelector("#update_form");
               const datos_actualizar = new FormData(datos);
               var url = "../model/ejecutarconsultas.php";
               fetch(url, {
                  method: 'post',
                  body: datos_actualizar
               })
               .then(data => data.json())
               .then(data =>{ 
                  console.log('Success:', data);
                  latable();
                  //pintar_tabla_resultados(data);
                  Swal.fire(
                     'Exito',
                     'Se actualizo con exito',
                     'success'
                  )  
               })
               .catch(function(error){
                  console.error('Error:', error)
               }); 
            }
         })   
   })
   .catch(function (error){
      console.error('error',error);
   }); 
   }

const pintar_tabla_clientes = (data) =>{
     let tab_datos = document.querySelector("#TablaClientes");
     tab_datos.innerHTML = "";
     for(let item of data){
         tab_datos.innerHTML +=`
         <tr>
         <td>${item.id}</td>
         <td>${item.nombre}</td>
         <td>${item.domicilio}</td>
         <td>${item.telefono}</td>
         <td class="text-center">
         <button class="btn btn-primary btn-sm" onclick="editar(${item.id})">Editar</button>
         <button class="btn btn-danger btn-sm" onclick="eliminar(${item.id})">eliminar</button>
         </td>
         </tr>
         `;
     }
}

const eliminar = (id) =>{
   Swal.fire({
    title: 'Estas seguro de eliminar el registro',
    text: "Ya no se podra recuperar el registro",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Aceptar'
    }).then((result) => {
        if (result.isConfirmed) {
            var url = "../model/ejecutarconsultas.php";
            var formdata = new FormData();
            formdata.append('tipo_operacion', 'eliminar');
            formdata.append('id', id);
            fetch(url, {
                method: 'post',
                body: formdata
            }).then(data => data.text())
            .then(data => {
               console.log('SeBoroo...')
               window.location.reload();
               //Swal.fire( 'Eliminado', 'El registro se elimino correctamente.','success' )
               //$resutl= pintar_tabla_clientes(data);
            })
            .catch(error => console.error('Error:', error));
           
        }
    })
}
</script>

</body>

</html>