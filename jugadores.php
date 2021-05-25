<?php

session_start();
$equipo = $_SESSION['nombre_equipo'];
$rol = $_SESSION['rol'];

if ($rol == 'Jugador'){
    
} elseif ($rol == 'Entrenador'){
   
} elseif ($rol == 'Gestor'){
  header('location:jugadores_gestor.php');
} else {
  header('location:problema.php');
}

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

<img id="escudo" src="img/<?php echo $equipo;?>.JPG" style="height: 100px; widht: 100px; margin-top: 10px;">

<br>
<div class="container">
  <h2>Tabla de jugadores</h2>
  <p>Tabla de los jugadores del equipo <?php echo $equipo;?></p>
<form action="grafica.php" method="post">
  <table class="table table-bordered table-hover table-condensed" id="tablaID">
    <thead class="thead-light">
        <tr>
            <th scope="col">Dorsal</th>
            <th scope="col">Nombre</th>
            <th scope="col">Posición</th>
        </tr>
    </thead>
        <tbody><?php 
           while ($fila= mysqli_fetch_array($resultado)){
            //$dorsal = $fila['dorsal'];
              echo '<tr>
              <td scope="row">'.$fila['dorsal'].'</td>
              <td scope="row" id="id'.$fila['dorsal'].'">'.$fila['nombre'].'</td>
              <td scope="row">'.$fila['posicion'].'</td>
              </tr>';}

              include ("conexion.php");
              $sql2="select dorsal from jugador where nombre='Gonzalo Navarro'";
              $resul= mysqli_query($conexion,$sql2);
              $conexion -> close();
              while ($fila2= mysqli_fetch_array($resul)){
              $_SESSION['dorsal'] = $fila2['dorsal'];
              }
            ?>
        </tbody>
    </table>
    <div class="form-group container-fluid center">
        <p id="resultado"></p>
        <button type="submit" name="submit" id="boton" class="btn btn-primary btn-lg">Mostrar gŕafica</button>
    </div>
</form>
</div>
<script type="text/javascript">
    
  var parrafo = document.getElementById("resultado");
  var filas = document.getElementsByTagName("td");
   for (i=0; i<filas.length; i++){
     filas[i].addEventListener("click", elegir);
   }

   function elegir(e){
     var dato = e.target.innerHTML;
     parrafo.textContent= "Has elegido el jugador: " + dato;
   }

  </script>
</body>
</html>