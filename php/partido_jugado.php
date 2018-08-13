<?php
require_once '../conexion.php';
if (!isset($_GET['codigo'])) {
    header("Location: tabla_fixture.php");
    exit;
}
$idfixture = $_GET["codigo"];
$equipos = $pdo->query("Select * "
    ." from encuentros WHERE id_fixture = $idfixture", PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/estilos.css">
    <link href="https://fonts.googleapis.com/css?family=Kavivanar" rel="stylesheet">
    <link rel="icon" href="../img/icon.png">
    <title>Golazo-Partido-Jugado</title>
</head>
<body>
<header class="encabezado">
    <img src="../img/golazo.png" alt="" class="logo" onclick=" location = '../inicio.php'">
    <input type="submit" value="Cerrar Sesión" onclick=" location = 'NuevaCiudad.php'" class="cerrar">
</header>
<section class="workspace">
    <nav class="navbar">
        <ul id="barra">
            <li><a href="../inicio.php"> Inicio</a></li>
            <li><a href="#"> Creación de </a>
                <ul>
                    <li><a href="arbitro.php">Árbitros</a></li>
                    <li><a href="entrenador.php"> Entrenador </a></li>
                </ul>
            </li>
            <li><a href="ciudad.php"> Gestión de Ciudades </a></li>
            <li><a href="estadio.php"> Gestión de Estadios </a></li>
            <li><a href="equipos.php"> Gestión de Equipos </a></li>
            <li><a href="temporada.php"> Gestión de Temporada </a></li>
            <li><a href="#"> Item de Navegación 8 </a></li>

        </ul>
    </nav>
    <section class="contenedor">
        <div class="general">
            <h1>Partido en Juego</h1>
        </div>

        <div class="equipos">
            <table border="1">
                <thead>
                <tr>
                    <th>Equipo Local</th>
                    <th>VS</th>
                    <th>Equipo Visitante</th>
                </tr>
                </thead>
                <tbody>
            <?php foreach ($equipos as $equi): ?>
                <tr>
                    <td><?php echo $equi['nombre_equipo_local']?></td>
                    <td><?php echo 'VS'?></td>
                    <td><?php echo $equi['nombre_equipo_visita']?></td>
                </tr>
                <tr>
                    <td style="font-size: 100px">0</td>
                    <td><div style="font-size: 50px; height: 150px"><h1 style="height: 20px;  line-height: 50px;">-</h1></div></td>
                    <td style="font-size: 100px">0</td>
                </tr>
            <?php endforeach;?>
                </tbody>
            </table>
        </div>

    </section>

</section>
<footer class="pie">
    <p>Copyright &copy; 2018 - Página creada por Grupo numero 1 Programación de Negocios - Todos los derechos reservados</p>
</footer>
</body>
</html>