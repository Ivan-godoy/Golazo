<?php
session_start();
$mensaje=[];
if(isset($_SESSION['iniciado']) && $_SESSION['iniciado']=== true){
    header("Location: inicio.php");
    exit;
}
require_once 'conexion.php';
$iniciado = isset($_SESSION['iniciado']) ? $_SESSION['iniciado'] : false;
if (!$iniciado){
    if (!empty($_POST)){
        $nombre_usuario = isset($_POST['usuario']) ? $_POST['usuario'] : '';
        $clave = isset($_POST['contraseña']) ? $_POST['contraseña'] : '';
        $resultado = $pdo->query("SELECT * FROM usuarios WHERE nombre_usuario = '{$nombre_usuario}' AND clave = '{$clave}'");
        $usuario = $resultado->fetch(PDO::FETCH_ASSOC);
        if($usuario === false){
            $mensaje[] = "La convinación usuario clave no es la correcta";
        }
        else{
            $_SESSION['usuario'] = $usuario['nombre_usuario'];
            $_SESSION['iniciado'] = true;
            header("Location: inicio.php");
            exit;
        }
    }
}else{
    header("Location: inicio.php");
}

?>
<HTML>
<HEAD>
    <TITLE>Inicio de Sesión</TITLE>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/icon.png">
    <link href="https://fonts.googleapis.com/css?family=Kavivanar" rel="stylesheet">
    <link rel="stylesheet" href="css/sesion.css">
</HEAD>
<BODY>
<div class="loginbox">
    <img src="img/user.png" alt="" class="avatar">
    <h1>Iniciar Sesión</h1>
    <form action="" method="post">
        <label for="usuario">Nombre de Usuario</label>
        <input type="text" name="usuario" placeholder="Nombre de Usuario" id="usuario">
        <label for="contraseña">Contraseña</label>
        <input type="password" name="contraseña" placeholder="Contraseña" id="contraseña">
        <?php
        if (!empty($mensaje)):
            echo '<ul>';
            foreach ($mensaje as $msj){
                echo "<li>{$msj}</li>";
            }
            echo '</ul>';
        endif;
        ?>
        <input type="submit" value="Iniciar">

    </form>
</div>
</BODY>
</HTML>