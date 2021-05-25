<?php

session_start();
$equipo = $_SESSION['nombre_equipo'];
$rol = $_SESSION['rol'];

include ("conexion.php");
$sql="select * from jugador where nombre_equipo='$equipo'";
$resultado= mysqli_query($conexion,$sql);
$conexion -> close();

?>

<!DOCTYPE html>
<html>
<head>
  <title>Datavolley</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="STYLESHEET" href="web.css" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-sm navbar-light">
  <a class="navbar-brand" href="index.php"><img src="img/logodv.png" class="icono"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="partidos.php">Partidos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="jugadores.php">Jugadores</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="clasificacion.php">Clasificación</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="equipos.php">Equipos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="salir.php">Cerrar</a>
        </li>
    </ul>
  </div>  
</nav>
<br>
<div class="container">
  <fieldset>
    <legend style="text-align: left;">Añadir nuevo jugador</legend>
        <form action="crear_jugador.php" method="POST">
                    <label for="dorsal"><b>Dorsal</b></label><br>
                    <input type="numer" placeholder="Dorsal del jugador/a" name="dorsal" required>
                        <br>
                    <label for="equipo"><b>Equipo</b></label><br>
                    <div>
                        <?php
                        
                            include ("conexion.php");
                            $consulta="select nombre from equipo";
                            $resultado= mysqli_query($conexion,$consulta);
                            $conexion -> close();
                            echo "<select name='equipo1'>";
                                echo "<option selected>Equipo local</option>";
                                    for ($i=0;$i<$resultado->num_rows;$i++){
                                        $linea = $resultado->fetch_assoc();
                                        echo "<option>".$linea["nombre"]."</option>";
                                    }
                        ?>
                    </div>
                    <br>
                    <label for="name"><b>Nombre:</b></label><br>
                    <input type="text" placeholder="Nombre del jugador/a" name="name" required>
                        <br>
                    <label for="posicion"><b>Posición:</b></label><br>
                    <input type="text" placeholder="Posición de juego" name="posicion" required>
                        <br>
                        <br>
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary">Añadir jugador</button>
                    </div>
        </form>
</fieldset> 
</div>
</body>
</html>
