<?php
    session_start();

    $usuario = $_POST['name'];
    $password = $_POST['psw'];

    include ("conexion.php");
    $comprobacion= "select * from usuario where usuario='$usuario' and clave='$password'";
    $resultado = mysqli_num_rows(mysqli_query($conexion,$comprobacion));
    $conexion -> close();

    if ($resultado==0){
      header('location:error.html');
    } else {
      $_SESSION['username'] = $usuario;
      header('location:index.php');
    }

?>