<!DOCTYPE html>
<?php

$conexion = mysqli_connect('mysql:3306', "admin", "voleibolmadrid", 'datavolley');
$sql="select nombre from equipo";
$resultado= mysqli_query($conexion,$sql);
$conexion -> close();

?>
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
  <h2>Tabla de equipos</h2>
  <p>Información de los equipos de la competición</p>

<table class="table table-bordered table-hover table-condensed">
    <thead class="thead-light">
        <tr>
            <th scope="col">Escudo</th>
            <th scope="col">Equipo</th>
        </tr>
    </thead>
        <tbody><?php 
            while ($fila= mysqli_fetch_array($resultado)){
                echo '<tr>
                <th scope="row" style="width: 200px;heigth: auto;"><img class="img-thumbnail" style="width: 100px;height: 100px;" src="img/'.$fila['nombre'].'.JPG"></th>
                <th scope="row">'.$fila['nombre'].'</th>
            </tr>';}
            ?>
        </tbody>
    </table>

</div>
</body>
</html>