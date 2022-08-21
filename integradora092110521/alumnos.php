<?php

$dataAlumos = [];

//esta es una funcion para mostrar los datos que tengamos registrado
$conexiondb = mysqli_connect("localhost", "root", "", "escuela");//parametro que sirve para la conexion a la BD
$query = "SELECT * FROM alumno";//consulta
$resultado =  mysqli_query($conexiondb, $query);
$dataAlumos = [];
if (mysqli_num_rows($resultado) > 0) {
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $dataAlumos[] = $fila;
    }
}
//sirve para buscar los datos de la tabla 
if (isset($_GET["buscar"]) && $_GET["buscar"] != "") {
    $dataAlumos = [];
    $conexiondb = mysqli_connect("localhost", "root", "", "escuela");
    $query = "SELECT * FROM alumno WHERE nombre='" . $_GET["buscar"] . "';";
    $resultado =  mysqli_query($conexiondb, $query);

    if (mysqli_num_rows($resultado) > 0) {
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $dataAlumos[] = $fila;
        }
    }
}
//sirve para eliminar um dato de la tabla alumnos
if (isset($_GET["eliminar"])) {
    $conexiondb = mysqli_connect("localhost", "root", "", "escuela");
    $query = "DELETE FROM alumno WHERE alumno.id_alumno=" . $_GET["id"];
    $resultado =  mysqli_query($conexiondb, $query);
    header("location:?");
}

?>

<!--Aquí vamos a pegar todo el codigo HTML -->
<!DOCTYPE html>
<html>

<head>
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


    <!-- inicia nuestro contenedor principal -->
    <section class="container m-5 bg-light">

        <!--AQUI SE REGISTRARA LOS ALUMNOS-->
        <div class="row">

            <div class="col-lg-8">
                <h3 class="text-center text-muted">Listado de alumnos</h3>

                <!-- BUSCADOR-->
                <form method="GET" action="?" class="m-4">
                    <input class="form-control" type="search" name="buscar" placeholder="Busqueda por nombre">
                </form>

                <!--TABLA DE ALUMNOS REGISTRADOS-->
                <table class="table table-primary table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Matricula</td>
                            <th scope="col">Nombre</td>
                            <th scope="col">Apellido Paterno</td>
                            <th scope="col">Apellido Materno</td>
                            <th scope="col">Edad</td>
                            <th scope="col">Opcion</td>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <!-- iniciamos un codigo php -->
                        <?php
                        //esta funcion muestra los datos que tenemos de nuestros registros
                        foreach ($dataAlumos as $key => $fila_bd) // recorre todos los elementos de un array
                        {
                            echo "<tr>";
                            echo "<td>" . $fila_bd['matricula'] . "</td>";
                            echo "<td>" . $fila_bd['nombre'] . "</td>";
                            echo "<td>" . $fila_bd['apellido_p'] . "</td>";
                            echo "<td>" . $fila_bd['apellido_m'] . "</td>";
                            echo "<td>" . $fila_bd['edad'] . "</td>";
                            echo "<td>";
                            echo "<a class='btn btn-danger' href='?eliminar&id=" . $fila_bd['id_alumno'] . "'>Eliminar</a> | ";
                            echo "<a class='btn btn-success' href='actualizar_alum.php?data=" . serialize($fila_bd) . "'>Modificar</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        ?>
                        <!-- termina nuestro codigo php -->
                    
                    </tbody>
                </table>
                <!-- termina tabla -->


            </div>
            <!-- aqui va la imagen del contenedor -->
            <div class="col-lg-4">
                <img src="img/logo3.png" width="400px">
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