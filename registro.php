<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registro</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="web.css">
</head>
<body class="m-0 row justify-content-center align-items-center">
    <div class="container">
        <img src="img/logodv.png">
    </div>
    <div class="col-auto">
        <fieldset style="border:6px groove">
            <legend style="text-align: center;">Registro Datavolley</legend>
                <form action="email.php" method="POST">
                    <label for="name"><b>USUARIO</b></label><br>
                    <input type="text" placeholder="Username" name="name" required>
                            <br>
                    <label for="psw"><b>PASSWORD</b></label><br>
                    <input type="password" placeholder="Password" name="psw" required>
                    <br>
                    <label for="team"><b>EQUIPO</b></label><br>
                    <?php
                    
                        include ("conexion.php");
                        $sql="select nombre from equipo";
                        $resultado= mysqli_query($conexion,$sql);
                        $conexion -> close();
                        echo "<select name='equipo'>";
                            echo "<option selected> Elige un equipo </option>";
                            for ($i=0;$i<$resultado->num_rows;$i++){
                                $linea = $resultado->fetch_assoc();
                                echo "<option>".$linea["nombre"]."</option>";
                        }
                        echo "</select>";
            
                    ?>
                    <br>
                    <label for="rol"><b>ROL</b></label><br>
                        <select name="rol">
                            <option selected> Elige una opción </option>
                            <option>Entrenador</option>
                            <option>Jugador</option>
                        </select>
                    <br>
                    <br>
                    <button type="submit" class="btn btn-primary btn-block">Registrarse</button>
                </form>
        </fieldset>
    </div>
</body>
</html>