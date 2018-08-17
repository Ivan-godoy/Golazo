<?php
require_once '../conexion.php';
$estadios = $pdo->query("Select * from estadios", PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/estilos.css">
    <link href="https://fonts.googleapis.com/css?family=Kavivanar" rel="stylesheet">
    <link rel="icon" href="../img/icon.png">
    <title>Golazo-Creacion-Temporada</title>
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
            <li><a href="php/estadio.php"> Gestión de Estadios </a></li>
            <li><a href="equipos.php"> Gestión de Equipos </a></li>
            <li><a href="temporada.php"> Gestión de Temporada </a></li>
            <li><a href="#"> Tablas</a>
                <ul>
                    <li><a href="tabla_posiciones.php">Tabla de Posiciones</a></li>
                    <li><a href="tabla_goleadores.php">Tabla de Goleadores</a></li>
                    <li><a href="tabla_amonestaciones.php">Tabla de Amonestaciones</a></li>
                </ul>
            </li>
            <li><a href="resultados.php"> Resultados </a></li>


        </ul>
    </nav>
    <section class="contenedor">
        <div class="general">
            <h1>Estadios</h1>
            <input type="submit" value="Nuevo Estadio" onclick=" location = 'NuevoEstadio.php'" style="margin: 0; margin-left: 75%">
        </div>

        <div class="temporadas">
            <!----- La infotmacion ----->
            <?php foreach ($estadios as $estadio): ?>

                <div class="contentemporada">
                    <div class="eliminar"><input type="submit" value="Eliminar" onclick="location='detalle_estadio.php?codigo=<?php echo $estadio['id_estadios']?> &operacion=eliminar'"></div>
                    <img src="../img/temporada.png" alt="" width="50%" height="50%" >
                    <div class="fechas"><?php echo "Nombre del estadio: " . $estadio['nom_estadios'] . "<br>" ."Capacidad Maxima: ".$estadio['capacidad']?></div>
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