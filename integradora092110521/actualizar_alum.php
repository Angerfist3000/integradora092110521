<?php
        //en esta parte realizamos nuestra actualizacion
        if(isset($_GET["data"])){
            $fila_db = unserialize($_GET["data"]);
        }
        else if(isset($_GET["matricula"])){
            $conexiondb = mysqli_connect("localhost","root","","escuela");//este es nuestro parametro para la conexion de la bd
            $query = "UPDATE alumno SET
                        matricula='{$_GET["matricula"]}', nombre='{$_GET["nombre"]}', apellido_p='{$_GET["paterno"]}', apellido_m='{$_GET["materno"]}', edad='{$_GET["edad"]}'
                        WHERE id_alumno='{$_GET["id"]}' ;";
            $respuesta =  mysqli_query($conexiondb,$query);
            // print_r($query);
            if ($respuesta)
                header("location:alumnos.php");
            else 
                echo "error al actualizar";
            exit();
        }
        else{
            echo "Ha ocurrido un error";
            exit;
        }
    
        
?>

<!-- en esta parte va el codigo html -->
<!DOCTYPE html>
<html>
    <head>
        <title>
            CONAPRENDE
          
        </title>
        <meta charset="utf-8">
        <!-- libtreria de bootstrap -->
        <link rel="stylesheet" href="css/bootstrap.min.css"> 
    </head>
    <body>
       
       <!--aqui debe ir la barra de navegación -->
       <?php
            include("barra_nav.php");
       ?>
        <!-- aqui empieza en conyenedor principal -->
       <section class="container m-5 bg-light ">

          <!--aqui se registra los alumnos-->
          <div class="row ">
               
               <div class="col-lg-8">
                   <h3 class="text-center text-muted">Actualizar Alumno</h3>
                   <!--formulario de registro-->
                   <form method="GET" action="?">
                        <input type="hidden" name="id" value="<?=$fila_db["id_alumno"]?>" >
                      <div class="row mb-3">
                           <label class="col-sm-2">Matricula</label>
                           <div class="col-sm-10">
                               <input type="text" name="matricula"  class="form-control" value="<?=$fila_db["matricula"]?>" required >
                           </div>
                      </div>
                      
                      <div class="row mb-3">
                           <label class="col-sm-2">Nombre</label>
                           <div class="col-sm-10">
                               <input type="text" name="nombre" class="form-control" value="<?=$fila_db["nombre"]?>" >
                           </div>
                       </div>
                       <div class="row mb-3">
                           <label class="col-sm-2">Apellido Paterno</label>
                           <div class="col-sm-10">
                               <input type="decimal" name="paterno" class="form-control" value="<?=$fila_db["apellido_p"]?>">
                           </div>
                       </div>
                       <div class="row mb-3">
                           <label class="col-sm-2">Apellido Materno</label>
                           <div class="col-sm-10">
                               <input type="text" name="materno" class="form-control" value="<?=$fila_db["apellido_m"]?>">
                           </div>
                       </div>
                       <div class="row mb-3">
                           <label class="col-sm-2">Edad</label>
                           <div class="col-sm-10">
                               <input type="text" name="edad" class="form-control" value="<?=$fila_db["edad"]?>">
                           </div>
                       </div>
                        <!-- boton de guardar -->
                       <button class="btn btn-success">Guardar</button>
                      
                   </form>
               </div>
               <!-- aqi va el imagen del contenedor -->
               <div class="col-lg-4">
                   <img src="img/actualizar.jpg" width="500px">
               </div>
               
            </div>

        </section>
        <!-- termina el contenedor principal -->

       <!-- aqui va el pie de pagina -->
       <footer class="text-muted p-5 bg-light">
           <div class="container">
          
             <p class="text-center">Derechos reservados 2022</p>
           </div>
         </footer>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

   </body>
</html>    