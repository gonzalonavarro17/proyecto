<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="web.css">
    <link href="https://fonts.googlepais.com/css?family=Arial" rel="stylesheet">

</head>
<body class="m-0 row justify-content-center align-items-center">
    <div class="container">
        <img src="img/logodv.png">
    </div>
    <div class="col-auto">
        <fieldset>
            <legend style="text-align: center;">Iniciar sesión</legend>
                <form action="validar.php" method="POST">
                    <label for="uname"><b>NOMBRE DE USUARIO</b></label><br>
                    <input type="text" placeholder="Usuario" name="name" required>
                        <br>
                    <label for="psw"><b>PASSWORD</b></label><br>
                    <input type="password" placeholder="Password" name="psw" required>
                        <br>
                        <br>
                    <a href="registro.php">Crear cuenta</a>
                        <br><br>
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary btn-block">LOGIN</button>
                    </div>
                </form>   
        </fieldset>
    </div>
</body>
</html>