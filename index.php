<?php
  //si login esta vacio que no entre
  session_start();
  $usuario = $_SESSION['username'];

  include ("conexion.php");
  $consulta="select * from usuario where usuario='$usuario'";
  $resultado=$conexion->query($consulta);
  while ($row = $resultado->fetch_assoc()) {
?>

<!DOCTYPE html>
<html>
<head>
  <title>Datavolley</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="web.css">
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
            <a class="nav-link" href="salir.php">Salir</a>
        </li>
    </ul>
  </div>  
</nav>
<div class="jumbotron text-center" style="margin-bottom:0">
  <h1 class="text-dark">¡Bienvenido a Datavolley, <?php echo $usuario; ?>!</h1>
  <p>Página dedicada al voleibol y sus estadísticas</p
</div>

<br>

<p style="text-align: left;">Tú equipo es:
  <?php echo $row['nombre_equipo'];
  $equipo = $row['nombre_equipo'];
  $_SESSION['nombre_equipo']= $equipo;?></p>
<p style="text-align: left;">Tú rol es: 
  <?php echo $row['rol'];
  $rol = $row['rol'];
  $_SESSION['rol']= $rol; }?></p>

<div class="container">
    <div class="row">
      <div class="col-sm-6">
        <h3><a href="partidos.php">Partidos</a></h3>
        <p>Consulta los partidos de la competición</p>
      </div>
      <div class="col-sm-6">
        <h3><a href="jugadores.php">Jugadores</a></h3>
        <p>Consulta la plantilla de tu equipo</p>
      </div>
      <div class="col-sm-6">
        <h3><a href="equipos.php">Equipos</a></h3>        
        <p>Consulta todos los equipos de la competición</p>
      </div>
      <div class="col-sm-6">
        <h3><a href="clasificacion.php">Clasificación</a></h3>        
        <p>Aquí puedes ver la clasificación por puntos de la liga</p>
      </div>
    </div>
  </div>

<div class="jumbotron text-center" style="margin-bottom:0">
  <p>DATAVOLLEY</p>
</div>

</body>
</html>
