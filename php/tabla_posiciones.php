<?php
require_once '../conexion.php';
$posiciones= $pdo->query("SELECT * FROM golazo.tabla_posiciones", PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/estilos.css">
    <link href="https://fonts.googleapis.com/css?family=Kavivanar" rel="stylesheet">
    <link rel="icon" href="../img/icon.png">
    <title>Golazo-Posiciones</title>
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
            <li><a href="estadio.php"> Gestión de Estadios </a></li>
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
            <h1>Tabla de Posiciones</h1>
        </div>
        <table border="1">
            <thead>
            <tr>
                <th>Nombre del Equipo</th>
                <th>PG</th>
                <th>PE</th>
                <th>PP</th>
                <th>PJ</th>
                <th>GF</th>
                <th>GC</th>
                <th>PTS</th>
            </tr>
            </thead>
            <tbody>
            <!----- La infotmacion ----->
            <?php foreach ($posiciones as $posicion): ?>
                <tr>
                    <td><?php echo $posicion['nombre_equipo']?></td>
                    <td><?php echo $posicion['PG']?></td>
                    <td><?php echo $posicion['PE']?></td>
                    <td><?php echo $posicion['PP']?></td>
                    <td><?php echo $posicion['PJ']?></td>
                    <td><?php echo $posicion['GF']?></td>
                    <td><?php echo $posicion['GC']?></td>
                    <td><?php echo $posicion['PTS']?></td>
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