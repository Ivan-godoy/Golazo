<?php
require_once '../conexion.php';
if (!isset($_GET['codigo'])) {
    header("Location: jugadores.php");
    exit;
}
$idequipo = $_GET["codigo"];
$jugadores = $pdo->query("Select * from jugador INNER JOIN equipo_jugador id_jugador on id_jugador = id_jugadores WHERE id_equipos = '{$idequipo}'", PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/estilos.css">
    <link href="https://fonts.googleapis.com/css?family=Kavivanar" rel="stylesheet">
    <link rel="icon" href="../img/icon.png">
    <title>Golazo-Jugadores-Por-Equipos</title>
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
            <li><a href="equipos.php"> Gestión de Equipos </a></li>
            <li><a href="temporada.php"> Gestión de Temporada </a></li>
            <li><a href="#"> Item de Navegación 8 </a></li>
        </ul>
    </nav>
    <section class="contenedor">
        <div class="general">
            <h1>Jugadores</h1>
            <input type="submit" value="Nuevo Jugador" onclick=" location = 'NuevoJugador.php?codigo=<?php echo $idequipo?>'">
            <input type="submit" value="Volver" onclick=" location = 'equipos.php'" style="margin-left: 10px">
        </div>
        <div class="equipos" style="margin-left: 10%">
            <!----- La infotmacion ----->
            <?php foreach ($jugadores as $juga): ?>
                <div class="contequipo" style="font-size: 70%; width: 300px; display: flex; margin: 10px;">
                <img src="<?php echo "img_jugadores/".$juga['foto_jugador']?>" alt="" style="width: 35%; height: 100px; background-color: #142450">
                <div style="margin-left: 30%;text-align: right"><?php echo $juga['nomb_jugador'] . "<br>" ."Jugadores". "<br>". "POSICION"?></div>
                </div>

            <?php endforeach;?>
        </div>
    </section>

</section>
<footer class="pie">
    <p>Copyright &copy; 2018 - Página creada por Grupo numero 1 Programación de Negocios - Todos los derechos reservados</p>
</footer>
</body>
</html>