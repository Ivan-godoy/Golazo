<?php
require_once 'conexion.php';
?>
<HTML>
<HEAD>
    <TITLE>Login Design</TITLE>
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
        <input type="submit" value="Iniciar">
        <?php
        if (!empty($mensaje)):
            foreach ($mensaje as $msj){
                echo "<p>{$msj}</p>";
            }
        endif;
        ?>
    </form>
</div>
</BODY>
</HTML>