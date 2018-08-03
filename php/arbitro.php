<?php
require_once '../conexion.php';
$arbitros = $pdo->query("Select id_arbitro, nom_arbitro, fecha_nacimeinto_arbitro "
    ." from arbitro", PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/estilos.css">
    <link href="https://fonts.googleapis.com/css?family=Kavivanar" rel="stylesheet">
    <link rel="icon" href="../img/icon.png">
    <title>Golazo-Creacion-Arbitros</title>
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
            <li><a href="#"> Creación de  </a>
                <ul>
                    <li><a href="arbitro.php">Árbitros</a></li>
                    <li><a href="entrenador.php"> Entrenador </a></li>
                    <li><a href="jugador.php"> Jugador </a></li>
                </ul>
            </li>
            <li><a href="ciudad.php"> Gestión de Ciudades </a></li>
            <li><a href="#"> Item de Navegación 4 </a></li>
            <li><a href="#"> Item de Navegación 5 </a></li>
            <li><a href="#"> Item de Navegación 6 </a></li>
            <li><a href="temporada.php"> Temporada </a></li>
            <li><a href="#"> Item de Navegación 8 </a></li>

        </ul>
    </nav>
    <section class="contenedor">
        <div class="general">
            <h1>Tabla de Árbitros</h1>
            <input type="submit" value="Nuevo Arbitro" onclick=" location = '../inicio.php'">
        </div>
        <table border="1">
            <thead>
            <tr>
                <th>Id_Arbitro</th>
                <th>Nombre</th>
                <th>Fecha de Nacimiento</th>
                <th>Eliminar</th>
            </tr>
            </thead>
            <tbody>
            <!----- La infotmacion ----->
            <?php foreach ($arbitros as $arbitro): ?>
                <tr>
                    <td><a href="detalle_ciudad.php?codigo=<?php echo $arbitro['id_arbitro']?>"><?php echo $arbitro['id_arbitro']?></a></td>
                    <td><?php echo $arbitro['nom_arbitro']?></td>
                    <td><?php echo $arbitro['fecha_nacimiento_arbitro']?></td>
                    <td><input type="submit" value="Eliminar" onclick="Location= 'detalle_ciudad.php?codigo=<?php echo $arbitro['id_arbitro']?> &operacion=eliminar'"></td>
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
