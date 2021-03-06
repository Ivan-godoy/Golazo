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
                    <li><a href="php/usuarios.php"> Usuarios </a></li>
                </ul>
            </li>
            <li><a href="php/ciudad.php"> Gestión de Ciudades </a></li>
            <li><a href="php/estadio.php"> Gestión de Estadios </a></li>
            <li><a href="php/equipos.php"> Gestión de Equipos </a></li>
            <li><a href="php/temporada.php"> Gestión de Temporada </a></li>
            <li><a href="#"> Tablas</a>
                <ul>
                    <li><a href="php/tabla_posiciones.php">Tabla de Posiciones</a></li>
                    <li><a href="php/tabla_goleadores.php">Tabla de Goleadores</a></li>
                    <li><a href="php/tabla_amonestaciones.php">Tabla de Amonestaciones</a></li>
                </ul>
            </li>
            <li><a href="php/resultados.php"> Resultados </a></li>
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
