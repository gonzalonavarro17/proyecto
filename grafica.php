<?php
session_start();
$dorsal = $_SESSION['dorsal'];

include ("conexion.php");
$sql="select * from asignacion where dorsal='$dorsal'";
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
  <script src="https://code.highcharts.com/highcharts.src.js"></script>
  <script type="text/javascript">
    $(function(){
      $('#grafico').highcharts({
        chart: {type: 'area'},
        title: {text: 'Saques'},
        xAxis: {categories: ['#', '+', '!', '/', '-', '=']},
        yAxis: {title: {text: 'Saques realizados'}},
        series: [
          {name: 'Gonzalo Navarro', data:[1,3,1,0,2,1]},
        ]
      });

      $('#grafico2').highcharts({
        chart: {type: 'spline'},
        title: {text: 'Recepción'},
        xAxis: {categories: ['Saque #', 'Saque +', 'Saque !', 'Saque /', 'Saque -', 'Saque =']},
        yAxis: {title: {text: 'Saques realizados'}},
        series: [
          {name: 'Gonzalo Navarro', data:[1,3,1,0,2,1]},
        ]
      });

      $('#grafico3').highcharts({
        chart: {type: 'column'},
        title: {text: 'Colocación'},
        xAxis: {categories: ['Saque #', 'Saque +', 'Saque !', 'Saque /', 'Saque -', 'Saque =']},
        yAxis: {title: {text: 'Saques realizados'}},
        series: [
          {name: 'Gonzalo Navarro', data:[1,3,1,0,2,1]},
        ]
      });

      $('#grafico4').highcharts({
        chart: {type: 'bar'},
        title: {text: 'Ataque'},
        xAxis: {categories: ['Saque #', 'Saque +', 'Saque !', 'Saque /', 'Saque -', 'Saque =']},
        yAxis: {title: {text: 'Saques realizados'}},
        series: [
          {name: 'Gonzalo Navarro', data:[1,3,1,0,2,1]},
        ]
      });

      $('#grafico5').highcharts({
        chart: {type: 'area'},
        title: {text: 'Bloqueo'},
        xAxis: {categories: ['Saque #', 'Saque +', 'Saque !', 'Saque /', 'Saque -', 'Saque =']},
        yAxis: {title: {text: 'Saques realizados'}},
        series: [
          {name: 'Gonzalo Navarro', data:[1,3,1,0,2,1]},
        ]
      });

      $('#grafico6').highcharts({
        chart: {type: 'area'},
        title: {text: 'Defensa'},
        xAxis: {categories: ['Saque #', 'Saque +', 'Saque !', 'Saque /', 'Saque -', 'Saque =']},
        yAxis: {title: {text: 'Saques realizados'}},
        series: [
          {name: 'Gonzalo Navarro', data:[1,3,1,0,2,1]},
        ]
      });
    });
  </script>
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

<p>Tu dorsal es: <?php echo $dorsal; ?></p>

<section>
  <div id="grafico" style="width: 80%; height: 300px;"></div>
  <div id="grafico2" style="width: 80%; height: 300px;"></div>
  <div id="grafico3" style="width: 80%; height: 300px;"></div>
  <div id="grafico4" style="width: 80%; height: 300px;"></div>
  <div id="grafico5" style="width: 80%; height: 300px;"></div>
  <div id="grafico6" style="width: 80%; height: 300px;"></div>
</section>


</body>
</html>