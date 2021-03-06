<?php

session_start();
$equipo = $_SESSION['nombre_equipo'];

include ("conexion.php");
$sql="select dorsal,nombre from jugador where nombre_equipo='$equipo'";
$resultado= mysqli_query($conexion,$sql);
$conexion -> close();

?>

<!DOCTYPE html>
<html>
<head>
  <title>Datavolley</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="web.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
<!--<script src="/home/gonzalo/web/php/web.js"></script>-->
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

<img id="escudo" src="img/<?php echo $equipo;?>.JPG" style="height: 100px; widht: 100px; margin-top: 10px;">

<div class="container">
  <h2>Partido</h2>
  <p>Página para recoger las estadísticas del partido</p>
<form action="" method="post">
    <table class="table table-bordered table-hover table-sm">
        <thead class="thead-light">
            <tr>
                <th scope="col">Dorsal</th>
                <th scope="col">Nombre</th>
            </tr>
        </thead>
        <tbody><?php
            while ($fila= mysqli_fetch_array($resultado)){
                echo '<tr>
                    <th scope="row">'.$fila['dorsal'].'</th>
                    <th scope="row">'.$fila['nombre'].'</th>
                </tr>';}
            ?>
        </tbody>
    </table>

<div id="caja"> </div>

    <p>Selecciona una acción</p>
    <div class="btn btn-group-toggle container-fluid">
        <label class="btn btn-warning">
            <input type="checkbox" name="acciones" value="saque" autocomplete="off">Saque
        </label>
        <label class="btn btn-warning" style="margin-top: 10px;">
            <input type="checkbox" name="acciones" value="recepcion" autocomplete="off">Recepcion
        </label>
        <label class="btn btn-warning" style="margin-top: 10px;">
            <input type="checkbox" name="acciones" value="colocacion" autocomplete="off">Colocacion
        </label>
        <label class="btn btn-warning" style="margin-top: 10px;">
            <input type="checkbox" name="acciones" value="ataque" autocomplete="off">Ataque
        </label>
        <label class="btn btn-warning" style="margin-top: 10px;">
            <input type="checkbox" name="acciones" value="bloqueo" autocomplete="off">Bloqueo
        </label>
        <label class="btn btn-warning" style="margin-top: 10px;">
            <input type="checkbox" name="acciones" value="defensa" autocomplete="off">Defensa
        </label>
<br>
    <div class="btn btn-group-toggle container-fluid">
        <label class="btn btn-dark" style="margin-top: 10px;">
            <input type="checkbox" name="estadistica" value="#" autocomplete="off">#
        </label>
        <label class="btn btn-dark" style="margin-top: 10px;">
            <input type="checkbox" name="estadistica" value="+" autocomplete="off">+
        </label>
        <label class="btn btn-dark" style="margin-top: 10px;">
            <input type="checkbox" name="estadistica" value="!" autocomplete="off">!
        </label>
        <label class="btn btn-dark" style="margin-top: 10px;">
            <input type="checkbox" name="estadistica" value="/" autocomplete="off">/
        </label>
        <label class="btn btn-dark" style="margin-top: 10px;">
            <input type="checkbox" name="estadistica" value="-" autocomplete="off">-
        </label>
        <label class="btn btn-dark" style="margin-top: 10px;">
            <input type="checkbox" name="estadistica" value="=" autocomplete="off">=
        </label>
    </div>
<br><br>
    <div class="form-group container-fluid center">
        <button type="submit" name="submit" class="btn btn-primary btn-lg" onclick="info()">Guardar</button>
    </div>
</form>

<script>
            
        function info() {
            texto = document.getElementById("caja")
            texto.innerHTML = "<h3>Ha elegido las siguientes opciones:</h3>"
            if (document.acciones.saque.checked == true) {
                saque = "<h4>" + document.acciones.saque.value; + "</h4>";
                }
            else { saque = "" }	
            if (document.acciones.recepcion.checked == true) {
                recepcion = "<h4>" + document.suscripcion.recepcion.value; + "</h4>";
                }
            else { recepcion = "" }	
            if (document.acciones.colocacion.checked == true) {
                colocacion = "<h4>" + document.acciones.colocacion.value; + "</h4>";
                }	
            else { colocacion = "" }	
            if (document.acciones.ataque.checked == true) {
                ataque = "<h4>" + document.acciones.ataque.value; + "</h4>";
                }
            else { ataque = "" }	
            if (document.acciones.bloqueo.checked == true) {
                bloqueo = "<h4>" + document.acciones.bloqueo.value; + "</h4>";
                }		 		
            else { bloqueo = "" }	
            texto.innerHTML += saque + recepcion + colocacion + ataque + bloqueo;
         }
    </script>
</div>
</body>
</html>