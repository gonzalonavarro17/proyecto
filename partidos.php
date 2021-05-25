<?php

session_start();
$rol = $_SESSION['rol'];
if ($rol == 'Entrenador'){

} elseif ($rol == 'Jugador'){
  header('location:partidos_jugadores.php');
} elseif ($rol == 'Gestor'){
  header('location:partidos_gestor.php');
} else {
  header('location:problema.php');
}


include ("conexion.php");
$sql="select cod_partido,nombre_equipo,fecha from participa p, partido t where p.cod_partido=t.cod";
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
  <h2>Tabla de partidos</h2>
  <p>Información de los partidos de la competición</p>

  <table class="table table-bordered table-hover table-condensed">
          <thead class="thead-light">
            <tr>
              <th scope="col">Código</th>
              <th scope="col">Equipo</th>
              <th scope="col">Fecha</th>
            </tr>
        </thead>
        <tbody><?php while ($fila = mysqli_fetch_array($resultado)){ //añadir otro fetch dentro del while
          $fila2 = mysqli_fetch_array($resultado);
          echo '<tr>
            <th scope="row"><a href="estadistica.php">'.$fila['cod_partido'].'</a></th>
            <td><a href="estadistica.php">'.$fila['nombre_equipo'].' - '.$fila2['nombre_equipo'].'</a></td> 
            <td>'.$fila['fecha'].'</td>
          </tr>';
          }
          ?>
    </tbody>
</table>
</div>
</body>
</html>