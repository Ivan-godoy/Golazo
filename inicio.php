<?php
require_once 'conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/estilos.css">
    <link href="https://fonts.googleapis.com/css?family=Kavivanar" rel="stylesheet">
    <link rel="icon" href="img/icon.png">
    <title>Golazo</title>
</head>
<body>
<header class="encabezado">
    <img src="img/golazo.png" alt="" class="logo" onclick=" location = 'inicio.php'">
    <input type="submit" value="Cerrar Sesión" onclick=" location = 'cerrar.php'" class="cerrar">
</header>
<section class="workspace">
    <nav class="navbar">
        <ul id="barra">
            <li><a href="inicio.php"> Inicio</a></li>
            <li><a href="#"> Creación de </a>
                <ul>
                    <li><a href="php/arbitro.php">Árbitros</a></li>
                    <li><a href="php/entrenador.php"> Entrenador </a></li>
                    <li><a href="php/jugador.php"> Jugador </a></li>
                </ul>
            </li>
            <li><a href="php/ciudad.php"> Gestión de Ciudades </a></li>
            <li><a href="#"> Item de Navegación 4 </a></li>
            <li><a href="#"> Item de Navegación 5 </a></li>
            <li><a href="#"> Item de Navegación 6 </a></li>
            <li><a href="#"> Item de Navegación 7 </a></li>
            <li><a href="#"> Item de Navegación 8 </a></li>

        </ul>
    </nav>
    <section class="contenedor">
        <img src="img/fondo.png" alt="" class="fondo">
    </section>

</section>
<footer class="pie">
    <p>Copyright &copy; 2018 - Página creada por Grupo numero 1 Programación de Negocios - Todos los derechos reservados</p>
</footer>
</body>
</html>
