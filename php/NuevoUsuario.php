<?php
require_once '../conexion.php';
$mensaje=[];
if(!empty($_POST)){//Procesar el formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $nombre_usuario = $_POST['nombre_usuario'];
    $clave = $_POST['clave'];
    $clave2 = $_POST['clave2'];
    $correo = $_POST['correo'];
    if (empty($nombre)|| empty($apellido) || empty($nombre_usuario)|| empty($clave)|| empty($clave2) || empty($correo)){
        $mensaje[] = "Todos los campos son Obligatorios!";
    }
    if ($clave != $clave2){
        $mensaje[] = "Las claves deben ser iguales";
    }
    if(empty($mensaje)){
        $filas_afectadas = $pdo->exec("INSERT INTO usuarios (nombre, apellido, nombre_usuario, clave, correo) VALUES ('{$nombre}', '{$apellido}', '{$nombre_usuario}', '{$clave}', '{$correo}')");
        if ($filas_afectadas>= 1){
            $mensaje[]= "El Usuario fue Creado";
        }else{
            $mensaje[]= "El Usuario no fue Creado";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/estilos.css">
    <link href="https://fonts.googleapis.com/css?family=Kavivanar" rel="stylesheet">
    <link rel="icon" href="../img/icon.png">
    <title>Golazo-Creacion-Usuarios</title>
</head>
<body>
<header class="encabezado">
    <img src="../img/golazo.png" alt="" class="logo" onclick=" location = '../inicio.php'">
    <input type="submit" value="Cerrar Sesión" onclick=" location = '../cerrar.php'" class="cerrar">
</header>
<section class="workspace">
    <nav class="navbar">
        <ul id="barra">
            <li><a href="../inicio.php"> Inicio</a></li>
            <li><a href="#"> Creación de </a>
                <ul>
                    <li><a href="arbitro.php">Árbitros</a></li>
                    <li><a href="entrenador.php"> Entrenador </a></li>
                    <li><a href="usuarios.php">Usuarios </a></li>
                </ul>
            </li>
            <li><a href="ciudad.php"> Gestión de Ciudades </a></li>
            <li><a href="equipos.php"> Gestion de Equipos </a></li>
            <li><a href="estadio.php"> Gestión de Estadios </a></li>
            <li><a href="temporada.php"> Gestion de Temporada </a></li>
            <li><a href="#"> Tablas</a>
                <ul>
                    <li><a href="#">Tabla de Posiciones</a></li>
                    <li><a href="#">Tabla de Goleadores</a></li>
                </ul>
            </li>
            <li><a href="#"> Resultados </a></li>
            <li><a href="#"> Item de Navegación 8 </a></li>
        </ul>
    </nav>
    <section class="contenedor">
        <div class="general">
            <h1>Creacion de Usuario</h1>
            <input type="submit" value="Volver" onclick=" location = 'usuarios.php'">
        </div>
        <form action="" method="post" id="formulario">
            <table style="border: black solid 1px; width: 60%">
                <tr style="height: 50px">
                    <td><label for="nombre" style="margin: 0; padding: 0;">Primer Nombre: </label></td>
                    <td><input type="text" name="nombre" id="nombre" style="margin: 0; padding: 0;"></td>
                </tr>
                <tr style="height: 50px">
                    <td><label for="apellido" style="margin: 0; padding: 0;">Primer Apellido: </label></td>
                    <td><input type="text" name="apellido" id="apellido" style="margin: 0; padding: 0;"></td>
                </tr>
                <tr style="height: 50px">
                    <td><label for="nombre_usuario" style="margin: 0; padding: 0;">Nombre de Usuario: </label></td>
                    <td><input type="text" name="nombre_usuario" id="nombre_usuario" style="margin: 0; padding: 0;"></td>
                </tr>
                <tr style="height: 50px">
                    <td><label for="clave" style="margin: 0; padding: 0;">Clave: </label></td>
                    <td><input type="password" name="clave" id="clave" style="margin: 0; padding: 0; width: 300px; height: 30px; background-color: transparent;border: none;border-bottom: #142450 solid 1px"></td>
                </tr>
                <tr style="height: 50px">
                    <td><label for="clave2" style="margin: 0; padding: 0;">confirmar su Clave: </label></td>
                    <td><input type="password" name="clave2" id="clave2" style="margin: 0; padding: 0; width: 300px; height: 30px; background-color: transparent;border: none;border-bottom: #142450 solid 1px"></td>
                </tr>
                <tr style="height: 50px">
                    <td><label for="correo" style="margin: 0; padding: 0;">Correo </label></td>
                    <td><input type="email" name="correo" id="correo" style="margin: 0; padding: 0; width: 300px; height: 30px; background-color: transparent;border: none;border-bottom: #142450 solid 1px"></td>
                </tr>
                <tr style="height: 50px">
                    <td colspan="2"><input type="submit" value="Registrar Usuario">
                        <input type="reset" value="Limpiar"></td>
                </tr>
            </table>
            <br>
            <?php
            if (!empty($mensaje)):
                echo '<ul>';
                foreach ($mensaje as $msj){
                    echo "<li>{$msj}</li>";
                }
                echo '</ul>';
            endif;
            ?>
        </form>
    </section>

</section>
<footer class="pie">
    <p>Copyright &copy; 2018 - Página creada por Grupo numero 1 Programación de Negocios - Todos los derechos reservados</p>
</footer>
</body>
</html>