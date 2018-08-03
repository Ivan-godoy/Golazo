<?php
require_once '../conexion.php';
$temporadas = $pdo->query("Select * "
    ." from equipo", PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/estilos.css">
    <link href="https://fonts.googleapis.com/css?family=Kavivanar" rel="stylesheet">
    <link rel="icon" href="../img/icon.png">
    <title>Golazo-Creacion-Equipos</title>
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
                    <li><a href="jugador.php"> Jugador </a></li>
                </ul>
            </li>
            <li><a href="ciudad.php"> Gestión de Ciudades </a></li>
            <li><a href="equipos.php"> Gestión de Equipos </a></li>
            <li><a href="#"> Item de Navegación 5 </a></li>
            <li><a href="#"> Item de Navegación 6 </a></li>
            <li><a href="temporada.php"> Gestión de Temporada </a></li>
            <li><a href="#"> Item de Navegación 8 </a></li>

        </ul>
    </nav>
    <section class="contenedor">
        <div class="general">
            <h1>Tabla de Temporada</h1>
            <input type="submit" value="Nueva Equipo" onclick=" location = 'NuevoEquipo.php'">
        </div>
        <table border="1">
            <tbody>
            <div class="temporadas">
                <!----- La infotmacion ----->
                <?php foreach ($temporadas as $temporada): ?>

                    <div class="contentemporada">
                        <div class="eliminar"><input type="submit" value="Eliminar" onclick="location='detalle_temporada.php?codigo=<?php echo $temporada['id_temporada']?> &operacion=eliminar'"></div>
                        <img src="../img/temporada.png" alt="" width="50%" height="50%">
                        <div class="fechas"><?php echo "Inicio " . $temporada['fecha_inicio'] . " / " ."Final ".$temporada['fecha_final']?></div>
                    </div>
                    <?php if (count($temporada) % 4 === 0): ?>
                        <?php echo "<br>" ?>
                    <?php endif; ?>

                <?php endforeach;?>
            </div>
            </tbody>
        </table>
    </section>

</section>
<footer class="pie">
    <p>Copyright &copy; 2018 - Página creada por Grupo numero 1 Programación de Negocios - Todos los derechos reservados</p>
</footer>
</body>
</html>