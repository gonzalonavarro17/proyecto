<?php

session_start();
$rol = $_SESSION['rol'];

include ("conexion.php");
$sql="select cod_partido,nombre_equipo,fecha from participa p,partido t where p.cod_partido=t.cod";
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
  <br>
  <table class="table table-bordered table-hover table-condensed">
          <thead class="thead-light">
            <tr>
              <th scope="col">Código</th>
              <th scope="col">Equipo</th>
              <th scope="col">Fecha</th>
            </tr>
        </thead>
        <tbody><?php while ($fila= mysqli_fetch_array($resultado)){
          echo '<tr>
            <th scope="row"><a href="resultado.php">'.$fila['cod_partido'].'</a></th>
            <td><a href="resultado.php">'.$fila['nombre_equipo'].'</a></td>
            <td>'.$fila['fecha'].'</td>
          </tr>';}
          ?>
    </tbody>
</table>

<fieldset>
    <legend style="text-align: left;">Añadir nuevo partido</legend>
        <form action="crear_partido.php" method="POST">
                    <label for="cod"><b>Código</b></label><br>
                    <input type="text" placeholder="Código partido" name="cod" required>
                        <br>
                    <label for="equipo"><b>Equipos</b></label><br>
                    
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

                        echo "<br></select>";
                        echo "<select name='equipo2 '>";
                            echo "<option selected>Equipo visitante</option>";
                                for ($i=0;$i<$resultado->num_rows;$i++){
                                    $linea = $resultado->fetch_array(); //cambiar fetch para que vuelva al primer valor ya que
                                    echo "<option>".$linea["nombre"]."</option>"; // en el de arriba se queda en el último
                            }
                        echo "</select>";
                    ?>

                    <br>
                    <br>
                    <label for="start"><b>Fecha</b></label><br>
                    <input type="date" id="start" name="trip-start"
                        value="2021-01-01"
                        min="2021-01-01" max="2021-06-30">

                        <br>
                        <br>
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary">Añadir</button>
                    </div>
        </form>
</fieldset> 


</div>
</body>
</html>