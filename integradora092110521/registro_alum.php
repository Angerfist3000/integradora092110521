<?php

        if(isset($_GET["matricula"])){
            $conexiondb = mysqli_connect("localhost","root","","escuela");//parametro para conexion ala BD
            //en esta variable se almacenara los datos insertados en el formulario
            $query = "INSERT INTO `escuela`.`alumno` (`matricula`, `nombre`, `apellido_p`, `apellido_m`, `edad`) 
                    VALUES ('{$_GET["matricula"]}', '{$_GET["nombre"]}', '{$_GET["paterno"]}', '{$_GET["materno"]}', '{$_GET["edad"]}');";
            //esta variable almacena los valores de las dos variables antreriores        
            $respuesta =  mysqli_query($conexiondb,$query);
            //esta condicion valida el valor de la variable $respuesta 
            if ($respuesta)
                echo "insertado";
            else
                //si no se cumple nos manda un mensaje de error 
                echo "error al insertar";
            exit();
        }
        
        
?>


<!DOCTYPE html>
<html>
    <head>
        <!-- titulo de la pagina -->
        <title>
            CONAPRENDE
          
        </title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
    <body>
       
       <!--aqui debe ir la barra de navegación -->
       <?php
            include("barra_nav.php");
       ?>

       <section class="container m-5 ">

          <!--registro de alumnos-->
          <div class="row  bg-light">
               
               <div class="col-md-8 ">
                   <h3 class="text-center text-muted">Registrar Alumnos</h3>
                   <!--formulario de registro-->
                   <form method="GET" action="?">
                      <div class="row mb-3">
                           <label class="col-sm-2">Matricula</label>
                           <div class="col-sm-10">
                               <input type="text" name="matricula"  class="form-control" required >
                           </div>
                      </div>
                      
                      <div class="row mb-3">
                           <label class="col-sm-2">Nombre</label>
                           <div class="col-sm-10">
                               <input type="text" name="nombre" class="form-control" >
                           </div>
                       </div>
                       <div class="row mb-3">
                           <label class="col-sm-2">Apellido Paterno</label>
                           <div class="col-sm-10">
                               <input type="decimal" name="paterno" class="form-control" >
                           </div>
                       </div>
                       <div class="row mb-3">
                           <label class="col-sm-2">Apellido Materno</label>
                           <div class="col-sm-10">
                               <input type="text" name="materno" class="form-control" >
                           </div>
                       </div>
                       <div class="row mb-3">
                           <label class="col-sm-2">Edad</label>
                           <div class="col-sm-10">
                               <input type="text" name="edad" class="form-control" >
                           </div>
                       </div>

                       <button class="btn btn-success">Registrar</button>
                      
                   </form>
               </div>
               <div class="col-lg-4">
                   <img src="img/librocabecera.jpg" width="500px" >
               </div>
               
           </div>




       </section>
       <footer class="text-muted p-5 bg-light">
           <div class="container">
          
             <p class="text-center">Derechos reservados 2022</p>
           </div>
         </footer>
         <!-- libreria de javascript -->
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

   </body>
</html>    