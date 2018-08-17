<?php
require_once '../conexion.php';
if (!isset($_GET['codigo'])) {
    header("Location: jugadores.php");
    exit;
}
$idequipo = $_GET["codigo"];
$jugadores = $pdo->query("select descripcion, dorsal, nomb_jugador, foto_jugador from equipo_jugador inner join pos_jugador on id_jugadores = id_pos_jugador inner join jugador on id_jugadores = id_jugador  WHERE id_equipos = '{$idequipo}'", PDO::FETCH_ASSOC);
$equipo = $pdo->query("Select * from equipo  WHERE id_equipo = '{$idequipo}'", PDO::FETCH_ASSOC);

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
            <li><a href="estadio.php"> Gestión de Estadios </a></li>
            <li><a href="equipos.php"> Gestión de Equipos </a></li>
            <li><a href="temporada.php"> Gestión de Temporada </a></li>
            <li><a href="#"> Tablas</a>
                <ul>
                    <li><a href="tabla_posiciones.php">Tabla de Posiciones</a></li>
                    <li><a href="tabla_goleadores.php">Tabla de Goleadores</a></li>
                </ul>
            </li>
            <li><a href="resultados.php"> Resultados </a></li>
        </ul>
    </nav>
    <section class="contenedor">
        <div class="general" style="display: block;">
            <br>
            <div>
                <div class="equipos" style="margin: 0">
                    <!----- La infotmacion ----->
                    <?php foreach ($equipo as $equi): ?>
                            <img src="<?php echo "img_equipo/".$equi['logo']?>" alt="" style="width: 35%; height: 270px;">
                            <div style="text-align: left"><?php echo"<h1 style='margin: 0'>Informacion del Equipo</h1>". "Nombre del Equipo: ". $equi['nom_equipo'] . "<br>" ."Fecha de Fundación: ".$equi['fecha_fundacion']. "<br>". "Esquema Habitual: " . $equi['esquema_habitual'] ?></div>
                    <?php endforeach;?>
                    <input type="submit" value="Volver a Equipos" onclick=" location = 'equipos.php'" style="margin-left: 10%">
                </div>
            </div>
        </div>
        <div class="general">
            <h1>Jugadores</h1>
            <input type="submit" value="Nuevo Jugador" onclick=" location = 'NuevoJugador.php?codigo=<?php echo $idequipo?>'">
        </div>
        <div class="equipos" style="margin-left: 10%">
            <!----- La infotmacion ----->
            <?php foreach ($jugadores as $juga): ?>
                <div class="contequipo" style="font-size: 70%; width: 350px; display: flex; margin: 10px; height: 150px">
                <img src="<?php echo "img_jugadores/".$juga['foto_jugador']?>" alt="" style="width: 35%; height: 90%; background-color: #142450; margin: 10px">
                <div style="text-align: right"><?php echo"<br>"."Nombre: ". $juga['nomb_jugador'] . "<br> <br>" ."Descripcion: ".$juga['descripcion']. "<br><br>". "# " . $juga['dorsal']?></div>
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