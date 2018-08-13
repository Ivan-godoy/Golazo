<?php
require_once '../conexion.php';
$ciudades = $pdo->query("Select * "
    ." from ciudad", PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/estilos.css">
    <link href="https://fonts.googleapis.com/css?family=Kavivanar" rel="stylesheet">
    <link rel="icon" href="../img/icon.png">
    <title>Golazo-Ciudades</title>
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
                </ul>
            </li>
            <li><a href="resultados.php"> Resultados </a></li>

        </ul>
    </nav>
    <section class="contenedor">
        <div class="general">
            <h1>Tabla de Ciudades</h1>
            <input type="submit" value="Nueva Ciudad" onclick=" location = 'NuevaCiudad.php'">
        </div>
        <table border="1">
            <thead>
            <tr>
                <th>Codigo de la Ciudad</th>
                <th>Nombre de la Ciudad</th>
                <th>Eliminar</th>
            </tr>
            </thead>
            <tbody>
            <!----- La infotmacion ----->
            <?php foreach ($ciudades as $ciudad): ?>
                <tr>
                    <td><?php echo $ciudad['id_ciudad']?></td>
                    <td><?php echo $ciudad['nom_ciudad']?></td>
                    <td><input type="submit" value="Eliminar" onclick=" location = 'detalle_ciudad.php?codigo=<?php echo $ciudad['id_ciudad']?> &operacion=eliminar'"></td>
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