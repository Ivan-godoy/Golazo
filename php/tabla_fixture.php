<?php
require_once '../conexion.php';
if (!isset($_GET['codigo'])) {
    header("Location: tabla_fixture.php");
    exit;
}
$idtemporada = $_GET["codigo"];
$fixture = $pdo->query("Select * "
    ." from fixture WHERE id_temporada = $idtemporada", PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/estilos.css">
    <link href="https://fonts.googleapis.com/css?family=Kavivanar" rel="stylesheet">
    <link rel="icon" href="../img/icon.png">
    <title>Golazo-Fixture</title>
</head>
<body>
<header class="encabezado">
    <img src="../img/golazo.png" alt="" class="logo">
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
            <h1>Fixture</h1>
            <input type="submit" value="Crear Fixture" onclick=" location = 'fixtures.php?codigo=<?php echo $idtemporada?>'">
            <input type="submit" value="Volver" onclick=" location = 'temporada.php'" style="margin: 1%">
        </div>
        <table border="1">
            <thead>
            <tr>
                <th>Equipo Local</th>
                <th>VS</th>
                <th>Equipo Visitante</th>
            </tr>
            </thead>
            <tbody>
            <!----- La infotmacion ----->
            <?php foreach ($fixture as $fix): ?>
                <tr>
                    <td><?php echo $fix['equipo_local']?></td>
                    <td><?php echo 'VS'?></td>
                    <td><?php echo $fix['equipo_visitante']?></td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </section>

</section>
<footer class="pie">
    <p>Copyright &copy; 2018 - Página creada por Grupo numero 1 Programación de Negocios - Todos los derechos reservados</p>
</footer>
</body>
</html>